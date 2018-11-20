<?php
class DatabaseClass extends CI_Model {
    public function __construct()	{
        parent::__construct();
        $this->load->database();
    }

    public function checkLoginValidity($data){
      $query = $this->db->get_where('User', array('Student_ID' => $data['S_ID']));

      foreach($query->result_array() AS $row) {
        if($row['Password'] == $data['pw']){
          return true;
        }
        else{
          return false;
        }
      }
    }

    public function extractUserInfoforMain(){
      $session_data= $this->session->userdata('session_name');

      $row = $this->db->get_where('User', array('Student_ID' => $session_data['S_ID']))->row();

      //foreach($query->result_array() AS $row) {
        $data = array(
          'U_ID' => $row->U_ID,
          'S_ID' =>  $row->Student_ID,
          'U_Name' => $row->U_Name,
          'Email' => $row->Email,
          'Gender' => $row->Gender,
          'NoOfPost' => $row->NoOfPost,
          'NoOfComments' => $row->NoOfComments,
          'NoOfLikes' => $row->NoOfLikes,
          'SubsAccommodation' => $row->Accommodation,
          'SubsRestaurant' => $row->Restaurant,
          'SubsTransport' => $row->Transport,
          'SubsAcademic' => $row->Academic,
          'SubsOthers' => $row->Others,
          'C' => 'No',
        );
      //}
      return $data;
    }

    public function extractUserInfo(){
      $session_data= $this->session->userdata('session_name');

      $row = $this->db->get_where('User', array('Student_ID' => $session_data['S_ID']))->row();

      //foreach($query->result_array() AS $row) {
        $data = array(
          'U_ID' => $row->U_ID,
          'S_ID' =>  $row->Student_ID,
          'U_Name' => $row->U_Name,
          'Email' => $row->Email,
          'Gender' => $row->Gender,
          'NoOfPost' => $row->NoOfPost,
          'NoOfComments' => $row->NoOfComments,
          'NoOfLikes' => $row->NoOfLikes,
          'SubsAccommodation' => $row->Accommodation,
          'SubsRestaurant' => $row->Restaurant,
          'SubsTransport' => $row->Transport,
          'SubsAcademic' => $row->Academic,
          'SubsOthers' => $row->Others,
          'C' => $session_data['C'],
        );
      //}
      return $data;
    }

    public function extractUserInfoforProfile(){
      $session_data= $this->session->userdata('session_name');

      $row = $this->db->get_where('User', array('Student_ID' => $session_data['S_ID']))->row();

      return $row;
    }

    public function extractTopUser(){
      $session_data= $this->session->userdata('session_name');
      $query = "SELECT * FROM User ORDER BY NoOfLikes DESC LIMIT 5";
      $query = $this->db->query($query);
      $flag = 0;

      foreach($query->result_array() AS $row){
        if($row['U_ID'] == $session_data['U_ID']){
          //echo $row['U_ID']." and ".$session_data['U_ID'];
          $flag = 1;
          break;
        }
      }
      if($flag == 1){
        return true;
      }
      else
        return false;
    }

    public function selectUsertoSendEmail(){
      $session_data= $this->session->userdata('session_name');
      $query = "SELECT * FROM User WHERE ".$session_data['C']." = 1 ORDER BY NoOfLikes DESC LIMIT 3";
      $query = $this->db->query($query);
      return $query->result_array();
    }

    public function updateSubsInfo($data){
      $session_data= $this->session->userdata('session_name');
      //, Restaurant = $data['SubsRestaurant'], Transport = $data['SubsTransport'], Academic = $data['SubsAcademic'], Others = $data['SubsOthers']
      $query = "UPDATE User SET Accommodation=".$data['SubsAccommodation'].", Restaurant = ".$data['SubsRestaurant'].", Transport = ".$data['SubsTransport'].", Academic = ".$data['SubsAcademic'].", Others = ".$data['SubsOthers']." WHERE U_ID=".$session_data['U_ID']."";
      $this->db->query($query);
    }

