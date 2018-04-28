<?php
   require '../includes/dslaDB.php';

   $job_role = $_COOKIE['cookAdminRole'];

   $select = $dslaDB->prepare("SELECT profile_id FROM tbl_profile");
   $select->execute();
   $userCOUNT = $select->rowCount();

   $not_select = $dslaDB->prepare("SELECT id FROM tbl_book_appointment WHERE seen = 0");
   $not_select->execute();
   $notCOUNT = $not_select->rowCount();

   $not_selected = $dslaDB->prepare("SELECT feed_id FROM tbl_feedback WHERE seen = 0");
   $not_selected->execute();
   $selectCOUNT = $not_selected->rowCount();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>DLSA DASHBOARD</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="css/home.css" rel="stylesheet">
<link href="css/appointment.css" rel="stylesheet">
<link href="css/surveyors.css" rel="stylesheet">
<script src="js/jquery.min.js"></script>
</head>
<body style="background-color: #e8d5e6;">
   <header id="i_nav_navbar">
      <div id="wb_i_img_logout">
         <a href="https://dsla.snaptickets.me/ss.php?adminLogout"><img src="img/icons8-shutdown-26.png" id="i_img_logout" alt=""></a>
      </div>
      <div id="wb_i_txt_logo">
         <span id="wb_uid0"><strong>DSLA DASHBOARD</strong></span></div>
   </header>
   <div id="wb_LayoutGrid1">
      <div id="LayoutGrid1">
         <div class="row">
            <div class="col-1">
               <div id="wb_i_fxb_sidebar">
                  <div id="i_fxb_sidebar">

                     <div id="wb_i_img_profile">
                        <img src="../pages/estate/images/dslalogo2.jpg" id="i_img_profile" alt="">
                     </div>
                     <div id="wb_i_lyt_home">
                        <div id="i_lyt_home">
                           <div class="col-1">
                              <div id="wb_i_ico_home">
                                 <div id="i_ico_home"><i class="material-icons">&#xe88a;</i></div>
                              </div>
                           </div>
                           <div class="col-2">
                              <div id="wb_i_txt_home">
                                 <span id="wb_uid2"><a href="#" class="link">HOME</a></span>
                              </div>
                           </div>
                        </div>
                     </div>
                     <?php
                        if($job_role=='availability')
                        {

                           ?>
                              <div id="wb_i_lyt_appoimtments">
                                 <div id="i_lyt_appoimtments">
                                    <div class="col-1">
                                       <div id="wb_i_ico_appoimtments">
                                          <div id="i_ico_appoimtments"><i class="material-icons">&#xe192;</i></div>
                                       </div>
                                    </div>
                                    <div class="col-2">
                                       <div id="wb_i_txt_appoimtments">
                                          <span id="wb_uid3"><a href="#" class="link">APPOINTMENTS</a></span>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div id="wb_i_lyt_notification">
                                 <div id="i_lyt_notification">
                                    <div class="col-1">
                                       <div id="wb_i_ico_notification">
                                          <div id="i_ico_notification"><i class="material-icons">&#xe7f4;</i></div>
                                       </div>
                                    </div>
                                    <div class="col-2">
                                       <div id="wb_i_txt_notification">
                                          <span id="wb_uid4"><a href="#" class="link">NOTIFICATIONS</a></span>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           <?php
                        }
                        else if($job_role=='feedback')
                        {
                           ?>
                              <div id="wb_i_lyt_feedback">
                                 <div id="i_lyt_feedback">
                                    <div class="col-1">
                                       <div id="wb_i_ico_feedback">
                                          <div id="i_ico_feedback"><i class="material-icons">&#xe86d;</i></div>
                                       </div>
                                    </div>
                                    <div class="col-2">
                                       <div id="wb_i_txt_feedback">
                                          <span id="wb_uid6"><a href="#" class="link">FEEDBACK</a></span>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           <?php
                        }
                        else if($job_role=='surveyor')
                        {
                           ?>
                              <div id="wb_i_lyt_surveyors">
                                 <div id="i_lyt_surveyors">
                                    <div class="col-1">
                                       <div id="wb_i_ico_surveyors">
                                          <div id="i_ico_surveyors"><i class="material-icons">&#xe91f;</i></div>
                                       </div>
                                    </div>
                                    <div class="col-2">
                                       <div id="wb_i_txt_surveyors">
                                          <span id="wb_uid5"><a href="#" class="link">SURVEYORS</a></span>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           <?php
                        }
                     ?>
                  </div>
               </div>
            </div>
            <div class="col-2">
               <div id="wb_i_lyt_statistics">
                  <div id="i_lyt_statistics">
                     <div class="row">
                        <div class="col-1">
                           <div id="i_fxb_users">
                              <div id="wb_i_lyt_stat_users">
                                 <div id="i_lyt_stat_users">
                                    <div class="col-1">
                                       <div id="wb_i_ico_stat_users">
                                          <div id="i_ico_stat_users"><i class="material-icons">&#xe853;</i></div>
                                       </div>
                                    </div>
                                    <div class="col-2">
                                       <div id="wb_i_txl_stat_users">
                                          <span id="wb_uid7">Number of Users</span>
                                       </div>
                                       <div id="wb_i_txt_stat_users">
                                          <span id="wb_uid8"><?=$userCOUNT;?></span>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-2">
                           <div id="FlexBoxContainer3">
                              <div id="wb_i_lyt_stat_notification">
                                 <div id="i_lyt_stat_notification">
                                    <div class="col-1">
                                       <div id="wb_i_ico_stat_notifications">
                                          <div id="i_ico_stat_notifications"><i class="material-icons">&#xe7f7;</i></div>
                                       </div>
                                    </div>
                                    <div class="col-2">
                                       <div id="wb_i_txl_stat_notifications">
                                          <span id="wb_uid9">Notifications</span>
                                       </div>
                                       <div id="wb_i_txt_stat_notifications">
                                          <span id="wb_uid10"><?=$notCOUNT;?></span>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                       < <div class="col-3">
                           <div id="FlexBoxContainer4">
                              <div id="wb_i_lyt_stat_notification">
                                 <div id="i_lyt_stat_notification">
                                    <div class="col-1">
                                       <div id="wb_i_ico_stat_notifications">
                                          <div id="i_ico_stat_notifications"><i class="material-icons">&#xe7f7;</i></div>
                                       </div>
                                    </div>
                                    <div class="col-2">
                                       <div id="wb_i_txl_stat_notifications">
                                          <span id="wb_uid9">New Feedbacks</span>
                                       </div>
                                       <div id="wb_i_txt_stat_notifications">
                                          <span id="wb_uid10" class="try"><?=$selectCOUNT;?></span>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        
                  </div>
               </div>
               <div id="content" style="width: 100%;font-size: 13px;padding-left:10px;padding-right:10px">
               </div>
            </div>
         </div>
      </div>
   </div>
   <script>
      $('#wb_i_txt_home').click(function()
      {
         $.get('inc/home.php',function(results)
         {
            $('#content').html(results);
         });
      });

      $('#wb_i_txt_appoimtments').click(function()
      {
         $.get('inc/appointments.php',function(results)
         {
            $('#content').html(results);
            $('#wb_uid10').text(0);
         });
      });

      $('#wb_i_txt_notification').click(function()
      {
         $.get('inc/notifications.php',function(results)
         {
            $('#content').html(results);
         });
      });

      $('#wb_i_txt_surveyors').click(function()
      {
         $.get('inc/surveyors.php',function(results)
         {
            $('#content').html(results);
         });
      });

      $('#wb_i_txt_feedback').click(function()
      {
         $.get('inc/feedback.php',function(results)
         {
            $('#content').html(results);
              $('.try').text(0);
         });
      });
   </script>
</body>
</html>