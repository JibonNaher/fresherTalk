<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class WelcomePageC extends CI_Controller {

    public function __construct() {
      parent::__construct();
      $this->load->helper('url');
      $this->load->helper('form');
    }

    public function index(){
      $data = array(
        'msg' => ''
      );
      $this->load->view('WelcomePageView',$data);
    }
    public function logIn(){
      $this->load->library('form_validation');

      $this->form_validation->set_rules('S_ID', 'Student ID', 'required');
      $this->form_validation->set_rules('psw', 'Password', 'required');

      if ($this->form_validation->run() == FALSE)
      {
        $data = array(
          'msg' => ''
        );
        $this->load->view('WelcomePageView', $data);
      }
      else{
        //$this->load->model('DatabaseClass');
        $data =array(
        'S_ID' => $this->input->post('S_ID'),
        'pw' => $this->input->post('psw')
        );
        $query = $this->DatabaseClass->checkLoginValidity($data);

        if($query!=false)
        {
          $data = array(
            'S_ID' => $this->input->post('S_ID')
          );
          $data['refered_from'] = $_SERVER['HTTP_REFERER'];
        //  $this->session->set_userdata('refered_from', $_SERVER['HTTP_REFERER']);
          $this->session->set_userdata('session_name', $data);

          redirect('index.php/MainPageC');
        }
        else{
          $data = array(
            'msg' => 'ID or Password not matched'
          );
            $this->load->view('WelcomePageView', $data);
        }
      }
    }

}

?>