    public function searchPostUnderCategory($data){
        $session_data= $this->session->userdata('session_name');

        $query = "SELECT * FROM Post WHERE Category_Name = '".$session_data['C']."'
                AND (P_title LIKE '%".$data['searchKeyword']."%' OR P_body LIKE '%".$data['searchKeyword']."%') ORDER BY P_time DESC";
        $query = $this->db->query($query);

        if($query->num_rows()>0)
        {
          return $query->result_array();
        }
        else{
          return 'No';
        }
    }

    public function searchPostUnderAll($data){

        $query = "SELECT * FROM Post WHERE P_title LIKE '%".$data['searchKeyword']."%' OR P_body LIKE '%".$data['searchKeyword']."%' ORDER BY P_time DESC";
        $query = $this->db->query($query);

        if($query->num_rows()>0)
        {
          return $query->result_array();
        }
        else{
          return 'No';
        }
    }

    public function searchPostfromSubscription($cat){
      if($cat['C_ID']==1)
        $cat_name = 'Accommodation';
      elseif($cat['C_ID']==2)
          $cat_name = 'Restaurant';
      elseif($cat['C_ID']==3)
          $cat_name = 'Transport';
      elseif($cat['C_ID']==4)
          $cat_name = 'Academic';
      elseif($cat['C_ID']==5)
          $cat_name = 'Others';

      $query = "SELECT * FROM Post WHERE Category_Name = '".$cat_name."' ORDER BY P_time DESC LIMIT 1";
      $query = $this->db->query($query);

      if($query->num_rows()>0)
      {
        return $query->result_array();
      }
      else{
        return 'No';
      }
    }

    public function searchPostforMain(){

    }

    public function searchPostfromCategory(){
        $session_data= $this->session->userdata('session_name');

        $query = "SELECT * FROM Post,User WHERE Post.User_ID = User.U_ID AND Category_Name = '".$session_data['C']."' ORDER BY P_time DESC";
        $query = $this->db->query($query);

      //  $query = $this->db->get_where('Post', array('P_title' => '%'.$data['searchKeyword'].'%'));
        if($query->num_rows()>0)
        {
          return $query->result_array();
        }
        else{
          return 'No';
        }
    }

    public function extractUsersUrgentPost(){
      $session_data= $this->session->userdata('session_name');

      $query = "SELECT * FROM Post WHERE User_ID = ".$session_data['U_ID']." AND P_urgent_flag = 1 ORDER BY P_time DESC LIMIT 3";
      $query = $this->db->query($query);

    //  $query = $this->db->get_where('Post', array('P_title' => '%'.$data['searchKeyword'].'%'));
      if($query->num_rows()>0)
      {
        return $query->result_array();
      }
      else{
        return 'No';
      }
    }

    public function extractUsersNotUrgentPost(){
      $session_data= $this->session->userdata('session_name');

      $query = "SELECT * FROM Post WHERE User_ID = ".$session_data['U_ID']." AND P_urgent_flag = 0 ORDER BY P_time DESC LIMIT 3";
      $query = $this->db->query($query);

    //  $query = $this->db->get_where('Post', array('P_title' => '%'.$data['searchKeyword'].'%'));
      if($query->num_rows()>0)
      {
        return $query->result_array();
      }
      else{
        return 'No';
      }
    }

    public function extractUsersComments(){
      $session_data= $this->session->userdata('session_name');

      $query = "SELECT * FROM Comment,Post WHERE Comment.User_ID = ".$session_data['U_ID']." AND Comment.Post_ID = Post.Post_ID ORDER BY Comment_time DESC LIMIT 8";
      $query = $this->db->query($query);

    //  $query = $this->db->get_where('Post', array('P_title' => '%'.$data['searchKeyword'].'%'));
      if($query->num_rows()>0)
      {
        return $query->result_array();
      }
      else{
        return 'No';
      }
    }

    public function searchPostName($data){
      $query = "SELECT * FROM Post WHERE Post_ID = ".$data['P_ID']."";
      $query = $this->db->query($query)->row();
      return $query;
    }

    public function searchPostUser($data){
      $query = "SELECT * FROM User WHERE U_ID = ".$data['U_ID']."";
      $query = $this->db->query($query)->row();
      return $query;
    }

