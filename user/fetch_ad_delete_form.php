<?php require 'partials/hd.php'; 

// var_dump($_GET);
$item_id = (int) $_GET['item_id'];


$sql = "SELECT * FROM ad_table WHERE id=?";
$stmt = mysqli_prepare($connection, $sql);
mysqli_stmt_bind_param($stmt, 's', $item_id);
mysqli_stmt_execute($stmt);  
$rs = mysqli_stmt_get_result($stmt);
$n_row = mysqli_num_rows($rs);  

if ($n_row>0) {
      $row = mysqli_fetch_assoc($rs);

      $itemID = $row['id'];
      $item_name = $row['name'];
      $category = $row['category'];
      $brand = $row['brand'];
      $price = $row['price'];
      $status = $row['status'];
      $description = $row['description'];
      $timestamp = $row['timestamp'];
      $img_name  = $row['img_name'];
      $imgUrl  = 'ad_pictures/'.$img_name;

      echo ' 
        <div class="mb-1 text-center">
            <img src="'.$imgUrl.'" id="preview_img" class="w-100 rounded" />
        </div>


        <table class="pt-1 border-top table">
            <tr>
                <td>Name</td> <td>'.$item_name.'</td>
            </tr>
            <tr>
                <td>Description</td>  <td>'.$description.'</td>
            </tr>
            <tr>
                <td>Price</td>  <td>'.number_format($price).'</td>
            </tr>
            <tr>
                <td>Brand</td>  <td>'.$brand.'</td>
            </tr>
            <tr>
                <td>Category</td>  <td>'.$category.'</td>
            </tr>
            <tr>
                    <td>Date</td>  <td>'.date('d-M-Y', $timestamp).'</td>
            </tr>
        </table>
        
        <input name="item_id" type="hidden" value="'.$item_id.'" required>
        <input name="old_img_name" type="hidden" value="'.$img_name.'" required>
        ';

 }