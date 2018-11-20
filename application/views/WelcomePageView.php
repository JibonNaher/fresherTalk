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


            .loginBox{
                margin: auto;
                left:0; right:0;
                top:0; bottom:0;
                position: absolute;
                width: 600px;
                height: 560px;

                background-color: #FFFFFF;
                padding: auto;
            }

            .loginForm{
                width: 60%;
            }

            .inputLog{
                width: 90%;
                padding: 10px 20px;
                margin: 5px;
                font-size:20px;
                text-align: center;
                border:None;
                border-bottom: 3px solid #3E4756;
            }
            .button {
                width: 80%;
                border-color: #9F8F82;
                background-color: #FFFFFF;
                padding: 10px 20px;
                margin: 20px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 20px;
                border-radius: 8px;
                color: #3E4756;
            }
            .button:hover {
                background-color: #9F8F82;
            }
            .validationErrorDiv{
              color: #9F8F82;
            }



        </style>
    </head>
    <body class = "mainBody">
        <center>
            <div class = "loginBox">
                <center>
                    <div>
                        <img src="<?php echo base_url()?>images/logo_with.png">
                    </div>
                    <div class = "loginForm">
                      <?php echo form_open('index.php/WelcomePageC/logIn',array('method'=>'post')); ?>
                      <!--<form class = "loginForm"> -->
                          <div>
                                  <input class = "inputLog" type="text" placeholder="ID" name="S_ID">
                                  <input class = "inputLog" type="password" placeholder="PASSWORD" name="psw">
                          </div>
                          <div class = "validationErrorDiv">
                            <?php echo validation_errors(); ?>
                            <?php echo $msg; ?>
                          </div>
                          <div>
                            <?php
                            $data = array(
                                'type' => 'submit',
                                'value' =>'LOGIN',
                                'class' => 'button'
                            );
                            echo form_submit($data);
                            ?>
                          </div>
                        <?php echo form_close();?>
                        <div>
                          <?php echo anchor('index.php/SignUpC', 'Or SIGN UP') ?>
                        </div>
                    </div>
                </center>
            </div>
        </center>
    </body>
</html>
