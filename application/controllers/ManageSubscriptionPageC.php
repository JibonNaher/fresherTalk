<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class ManageSubscriptionPageC extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
    }

    public function index(){
        $data = $this->DatabaseClass->extractUserInfoforProfile();
        //echo $data->U_Name;
        $this->load->view('ManageSubscriptionPageView',$data);
    }
    public function back(){

      redirect('index.php/MainPageC');
      //$referred_from = $this->session->userdata('referred_from');
      //redirect($referred_from);
      //redirect($_SERVER['HTTP_REFERER']);
    }
  }
