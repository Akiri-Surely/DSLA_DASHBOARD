<?php
   require '../includes/dslaDB.php';

   $surveyor_id = $_GET['id'];
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Page</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="css/assign.css" rel="stylesheet">
<script src="js/jquery.min.js"></script>
</head>
<body>
      <div id="divSurveyor">
      <div id="wb_LayoutGrid1">
         <div id="LayoutGrid1">
            <div class="row">
               <div class="col-1">
                  <div id="wb_txtName">
                     <span id="wb_uid1"><strong>Assign surveyor to land</strong></span>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div id="wb_LayoutGrid2">
         <div id="LayoutGrid2">
            <div class="row">
               <div class="col-1">
                  <div id="wb_Text1">
                     <span id="wb_uid2">Select land ID</span>
                  </div>
                  <select name="Combobox1" size="1" id="slt_land_id">
                  <?php
                     $select = $dslaDB->prepare("SELECT land_id,location FROM tbl_lands");
                     $select->execute();

                     while($landROWS = $select->fetch(PDO::FETCH_ASSOC))
                     {
                        $land_id = $landROWS['land_id'];
                        $location = $landROWS['location'];

                        ?>
                           <option value="<?=$land_id;?>"><?=$location;?></option>
                        <?php
                     }
                  ?>
                  </select>
               </div>
            </div>
         </div>
      </div>
      <div id="wb_LayoutGrid3">
         <div id="LayoutGrid3">
            <div class="row">
               <div class="col-1">
                  <div id="wb_Text2">
                     <span id="wb_uid3">Acres</span>
                  </div>
                  <input type="text" id="txtAcres" name="Editbox1" value="" spellcheck="false">
               </div>
            </div>
         </div>
      </div>
      <div id="wb_LayoutGrid5">
         <div id="LayoutGrid5">
            <div class="row">
               <div class="col-1">
                  <div id="wb_Text4">
                     <span id="wb_uid4">Dimensions</span>
                  </div>
                  <input type="text" id="txtDimensions" name="Editbox1" value="" spellcheck="false">
               </div>
            </div>
         </div>
      </div>
      <div id="wb_LayoutGrid4">
         <div id="LayoutGrid4">
            <div class="row">
               <div class="col-1">
                  <div id="wb_Text3">
                     <span id="wb_uid5">Surveyor ID</span>
                  </div>
                  <select name="Combobox1" size="1" id="Combobox3">
                     <?php
                        $select = $dslaDB->prepare("SELECT surveyor_id,name FROM tbl_surveyor");
                        $select->execute();

                        while($landROWS = $select->fetch(PDO::FETCH_ASSOC))
                        {
                           $surveyor_id = $landROWS['surveyor_id'];
                           $name = $landROWS['name'];

                           ?>
                              <option value="<?=$surveyor_id;?>"><?=$name;?></option>
                           <?php
                        }
                     ?>
                  </select>
               </div>
            </div>
         </div>
      </div>
      <div id="wb_LayoutGrid6">
         <div id="LayoutGrid6">
            <div class="row">
               <div class="col-1">
                  <input type="submit" id="btnAssign" name="" value="ASSIGN">
               </div>
            </div>
         </div>
      </div>
   </div>
</body>

<script>
   $('#btnAssign').click(function()
   { 
      var surveyor_id = '<?=$surveyor_id;?>';
      var land_id = $('#slt_land_id').val();
      var acres = $('#txtAcres').val();
      var dimensions = $('#txtDimensions').val();

      $.post('../ss.php?assign',{1:surveyor_id,2:land_id,3:acres,4:dimensions},function(response)
      {
            if(response==1)
            {
               alert('Successfully changed!');
            }
            else
            {
               alert('There was an error changing!');
            }
      });
   });
</script>
</html>