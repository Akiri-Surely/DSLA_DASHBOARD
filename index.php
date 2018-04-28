<?php
   require '../includes/dslaDB.php';
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width initial-scale=1">
<title>Untitled Page</title>
<link href="css/index.css" rel="stylesheet">
<script src="js/jquery.min.js"></script>
</head>
<body>
   <div id="Layer1">
      <div id="Layer1_Container">
         <div id="Layer2">
            <input type="text" id="txtUsername" name="Editbox1" value="" spellcheck="false" placeholder="Please enter the username">
            <input type="password" id="txtPassword" name="Editbox1" value="" spellcheck="false" placeholder="Please enter the password">
            <input type="submit" id="btnLogin" name="" value="LOGIN">
            <div id="wb_Text1">
               <span id="wb_uid1">Username</span></div>
            <div id="wb_Text2">
               <span id="wb_uid2">Password</span></div>
            <div id="wb_Text3">
               <span id="wb_uid3">Login</span></div>
         </div>
      </div>
   </div>
</body>
</html>

 <script>
      $('#btnLogin').click(function()
      {
          var username = $.trim($('#txtUsername').val());
          var password = $.trim($('#txtPassword').val());

          if(!username || !password)
          {
            alert('All fields must be filled!');
          }
          else
          {
            $.post('../ss.php?adminLogin',{1:username,2:password},function(response)
           {
               if($.trim(response)=="success")
               {
                 location.href = 'home.php';
               }
               else if($.trim(response) == "error")
               {
                 alert('Username or password doesnt exists');
               }
           });
          } 
      });
 </script>