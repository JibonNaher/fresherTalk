<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class SearchResultC extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
    }

    public function index(){
        $this->load->view('SearchResultView');
    }

    public function SearchResultfromC(){
        //echo $this->uri->segment(2);
        $query['urgentFirst'] = $this->input->get('urgentFirst');

        $data = array(
          'searchKeyword' => $this->input->get('searchKey')
        );

        //echo $data['searchKeyword'];
        //$this->load->model('DatabaseClass');
        $query['Posts'] = $this->DatabaseClass->searchPostUnderCategory($data);

        if($query['Posts'] == "No"):
            $query['postExist'] = "No";
        else:
            $query['postExist'] = "Yes";

        endif;

        $this->load->view('SearchResultView',$query);
    }

    public function searchUnderALL(){
        //echo $this->uri->segment(2);
        $query['urgentFirst'] = $this->input->get('urgentFirst');
        $data = array(
          'searchKeyword' => $this->input->get('searchKey')
        );
        //$this->load->model('DatabaseClass');
        $query['Posts'] = $this->DatabaseClass->searchPostUnderAll($data);

        if($query['Posts'] == "No"):
            $query['postExist'] = "No";
        else:
            $query['postExist'] = "Yes";

        endif;

        $this->load->view('SearchResultView',$query);
    }

    public function SearchResultfromAll(){
        //echo $this->uri->segment(2);
        $query['urgentFirst'] = $this->input->get('urgentFirst');
        $data = array(
          'searchKeyword' => $this->input->post('searchKey')
        );
        //$this->load->model('DatabaseClass');
        $query['Posts'] = $this->DatabaseClass->searchPostUnderAll($data);

        if($query['Posts'] == "No"):
            $query['postExist'] = "No";
        else:
            $query['postExist'] = "Yes";

        endif;

        $this->load->view('SearchResultView',$query);
    }
    public function back(){

      redirect('index.php/CategoryPageC');
      //$referred_from = $this->session->userdata('referred_from');
      //redirect($referred_from);
      //redirect($_SERVER['HTTP_REFERER']);
    }
  }
