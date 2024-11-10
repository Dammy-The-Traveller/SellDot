<?php

// require 'function.php';  $row = '';   $msg = '';



    // dump_var($_GET);
   
    

    // if (isset($_POST['btn_submit'])) {  // if button is submitted
    //     // $first_name = $_POST['first_name'];
    //     $first_name = filter_input(INPUT_POST, "first_name", FILTER_SANITIZE_SPECIAL_CHARS);
    //     // $last_name  = $_POST['last_name'];
    //     $last_name = filter_input(INPUT_POST, "last_name", FILTER_SANITIZE_SPECIAL_CHARS);
    //     $gender  = $_POST['gender'];
    //     // $email  = $_POST['email'];
    //     $email = filter_input(INPUT_POST, "email",FILTER_SANITIZE_EMAIL);
    //     // $phone  = $_POST['phone'];
    //     $phone = filter_input(INPUT_POST, "phone",FILTER_SANITIZE_NUMBER_INT);
    //     // $password  = $_POST['password'];
    //     $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);
    //     $hash = password_hash($password, PASSWORD_DEFAULT);
    //     $confirm_password  = $_POST['confirm_password'];


    //      // to check if the password matches 
    //      if($password === $confirm_password){  
    //            // create a connection string
    //     $connection = mysqli_connect('localhost','root','', 'jiji', 3306);

    //     // insert in the table
    //     $sql = "INSERT INTO users (first_name,last_name,gender,email,phone,password) VALUES('$first_name','$last_name','$gender','$email','$phone','$hash')";

    //     // Performs a query on the database
    //     $results = mysqli_query($connection, $sql);

    //     // check for number of rows inserted
        
    //     $row = mysqli_affected_rows($connection);  
    //      if ($row>0) {
    //       $alert_type = 'alert-success';
    //       $msg = 'registration was successful';
    //     } else if ($row==0) {
    //       $alert_type = 'alert-danger';
    //       $msg = 'something went wrong';
    //     }

    // }
    //  else {
    //     $alert_type = 'alert-danger';
    //     $msg = 'Yours passwords does not match!';
    // }
       
        
    // }

require 'function.php'; $row = '';   $msg = '';
    if (isset($_POST['btn_submit'])) {  // if button is submitted
        // $first_name = $_POST['first_name'];
        $first_name = filter_input(INPUT_POST, "first_name", FILTER_SANITIZE_SPECIAL_CHARS);
        // $last_name  = $_POST['last_name'];
        $last_name = filter_input(INPUT_POST, "last_name", FILTER_SANITIZE_SPECIAL_CHARS);
        $gender  = $_POST['gender'];
        // $email  = $_POST['email'];
        $email = filter_input(INPUT_POST, "email",FILTER_SANITIZE_EMAIL);
        // $phone  = $_POST['phone'];
        $phone = filter_input(INPUT_POST, "phone",FILTER_SANITIZE_NUMBER_INT);
        // $password  = $_POST['password'];
        $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);
        $confirm_password  = $_POST['confirm_password'];
        $user_type   = 'user';

        if (
          strlen( $first_name)>0&&
          strlen($last_name)>0&&
          strlen($gender)>0&&
          strlen($email)>0&&
          strlen($phone)>0&&
          strlen( $password)>0&&
          strlen($confirm_password)>0
        ) {
                // chceck if the passwords maches
                if ($password===  $confirm_password ) {
                  $hashed_password = password_hash(  $confirm_password , PASSWORD_DEFAULT);
                  // create a connection string
                   require '../connection.php'; 
                  // check for the prescence of same email in the DB
                  $sql = "SELECT user_id FROM users WHERE email=?";
                  
                  $stmt = mysqli_prepare($connection, $sql);
                  // var_dump($stmt); die($stmt);
                  mysqli_stmt_bind_param($stmt, 's', $email);
                  mysqli_stmt_execute($stmt);  
                  $rs = mysqli_stmt_get_result($stmt);
                  $n_row = mysqli_num_rows($rs);  

                  if ($n_row==0) {
                        // insert in the table
                        $sql = "INSERT INTO users (first_name,last_name,gender,email,user_type,phone,password) VALUES(?,?,?,?,?,?,?)";
                        $stmt = mysqli_prepare($connection, $sql);
                        mysqli_stmt_bind_param($stmt, 'sssssss', $first_name,$last_name,$gender,$email,$user_type,$phone,$hashed_password);
                        mysqli_stmt_execute($stmt);
                        $row = mysqli_stmt_affected_rows($stmt);

                        // check for number of rows inserted
                        $row = mysqli_affected_rows($connection);   
                        if ($row>0) {
                          $alert_type = 'alert-success';
                          $msg = 'registration was successful, proceed to login';
                          
                        } else if ($row==0) {
                          $alert_type = 'alert-danger';
                          $msg = 'something went wrong';
                        }
                  } else {
                    $alert_type = 'alert-danger';
                    $msg = 'Email address already exist, pls  log in if you already have an account';
                  }
              } else {
                  $alert_type = 'alert-danger';
                  $msg = 'Yours passwords does not match!';
              }
        } else {
           $alert_type = 'alert-danger';
           $msg     = 'Please fill all the required fields';
        }
         
 
    }
