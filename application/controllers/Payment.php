<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require(APPPATH . 'libraries/Paytm/PaytmChecksum.php');

class Payment extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('User_model');
        $this->load->library('session');
        $session_user = $this->session->userdata('logged_in');
        if ($session_user) {
            $this->user_id = $session_user['login_id'];
        } else {
            $this->user_id = 0;
        }
        $this->checklogin = $this->session->userdata('logged_in');
        $this->user_id = $this->session->userdata('logged_in')['login_id'];

        $this->db->where_in('attr_key', ["EOPGMid", "EOPGSecretCode", "EOPGSalesLink", "EOPGQueryLink"]);
        $query = $this->db->get('configuration_attr');
        $paymentattr = $query->result_array();
        $paymentconf = array();
        foreach ($paymentattr as $key => $value) {
            $paymentconf[$value['attr_key']] = $value['attr_val'];
        }
        $this->mid = $paymentconf['EOPGMid'];
        $this->secret_code = $paymentconf['EOPGSecretCode'];
        $this->salesLink = $paymentconf['EOPGSalesLink'];
        $this->queryLink = $paymentconf['EOPGQueryLink'];

        $test = 0;
        if ($test == 1) {
            $this->MID = "kPXSdS51683887501020";
            $this->MKEY = "1yJH@wbgVVEEhOye";
            $this->WEBSITE = "WEBSTAGING";
            $this->Industry = "Retail";
            $this->ChannelId_web = "WEB";
            $this->ChannelId_wap = "WAP";
            $this->endpoint = "https://securegw-stage.paytm.in/theia/api/v1/";
        } else {
            $this->MID = "JExSZL42779741544455";
            $this->MKEY = "03r48Nx2_UY@p5bW";
            $this->WEBSITE = "DEFAULT";
            $this->Industry = "Retail";
            $this->ChannelId_web = "WEB";
            $this->ChannelId_wap = "WAP";
            $this->endpoint = "https://securegw.paytm.in/theia/api/v1/";
        }
    }

    private function useCurl($url, $headers, $fields = null, $post = true) {
        // Open connection
        $ch = curl_init();
        if ($url) {
            // Set the url, number of POST vars, POST data
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, $post);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_HEADER, 1);
            // Disabling SSL Certificate support temporarly
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            if ($fields) {
                curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
            }
            // Execute post
            $result = curl_exec($ch);
            $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
            if ($result === FALSE) {
                die('Curl failed: ' . curl_error($ch));
            }
            // Close connection
            curl_close($ch);
            $curldata = array("result" => $result, "headers" => $header_size);

            $response = $curldata['result'];
            $header_size = $curldata['headers'];
            $header = substr($response, 0, $header_size);
            $body = substr($response, $header_size);
            $codehas = $response;

            $returnbody = json_decode($body, true);
            return $returnbody;
        }
    }

    public function createSignature() {
        /* initialize an array */
        $paytmParams = array();
        $orderid = date("YMDHMS");

        /* add parameters in Array */
        $paytmParams["MID"] = $this->MID;
        $paytmParams["ORDERID"] = $orderid;

        /**
         * Generate checksum by parameters we have
         * Find your Merchant Key in your Paytm Dashboard at https://dashboard.paytm.com/next/apikeys 
         */
        $paytmChecksum = PaytmChecksum::generateSignature($paytmParams, $this->MKEY);
        return array("order_id" => $orderid, "paytmChecksum" => $paytmChecksum);
    }

    public function index() {
        redirect('/');
    }

    public function startPayment() {
        $mid = $this->MID;
        $orderid = date("Ymdhms");
        $mkey = $this->MKEY;
        $paytmParams = array();
        $paytmParams["body"] = array(
            "requestType" => "Payment",
            "mid" => "$mid",
            "websiteName" => $this->WEBSITE,
            "orderId" => $orderid,
            "callbackUrl" => site_url("Payment/paymentCallback"),
            "txnAmount" => array(
                "value" => "10.00",
                "currency" => "INR",
            ),
            "userInfo" => array(
                "custId" => "CUST_001",
            ),
        );
        $checksum = PaytmChecksum::generateSignature(json_encode($paytmParams["body"], JSON_UNESCAPED_SLASHES), $mkey);
        $paytmParams["head"] = array(
            "signature" => $checksum
        );
        $post_data = json_encode($paytmParams, JSON_UNESCAPED_SLASHES);
        $url = $this->endpoint . "/initiateTransaction?mid=$mid&orderId=$orderid";
        $response = $this->useCurl($url, array("Content-Type: application/json"), $post_data);
        $txnid = ($response["body"]["txnToken"]);
        redirect("Payment/paymentSubmit/$txnid/$orderid");
    }

    public function paymentSubmit($txntoken, $orderid) {
        $data["mid"] = $this->MID;
        $data["txntoken"] = $txntoken;
        $data["orderid"] = $orderid;
        $data["paymentlink"] = $this->endpoint . "showPaymentPage?mid=$mid&orderId=$orderid";
        $this->load->view('payment/startpayment', $data);
    }

    function paymentCallback() {
        $callbackdata = $this->input->post();
        echo "<pre>";
        print_r($callbackdata);
    }

}

?>