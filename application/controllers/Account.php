<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
        $this->load->model('User_model');
        $session_user = $this->session->userdata('logged_in');
        if ($session_user) {
            $this->user_id = $session_user['login_id'];
        } else {
            $this->user_id = 0;
        }
    }

    public function index() {
        redirect('Account/profile');
    }

    //Profile page
    public function profile() {

        if ($this->user_id == 0) {
            redirect('Account/login');
        }
        $checkmemberprofile = $this->User_model->check_user_member($this->user_id);
        if ($checkmemberprofile) {

            redirect('ShadiProfile/viewProfile/' . $checkmemberprofile->member_id);
        }

        $this->db->where('id', $this->user_id);
        $query = $this->db->get('member_users');
        $user_details = $query->row_array();
        $data['user_details'] = $user_details;

        $checkmemeber = $this->User_model->check_user_member($this->user_id);
        $data['member_profile'] = $checkmemeber;

        $data['msg'] = "";
        if (isset($_POST['submit'])) {
            $otp = $this->input->post('otp');
            if ($user_details['otp'] == $otp) {
                $this->db->set('status', "active");
                $this->db->where('id', $this->user_id);
                $this->db->update('member_users');
                redirect('Account/profile');
            }
        }

        if (isset($_POST['change_password'])) {
            $old_password = $this->input->post('old_password');
            $new_password = $this->input->post('new_password');
            $re_password = $this->input->post('re_password');

            if ($user_details->password == md5($old_password)) {
                if ($new_password == $re_password) {
                    $password = md5($re_password);
                    $this->db->set('password', $password);
                    $this->db->where('id', $this->user_id);
                    $this->db->update('member_users');
                    redirect('Account/profile');
                } else {
                    $data['msg'] = "Password didn't match.";
                }
            } else {
                $data['msg'] = 'Enterd wrong password.';
            }
        }



        $this->load->view('Account/profile', $data);
    }

    //login page
    //login page
    function login() {
        $data1['msg'] = "";

        $this->session->unset_userdata("tempmobieno");


        if (isset($_POST['signIn'])) {
            $username = $this->input->post('contact_no');
            $password = $this->input->post('password');
            $this->db->from('member_users');
            $this->db->where('contact_no', $username);
            $this->db->where('password', md5($password));
            $query = $this->db->get();
            $userdata = $query->row_array();
            if ($userdata) {
                $usr = $userdata['contact_no'];
                $pwd = $userdata['password'];
                if ($username == $usr && md5($password) == $pwd) {
                    $sess_data = array(
                        'username' => $username,
                        'name' => $userdata['name'],
                        'login_id' => $userdata['id'],
                    );
                    $user_id = $userdata['id'];
                    $session_cart = $this->session->userdata('session_cart');
                    $productlist = $session_cart['products'];


                    $this->session->set_userdata('logged_in', $sess_data);



                    redirect('Account/profile');
                } else {
                    $data1['msg'] = 'Invalid Mobile no.  Or Password, Please Try Again';
                }
            } else {
                $data1['msg'] = 'Invalid Mobile no. Or Password, Please Try Again';
            }
        }



        $this->load->view('Account/login', $data1);
    }

    function loginotp() {
        $data1['msg'] = "";
        // $this->session->unset_userdata("tempmobieno");
        $mobilenotemp = $this->session->userdata('tempmobieno');
        $data1['mobile_no'] = $mobilenotemp;
        if (isset($_POST['signIn'])) {
            $username = $mobilenotemp;
            $password = $this->input->post('otp');
            $this->db->from('member_users');
            $this->db->where('contact_no', $username);
            $this->db->where('otp', $password);
            $query = $this->db->get();
            $userdata = $query->row_array();
            if ($userdata) {
                $usr = $userdata['contact_no'];
                $pwd = $userdata['otp'];
                if (1) {
                    $sess_data = array(
                        'username' => $username,
                        'name' => $userdata['name'],
                        'login_id' => $userdata['id'],
                    );
                    $user_id = $userdata['id'];

                    $this->session->set_userdata('logged_in', $sess_data);

                    redirect('Account/profile');
                } else {
                    $data1['msg'] = 'Invalid OTP, Please Try Again';
                }
            } else {
                $data1['msg'] = 'Invalid OTP, Please Try Again';
            }
        }
        $this->load->view('Account/loginotp', $data1);
    }

    function registration() {
        $data1['msg'] = "";

        $link = isset($_GET['page']) ? $_GET['page'] : '';
        $data1['next_link'] = $link;



        if (isset($_POST['registration'])) {
            $password = $this->input->post('password');
            $name = $this->input->post('name');
            $contact_no = $this->input->post('contact_no');
            if ($password) {
                $this->db->where('contact_no', $contact_no);
                $query = $this->db->get('member_users');
                $user_details = $query->row();
                if ($user_details) {
                    $data1['msg'] = 'User with this contact no. already registered.';
                } else {
                    $userarray = array(
                        'name' => $name,
                        'contact_no' => $contact_no,
                        'email' => "",
                        'password' => md5($password),
                        'password2' => $password,
                        "status" => "Inactive",
                        'registration_datetime' => date("Y-m-d h:i:s A")
                    );
                    $this->db->insert('member_users', $userarray);
                    $user_id = $this->db->insert_id();

                    $sess_data = array(
                        'username' => $contact_no,
                        'name' => $name,
                        'login_id' => $user_id,
                    );

                    $this->session->set_userdata('logged_in', $sess_data);
                    redirect('Account/profile');
                }
            } else {
                $data1['msg'] = 'Password did not match.';
            }
        }


        $this->load->view('Account/registration', $data1);
    }

    // Logout from admin page
    function logout() {
        $newdata = array(
            'username' => '',
            'password' => '',
            'logged_in' => FALSE,
        );

        $this->session->unset_userdata($newdata);
        $this->session->sess_destroy();

        redirect('Account/login');
    }

    //orders list
    function orderList() {
        if ($this->user_id == 0) {
            redirect('Account/login');
        }
        $this->db->where('user_id', $this->user_id);
        $query = $this->db->get('user_order');
        $orderlist = $query->result();

        $orderslistr = [];
        foreach ($orderlist as $key => $value) {

            $this->db->order_by('id', 'desc');
            $this->db->where('order_id', $value->id);
            $query = $this->db->get('user_order_status');
            $status = $query->row();
            $value->status = $status ? $status->status : $value->status;
            array_push($orderslistr, $value);
        }
        $data['orderslist'] = $orderslistr;


        $this->load->view('Account/orderList', $data);
    }

    //Address management
    function address() {
        $user_address_details = $this->User_model->user_address_details($this->user_id);
        $data['user_address_details'] = $user_address_details;

        //Get Address
        if (isset($_GET['setAddress'])) {
            $this->db->set('status', "");
            $this->db->where('user_id', $this->user_id);
            $this->db->update('shipping_address');

            $adid = $_GET['setAddress'];
            $this->db->set('status', "default");
            $this->db->where('id', $adid);
            $this->db->update('shipping_address');
            redirect('Account/address');
        }

        //add New address
        if (isset($_POST['add_address'])) {
            $this->db->set('status', "");
            $this->db->where('user_id', $this->user_id);
            $this->db->update('shipping_address');

            $this->db->set('status', "");
            $this->db->where('user_id', $this->user_id);
            $this->db->update('shipping_address');

            $category_array = array(
                'address1' => $this->input->post('address1'),
                'address2' => $this->input->post('address2'),
                'city' => $this->input->post('city'),
                'state' => $this->input->post('state'),
//                'pincode' => $this->input->post('pincode'),
                'country' => $this->input->post('country'),
                'user_id' => $this->user_id,
                'status' => 'default',
            );
            $this->db->insert('shipping_address', $category_array);
            redirect('Account/address');
        }


        $this->load->view('Account/address', $data);
    }

    //function credits
    function credits() {
        if ($this->user_id == 0) {
            redirect('Account/login');
        }

        $user_id = $this->user_id;

        $user_credits = $this->User_model->user_credits($this->user_id);
        $data['user_credits'] = $user_credits;

        $querys = "select * from (
                   select credit, '' as debit, order_id, remark, c_date, c_time  FROM `user_credit` 
                   where user_id = $user_id and credit>0
                    union
                   select '' as credit, credit as debit, order_id, remark, c_date, c_time  FROM `user_debit`
                   where user_id = $user_id  and credit>0
                   ) as credit order by c_date desc";

        $query = $this->db->query($querys);
        $creditlist = $query->result();
        $data['creditlist'] = $creditlist;


        $this->load->view('Account/credits', $data);
    }

    function testReg() {
        $user_id = $this->user_id;
    }

    function paymentCallBack() {
        
    }

    function payment() {
        $user_id = $this->user_id;
        $paytm_mid = "JExSZL42779741544455";
        require(APPPATH . 'libraries/Paytm/PaytmChecksum.php');
        $paytmParams = array();

        $paytmParams["body"] = array(
            "requestType" => "Payment",
            "mid" => "$paytm_mid",
            "websiteName" => "Shaidimychoice.com",
            "orderId" => "ORDERID_98765",
            "callbackUrl" => site_url("Account/paymentCallBack"),
            "txnAmount" => array(
                "value" => "1.00",
                "currency" => "INR",
            ),
            "userInfo" => array(
                "custId" => "CUST_001",
            ),
        );

        /*
         * Generate checksum by parameters we have in body
         * Find your Merchant Key in your Paytm Dashboard at https://dashboard.paytm.com/next/apikeys 
         */
        $checksum = PaytmChecksum::generateSignature(json_encode($paytmParams["body"], JSON_UNESCAPED_SLASHES), "YOUR_MERCHANT_KEY");

        $paytmParams["head"] = array(
            "signature" => $checksum
        );

        $post_data = json_encode($paytmParams, JSON_UNESCAPED_SLASHES);

        /* for Staging */
        $url = "https://securegw-stage.paytm.in/theia/api/v1/initiateTransaction?mid=$paytm_mid&orderId=ORDERID_98765";

        /* for Production */
// $url = "https://securegw.paytm.in/theia/api/v1/initiateTransaction?mid=YOUR_MID_HERE&orderId=ORDERID_98765";

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json"));
        $response = curl_exec($ch);
        print_r($response);
    }

}
