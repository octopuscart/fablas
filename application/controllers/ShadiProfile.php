<?php

use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

/*
 * To change this license header, choose License Headers in Project Properties.
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class ShadiProfile extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->curd = $this->load->model('Curd_model');
        $this->userdata = $this->session->userdata('logged_in');
        $session_user = $this->session->userdata('logged_in');
        if ($session_user) {
            $this->user_id = $session_user['login_id'];
        } else {
            $this->user_id = 0;
        }

        $this->db->where("member_id",  $this->user_id);
        $query = $this->db->get("shadi_profile");
        $this->memberprofiledata = $query->row();
    }

    public function addBaseProfile() {
        if ($this->user_id == 0) {
            redirect('Account/login');
        }
        $data = array("last_aid" => 1);
        $data['manager_id'] = $this->userdata['login_id'];

        //community
        $community_category = $this->Curd_model->get("set_community_category");
        $data['community_category'] = $community_category;

        //mother tounge
        $set_mother_tongue = $this->Curd_model->get("set_mother_tongue");
        $data['set_mother_tongue'] = $set_mother_tongue;

        //qualification
        $set_qualification_category = $this->Curd_model->get("set_qualification_category");
        $set_qualification_dict = array();
        foreach ($set_qualification_category as $key => $value) {
            $set_qualification_dict[$value['title']] = $this->Curd_model->getByForeignKey("set_qualification", "category_id", $value['id']);
        }
        $data['set_qualification_dict'] = $set_qualification_dict;

        //profession
        $set_profession_sector = $this->Curd_model->get("set_profession_sector");
        $data['set_profession_sector'] = $set_profession_sector;
        $set_profession_category = $this->Curd_model->get("set_profession_category");
        $set_profession_dict = array();
        foreach ($set_profession_category as $key => $value) {
            $set_profession_dict[$value['title']] = $this->Curd_model->getByForeignKey("set_profession", "category_id", $value['id']);
        }
        $data['set_profession_dict'] = $set_profession_dict;

        //income
        $set_annual_income = $this->Curd_model->get("set_annual_income");
        $data['set_annual_income'] = $set_annual_income;

        //city state
        $set_state = $this->Curd_model->get("set_states");
        $data['set_state'] = $set_state;

        if (isset($_POST['addmemeber'])) {
            $shadidata = $this->input->post();
            unset($shadidata['addmemeber']);
            $shadidata['status'] = "Progress";
            $shadidata['manager_id'] = "10";
            $shadidata['user_id'] = $this->user_id;

            $this->db->insert("shadi_profile", $shadidata);
            $last_id = $this->db->insert_id();
            $profile_id = "SMC" . date("Ymd") . $last_id;
            $this->db->where("id", $last_id);
            $this->db->set("member_id", $profile_id);
            $this->db->update("shadi_profile");
            redirect("ShadiProfile/viewProfile/" . $profile_id);
        }



        $this->load->view('shadiProfile/createBaseProfile', $data);
    }

    public function addProfile() {
        if ($this->user_id == 0) {
            redirect('Account/login');
        }
        $data = array("last_aid" => 1);
        $data['manager_id'] = $this->userdata['login_id'];

        //community
        $community_category = $this->Curd_model->get("set_community_category");
        $data['community_category'] = $community_category;

        //mother tounge
        $set_mother_tongue = $this->Curd_model->get("set_mother_tongue");
        $data['set_mother_tongue'] = $set_mother_tongue;

        //qualification
        $set_qualification_category = $this->Curd_model->get("set_qualification_category");
        $set_qualification_dict = array();
        foreach ($set_qualification_category as $key => $value) {
            $set_qualification_dict[$value['title']] = $this->Curd_model->getByForeignKey("set_qualification", "category_id", $value['id']);
        }
        $data['set_qualification_dict'] = $set_qualification_dict;

        //profession
        $set_profession_sector = $this->Curd_model->get("set_profession_sector");
        $data['set_profession_sector'] = $set_profession_sector;
        $set_profession_category = $this->Curd_model->get("set_profession_category");
        $set_profession_dict = array();
        foreach ($set_profession_category as $key => $value) {
            $set_profession_dict[$value['title']] = $this->Curd_model->getByForeignKey("set_profession", "category_id", $value['id']);
        }
        $data['set_profession_dict'] = $set_profession_dict;

        //income
        $set_annual_income = $this->Curd_model->get("set_annual_income");
        $data['set_annual_income'] = $set_annual_income;

        //city state
        $set_state = $this->Curd_model->get("set_states");
        $data['set_state'] = $set_state;

        if (isset($_POST['addmemeber'])) {
            $shadidata = $this->input->post();
            unset($shadidata['addmemeber']);
            $shadidata['status'] = "Active";
            $this->db->insert("shadi_profile", $shadidata);
            $last_id = $this->db->insert_id();
            $profile_id = "SMC" . date("Ymd") . $last_id;
            $this->db->where("id", $last_id);
            $this->db->set("member_id", $profile_id);
            $this->db->update("shadi_profile");
            redirect("ShadiProfile/viewProfile/" . $profile_id);
        }



        $this->load->view('shadiProfile/addProfile', $data);
    }
    
   public function profilePreferences() {
        if ($this->user_id == 0) {
            redirect('Account/login');
        }
        $data = array("last_aid" => 1);
        $data['manager_id'] = $this->userdata['login_id'];

        //community
        $community_category = $this->Curd_model->get("set_community_category");
        $data['community_category'] = $community_category;

        //mother tounge
        $set_mother_tongue = $this->Curd_model->get("set_mother_tongue");
        $data['set_mother_tongue'] = $set_mother_tongue;

        //qualification
        $set_qualification_category = $this->Curd_model->get("set_qualification_category");
        $set_qualification_dict = array();
        foreach ($set_qualification_category as $key => $value) {
            $set_qualification_dict[$value['title']] = $this->Curd_model->getByForeignKey("set_qualification", "category_id", $value['id']);
        }
        $data['set_qualification_dict'] = $set_qualification_dict;

        //profession
        $set_profession_sector = $this->Curd_model->get("set_profession_sector");
        $data['set_profession_sector'] = $set_profession_sector;
        $set_profession_category = $this->Curd_model->get("set_profession_category");
        $set_profession_dict = array();
        foreach ($set_profession_category as $key => $value) {
            $set_profession_dict[$value['title']] = $this->Curd_model->getByForeignKey("set_profession", "category_id", $value['id']);
        }
        $data['set_profession_dict'] = $set_profession_dict;

        //income
        $set_annual_income = $this->Curd_model->get("set_annual_income");
        $data['set_annual_income'] = $set_annual_income;

        //city state
        $set_state = $this->Curd_model->get("set_states");
        $data['set_state'] = $set_state;

        if (isset($_POST['addmemeber'])) {
            $shadidata = $this->input->post();
            unset($shadidata['addmemeber']);
            $shadidata['status'] = "Active";
            $this->db->insert("shadi_profile", $shadidata);
            $last_id = $this->db->insert_id();
            $profile_id = "SMC" . date("Ymd") . $last_id;
            $this->db->where("id", $last_id);
            $this->db->set("member_id", $profile_id);
            $this->db->update("shadi_profile");
            redirect("ShadiProfile/viewProfile/" . $profile_id);
        }



        $this->load->view('shadiProfile/addProfile', $data);
    }

    function editMemberProfile($profile_id, $profilesection="family") {
        if ($this->user_id == 0) {
            redirect('Account/login');
        }
        $data = array("profile_id" => $profile_id, "profilesection"=>$profilesection);
        //community
        $community_category = $this->Curd_model->get("set_community_category");
        $data['community_category'] = $community_category;

        //mother tounge
        $set_mother_tongue = $this->Curd_model->get("set_mother_tongue");
        $data['set_mother_tongue'] = $set_mother_tongue;

        //qualification
        $set_qualification_category = $this->Curd_model->get("set_qualification_category");
        $set_qualification_dict = array();
        foreach ($set_qualification_category as $key => $value) {
            $set_qualification_dict[$value['title']] = $this->Curd_model->getByForeignKey("set_qualification", "category_id", $value['id']);
        }
        $data['set_qualification_dict'] = $set_qualification_dict;

        //profession
        $set_profession_sector = $this->Curd_model->get("set_profession_sector");
        $data['set_profession_sector'] = $set_profession_sector;
        $set_profession_category = $this->Curd_model->get("set_profession_category");
        $set_profession_dict = array();
        foreach ($set_profession_category as $key => $value) {
            $set_profession_dict[$value['title']] = $this->Curd_model->getByForeignKey("set_profession", "category_id", $value['id']);
        }
        $data['set_profession_dict'] = $set_profession_dict;

        //income
        $set_annual_income = $this->Curd_model->get("set_annual_income");
        $data['set_annual_income'] = $set_annual_income;

        //city state
        $set_state = $this->Curd_model->get("set_states");
        $data['set_state'] = $set_state;


        if (isset($_POST['updatememeber'])) {
            $shadidata = $this->input->post();
            unset($shadidata['updatememeber']);

            $this->db->where("member_id", $profile_id);
            $this->db->set($shadidata);
            $this->db->update("shadi_profile");

            redirect("ShadiProfile/editMemberProfile/" . $profile_id);
        }

        $this->load->view('shadiProfile/editProfile', $data);
    }

    function listOfProfile() {
        if ($this->user_id == 0) {
            redirect('Account/login');
        }
        $usertype = $this->userdata['user_type'];
        $data = array("usertype" => $usertype);
        $this->load->view('shadiProfile/listProfile', $data);
    }

    function dashboard($profile_id) {
        if ($this->user_id == 0) {
            redirect('Account/login');
        }
        $data = array("profile_id" => $profile_id);
        $this->load->view('shadiProfile/dashboard', $data);
    }

    function viewProfile($profile_id) {
        if ($this->user_id == 0) {
            redirect('Account/login');
        }
        $data = array("profile_id" => $profile_id);
             $this->load->view('shadiProfile/dashboard', $data);
    }

    function profilePhotos($profile_id) {
        if ($this->user_id == 0) {
            redirect('Account/login');
        }
        $data = array("profile_id" => $profile_id);
        $config['upload_path'] = ADMINURL . 'assets/profile_image';
        $config['allowed_types'] = '*';
        if (isset($_POST['submit'])) {
            $picture = '';
            if (!empty($_FILES['picture']['name'])) {
                $temp1 = rand(100, 1000000);
                $ext1 = explode('.', $_FILES['picture']['name']);
                $ext = strtolower(end($ext1));
                $file_newname = $temp1 . $profile_id;

                $config['file_name'] = $file_newname;
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if ($this->upload->do_upload('picture')) {
                    $uploadData = $this->upload->data();
                    $picture = $uploadData['file_name'];
                } else {
                    $picture = '';
                }
            }


            $post_data = array(
                'member_id' => $profile_id,
                'image' => $picture,
                'status' => "",
                "photo_status" => "",
                'datetime' => date("Y-m-d H:m:s"),
                'display_index' => 0,
            );
            $this->db->insert('shadi_profile_photos', $post_data);
            redirect('ShadiProfile/profilePhotos/' . $profile_id);
        }

        if (isset($_POST['reindex'])) {
            $image_index = $this->input->post("image_index");
            $imageids = $this->input->post("image_id");
            foreach ($imageids as $key => $value) {
                $imgid = $imageids[$key];
                $imgidx = $image_index[$key];
                $indexarray = array(
                    "display_index" => $imgidx,
                );
                $this->db->where("id", $imgid);
                $this->db->set($indexarray);
                $this->db->update("shadi_profile_photos");
            }
            redirect('ShadiProfile/profilePhotos/' . $profile_id);
        }
        if (isset($_POST['profilePhoto'])) {
            $this->db->where("member_id", $profile_id);
            $this->db->where("status", "profile");
            $this->db->set(array("status" => ""));
            $this->db->update("shadi_profile_photos");
            $imageids = $this->input->post("photo_id");
            $indexarray = array(
                "status" => "profile",
            );
            $this->db->where("id", $imageids);
            $this->db->set($indexarray);
            $this->db->update("shadi_profile_photos");
            redirect('ShadiProfile/profilePhotos/' . $profile_id);
        }
        if (isset($_POST['deletePhoto'])) {


            $imageids = $this->input->post("photo_id");
            $this->db->where("id", $imageids);
            $this->db->delete("shadi_profile_photos");
            redirect('ShadiProfile/profilePhotos/' . $profile_id);
        }
        $this->load->view('shadiProfile/profilePhotos', $data);
    }

    function profileContact($profile_id) {
        if ($this->user_id == 0) {
            redirect('Account/login');
        }
        $data = array("profile_id" => $profile_id);


        if (isset($_POST['deletecontact'])) {
            $contact_id = $this->input->post("contact_id");
            $this->db->where("id", $contact_id);
            $this->db->delete("shadi_profile_contact");
            redirect('ShadiProfile/profileContact/' . $profile_id);
        }

        if (isset($_POST['addcontact'])) {
            $shadidata = $this->input->post();
            unset($shadidata['addcontact']);
            $shadidata['datetime'] = date("Y-m-d H:m:s");
            $shadidata['status'] = "Active";
            $shadidata['member_id'] = $profile_id;
            $this->db->insert("shadi_profile_contact", $shadidata);
            redirect('ShadiProfile/profileContact/' . $profile_id);
        }

        $this->load->view('shadiProfile/profileContact', $data);
    }

}
