<?php require 'partials/hd.php'; 

// var_dump($_GET);
$item_id = (int) $_GET['item_id'];


$sql = "SELECT * FROM categories WHERE id=?";
$stmt = mysqli_prepare($connection, $sql);
mysqli_stmt_bind_param($stmt, 's', $item_id);
mysqli_stmt_execute($stmt);  
$rs = mysqli_stmt_get_result($stmt);
$n_row = mysqli_num_rows($rs);  

if ($n_row>0) {
      $row = mysqli_fetch_assoc($rs);

      $itemID = $row['id'];
      $item_name = $row['name'];
      $description = $row['description'];
      $parent_id   = $row['parent_id'];
      $position    = $row['position'];
      $status = $row['status'];
      $timestamp = $row['TimeStamp'];

      echo ' 
       


        <table class="pt-1 border-top table  table-striped table-bordered">
            <tr>
                <td>Name</td>  <td>'. $item_name.'</td>
            </tr>
            <tr>
                <td>Description</td>  <td>'.$description.'</td>
            </tr>
            <tr>
                <td>Price</td>  <td>'. $parent_id.'</td>
            </tr>
            <tr>
                <td>Brand</td>  <td>'.$position.'</td>
            </tr>
            <tr>
                    <td>Date</td>  <td>'.date('d-M-Y', $timestamp).'</td>
            </tr>
        </table>
        
        <input name="item_id" type="hidden" value="'.$item_id.'" required>
        ';

 }