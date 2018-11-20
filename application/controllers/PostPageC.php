<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class PostPageC extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        //$this->load->library('user_agent');
    }

    public function index(){
      //echo current_url();
      //$this->session->set_userdata('refered_from', current_url());

      $P_ID = $this->input->get('P_ID');
      $data = array(
        'P_ID' => $P_ID
      );
      //$this->load->model('DatabaseClass');

        $q = $this->DatabaseClass->searchPostName($data);

        $query['P_ID'] = $q->Post_ID;
        $query['P_title'] = $q->P_title;
        $query['P_body'] = $q->P_body;
        $query['P_time'] = $q->P_time;
        $query['P_solved_tag'] = $q->P_solved_tag;

        $data1 = array(
          'U_ID' => $q->User_ID
        );
        $q = $this->DatabaseClass->searchPostUser($data1);
        $query['P_U_ID'] = $q->U_ID;
        $query['P_U_Name'] = $q->U_Name;

        $query['Posts_detail'] = $this->DatabaseClass->searchPostDetails($data);

        if($query['Posts_detail'] == "No"):
            $query['commentExist'] = "No";
        else:
            $query['commentExist'] = "Yes";

        endif;

      $this->load->view('PostPageView',$query);
    }

    public function createAnswer(){
      //$this->session->set_userdata('refered_from', $_SERVER['HTTP_REFERER']);

      $p_ID = $this->input->get('P_ID');
      $data = array(
        'Post_ID' => $this->input->get('P_ID'),
        'postBody' => $this->input->post('postBody'),
      );
      $this->DatabaseClass->insertNewComment($data);

      // $data1 = array(
      //   'P_ID' => $data['Post_ID']
      // );
      //
      // $q = $this->DatabaseClass->searchPostName($data1);
      //
      // $query['P_ID'] = $q->Post_ID;
      // $query['P_title'] = $q->P_title;
      // $query['P_body'] = $q->P_body;
      // $query['P_time'] = $q->P_time;
      // $query['P_solved_tag'] = $q->P_solved_tag;
      //
      // $data2 = array(
      //   'U_ID' => $q->User_ID
      // );
      // $q = $this->DatabaseClass->searchPostUser($data2);
      // $query['P_U_ID'] = $q->U_ID;
      // $query['P_U_Name'] = $q->U_Name;
      //
      // $query['Posts_detail'] = $this->DatabaseClass->searchPostDetails($data1);
      //
      // if($query['Posts_detail'] == "No"):
      //     $query['commentExist'] = "No";
      // else:
      //     $query['commentExist'] = "Yes";
      //
      // endif;

      //$this->load->view('PostPageView',$query);
      redirect('index.php/PostPageC?P_ID='.$p_ID.'');

      //$this->load->view('MainPageView');
    }

    public function afterUpvoteBtn(){
      //$this->session->set_userdata('refered_from', $_SERVER['HTTP_REFERER']);

      $P_ID = $this->input->get('P_ID');
      $exploded=explode(" ",$P_ID);

      $data = array(
        'P_ID' => $exploded[0],
        'C_ID' => $exploded[1]
      );
      $this->DatabaseClass->updateUpvote($data);

      //redirect('index.php/PostPageC?P_ID='.$data['P_ID'].'');

      $data1 = array(
        'P_ID' => $data['P_ID']
      );

      $q = $this->DatabaseClass->searchPostName($data1);

      $query['P_ID'] = $q->Post_ID;
      $query['P_title'] = $q->P_title;
      $query['P_body'] = $q->P_body;
      $query['P_time'] = $q->P_time;
      $query['P_solved_tag'] = $q->P_solved_tag;

      $data1 = array(
        'U_ID' => $q->User_ID
      );
      $q = $this->DatabaseClass->searchPostUser($data1);
      $query['P_U_ID'] = $q->U_ID;
      $query['P_U_Name'] = $q->U_Name;

      $query['Posts_detail'] = $this->DatabaseClass->searchPostDetails($data);

      if($query['Posts_detail'] == "No"):
          $query['commentExist'] = "No";
      else:
          $query['commentExist'] = "Yes";

      endif;

      $this->load->view('PostPageView',$query);

      //$this->load->view('MainPageView');
    }

    public function back(){

      redirect('index.php/CategoryPageC');
      //$referred_from = $this->session->userdata('referred_from');
      //redirect($referred_from);
      //redirect($_SERVER['HTTP_REFERER']);
    }

  }
