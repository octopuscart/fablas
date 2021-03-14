<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Shop extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->library('session');
        $this->user_id = $this->session->userdata('logged_in')['login_id'];
    }

    public function index() {


        $data = array();


        $this->load->view('home', $data);
    }

    function error404() {
        $this->load->view('pages/error404');
    }

    function tnc() {
        $this->load->view('pages/tnc');
    }

    function pp() {
        $this->load->view('pages/pp');
    }

    function packages() {
        $this->load->view('pages/package');
    }

    function aboutus() {
        $this->load->view('pages/aboutus');
    }

    function contactus() {
        $this->load->view('pages/contactus');
    }

}