    public function searchPostDetails($data){

      $query = "SELECT * FROM Comment, User WHERE Comment.Post_ID = ".$data['P_ID']." AND User.U_ID = Comment.User_ID ORDER BY Comment.NoOfUpvotes DESC";
      $query = $this->db->query($query);
      if($query->num_rows()>0)
      {
        return $query->result_array();
      }
      else{
        return 'No';
      }
    }

    public function insertNewPost($data){
      $session_data= $this->session->userdata('session_name');

      date_default_timezone_set("Asia/Seoul");
      $currentDateTime = date('Y-m-d H:i:s');
      //  $Cat_ID;
      // if ($session_data['C'] == 'Accommodation'):
      //     $Cat_ID = 1;
      // elseif ($session_data['C'] == 'Restaurant'):
      //     $Cat_ID = 2;
      // elseif ($session_data['C'] == 'Transport'):
      //     $Cat_ID = 3;
      // elseif ($session_data['C'] == 'Academic'):
      //     $Cat_ID = 4;
      // elseif ($session_data['C'] == 'Others'):
      //     $Cat_ID = 5;
      // endif;

      $data1 = array(
        'Category_Name' => $session_data['C'],
        'Category_ID' => $data['C_ID'],
        'User_ID' => $session_data['U_ID'],
        'P_title' => $data['postTitle'],
        'P_body' => $data['postBody'],
        'P_time' => $currentDateTime,
        'P_urgent_flag' => $data['isUrgent'],
        'P_solved_tag' => 0,
      );
      $query = $this->db->insert('Post', $data1);

      $session_data= $this->session->userdata('session_name');
      //, Restaurant = $data['SubsRestaurant'], Transport = $data['SubsTransport'], Academic = $data['SubsAcademic'], Others = $data['SubsOthers']
      $query = "UPDATE User SET NoOfPost=NoOfPost+1 WHERE U_ID=".$session_data['U_ID']."";
      $this->db->query($query);

      //echo "data inserted";
    }

    public function insertNewComment($data){
      $session_data= $this->session->userdata('session_name');

      date_default_timezone_set("Asia/Seoul");
      $currentDateTime = date('Y-m-d H:i:s');

      $data1 = array(
        'Post_ID' => $data['Post_ID'],
        'User_ID' => $session_data['U_ID'],
        'Comment_body' => $data['postBody'],
        'Comment_time' => $currentDateTime,
        'NoOfUpvotes' => 0,
      );
      $query = $this->db->insert('Comment', $data1);

      $session_data= $this->session->userdata('session_name');
      //, Restaurant = $data['SubsRestaurant'], Transport = $data['SubsTransport'], Academic = $data['SubsAcademic'], Others = $data['SubsOthers']
      $query = "UPDATE User SET NoOfComments=NoOfComments+1 WHERE U_ID=".$session_data['U_ID']."";
      $this->db->query($query);

      //echo "Comment inserted";
    }

    public function updateCategorySubscription(){
      $session_data= $this->session->userdata('session_name');
      //, Restaurant = $data['SubsRestaurant'], Transport = $data['SubsTransport'], Academic = $data['SubsAcademic'], Others = $data['SubsOthers']
      $query = "UPDATE User SET ".$session_data['C']." = 1 WHERE U_ID=".$session_data['U_ID']."";
      $this->db->query($query);
    }

    public function updateUpvote($data){
      $session_data= $this->session->userdata('session_name');

      //echo $data['C_ID'];
      $query = "UPDATE Comment SET NoOfUpvotes = NoOfUpvotes+1 WHERE Comment_ID=".$data['C_ID']."";
      $this->db->query($query);

      $query1 = "SELECT * FROM User, Comment WHERE Comment.User_ID = User.U_ID AND Comment.Comment_ID = ".$data['C_ID']."";

      $query1 = $this->db->query($query1)->row();

      $query = "UPDATE User SET NoOfLikes=NoOfLikes+1 WHERE U_ID=".$query1->U_ID."";
      $this->db->query($query);
    }
}

?>
