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
                justify-content: space-between;

            }

            .center {
                width: 70%;
                min-width: 850px;
                margin: 50px auto;
            }


        </style>
    </head>
    <body class = "mainBody">
      <div class = "navHeader">

        <div class = "navHeaderRight">
            <?php $session_data= $this->session->userdata('session_name');
            echo anchor('index.php/MainPageC', 'Back');
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
                <h1> About fresherTALK</h1>

                Welcome to fresherTALK!<br>
                This is a platform where you can ask questions and answer any questions you have about KAIST life as an international student.<br><br>

                To ask a question, choose one of the categories and post a question...<br>

                <ul>
                  <li> Accomodation: questions about dorm life or rent</li>
                  <li> Restaurant: questions about local food</li>
                  <li> Transport: questions about using transportation (KTX, buses, etc)</li>
                  <li> Academic: questions about academic affairs</li>
                  <li> Other: questions that do not fit in above categories</li>
                </ul>

                If your question needs a quick answer, mark it as urgent using the check box next to the post button.<br>
                We will notify other users about your questions!<br><br>

                If you want to help out other international students, go to any category to view the list of questions that are waiting for answers.<br>
                Urgent questions are marked in red.<br>
                You can click on the questions and give answers.<br>
                You can also upvote other questions if they are helpful.<br> <br>
                If you want to search for previously answered questions, use the search bar.<br>
                The search bar in each category searches in that category, while the search bar on the main page searchs all categories. <br><br>


                Subscription is a way for us to find out your area of interest.<br>
                If you are willing to be notified of new questions in a certain category, subscribe to it!<br>
                We will notify you of new questions that you might be able to answer via email.<br>
                You can subscribe to multiple categories, and always change your subscription.<br><br>

                You can view all your questions and answers on your profile page.
        </div>
    </body>
</html>
