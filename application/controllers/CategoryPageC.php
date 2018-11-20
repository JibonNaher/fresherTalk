<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class CategoryPageC extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('email');

        $config = array();
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'smtp.googlemail.com';
        $config['smtp_user'] = 'fresherTalk@gmail.com';
        $config['smtp_pass'] = 'fresherTalk2018';
        $config['charset'] = 'utf-8';
        $config['smtp_crypto'] = 'ssl';
        $config['newline']    = "\r\n";
        $config['smtp_timeout'] = 7;
        $config['smtp_port'] = 465;

        $this->email->initialize($config);
    }

    public function index(){
      //$this->session->set_userdata('refered_from', current_url());
      //$this->load->model('DatabaseClass');
      //echo $this->input->get('urgentFirst');
      $data = $this->DatabaseClass->extractUserInfo();

      $C_ID = $this->input->get('C_ID');
      if($C_ID == '1'):
        $data['C'] = "Accommodation";
      elseif($C_ID == '2'):
        $data['C'] = "Restaurant";
      elseif($C_ID == '3'):
        $data['C'] = "Transport";
      elseif($C_ID == '4'):
        $data['C'] = "Academic";
      elseif($C_ID == '5'):
        $data['C'] = "Others";
      else:
        $data['C'] = "No";
      endif;

      $this->session->set_userdata('session_name', $data);
      $query['C_ID'] = $C_ID;
      $query['urgentFirst'] = $this->input->get('urgentFirst');
      $query['Posts'] = $this->DatabaseClass->searchPostfromCategory();

      if($query['Posts'] == "No"):
          $query['postExist'] = "No";
      else:
          $query['postExist'] = "Yes";

      endif;
      $this->load->view('CategoryPageView',$query);

    }

    public function createNewPost(){
      //$this->session->set_userdata('refered_from', $_SERVER['HTTP_REFERER']);
      //$ref = previous_uri();
      // $this->session->refered_from;

      //echo $ref;
      // if (strpos($ref, 'CategoryPageC') false)
      // {
      //   echo "hello";
      //   $this->session->set_userdata('C',"No");
      //   redirect('index.php/MainPageC');
      // }
      // else{
      $C_ID = $this->input->get('C_ID');
      //echo $C_ID;
      $data = array(
        'C_ID' => $this->input->get('C_ID'),
        'postTitle' => $this->input->post('postTitle'),
        'postBody' => $this->input->post('postBody'),
        'isUrgent' => (isset($_POST['isUrgent']))? 1:0,
      );

      $urgent = $data['isUrgent'];

      //$this->load->model('DatabaseClass');
      $this->DatabaseClass->insertNewPost($data);

      if($urgent == 1){
        $session_data= $this->session->userdata('session_name');

        $user['forEmail'] = $this->DatabaseClass->selectUsertoSendEmail();

        foreach ($user['forEmail'] as $row) {
          if($row['U_ID']!=$session_data['U_ID']){

          $from_email = "fresherTalk@gmail.com";
          $to_email = $row['Email'];

          //echo $to_email;
          $this->email->from($from_email, 'fresherTALK');
          $this->email->to($to_email);
          $this->email->subject('New urgent post');
          $this->email->message('A new question post is asked in fresherTalk in Category '.$session_data['C'].' !!Please go to the link '.base_url().'');
          //Send mail
          if($this->email->send()){
              //echo "email sent";
              //$this->session->set_flashdata("email_sent","Congragulation Email Send Successfully.");
            }
          else{
              //echo "Not sent";
              //show_error($this->email->print_debugger());
              //$this->session->set_flashdata("email_sent","You have encountered an error");}
            }
        }
      // }

      }
    }

      $data = $this->DatabaseClass->extractUserInfo();
      //$data['C'] = $session_data['C'];

      $this->session->set_userdata('session_name', $data);
      $query['C_ID'] = $C_ID;
      $query['urgentFirst'] = $this->input->get('urgentFirst');

      $query['Posts'] = $this->DatabaseClass->searchPostfromCategory();

      if($query['Posts'] == "No"):
          $query['postExist'] = "No";
      else:
          $query['postExist'] = "Yes";

      endif;
      $this->load->view('CategoryPageView',$query);

      //$this->load->view('MainPageView');
    }

    public function afterSubcribeBtn(){
      //$this->session->set_userdata('refered_from', $_SERVER['HTTP_REFERER']);

      $this->DatabaseClass->updateCategorySubscription();

      //$session_data= $this->session->userdata('session_name');
      $data = $this->DatabaseClass->extractUserInfo();
      //$data['C'] = $session_data['C'];

      $this->session->set_userdata('session_name', $data);

      $C_ID = $this->input->get('C_ID');
      $query['C_ID'] = $C_ID;
      $query['urgentFirst'] = $this->input->get('urgentFirst');

      $query['Posts'] = $this->DatabaseClass->searchPostfromCategory();

      if($query['Posts'] == "No"):
          $query['postExist'] = "No";
      else:
          $query['postExist'] = "Yes";

      endif;
      $this->load->view('CategoryPageView',$query);

    }

    public function back(){

      redirect('index.php/MainPageC');
      //$referred_from = $this->session->userdata('referred_from');
      //redirect($referred_from);
      //redirect($_SERVER['HTTP_REFERER']);
    }

  }
