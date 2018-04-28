<?php
   require_once '../../includes/dslaDB.php';

   $update = $dslaDB->prepare("UPDATE tbl_book_appointment SET seen = 1");
   $update->execute();
?>
<table class="my_table">
  <tr>
    <th>Land ID</th>
    <th>Land Name</th>
    <th>Username</th>
    <th>Date &amp; Time</th>
    <th>Location</th>
    <th>Disaprove/Approve</th>
    <th>Send Notification</th>
  </tr>
  <?php
    $select = $dslaDB->prepare("SELECT * FROM tbl_book_appointment INNER JOIN tbl_lands ON tbl_lands.land_id = tbl_book_appointment.land_id");
    $select->execute();

    while($rows = $select->fetch(PDO::FETCH_ASSOC))
    {
      $id = $rows['id'];  
      $land_id = $rows['land_id'];
      $land_name = $rows['land_name'];
      $username = $rows['username'];
      $date_time = $rows['date_time'];
      $location = $rows['location'];
      $approval = $rows['approval'];
      //$rows['approval'] == "Approved" ? $checked = 'checked' : $checked = '';

      ?>
        <tr>
          <td><?=$land_id;?></td>
          <td><?=$land_name;?></td>
          <td><?=$username;?></td>
          <td><?=$date_time;?></td>
          <td><?=$location;?></td>
          <td>
            <?php
                if($approval=='Approved')
                {
                    ?>
                        <label class="switch"><input id="check_<?=$id;?>" type="checkbox" checked="true"><div></div></label>
                    <?php
                }
                else
                {
                    ?>
                        <label class="switch" style="background: #ff0000;"><input id="check_<?=$id;?>" type="checkbox"><div></div></label>
                    <?php
                }
            ?>
            <script>
               $('#check_<?=$id;?>').click(function()
               {
                  function isChecked(arg)
                  {
                    var id = '<?=$id;?>';
                    $.post('../ss.php?approve',{1:id,2:arg},function(response)
                    { 
                      alert(response);
                    });
                  }

                  if( $('#check_<?=$id;?>').is(':checked') )
                  {
                    var checked = 'Approved';
                    isChecked(checked);
                  }
                  else
                  {
                    var checked = 'Disapproved';
                    isChecked(checked);
                  }

               });
            </script>
          </td>
          <td>
            <button class="push" id="push_<?=$id;?>" >SEND</button>
            <script>
               $('#push_<?=$id;?>').click(function(e) 
               {
                    var id = '<?=$id;?>';
                    $.post('https://dsla.snaptickets.me/ss.php?send_sms',{1:id},function(response)
                    { 
                      alert(response);
                    });
               });
            </script>
          </td>
        </tr>
      <?php
    }
  ?>
</table>
