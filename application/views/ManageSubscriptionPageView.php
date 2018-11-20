<html>
    <head>
        <title>fresherTalk</title>
        <style>
        * {
            box-sizing: border-box;
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



          @media screen and (max-width: 500px) {
          .navHeader a {
            float: none;
            display: block;
            text-align: left;
          }
          .navHeaderRight {
            float: none;
          }
          }

          .subscriptionDiv{
            margin-top: 40px;
            left:0; right:0;
            top:0; bottom:0;
            width: 50%;

            background-color: #FFFFFF;
            padding: 40px;
            border-radius: 2px;
          }
          #divID1{
            padding-left: 15px;
            color: #96ADCF;
            font-size: 25px;
          }
          .checkboxDiv{
            padding: 30px 70px;
            text-align : left;
          }
          .checkboxInput{
            padding-top:10px;
            height: 15px;
            width: 30px;
          }
          .checkboxText{
            font-size: 22px;
          }

          .loginForm{
            border: 1px solid #CFDAED;
            border-radius: 1px;
            flex: left;
            width: 60%;
         }

          .inputLog{
            width: 90%;
            padding: 10px 20px;
            margin: 5px;
            font-size:20px;
            text-align: center;
            border-color: #3E4756;
            border-radius: 2px;
          }
          .button {
            width: 50%;
            border-color: #F2D1DA;
            background-color: #F2D1DA;
            padding: 10px 20px;
            margin: 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 15px;
            border-radius: 8px;
            color: #3E4756;
          }
          .button:hover {
            background-color: #BA9AA3;
          }
          .headerClass{
            color: #3E4756;
            text-align: center;
            font-size:50px;
          }

        </style>
    </head>
    <body class = "mainBody">
        <div class = "navHeader">
          <div class = "navHeaderRight">
              <?php $session_data= $this->session->userdata('session_name');
              echo anchor('index.php/ManageSubscriptionPageC/back', 'Back');
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
        <center>
          <div class = "subscriptionDiv">
              <div id = "divID1">
                  <center><h2>My subscription</h2></center>
              </div>

              <?php echo form_open('index.php/MainPageC/saveSubscription',array('method'=>'post', 'class' => 'loginForm'));?>
                  <div class = "checkboxDiv">
                    <?php if ($Accommodation == 1):
                        $checkValue = True;
                        else: $checkValue = False;
                        endif;
                    $data = array(
                        'type'=> 'checkbox',
                        'id' => 'SubsAccommodation',
                        'name'    => 'SubsAccommodation',
                        'checked' => $checkValue,
                        'class'  => 'checkboxInput',
                    );
                    echo form_checkbox($data); ?>
                    <label class = "checkboxText">Accommodation</label><br>

                    <?php if ($Restaurant == 1):
                        $checkValue = True;
                        else: $checkValue = False;
                        endif;
                    $data = array(
                        'type'=> 'checkbox',
                        'id' => 'SubsRestaurant',
                        'name'    => 'SubsRestaurant',
                        'checked' => $checkValue,
                        'class'  => 'checkboxInput',
                    );
                    echo form_checkbox($data); ?>
                    <label class = "checkboxText">Restaurant</label><br>

                    <?php if ($Transport == 1):
                        $checkValue = True;
                        else: $checkValue = False;
                        endif;
                      $data = array(
                        'type'=> 'checkbox',
                        'id' => 'SubsTransport',
                        'name'    => 'SubsTransport',
                        'checked' => $checkValue,
                        'class'  => 'checkboxInput',
                    );
                    echo form_checkbox($data); ?>
                    <label class = "checkboxText">Transport</label><br>

                    <?php if ($Academic == 1):
                        $checkValue = True;
                      else: $checkValue = False;
                      endif;
                      $data = array(
                        'type'=> 'checkbox',
                        'id' => 'SubsAcademic',
                        'name'    => 'SubsAcademic',
                        'checked' => $checkValue,
                        'class'  => 'checkboxInput',
                    );
                    echo form_checkbox($data); ?>
                    <label class = "checkboxText">Academic Affairs</label><br>

                    <?php if ($Others == 1):
                        $checkValue = True;
                      else: $checkValue = False;
                      endif;

                    $data = array(
                        'type'=> 'checkbox',
                        'id' => 'SubsOthers',
                        'name'    => 'SubsOthers',
                        'checked' => $checkValue,
                        'class'  => 'checkboxInput',
                    );
                    echo form_checkbox($data); ?>
                    <label class = "checkboxText">Other</label><br>
                  </div>
                  <div>
                    <?php $data = array(
                        'type'=> 'submit',
                        'id' => 'subSaveBtn',
                        'name'    => 'subSaveBtn',
                        'value' => 'SAVE',
                        'class' =>'button',
                    );
                    echo form_submit($data); ?>
                  </div>

                    <?php echo form_close(); ?>

          </div>
        </center>
    </body>
</html>
