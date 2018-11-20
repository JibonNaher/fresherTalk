<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class MainPageC extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        // $this->load->library('email');
        //
        // $config = array();
        // $config['protocol'] = 'smtp';
        // $config['smtp_host'] = 'smtp.googlemail.com';
        // $config['smtp_user'] = 'jibon.naher09@gmail.com';
        // $config['smtp_pass'] = 'JIBon09CSE@';
        // $config['charset'] = 'utf-8';
        // $config['smtp_crypto'] = 'ssl';
        // $config['newline']    = "\r\n";
        // $config['smtp_timeout'] = 7;
        // $config['smtp_port'] = 465;
        //
        // $this->email->initialize($config);
    }

    public function index(){
        //$this->session->set_userdata('refered_from', $_SERVER['HTTP_REFERER']);

        //$this->load->model('DatabaseClass');
        $data = $this->DatabaseClass->extractUserInfoforMain();
        $this->session->set_userdata('session_name', $data);

        $data['postExistAcc'] = "No";
        $data['postExistRes'] = "No";
        $data['postExistTra'] = "No";
        $data['postExistAca'] = "No";
        $data['postExistOth'] = "No";

        if($data['SubsAccommodation']==1){
          $cat = array(
            'C_ID' => 1,
          );
          $data['postfromAcc'] = $this->DatabaseClass->searchPostfromSubscription($cat);
          if($data['postfromAcc'] == "No"){
            $data['postExistAcc'] = "No";
          }
          else{
            $data['postExistAcc'] = "Yes";
          }
        }

        if($data['SubsRestaurant']==1){
          $cat = array(
            'C_ID' => 2,
          );
          $data['postfromRes'] = $this->DatabaseClass->searchPostfromSubscription($cat);
          if($data['postfromRes'] == "No"){
            $data['postExistRes'] = "No";
          }
          else{
            $data['postExistRes'] = "Yes";
          }
        }

        if($data['SubsTransport']==1){
          $cat = array(
            'C_ID' => 3,
          );
          $data['postfromTra'] = $this->DatabaseClass->searchPostfromSubscription($cat);
          if($data['postfromTra'] == "No"){
            $data['postExistTra'] = "No";
          }
          else{
            $data['postExistTra'] = "Yes";
          }
        }

        if($data['SubsAcademic']==1){
          $cat = array(
            'C_ID' => 4,
          );
          $data['postfromAca'] = $this->DatabaseClass->searchPostfromSubscription($cat);
          if($data['postfromAca'] == "No"){
            $data['postExistAca'] = "No";
          }
          else{
            $data['postExistAca'] = "Yes";
          }
        }

        if($data['SubsOthers']==1){
          $cat = array(
            'C_ID' => 4,
          );
          $data['postfromOth'] = $this->DatabaseClass->searchPostfromSubscription($cat);
          if($data['postfromOth'] == "No"){
            $data['postExistOth'] = "No";
          }
          else{
            $data['postExistOth'] = "Yes";
          }
        }

        //$data['Posts'] = $this->DatabaseClass->searchPostforMain();

        // $data['Posts'] = $this->DatabaseClass->searchPostfromSubscription();
        //
        // if($data['Posts'] == "No"):
        //     $data['postExist'] = "No";
        // else:
        //     $data['postExist'] = "Yes";
        //
        // endif;

        //sendEmail();

        //$session_data= $this->session->userdata('session_name');

        // $from_email = "jibon.naher09@gmail.com";
        // $to_email = "jnboishakhi09@gmail.com";
        // //$to_email = $this->input->post('email');
        // //Load email library
        // //$this->load->library('email');
        // $this->email->from($from_email, 'Identification');
        // $this->email->to($to_email);
        // $this->email->subject('Send Email Codeigniter');
        // $this->email->message('The email send using codeigniter library');
        // //Send mail
        // if($this->email->send())
        //     //echo "email sent";
        //     $this->session->set_flashdata("email_sent","Congragulation Email Send Successfully.");
        // else
        //     //show_error($this->email->print_debugger());
        //     $this->session->set_flashdata("email_sent","You have encountered an error");
        //$this->load->view('contact_email_form');


        $this->load->view('MainPageView',$data);
    }
    // public function searchUnderALL(){
    //    $query['urgentFirst'] = $this->input->get('urgentFirst');
    //     $data = array(
    //       'searchKeyword' => $this->input->post('searchKey')
    //     );
    //     //$this->load->model('DatabaseClass');
    //     $query['Posts'] = $this->DatabaseClass->searchPostUnderAll($data);
    //
    //     if($query['Posts'] == "No"):
    //         $query['postExist'] = "No";
    //     else:
    //         $query['postExist'] = "Yes";
    //
    //     endif;
    //
    //     $this->load->view('SearchResultView',$query);
    // }
    public function logout(){
      $this->session->sess_destroy();
      redirect('index.php/WelcomePageC');
    }
    public function saveSubscription(){
      //$this->session->set_userdata('refered_from', $_SERVER['HTTP_REFERER']);

      $subInfo = array(
        'SubsAccommodation' => (isset($_POST['SubsAccommodation']))? 1:0,
        'SubsRestaurant' => (isset($_POST['SubsRestaurant']))? 1:0,
        'SubsTransport' => (isset($_POST['SubsTransport']))? 1:0,
        'SubsAcademic' => (isset($_POST['SubsAcademic']))? 1:0,
        'SubsOthers' => (isset($_POST['SubsOthers']))? 1:0,
      );

      $this->DatabaseClass->updateSubsInfo($subInfo);

      $data = $this->DatabaseClass->extractUserInfo();
      $data['C'] = "No";
      $this->session->set_userdata('session_name', $data);

      // $data['Posts'] = $this->DatabaseClass->searchPostfromSubscription();
      //
      // if($data['Posts'] == "No"):
      //     $data['postExist'] = "No";
      // else:
      //     $data['postExist'] = "Yes";
      //
      // endif;

      redirect('index.php/MainPageC');
      //$this->load->view('MainPageView',$data);
    }

    public function sendEmail(){
      $session_data= $this->session->userdata('session_name');

      $from_email = "jibon.naher09@gmail.com";
      $to_email = "jibon@kaist.ac.kr";
      //$to_email = $this->input->post('email');
      //Load email library
      //$this->load->library('email');
      $this->email->from($from_email, 'Identification');
      $this->email->to($to_email);
      $this->email->subject('Send Email Codeigniter');
      $this->email->message('The email send using codeigniter library');
      //Send mail
      if($this->email->send())
          $this->session->set_flashdata("email_sent","Congragulation Email Send Successfully.");
      else
          $this->session->set_flashdata("email_sent","You have encountered an error");
      $this->load->view('contact_email_form');

    }
  }
