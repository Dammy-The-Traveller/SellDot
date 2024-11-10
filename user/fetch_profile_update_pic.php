
<?php require 'partials/hd.php'; 

// var_dump($_GET);
$user_id = (int) $_GET['user_id'];


$sql = "SELECT img_name FROM users WHERE user_id=?";
$stmt = mysqli_prepare($connection, $sql);
mysqli_stmt_bind_param($stmt, 's', $user_id);
mysqli_stmt_execute($stmt);  
$rs = mysqli_stmt_get_result($stmt);
$n_row = mysqli_num_rows($rs);  

if ($n_row>0) {
      $row = mysqli_fetch_assoc($rs);
    
      $img_name  = $row['img_name'];
      if (($img_name!=null)&&is_writable('profile_pictures/'.$img_name)) {
        $imgUrl  =  'profile_pictures/'.$img_name;
      } else {
         $imgUrl = 'profile_pictures/user-dummy.webp';
      }
    

      echo '<div class="mb-3 text-center">
                 <img src="'.$imgUrl.'" id="preview_img" class="w-100 rounded" />
            </div>
            <div class="mb-3">
                <label for="" class="form-label">New Pic</label>
                <input name="img_name" id="img_name" type="file" class="form-control"  required>
                <input name="user_id" type="hidden" value="'.$user_id.'" required>
                <input name="old_img_name" type="hidden" value="'.$img_name.'" required>
            </div>';

 }