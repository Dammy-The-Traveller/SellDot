<!DOCTYPE html><?php session_start(); $log_status = false;  ?>
<html lang="en">
<head>
<meta charset="utf-8">
    <title>E-SellDot</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
  
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
</head>
<body>
<?php require_once 'connection.php'?>
<?php require ('views/partials/TopBar.php') ?>
<?php require ('views/partials/header.php') ?>
  


<div class="text-white border p-4 text-center bg-primary">  
        <p class="display-6" style="font-size:30px; color:black;">Product Under Category<ins style="font-style: italic; font-weight:bold;"><b><q><?=$_GET['category']?></q></b></ins></p> 
</div>
<div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Products</span></h2>
        </div>
        <div class="row px-xl-5 pb-3">
    <?php
   // create a connection string
   require 'connection.php'; 
   $category = '%'.$_GET['category'].'%';
   if ($log_status) {
    $sql = "SELECT * FROM ad_table  WHERE user_id='$logged_user_id' and status='active' and category LIKE ?";
  } else {
    $sql = "SELECT * FROM ad_table WHERE category LIKE ?";
  }
   //$sql = "SELECT * FROM ad_table WHERE category LIKE ?";
   $stmt = mysqli_prepare($connection, $sql);
   mysqli_stmt_bind_param($stmt, 's', $category);
   mysqli_stmt_execute($stmt);  
   $rs = mysqli_stmt_get_result($stmt);
   $n_row = mysqli_num_rows($rs);  
if ($n_row>0) {
   while ($row=mysqli_fetch_assoc($rs)) {
     $name = $row['name'];
     $category = $row['category'];
     $brand = $row['brand'];
     $price = $row['price'];
     $status = $row['status'];
     $description = $row['description'];
     $timestamp = $row['timestamp'];
     $img_name  = $row['img_name'];
     if (strlen($name)>25) {
      $name = substr($name, 0,22).' ...';
   }     
     if (strlen($description)>90) {
        $description = substr($description, 0,90).' ...';
     }  
     echo ' <div class="col-lg-3 col-md-6 col-sm-12 pb-1 ad">
             <div class="card product-item border-0 mb-4">
             <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
               <img src="user/ad_pictures/'.$img_name.'" alt="" class="card-img-top p-3">
               </div>
             <div class="card-body  border-left border-right text-center p-0 pt-4 pb-3">
                  <h6 class="text-truncate mb-3">'.$name.'</h6>
                     <p class="mb-0">
                  <div class="d-flex justify-content-center price">
                     <h6> &#8358; '.$price.' </h6>
                 </div>
              </div>   
                 <div class="card-footer d-flex justify-content-between bg-light border">
                     <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                     <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
                 </div>
         </div>
     </div>';
   }
} else {
    echo '<p class="h6 text-center">No record found...</p>';
}




?>
  </div>
  </div>
   <!-- Products End -->

    
  <!-- Footer Start -->
  <?php require ('views/partials/footer.php') ?>
  <!-- Footer End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>
</html>