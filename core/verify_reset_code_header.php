<?php  session_start();

    require_once '../connection.php';

    require 'function.php';  $row = '';   $Msg = '';

    function is_valid_email($email) {
        return filter_var(FILTER_VALIDATE_EMAIL);
    }

    if (is_valid_email($_SESSION['code_sent_email'])==false) {
        header('location:forget_password.php'); exit();
    } else {
        $email = $_SESSION['code_sent_email'];
    }

    




   // Check if the form is submitted
   if (isset($_POST['btn_submit'])) {  

    // Get the code input from the form
    $code = $_POST['code'];
    // Get the email stored in the session
    $email = $_SESSION['code_sent_email'];

    // Check if the email field is not empty
    if (strlen($email) > 0) { $initial_status = 'sent';

        // Check if the code and email combination exists in the security_codes table
        $sql = "SELECT * FROM security_codes WHERE code=? AND channel_value=? AND status=?";
        $stmt = mysqli_prepare($connection, $sql);
        mysqli_stmt_bind_param($stmt, 'sss', $code, $email, $initial_status);
        mysqli_stmt_execute($stmt);  
        $result = mysqli_stmt_get_result($stmt);
        $n_row = mysqli_num_rows($result);  

        // If the code and email combination is found
        if ($n_row > 0) {
            // Get the timestamp of when the code was sent
            $row = mysqli_fetch_assoc($result);
            $timestamp = $row['timestamp'];
            // Calculate the number of seconds since the code was sent
            $secondsSinceCodeSent = time() - $timestamp;
            
            // If the code was sent within the last 10 minutes (600 seconds)
            if ($secondsSinceCodeSent <= 600) {
                // Mark the reset code as validated in the session
                $_SESSION['reset_code_validated'] = true;

                // update the secuity code to used in the database
                $new_status = 'used';
                $query = "UPDATE security_codes SET status=? WHERE channel_value=?";
                $stmt2 = mysqli_prepare($connection, $query);
                mysqli_stmt_bind_param($stmt2, 'ss', $new_status, $email);
                mysqli_stmt_execute($stmt2);

            
                // Redirect the user to the reset password page
               header('location: reset_password.php');
            } else {
                // If the code has expired, display an error message and redirect to the forget password page
                $alert_type = 'alert-danger';
                $Msg = 'password reset code has expired, try again';
              
               header('location: forget_password.php');
            }
        } else {
            // If the code and email combination is not found, display an error message
            $alert_type = 'alert-danger';
            $Msg = 'password reset code entered was invalid, please try again ...';
          
        }
             
    } else {
        // If the email field is empty, display an error message
        $alert_type = 'alert-danger';
        $Msg = 'Please fill in your email address fields';
      
    }
}
