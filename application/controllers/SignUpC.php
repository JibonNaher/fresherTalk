<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class SignUpC extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
    }

    public function index(){
        $this->load->view('SignUpPageView');
    }
  }
