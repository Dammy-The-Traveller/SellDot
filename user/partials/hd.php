<?php
//  session_start();

//   $log_status = $_SESSION['log_status'];
//   $logged_user_first_name = $_SESSION['first_name']; 
//   $logged_user_id = $_SESSION['user_id']; 
//   $logged_user_type = $_SESSION['user_type'];



//   if ($_SESSION['log_status']!=true) {
//     header('location:../login.php');
// }


//   if (isset($_POST['btn_log_out'])) { // if the button submits to server
//       session_destroy(); 
//       header('location:../Sell_home_veiw.php');
//   }

//   if (isset($_POST['btn_update_profile'])) {  // if button is submitted
//     $first_name = $_POST['first_name'];
//     $last_name  = $_POST['last_name']; 
//     $phone  = $_POST['phone'];   
//     $gender = $_POST['gender'];

//     if (
//       strlen($first_name)>0&&
//       strlen($last_name)>0&&
//       strlen($gender)>0&&
//       strlen($phone)>0
//     ) {

//               // create a connection string
//               $connection = mysqli_connect('localhost','root','','jiji',3306);

//               $user_id = $_SESSION['user_id'];

//                     // insert in the table
//                     $sql = "UPDATE users SET first_name=?, last_name=?, gender=?, phone=? WHERE user_id=?";
//                     $stmt = mysqli_prepare($connection, $sql);
                  
//                     mysqli_stmt_bind_param($stmt, 'sssss', $first_name,$last_name,$gender,$phone,$user_id);
//                     mysqli_stmt_execute($stmt);
//                     $row = mysqli_stmt_affected_rows($stmt);

//                     // check for number of rows inserted
//                     $row = mysqli_affected_rows($connection);   
//                     if ($row>0) {


//                         // re-update the user data currently in the session
//                         $sql2 = "SELECT * FROM users WHERE user_id=?";
//                         $stmt2 = mysqli_prepare($connection, $sql2);
//                         mysqli_stmt_bind_param($stmt2, 's', $user_id);
//                         mysqli_stmt_execute($stmt2);
                       
//                         $rs2 = mysqli_stmt_get_result($stmt2);
//                         $n_row2 = mysqli_num_rows($rs2); 
                    
//                         if ($n_row2>0) {
//                                 $row2 = mysqli_fetch_assoc($rs2);
//                                 foreach ($row2 as $key => $value) {
//                                    $_SESSION[$key] = $value;
//                                 }
//                         } 

//                       $alert_type = 'alert-success';
//                       $msg = 'profile update was successful';
//                     } else if ($row==0) {
//                       $alert_type = 'alert-danger';
//                       $msg = 'something went wrong';
//                     }


//     } else {
//        $alert_type = 'alert-danger';
//        $msg     = 'Please fill all the required fields';
//     }

//      echo '<script>alert("'.$msg.'")</script>';
// }





// if (isset($_POST['btn_update_password'])) {  // if button is submitted
//   $password = $_POST['password'];   
//   // $hash = password_hash($password, PASSWORD_DEFAULT);
//   $New_password  = $_POST['New_Password'];
//   $Repeat_Password = $_POST['Repeat_Password'];
  
   
//             if (
//               strlen($password)>0&&
//               strlen($New_password)>0&&
//               strlen($Repeat_Password)>0
//             ) {

//               if ($New_password===$Repeat_Password) {
//                                  // create a connection string
//       $connection = mysqli_connect('localhost','root','','jiji',3306);
//       // check for the prescence of same password in the DB
//        $sql2 = "SELECT user_id FROM users WHERE  Password=?";
//        $stmt2 = mysqli_prepare($connection, $sql2);
//        mysqli_stmt_bind_param($stmt2, 's', $password);
//        mysqli_stmt_execute($stmt2);  
//        $rs2 = mysqli_stmt_get_result($stmt2);
//        $n_row2 = mysqli_num_rows($rs2);
//        $user_id = $_SESSION['user_id'];
//        if ($n_row2>0) {
          
//                   // update in the table
//                   $sql3 = "UPDATE users SET password = ? WHERE user_id = ?";
//                   $stmt3 = mysqli_prepare($connection, $sql3); 
//                   mysqli_stmt_bind_param($stmt3, 'ss', $New_password, $user_id);
//                   mysqli_stmt_execute($stmt3);
//                   $row3 = mysqli_stmt_affected_rows($stmt3);
//                   // check for number of rows inserted
//                   $row3 = mysqli_affected_rows($connection); 
//                   if ($row3>0) {
//                     $alert_type = 'alert-success';
//                     $msg = 'password update was successful';
//                              // destroy session data
//                              session_destroy();

//                              // log out user
//                              header('location:../');
//                   } else if ($row3==0) {
//                     $alert_type = 'alert-danger';
//                     $msg = 'something went wrong';
//                   }

//                 } else {
//                   $alert_type = 'alert-danger';
//                   $msg = 'Password invalid!!';
//                 }
//                 } else {
//                   $alert_type = 'alert-danger';
//                   $msg = 'Yours passwords does not match!';
//               }

//   } else {
//      $alert_type = 'alert-danger';
//      $msg     = 'Please fill all the required fields';
//   }
 
//    echo '<script>alert("'.$msg.'")</script>';
// }







 

//   // if all is well --> proceed to fetch the useer data from session
//   $log_status = $_SESSION['log_status'];
//   $logged_user_first_name = $_SESSION['first_name']; 
//   $logged_user_last_name = $_SESSION['last_name']; 
//   $logged_user_id = $_SESSION['user_id']; 
//   $logged_user_email = $_SESSION['email']; 
//   $logged_user_gender = $_SESSION['gender']; 
//   $logged_user_phone = $_SESSION['phone']; 
//   $logged_user_type = $_SESSION['user_type']; 


