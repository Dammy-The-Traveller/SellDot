<?php require_once '../connection.php'; ?>
<?php require 'verify_reset_code_header.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <title>E-SellDot</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/logo.png" rel="icon">
    <link rel="shortcut icon" href="asset/images/logo.png" type="image/x-icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <style>
         .card-img-top {
             height: 300px
         }
    </style>
</head>
<body>



 

<div class="bg-light border px-5 py-3 text-center" >
        <h1 class="display-5 mt-0">Forget Password</h1>
        <p class="lead small">
            A reset code has been sent to your email address submit, kindly check your inbox/junk folders
        </p> 
</div>

<div class="row mt-5">
      <div class="col-md-5 mx-auto">
            <?php
               // if there is a message available
               if (strlen($Msg)>0) {
                  echo '<div class="alert '.$alert_type.' mb-2">'.$Msg.'</div>';
               }

             
            ?>
            <form action="" method="post">
 

                <div class="input-group mb-3">
                  <span class="input-group-text">Email</span>
                  <input type="email" class="form-control" name="email" value="<?=$email?>">
                </div>
               
                <div class="input-group mb-3">
                  <span class="input-group-text">Reset Code</span>
                  <input type="number" class="form-control" name="code">
                </div>
               

                <div class="row">
                    <div class="col-6">
                        <button type="reset" class="btn btn-primary">Clear</button>
                    </div>
                    <div class="col-6 text-end">
                        <button type="submit" name="btn_submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>            
            </form>
      </div>
</div>
</body>
</html>