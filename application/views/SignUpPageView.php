<html>
    <head>
        <title>Sign up for fresherTALK</title>
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
                padding: 40px;
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



        </style>
    </head>
    <body class = "mainBody">
        <center>
            <div class = "loginBox">
                <center>
                    <div>
                        <img src="<?php echo base_url();?>images/logo_signup.png">
                    </div>

                    <form class = "loginForm">
                        <div>
                                <input class = "inputLog" type="text" placeholder="E-MAIL" name="email">
                                <input class = "inputLog" type="text" placeholder="ID" name="username">
                                <input class = "inputLog" type="password" placeholder="PASSWORD" name="psw">
                                <input class = "inputLog" type="password" placeholder="CONFIRM PASSWORD" name="pswconfirm">

                        </div>
                        <div>
                            <input type="button" class="button" value="SIGN UP">
                        </div>
                    </form>
                </center>
            </div>
        </center>
    </body>
</html>
