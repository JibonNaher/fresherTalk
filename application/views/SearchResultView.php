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


            .searchBar{
                width:80%;
                flex-grow:2;
                flex-shrink:0.1;
                padding: 7px 20px;
                font-size:20px;
                text-align: center;
                border: 2px solid #3E4756;
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
                font-size: 40px;
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


            /* The switch - the box around the slider */
            .switch {
              position: relative;
              display: inline-block;
              width: 60px;
              height: 34px;
            }

            /* Hide default HTML checkbox */
            .switch input {
              opacity: 0;
              width: 0;
              height: 0;
            }

            /* The slider */
            .slider {
              position: absolute;
              cursor: pointer;
              top: 0;
              left: 0;
              right: 0;
              bottom: 0;
              background-color: #ccc;
              -webkit-transition: .4s;
              transition: .4s;
            }

            .slider:before {
              position: absolute;
              content: "";
              height: 26px;
              width: 26px;
              left: 4px;
              bottom: 4px;
              background-color: white;
              -webkit-transition: .4s;
              transition: .4s;
            }

            input:checked + .slider {
              background-color: #BA3E60;
            }

            input:focus + .slider {
              box-shadow: 0 0 1px #BA3E60;
            }

            input:checked + .slider:before {
              -webkit-transform: translateX(26px);
              -ms-transform: translateX(26px);
              transform: translateX(26px);
            }

            /* Rounded sliders */
            .slider.round {
              border-radius: 34px;
            }

            .slider.round:before {
              border-radius: 50%;
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
            .postBut {
                width: 10%;
                min-width: 100px;
                border-color: #9F8F82;
                background-color: #FFFFFF;
                margin: 10px;
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
            .postBut1{
                width: 10%;
                min-width: 100px;
                border-color: #FFFFFF;
                background-color: #9F8F82;
                margin: 10px;
                padding: 7px;
                text-align: center;
                text-decoration: none;
                font-size: 17px;
                color: #3E4756;
            }
            .postBut1:hover {
                background-color: #FFFFFF;
                color: #9F8F82;
            }


        </style>
    </head>
    <body class = "mainBody">
      <div class = "navHeader">
        <div class = "navHeaderRight">
            <?php $session_data= $this->session->userdata('session_name');
            echo anchor('index.php/SearchResultC/back', 'Back');
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
                    SEARCH RESULTS:
                    <?php if ($session_data['C'] == 'Accommodation'):
                              echo 'ACCOMODATION';
                          elseif ($session_data['C'] == 'Restaurant'):
                              echo 'RESTAURANT';
                          elseif ($session_data['C'] == 'Transpost'):
                              echo 'TRANSPOST';
                          elseif ($session_data['C'] == 'Academic'):
                              echo 'ACADEMIC';
                          elseif ($session_data['C'] == 'Others'):
                              echo 'OTHERS';
                          endif;
                    ?>
                </div>
                <div class = "lineB">
                </div>

                <?php
                if ($postExist == "Yes"):
                  foreach ($Posts as $row):
                    if ($row['P_urgent_flag'] == 1):
                        $aclass = "Purgent";
                    else: $aclass = "postlist";
                    endif;?>
                    <a class=<?php echo $aclass ?> href = "<?php echo base_url();?>/index.php/PostPageC?P_ID=<?php echo $row['Post_ID'];?>"> <span class="listTitle">
                    <?php  echo $row['P_title']; ?> </span> <span class="timeStamp">
                    <?php echo $row['P_time']; ?> </span> </a>
                  <?php endforeach;

                else: ?>
                      <span class="timeStamp">
                      <?php echo "No result found"; ?> </span>
              <?php endif;?>
<!--
                <div class = "navigateList">
                    <a class = "pageNumber" href = ""> << </a>
                    <a class = "pageNumber currentlyOn" href = ""> 1 </a>
                    <a class = "pageNumber" href = ""> >> </a>
                </div> -->
            </div>
        </div>
    </body>
</html>
