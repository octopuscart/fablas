<?php

include APPPATH . 'libraries/RazorPay/Razorpay.php';

use Razorpay\Api\Api;

defined('BASEPATH') OR exit('No direct script access allowed');

class Rpayment extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Shadi_model');
        $this->load->library('session');
        $this->user_id = $this->session->userdata('logged_in')['login_id'];
        $this->razorapi = new Api("rzp_test_pmmRQa45RPaoD7", "1wzmkKmyXJKF5q9aRWiwyfcF");
    }

    public function index() {
        $order = $this->api->order->create(array(
            'receipt' => '123',
            'amount' => 100,
            'currency' => 'INR'
                )
        );
    }

}
