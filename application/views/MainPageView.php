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
            .Purgent{

                margin: 10px;
                padding: 15px;
                height: 60px;
                flex-grow:2;
                text-decoration: none;
                border-radius: 2px;
                background-color: #BA3E60;
            }

            .Purgent > .timeStamp, .listTitle {
                color: #F0F5F7;
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

            .left {
                flex-basis: 40%;
                max-width: 700px;
                min-width: 400px;
            }


            .right {
                flex-basis: 50%;
                min-width: 650px;
            }


            .categoryH {
                margin: 0px auto;
            }

            .left a{
                background-color: #F0F5F7;
                margin: 10px;
                padding: 10px;
                height: 60px;
                flex-grow:2;
                font-size:30px;
                color: #3E4756;
                text-decoration: none;
            }

            .left a:hover {
                background-color: #3E4756;
                color: #F0F5F7;
            }


            .searchBar{
                width:80%;
                flex-grow:2;
                flex-shrink:0.1;
                padding: 7px 20px;
                font-size:20px;
                text-align: center;
                border: 2px solid #3E4756;
            }

            .headerClass{
                color: #3E4756;
                font-size:50px;
            }

            .searchBar:active{
                border-bottom: 3px solid #BA3E60 ;
            }
            .searchBut {
                width: 10%;
                min-width: 100px;
                border-color: #BA3E60 ;
                background-color: #FFFFFF;
                padding: 7px;
                text-align: center;
                text-decoration: none;
                font-size: 20px;
                color: #3E4756;
            }
            .searchBut:hover {
                background-color: #BA3E60 ;
                color: #FFFFFF;
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
                font-size: 20px;
            }

            .headerF a {
                height: 40px;
                color: #3E4756;
                text-decoration: none;
                padding: 10px;
                background-color: #F0F5F7;
                border-color: #BA3E60;
                border-radius: 3px;
            }

            .headerF a:hover {
               background-color: #BA3E60;
               color: #F0F5F7;

             }


             .postlist{
                 background-color: #F0F5F7;
                 margin: 10px;
                 padding: 15px;
                 height: 60px;
                 flex-grow:2;
                 text-decoration: none;
                 border-radius: 2px;
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

        </style>

    </head>
    <body class = "mainBody">
      <div class = "navHeader">

        <div class = "navHeaderRight">
            <?php $session_data= $this->session->userdata('session_name');
            echo anchor('index.php/MainPageC/logout', 'Back');
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

      </div>
      <div class = "row">
          <div class = "column left">
              <div class = "categoryH"> <img src ="<?php echo base_url()?>images/categories.png"> </div>
              <?php echo anchor('index.php/CategoryPageC?C_ID=1' ,'Accomodation') ?>
              <?php echo anchor('index.php/CategoryPageC?C_ID=2','Restaurant') ?>
              <?php echo anchor('index.php/CategoryPageC?C_ID=3','Transport') ?>
              <?php echo anchor('index.php/CategoryPageC?C_ID=4','Academic') ?>
              <?php echo anchor('index.php/CategoryPageC?C_ID=5','Others') ?>
          </div>

          <div class = "column right">

            <?php
                echo form_open('index.php/SearchResultC/searchUnderALL',array('method'=>'get', 'class' => 'headerF'));
                $data = array(
                    'type'=> 'submit',
                    'id' => 'searchBtn',
                    'name'    => 'SearchBtn',
                    'value' => "Search",
                    'class' =>'searchBut',
                );
                echo form_submit($data);

                $data = array(
                    'type'=> 'text',
                    'id' => 'searchKey',
                    'name'    => 'searchKey',
                    'placeholder'  => "Enter keyword to search previously asked questions...",
                    'class' =>'searchBar',
                );
                echo form_input($data);

                echo form_close();
            ?>
              <div class = "lineB">
              </div>
              <div class = "headerF">
                  <img src ="<?php echo base_url()?>images/subscription.png"> <a href= "<?php echo base_url();?>index.php/ManageSubscriptionPageC"> MANAGE SUBSCRIPTIONS </a>
              </div>
              <?php
                if ($postExistAcc == "Yes"):
                  foreach ($postfromAcc as $row):
                    if ($row['P_urgent_flag'] == 1):
                        $aclass = "Purgent";
                    else: $aclass = "postlist";
                    endif; ?>
                    <a class=<?php echo $aclass ?> href = "<?php echo base_url();?>/index.php/PostPageC?P_ID=<?php echo $row['Post_ID'];?>"> <span class="listTitle">
                    <?php  echo $row['P_title']; ?> </span><span class="timeStamp">
                    <?php echo " in accommodation at ".$row['P_time']; ?> </span> </a>
                  <?php endforeach;
                endif; ?>

                <?php
                  if ($postExistRes == "Yes"):
                    foreach ($postfromRes as $row):
                      if ($row['P_urgent_flag'] == 1):
                          $aclass = "Purgent";
                      else: $aclass = "postlist";
                      endif; ?>
                      <a class=<?php echo $aclass ?> href = "<?php echo base_url();?>/index.php/PostPageC?P_ID=<?php echo $row['Post_ID'];?>"> <span class="listTitle">
                      <?php  echo $row['P_title']; ?> </span><span class="timeStamp">
                      <?php echo " in restaurant at ".$row['P_time']; ?> </span> </a>
                    <?php endforeach;
                  endif; ?>

                  <?php
                    if ($postExistTra == "Yes"):
                      foreach ($postfromTra as $row):
                        if ($row['P_urgent_flag'] == 1):
                            $aclass = "Purgent";
                        else: $aclass = "postlist";
                        endif; ?>
                        <a class=<?php echo $aclass ?> href = "<?php echo base_url();?>/index.php/PostPageC?P_ID=<?php echo $row['Post_ID'];?>"> <span class="listTitle">
                        <?php  echo $row['P_title']; ?> </span><span class="timeStamp">
                        <?php echo " in transport at ".$row['P_time']; ?> </span> </a>
                      <?php endforeach;
                    endif; ?>

                    <?php
                      if ($postExistAca == "Yes"):
                        foreach ($postfromAca as $row):
                          if ($row['P_urgent_flag'] == 1):
                              $aclass = "Purgent";
                          else: $aclass = "postlist";
                          endif; ?>
                          <a class=<?php echo $aclass ?> href = "<?php echo base_url();?>/index.php/PostPageC?P_ID=<?php echo $row['Post_ID'];?>"> <span class="listTitle">
                          <?php  echo $row['P_title']; ?> </span><span class="timeStamp">
                          <?php echo " in Academic at ".$row['P_time']; ?> </span> </a>
                        <?php endforeach;
                      endif; ?>

                      <?php
                        if ($postExistOth == "Yes"):
                          foreach ($postfromOth as $row):
                            if ($row['P_urgent_flag'] == 1):
                                $aclass = "Purgent";
                            else: $aclass = "postlist";
                            endif; ?>
                            <a class=<?php echo $aclass ?> href = "<?php echo base_url();?>/index.php/PostPageC?P_ID=<?php echo $row['Post_ID'];?>"> <span class="listTitle">
                            <?php  echo $row['P_title']; ?> </span><span class="timeStamp">
                            <?php echo " in Others at ".$row['P_time']; ?> </span> </a>
                          <?php endforeach;
                        endif; ?>
                  <!--<a class="postlist urgent" href = ""> <span class="listTitle"> I have a question! </span> <span class="timeStamp"> 2018-11-11-20:33 </span> </a>
                  <a class="postlist urgent" href = ""> <span class="listTitle"> I have a question! </span> <span class="timeStamp"> 2018-11-11-20:33 </span> </a>
                  <a class="postlist urgent" href = ""> <span class="listTitle"> I have a question! </span> <span class="timeStamp"> 2018-11-11-20:33 </span> </a>
                  <a class="postlist" href = ""> <span class="listTitle"> I have a question! </span> <span class="timeStamp"> 2018-11-11-20:33 </span> </a>
                  <a class="postlist" href = ""> <span class="listTitle"> I have a question! </span> <span class="timeStamp"> 2018-11-11-20:33 </span> </a>
                  <a class="postlist" href = ""> <span class="listTitle"> I have a question! </span> <span class="timeStamp"> 2018-11-11-20:33 </span> </a>-->

          </div>
      </div>
    </body>
</html>
