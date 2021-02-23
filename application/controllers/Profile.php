<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Shadi_model');
        $this->load->library('session');
        $this->user_id = $this->session->userdata('logged_in')['login_id'];
    }

    public function index() {
        redirect('/');
    }

    //function for product list
    function profileList() {
        $data = array();
        $this->load->view('profiles/profilelist', $data);
    }

    function ProductSearch() {
        $data['keyword'] = $_GET['keyword'];
        $this->load->view('Product/productSearch', $data);
    }

    //function for details
    function profileDetails($member_id) {
        $checkprofile = $this->Shadi_model->checkProfile($member_id);
        $data = array();
        if ($checkprofile) {
            $data["member_id"] = $member_id;
            $this->load->view('profiles/profileDetails', $data);
        } else {
            $this->load->view('errors/html/error_404');
        }
    }


  
}
