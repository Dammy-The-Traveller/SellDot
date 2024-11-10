<?php require 'partials/hd.php'; 

// var_dump($_GET);die();
$item_id = (int) $_GET['item_id'];
//var_dump($item_id); die();

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

      echo '    <div class="mb-3">
                            <label for="" class="form-label">Name</label>
                            <input name="name" type="text" class="form-control" value="'.$item_name.'" required>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Description</label>
                            <textarea name="description" id="" class="form-control" rows="3">'.$description.'</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Parent</label>
                            <select name="parent_id" id="" class="form-select">
                                 <option value="'.$parent_id.'">NONE</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Position</label>
                            <input name="position" type="number" class="form-control" value="'.$position.'" required>
                            <input name="item_id" type="hidden" value="'.$item_id.'" required>
                        </div>';

 }