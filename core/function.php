<?php 

function dump_var($var) {
    echo '<pre>';
        var_dump($var);
    echo '</pre>';
}


function getUserImgName ($connection, $user_id) {
       
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
            $imgUrl  = 'profile_pictures/'.$img_name;
        } else {
            $imgUrl = 'profile_pictures/user-dummy.webp';
        }

        return $imgUrl;
    } else {
        return 'profile_pictures/user-dummy.webp';
    }
}
// dump_var($_POST);
