<?php
   require_once '../../includes/dslaDB.php';
?>
<table class="my_table">
  <tr>
    <th>Feed ID</th>
    <th>Username</th>
    <th>Message</th>
    <th>Date &amp; Time</th>
    
  </tr>
  <?php
    $select = $dslaDB->prepare("SELECT * FROM `tbl_feedback`");
    $select->execute();

    while($rows = $select->fetch(PDO::FETCH_ASSOC))
    {
     // $id = $rows['id'];  
      $feed_id = $rows['feed_id'];
      $username = $rows['username'];
      $message = $rows['message'];
      $date_time = $rows['date_time'];
     

      ?>
        <tr>
          <td><?=$feed_id;?></td>
          <td><?=$username;?></td>
          <td><?=$message;?></td> 
          <td><?=$date_time;?></td> 
          <!-- <td>
            <label class="switch"><input id="check_<?=$id;?>" type="checkbox" /><div></div></label>
            <script>
               $('#wb_i_txt_feedback').click(function()
               {
                  if( $('#check_<?=$id;?>').is(':checked') )
                  {
                    
                  }
               });
            </script>
          </td> -->
        </tr>
      <?php
    }
  ?>
</table>