//   // create a connection string
//   $connection = mysqli_connect('localhost','root','','jiji',3306);



session_start();

  // var_dump($_SESSION); die();


  // checks if the users is already loggwed in or not 
  // to decide if to throw out to login page or not
  if ($_SESSION['log_status']!=true) {
    header('location:../login.php');
  }


  // responds to log out button
  if (isset($_POST['btn_log_out'])) {  
      // deletes all session data 
      session_destroy(); 
      // redirect to login page
      header('location:../index.php');
  }


 

  if (isset($_POST['btn_update_profile'])) {  // if button is submitted
    $first_name = $_POST['first_name'];
    $last_name  = $_POST['last_name']; 
    $phone  = $_POST['phone'];   
    $gender = $_POST['gender'];

    if (
      strlen($first_name)>0&&
      strlen($last_name)>0&&
      strlen($gender)>0&&
      strlen($phone)>0
    ) {
     
              // create a connection string
              require '../../connection.php'; 
              
              $user_id = $_SESSION['user_id'];
            
                    // insert in the table
                    $sql = "UPDATE users SET first_name=?, last_name=?, gender=?, phone=? WHERE user_id=?";
                    $stmt = mysqli_prepare($connection, $sql);
                    mysqli_stmt_bind_param($stmt, 'sssss', $first_name,$last_name,$gender,$phone,$user_id);
                    mysqli_stmt_execute($stmt);
                    $row = mysqli_stmt_affected_rows($stmt);

                    // check for number of rows inserted
                    $row = mysqli_affected_rows($connection);   
                    if ($row>0) {


                        // re-update the user data currently in the session
                        $sql2 = "SELECT * FROM users WHERE user_id=?";
                        $stmt2 = mysqli_prepare($connection, $sql2);
                        mysqli_stmt_bind_param($stmt2, 's', $user_id);
                        mysqli_stmt_execute($stmt2);  
                        $rs2 = mysqli_stmt_get_result($stmt2);
                        $n_row2 = mysqli_num_rows($rs2);  
                        if ($n_row2>0) {
                                $row2 = mysqli_fetch_assoc($rs2);
                                foreach ($row2 as $key => $value) {
                                   $_SESSION[$key] = $value;
                                }
                        } 

                      $alert_type = 'alert-success';
                      $msg = 'profile update was successful';
                    } else if ($row==0) {
                      $alert_type = 'alert-danger';
                      $msg = 'something went wrong';
                    }
         
      
    } else {
       $alert_type = 'alert-danger';
       $msg     = 'Please fill all the required fields';
    }
     
     echo '<script>alert("'.$msg.'")</script>';
}












if (isset($_POST['btn_update_password'])) {  // if button is submitted
  
  $password = $_POST['password'];   
  //   // $hash = password_hash($password, PASSWORD_DEFAULT);
    $New_password  = $_POST['New_Password'];
     $Repeat_Password = $_POST['Repeat_Password'];
    
  

  if (
    strlen($password)>0&&
     strlen($New_password)>0&&
      strlen($Repeat_Password)>0
  ) {


    if ($New_password==$Repeat_Password) {
          // create a connection string
          require './../connection.php'; 
                      
          $user_id = $_SESSION['user_id'];  // fetch user-id from session




               // check for the validity of the old password
               $sql = "SELECT * FROM users WHERE user_id=? and password=?";
               $stmt = mysqli_prepare($connection, $sql);
               mysqli_stmt_bind_param($stmt, 'ss', $user_id,$password);
               mysqli_stmt_execute($stmt);  
               $rs = mysqli_stmt_get_result($stmt);
               $n_row = mysqli_num_rows($rs);  

               if ($n_row>0) {

                    
                    // update password in the table
                    $query = "UPDATE users SET password=? WHERE user_id=?";
                    $stmt2 = mysqli_prepare($connection, $query);
                    mysqli_stmt_bind_param($stmt2, 'ss', $New_password,$user_id);
                    mysqli_stmt_execute($stmt2);
                    $row = mysqli_stmt_affected_rows($stmt2);

                    // check for number of rows inserted
                    $row = mysqli_affected_rows($connection);   
                    if ($row>0) { 
                      $alert_type = 'alert-success';
                      $msg = 'password update was successful';

                      // destroy session data
                      session_destroy();

                      // log out user
                      header('location:../');

                    } else if ($row==0) {
                      $alert_type = 'alert-danger';
                      $msg = 'something went wrong';
                    }

               } else {
                    $alert_type = 'alert-danger';
                    $msg = 'current password invalid';
                }

    } else {
                $alert_type = 'alert-danger';
                $msg = 'your passwords are not matching';
    }
   
    
  } else {
     $alert_type = 'alert-danger';
     $msg     = 'Please fill all the required fields';
  }
   
   echo '<script>alert("'.$msg.'")</script>';
}





  // if all is well --> proceed to fetch the useer data from session
 if($_SESSION['log_status']==true){

    $log_status = $_SESSION['log_status'];
    $logged_user_first_name = $_SESSION['first_name']; 
    $logged_user_last_name = $_SESSION['last_name']; 
    $logged_user_id = $_SESSION['user_id']; 
    $logged_user_email = $_SESSION['email']; 
    $logged_user_gender = $_SESSION['gender']; 
    $logged_user_phone = $_SESSION['phone']; 
    $logged_user_type = $_SESSION['user_type']; 
 
 }
  // create a connection string
  require './../connection.php'; 