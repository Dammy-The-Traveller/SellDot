<?php require 'partials/hd.php'; 

// var_dump($_GET);
$item_id = (int) $_GET['item_id'];
//var_dump($item_id); die();

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

      echo '   <div class="mb-3">
      <label for="" class="form-label">Categories</label>
      <select name="category" class="form-select" required>
          <option value="'.$category.'">'.$category.'</option>
          <option value="Electronics">Electronics</option>
          <option value="Phones and acessories">Phones and acessories</option>
          <option value="Food & Beverages">Food & Beverages</option>
          <option value="Clothing">Clothing</option>
          <option value="Furnitures">Furnitures</option>
          <option value="Health and lifestyle">Health and lifestyle</option>
          <option value="Footwears">Footwears</option>
          <option value="Cars & spare parts">Cars & spare parts</option>
          <option value="Laptops & accessories">Laptops & accessories</option>
          <option value="Building materials">Building materials</option>
          <option value="Property"> Land, homes</option>
          <option value="Wristwatches">Wristwatches</option>
          <option value="Toys">Toys</option>
          <option value="Refrigerators">Refrigerators</option>
          <option value="Generators">Generators</option>
      </select>
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Brand</label>
        <select name="brand" id="" class="form-select" required>
                <option value="'.$brand.'">'.$brand.'</option>';
            
                foreach ($brands as $brand) {
                    echo '<option value="'.$brand.'">'.$brand.'</option>';
                }

            echo '
        </select>
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Name</label>
        <input name="name" type="text" value="'.$item_name.'" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Description</label>
        <textarea name="description" id="" class="form-control" rows="3">'.$description.'</textarea>
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Price</label>
        <input name="price" type="number" class="form-control" value="'.$price.'" required>
        <input name="item_id" type="hidden" value="'.$item_id.'" required>
    </div>';

 }