<?php
require '../../includes/dslaDB.php';
?>
<!--  -->

<?php
  $select = $dslaDB->prepare("SELECT * FROM tbl_surveyor");
  $select->execute();

  while($rows = $select->fetch(PDO::FETCH_ASSOC))
  {
    $surveyor_id = $rows['surveyor_id'];  
    $name = $rows['name'];
    $image = $rows['image'];
    $phone = $rows['phone'];
    $email = $rows['email'];
    $address = $rows['address'];

    ?>
      <div id="svydivSurveyor">
            <div id="svysv_imgDp">
               <img src="../pages/estate/images/<?=$image;?>.jpeg" id="svyimgDp" alt="">
            </div>
            <div id="svysv_LayoutGrid2">
               <div id="svyLayoutGrid2">
                  <div class="row">
                     <div class="col-1">
                        <div id="svysv_txtName">
                           <span id="svysv_uid1"><?=$name;?></span>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div id="svysv_LayoutGrid1">
               <div id="svyLayoutGrid1">
                  <div class="row">
                     <div class="col-1">
                        <div id="svysv_txtPhone">
                           <span id="svysv_uid2"><?=$phone;?></span>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div id="svysv_LayoutGrid3">
               <div id="svyLayoutGrid3">
                  <div class="row">
                     <div class="col-1">
                        <div id="svysv_txtEmail">
                           <span id="svysv_uid3"><?=$email;?></span>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div id="svysv_LayoutGrid4">
               <div id="svyLayoutGrid4">
                  <div class="row">
                     <div class="col-1">
                        <div id="svysv_txtAddress">
                           <span id="svysv_uid4"><?=$address;?><br></span>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <a href="assign.php?id=<?=$surveyor_id;?>"><input type="submit" id="svybtnAssign" name="" value="ASSIGN"></a>
      </div>
    <?php
  }
?>

  
  
  <!-- jQuery -->
  <script src="js/jquery.min.js"></script>
  <!-- jQuery Easing -->
  <script src="js/jquery.easing.1.3.js"></script>
  <!-- Bootstrap -->
  <script src="js/bootstrap.min.js"></script>
  <!-- Waypoints -->
  <script src="js/jquery.waypoints.min.js"></script>
  <!-- Flexslider -->
  <script src="js/jquery.flexslider-min.js"></script>

  <!-- MAIN JS -->
  <script src="js/main.js"></script>

  </body>
</html>

