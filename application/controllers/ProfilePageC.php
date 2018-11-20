<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class ProfilePageC extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
    }

    public function index(){
      //$session_data= $this->session->userdata('session_name');
      //$this->load->model('DatabaseClass');
      //echo $this->input->get('all');
      $data['all'] = $this->input->get('all');
      $data['U_info'] = $this->DatabaseClass->extractUserInfo();
      $data['Posts_urgent'] = $this->DatabaseClass->extractUsersUrgentPost();

      if($data['Posts_urgent'] == "No"):
          $data['urgentPostExist'] = "No";
      else:
          $data['urgentPostExist'] = "Yes";

      endif;

      $data['Posts_notrgent'] = $this->DatabaseClass->extractUsersNotUrgentPost();
      if($data['Posts_notrgent'] == "No"):
          $data['noturgentPostExist'] = "No";
      else:
          $data['noturgentPostExist'] = "Yes";

      endif;

      $data['Comments'] = $this->DatabaseClass->extractUsersComments();
      if($data['Comments'] == "No"):
          $data['commentsExist'] = "No";
      else:
          $data['commentsExist'] = "Yes";

      endif;

      $data['top5'] = $this->DatabaseClass->extractTopUser();

      $this->load->view('ProfilePageView',$data);
    }
  
  }
