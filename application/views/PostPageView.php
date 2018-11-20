<html>
    <head>
        <title>fresherTalk</title>
        <style>

            * {
                box-sizing: border-box;
                font-family: helvetica;
            }

            .mainBody{
                background-color: #CFDAED;
            }

            .navHeader{
                overflow: hidden;
                background-color:#FFFFFF;

            }

            .navHeader a {
                float: left;
                color: #3E4756;
                text-align: center;
                text-decoration: none;
                font-size: 18px;
                border-radius: 4px;
            }

            .navHeaderRight {
                float:left;
            }
            .navHeaderRight a {
                padding: 10px;
                margin: 10px;
            }
            .navHeaderRight a:hover {
                background-color: #96ADCF;
            }
            .logoleft{
              float:right;
            }


            @media screen and (max-width: 600px) {
              .navHeader a {
                float: none;
                display: block;
                text-align: left;
              }
              .navHeaderRight {
                float: none;
              }
            }

            .row {
                display: flex;
                flex-wrap: wrap;
            }



            .column {
                float: left;
                padding: 30px;
                background-color: #FFFFFF;
                margin-top: 50px;
                margin-left: 2.5%;
                margin-right: 2.5%;
                display: flex;
                flex-direction: column;

            }


            .center {
                width: 70%;
                min-width: 850px;
                margin: 50px auto;
            }


            .postBut {
                width: 10%;
                min-width: 100px;
                border-color: #9F8F82;
                background-color: #FFFFFF;
                padding: 7px;
                text-align: center;
                text-decoration: none;
                font-size: 17px;
                color: #3E4756;
            }
            .postBut:hover {
                background-color: #9F8F82;
                color: #FFFFFF;
            }
            .post_bodyDiv{
              font-size: 20px;
            }



            .lineB{
                border:None;
                border-bottom: 3px solid #3E4756;
                margin: 20px 0px;
            }


            .headerF {
                display: flex;
                justify-content: space-between;
                align-items:center;
                width: 100%;
                font-size: 40px;
            }


            .questionPane{
                background-color: #F0F5F7;
                margin: 10px;
                padding: 30px;
                flex-grow:2;
                text-decoration: none;
                border-radius: 2px;
                font-size: 16px;
            }

            .questionPane > .lineB {
                border-bottom: 1px solid #3E4756;
                margin: 10px 0px;
            }


            .listTitle{
                font-size:25px;
                color: black;
                width: 500px;
            }

            .timeStamp{
                padding-left: 30px;
                font-size: 15px;
                color:grey;
            }


            .upvote {
                font-size: 16px;
            }

            .upvoteB{
                background-color: #F0F5F7 ;
                border-color: #9F8F82;
            }
            .upvoteB:hover{
                background-color: #9F8F82;
            }

            .postQ{
                width:100%;
                display: flex;
                flex-direction: column;
                justify-content: space-between;
                align-items:center;
                margin:auto;
                padding: 5px;
                font-size: 20px;
            }

            .postQ.postButtons{
                justify-content: flex-end;
                flex-direction: row;
                width:100%;
            }

            .postButtons > input, div{
                margin: 0px 10px;
            }

            .writeTitle, .writeBody{
                width: 100%;
                padding: 10px 20px;
                font-size:15px;
                margin: 5px 0px;
            }

            .writeBody{
                height: 160px;
                resize: none;
                padding: 20px;
            }

            .solvedB {
                border-color: #9F8F82;
                background-color: #FFFFFF;
                padding: 10px 20px;
                margin: 20px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 17px;
                border-radius: 8px;
                color: #3E4756;
            }
            .solvedB:hover {
                background-color: #9F8F82;
                color: #FFFFFF;
            }


        </style>
    </head>
    <body class = "mainBody">
      <div class = "navHeader">
        <div class = "navHeaderRight">
            <?php $session_data= $this->session->userdata('session_name');
            echo anchor('index.php/PostPageC/back', 'Back');
            echo anchor('index.php/MainPageC', 'Home');
            echo anchor('index.php/ProfilePageC?all=1', $session_data['U_Name'].'\'s page');
            echo anchor('index.php/AboutPageC', 'About');
            echo anchor('index.php/MainPageC/logout', 'Logout'); ?>
        </div>
        <div class = "logoleft">
          <?php
            $picname = base_url();
            echo anchor('index.php/MainPageC', img( array('src'=>$picname.'images/logo_banner.png')))
          ?>
        </div>
      </div>
        <div class = "row">
            <div class = "column center">
                <div class = "headerF">
                  <?php if ($session_data['C'] == 'Accommodation'):
                            echo 'ACCOMODATION';
                        elseif ($session_data['C'] == 'Restaurant'):
                            echo 'RESTAURANT';
                        elseif ($session_data['C'] == 'Transport'):
                            echo 'TRANSPORT';
                        elseif ($session_data['C'] == 'Academic'):
                            echo 'ACADEMIC';
                        elseif ($session_data['C'] == 'Others'):
                            echo 'OTHERS';
                        endif;
                  ?>
                </div>
                <div class = "lineB">
                </div>

                <div class = "questionPane">
                    <span class="listTitle"> <?php echo $P_title; ?></span>

                    <span class="timeStamp">
                      <?php echo "by ".$P_U_Name; ?>
                    </span>
                    <span class="timeStamp">
                      <?php echo " at ".$P_time; ?>
                    </span>
                    <div class = "lineB">
                    </div>
                    <div>
                      <?php echo $P_body; ?>
                    </div>
                </div>
                <div class = "postQ postButtons">
                  <?php if($P_U_ID == $session_data['U_ID']):
                          if($P_solved_tag == 0):  ?>
                          <button class = "solvedB" type="button"> SOLVED </button>
                        <?php endif; ?>
                    <!--<button class = "postBut" type="button"> DELETE </button>-->
                  <? endif; ?>
                </div>

                <div class = "lineB">
                </div>
                <div> Answer this question! </div>

                <?php
                    echo form_open('index.php/PostPageC/createAnswer?P_ID='.$P_ID.'',array( 'method'=>'post', 'class' => 'postQ'));
                    $data = array(
                        'type'=> 'textarea',
                        'id' => 'postBody',
                        'name'    => 'postBody',
                        'placeholder'  => "Answer this question!",
                        'class' =>'writeBody',
                    );
                    echo form_textarea($data); ?>
                    <div class = "postQ postButtons">
                      <div class="popup" onclick="myFunction()"><?php
                      $data = array(
                          'type' => 'submit',
                          'value' =>'POST',
                          'class' => 'postBut',
                      );
                      echo form_submit($data); ?>
                    </div>
                    </div>
                    <?php echo form_close();


                  if ($commentExist == "Yes"):
                      foreach ($Posts_detail as $row):?>
                        <div class = "questionPane">
                            <div class = "headerF">
                                <span class="timeStamp"><?php echo "answered by ".$row['U_Name']; echo " at ".$row['Comment_time'] ?></span>
                                <div class = "upvote">
                                    <?php echo "Upvotes: "; echo $row['NoOfUpvotes']." ";
                                      if($row['User_ID'] != $session_data['U_ID']):
                                        echo form_open('index.php/PostPageC/afterUpvoteBtn?P_ID='.$P_ID.' '.$row['Comment_ID'].'',array('method'=>'post'));
                                        $data = array(
                                          'type'=> 'submit',
                                          'id' => 'upvote',
                                          'name'    => 'upvote',
                                          'value' => "UPVOTE",
                                          'class' => 'upvoteB',
                                          );
                                        echo form_submit($data);
                                        echo form_close();
                                      endif; ?>
                                </div>
                            </div>
                            <div class = "lineB">
                            </div>
                            <div>
                              <?php echo $row['Comment_body']; ?>
                            </div>
                        </div>
                <?php endforeach; endif;?>
            </div>
        </div>

        <script>
        // When the user clicks on div, open the popup
        function myFunction() {
            alert("Thank you for your answer!");
        }
        </script>
    </body>
</html>
