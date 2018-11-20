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

            .row {
                display: flex;
                flex-wrap: wrap;
                flex-direction: row;
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
                justify-content: flex-start;

            }

            .left {
                flex-basis: 40%;
                max-width: 700px;
                min-width: 400px;

            }


            .right {
                flex-basis: 50%;
                flex-grow:2;
                min-width: 650px;
            }

            p{
                color: #3E4756;
                text-align: center;
                font-size: 1.5em;
            }
            p.info{
                color: #3E4756;
                text-align: center;
                font-size: 1.2em;
            }
            .info img{
              align-content: : center;
              width: 60px;
              height: 60px;
            }
            .left1{
              background-color: #CFDAED;
              padding: 10px;
              border-radius: 4px;
            }
            .leftBottom{
                padding-top: 30px;
                padding-bottom: 30px;
                margin-top: 10px;
            }
            .contentNav{
                padding: 20px;
                margin-left: 20px;
                margin-right: 20px;
                margin-bottom: 20px;
                margin-top: : 10px;
                background-color: #CFDAED;
                border-radius: 2px;
            }
            .contentNav a{
                border-radius: 4px;
                color: #3E4756;
                text-decoration: none;
                font-size: 20px;
                background-color: #FFFFFF;
                padding: 10px;
            }
            .contentNav a:hover{
                border: 2px solid white;
                background-color: #CFDAED;
            }
            .myPostDiv{
              border: 2px solid;
              border-color: #CFDAED;
              margin: 20px;
              padding-left: 15px;
              padding-bottom: 10px;

            }
            .myPostDiv a{
              font-size: 18px;
              color: #2F4F4F;
              text-decoration: none;
            }

            ul {
                list-style-type: none;
                margin: 0;
                padding: 0;
                overflow: hidden;
                background-color: #F0F5F7 ;
            }

            li {
                float: left;
            }
            li.postShownOption{
              background-color: #BA3E60 ;
            }

            li a {
                display: block;
                color: #3E4756;
                text-align: center;
                padding: 14px 16px;
                text-decoration: none;
                font-size: 18px;
            }

            li a:hover {
                background-color: #BA3E60 ;
            }

            .active {
              background-color: #BA3E60;
            }

            .postlist{
                background-color: #F0F5F7;
                margin: 10px;
                padding: 15px;
                height: auto;
                text-decoration: none;
                border-radius: 2px;
            }
            .profilePageName{
              background-color: #BA3E60;
            }

            .urgent{
                background-color: #BA3E60;
            }

            .urgent > .timeStamp, .listTitle {
                color: #F0F5F7;
            }

            .listTitle{
                font-size:25px;
                color: black;
            }

            .timeStamp{
                font-size: 15px;
                color:grey;
            }


            .solved {
                background-color: #DDDDDD;
            }


            .pageNumber{
                background-color:#F0F5F7;
                margin:10px;
                font-size: 20px;
                text-decoration: None;
            }

            .pageNumber.currentlyOn {
                background-color: #BA3E60;
                color: #F0F5F7;
            }

            .navigateList{
                display: flex;
                justify-content: center;
                align-items:center;
                width: 100%;

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
            <div class = "column left">
                <div class = "left1">
                    <p><?php echo $U_info['U_Name']; ?></p>
                    <p class = "info">
                        ID: <?php echo $U_info['S_ID']; ?><br>
                        e-mail: <?php echo $U_info['Email'];?>
                    </p>
                </div>
                <div class = "leftBottom left1">
                    <p class = "info">
                        Total #post: <?php echo $U_info['NoOfPost'] ; ?><br>
                        Total #comment: <?php echo $U_info['NoOfComments'] ; ?><br><br>
                        <?php if($top5 == 1):?>
                        <img src="<?php echo base_url()?>images/TopBadge.png"><br>
                        <?php echo "Congratulations!!You are one of the top 5 contributor in this week!" ;
                      endif; ?>
                    </p>
                </div>
            </div>
            <div class = "column right">
                    <ul>
                        <li
                          <?php if ($all == 1):
                            echo 'class = '.'postShownOption' ; endif; ?>
                        ><a href="<?php echo base_url();?>index.php/ProfilePageC?all=1">ALL</a></li>
                        <li
                        <?php if ($all == 2):
                          echo 'class = '.'postShownOption' ; endif; ?>
                        ><a href="<?php echo base_url();?>index.php/ProfilePageC?all=2">QUESTIONS</a></li>
                        <li
                        <?php if ($all == 3):
                          echo 'class = '.'postShownOption' ; endif; ?>
                        ><a href="<?php echo base_url();?>index.php/ProfilePageC?all=3">ANSWERS</a></li>
                        <li style="float:right"><a href= "<?php echo base_url();?>index.php/ManageSubscriptionPageC"> MANAGE SUBSCRIPTIONS </a></li>
                    </ul>
                  <?php
                    if ($all == 1 || $all== 2):
                    if ($urgentPostExist == "Yes"):
                      foreach ($Posts_urgent as $row):?>
                    <a class="postlist urgent" href = "<?php echo base_url();?>/index.php/PostPageC?P_ID=<?php echo $row['Post_ID'];?>"> <span class="listTitle">
                    <?php echo $row['P_title'];?> </span> <div class="timeStamp"><?php echo " at ".$row['P_time'];?></div> </a>
                  <?php endforeach; endif;?>

                  <?php if ($noturgentPostExist == "Yes"):
                      foreach ($Posts_notrgent as $row):?>
                    <a class="postlist" href = "<?php echo base_url();?>/index.php/PostPageC?P_ID=<?php echo $row['Post_ID'];?>"> <span class="listTitle">
                    <?php echo $row['P_title'];?> </span> <div class="timeStamp"><?php echo " at ".$row['P_time'];?></div> </a>
                  <?php endforeach; endif; endif;?>

                  <?php
                    if ($all == 1 || $all== 3):
                    if ($commentsExist == "Yes"):
                      foreach ($Comments as $row):?>
                    <a class="postlist" href = "<?php echo base_url();?>/index.php/PostPageC?P_ID=<?php echo $row['Post_ID'];?>"> <span class="listTitle">
                    <?php echo $row['P_title'];?> </span> <div class="timeStamp"><?php echo " at ".$row['Comment_time'];?></div> </a>
                  <?php endforeach; endif; endif;?>


                  <!--<a class="postlist urgent" href = ""> <span class="listTitle"> I have a question! </span> <span class="timeStamp"> 2018-11-11-20:33 </span> </a>
                  <a class="postlist" href = ""> <span class="listTitle"> I have a question! </span> <span class="timeStamp"> 2018-11-11-20:33 </span> </a>
                  <a class="postlist" href = ""> <span class="listTitle"> I have a question! </span> <span class="timeStamp"> 2018-11-11-20:33 </span> </a>
                  <a class="postlist" href = ""> <span class="listTitle"> I have a question! </span> <span class="timeStamp"> 2018-11-11-20:33 </span> </a>
                  <a class="postlist" href = ""> <span class="listTitle"> I have a question! </span> <span class="timeStamp"> 2018-11-11-20:33 </span> </a>
                  <a class="postlist" href = ""> <span class="listTitle"> I have a question! </span> <span class="timeStamp"> 2018-11-11-20:33 </span> </a>
                  <a class="postlist solved" href = ""> <span class="listTitle"> I have a question! </span> <span class="timeStamp"> 2018-11-11-20:33 </span> </a>
                  <div class = "navigateList">
                      <a class = "pageNumber" href = ""> << </a>
                      <a class = "pageNumber currentlyOn" href = ""> 1 </a>
                      <a class = "pageNumber" href = ""> >> </a>
                  </div>-->
            </div>
        </div>
    </body>
</html>
