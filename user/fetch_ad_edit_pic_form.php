<?php require 'partials/hd.php'; 

// var_dump($_GET);
$item_id = (int) $_GET['item_id'];

require './connection.php'; 

$sql = "SELECT * FROM ad_table";
$sql = "SELECT img_name FROM ad_table WHERE id=?";
$stmt = mysqli_prepare($connection, $sql);
mysqli_stmt_bind_param($stmt, 's', $item_id);
mysqli_stmt_execute($stmt);  
$rs = mysqli_stmt_get_result($stmt);
$n_row = mysqli_num_rows($rs);  

if ($n_row>0) {
      $row = mysqli_fetch_assoc($rs);
    
      $img_name  = $row['img_name'];
      $imgUrl  = 'ad_pictures/'.$img_name;

      echo '<div class="mb-3 text-center">
                 <img src="'.$imgUrl.'" id="preview_img" class="w-100 rounded" />
            </div>
            <div class="mb-3">
                <label for="" class="form-label">New Pic</label>
                <input name="img_name" id="img_name" type="file" class="form-control"  required>
                <input name="item_id" type="hidden" value="'.$item_id.'" required>
                <input name="old_img_name" type="hidden" value="'.$img_name.'" required>
            </div>';

 }