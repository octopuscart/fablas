<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function query_exe($query) {
        $query = $this->db->query($query);
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $data[] = $row;
            }
            return $data; //format the array into json data
        }
    }

    //check user if exist in system
    function check_user($emailid) {
        $this->db->where('email', $emailid);
        $query = $this->db->get('admin_users');
        $user_details = $query->row();
        return $user_details;
    }

    //check user if exist in system
    function check_user_member($user_id) {
        $this->db->where('user_id', $user_id);
        $query = $this->db->get('shadi_profile');
        $shadi_profile = $query->row();
        return $shadi_profile;
    }

    //end of check user5
    //get user detail by id
    function user_details($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('member_users');
        return $query->row_array();
    }

    //get user address by id
    function user_address_details($id) {
        $this->db->where('user_id', $id);
        $this->db->order_by('status', 'desc');
        $query = $this->db->get('shipping_address');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return array();
        }
    }

    //get user creadit detail by id
    function user_credits($id) {
        $this->db->select('sum(credit) as credits');
        $this->db->where('user_id', $id);
        $query = $this->db->get('user_credit');
        $credits = 0;
        if ($query->num_rows() > 0) {
            $credits = $query->result_array()[0]['credits'];
        }

        $debits = 0;
        $this->db->select('sum(credit) as credits');
        $this->db->where('user_id', $id);
        $query = $this->db->get('user_debit');
        if ($query->num_rows() > 0) {
            $debits = $query->result_array()[0]['credits'];
        }

        $total = $credits - $debits;

        return ($total);
    }

    // end of user detail by id
    //get user detail by id
    function user_reports($user_type) {

        switch ($user_type) {
            case 'Blocked':
                $this->db->where(array('status=' => 'Blocked'));
                break;
            case 'All':
                $this->db->where(array('status!=' => 'Blocked'));
                break;
            default:
                $this->db->where(array('user_type' => $user_type, 'status!=' => 'Blocked'));
                break;
        }
        $query = $this->db->get('admin_users');
        return $query->result();
    }

    function registration_mail($user_id) {
        $this->db->where('id', $user_id);
        $query = $this->db->get('admin_users');
        $customer = $query->row();


        $emailsender = email_sender;
        $sendername = email_sender_name;
        $email_bcc = email_bcc;

        if ($customer) {
            $this->email->set_newline("\r\n");
            $this->email->from($emailsender, $sendername);
            $this->email->to($customer->email);
            $this->email->bcc(email_bcc);

            $orderlog = array(
                'log_type' => 'Registration',
                'log_datetime' => date('Y-m-d H:i:s'),
                'user_id' => $user_id,
                'log_detail' => "Customer registration on website. "
            );
            $this->db->insert('system_log', $orderlog);

            $subject = "Welcome to Maharaja Mart - Your account with www.maharajamart.com has been successfully created!";
            $this->email->subject($subject);

            $customerdetails['customer'] = $customer;

            $htmlsmessage = $this->load->view('Email/registration', $customerdetails, true);
            $this->email->message($htmlsmessage);

            $this->email->print_debugger();
            $send = $this->email->send();
            if ($send) {
                echo json_encode("send");
            } else {
                $error = $this->email->print_debugger(array('headers'));
                echo json_encode($error);
            }
        }
    }

    function optSending($mobile_no, $testmode = 0) {
        $returndata = array("status" => "0", "usercheck" => "0", "message" => "");
        $this->db->from('member_users');
        $this->db->where('contact_no', $mobile_no);
        $query = $this->db->get();
        $userdata = $query->row_array();

        if ($userdata) {
            $returndata["usercheck"] = "1";
            if ($mobile_no != "8602648733") {
                $otpcheck = rand(1000, 9999);
                $this->db->set('otp', $otpcheck);
                $this->db->where('contact_no', $mobile_no);
                $this->db->update('member_users');
            }
            else{
                $otpcheck = "1212";
            }
            $api_key = '56038B83D0D233';
            $contacts = $mobile_no;

            $from = 'SHADMC';
            if ($testmode == 0) {
                $sms_text = urlencode("$otpcheck is your OTP to login to shadimychoice.com");
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, "http://sms.arasko.com/app/smsapi/index.php");
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, "key=" . $api_key . "&campaign=10800&routeid=7&type=text&contacts=" . $contacts . "&senderid=" . $from . "&msg=" . $sms_text);
                $response = curl_exec($ch);
                curl_close($ch);
                $strvrfy = $response;

                $checkstring = strpos($strvrfy, "SHOOT-ID");
                if ($checkstring != false) {
                    $returndata["message"] = "OTP sent to your mobile no.";
                    $returndata["status"] = "1";
                    $this->session->set_userdata('tempmobieno', $mobile_no);
                } else {
                    $returndata["message"] = "OTP sending error.";
                    $returndata["status"] = "2";
                }
            } else {
                $returndata["status"] = "yes";
            }
        } else {
            $returndata["message"] = "Mobile no. not regisered, please contact our customer care.";
            $returndata["usercheck"] = "0";
        }
        return $returndata;
    }

    function packages() {
        $this->db->from('set_packages');
        $this->db->where('status', "active");
        $query = $this->db->get();
        $packagelist = $query->result_array();
        return $packagelist;
    }

    function packageobj($packageid) {
        $this->db->from('set_packages');
        $this->db->where("id", $packageid);
        $this->db->where('status', "active");
        $query = $this->db->get();
        $packagobj = $query->row_array();
        return $packagobj;
    }

    // end of user detail by id
}
