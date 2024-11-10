<?php require 'partials/hd.php'; 

?>
<?php require 'partials/header.php'; ?>
    
<?php  require 'partials/top_nav.php'; ?>
 

    <div class="container-fluid">
      <div class="row">


         <?php  require 'partials/side_nav.php';   ?>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2"> Registered Categories</h1>

          </div> 






          <div class="view-box">
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
          <?php
                  // if there is a message available
                  if (strlen($msg)>0) {
                      echo '<div class="alert '.$alert_type.' mb-2">'.$msg.'</div>';
                  }



                  $sql = "SELECT * FROM categories";
                   
                   $result = mysqli_query($connection, $sql);
                   $n_row  = (int) mysqli_num_rows($result); 

                   $categoryIcons = array(
                    "Electronics" =>"icons/electronics.svg",
                    "Phones and accessories" => "icons/Phones and accessories.svg",
                    "Food & Beverages" => "icons/Food & Beverages.svg",
                    "Clothing" => "icons/clothing.svg ",
                    "Furnitures" => "icons/furniture.svg ",
                    "Health and lifestyle" => "icons/Health and lifestyle.svg",
                    "Footwears" => "icons/footwears.svg ",
                    "Cars & spare parts" => "icons/Cars & spare part.svg ",
                    "Laptops & accessories" => "icons/Laptops & accessories.svg ",
                    "Building materials" => "icons/Building-Materials.svg ",
                    "Property" => "icons/Property.svg ",
                    "Wristwatch" => "icons/wristwatch.svg ",
                    "Toys" => "icons/toys.svg",
                    "Refrigerators" => "icons/refrigerator.svg ",
                    "Generators" => "icons/generators.svg",
                );
                   if ($n_row>0) {
                      echo '<table class="table table-striped table-bordered" style="width:1100px">
                              <tr>
                                  <th>S/N</th>
                                  <th>Icon</th>
                                  <th>Category</th>
                                  <th>Description</th>
                                  <th>Position</th>
                                  <th>Status</th>
                                  <th></th>
                                  <th></th>
                              </tr>';
                      while ($row=mysqli_fetch_assoc($result)) {
                        $itemID = $row['id'];
                       
                      
                                $sql1 = "SELECT category FROM ad_table";
                                $result1 = mysqli_query($connection, $sql1);
                                $n_row  = (int) mysqli_num_rows($result1);  
                              while ($row1 = mysqli_fetch_assoc($result1)) {
                                $category = $row1['category'];
                                $iconClass = isset($categoryIcons[$category]) ? $categoryIcons[$category] : "fas fa-question-circle";
                              }

                              $description = $row['description'];
                                $position = $row['position'];
                                $status = $row['status'];
                               
                          echo '<tr>
                                   <td>'. $itemID .'</td>
                                   <td><img src="'.  $iconClass.'" alt="'.$category.'"  style="width:50px"></td>
                                    <td>'.$category.'</td>
                                    <td>'.$description.'</td>
                                    <td>'.$position.'</td>
                                    <td>'.$status.'</td>';
                                    
                              
                               echo '
                                    <td><button ad-item-id="'.  $itemID .'" data-bs-toggle="modal" data-bs-target="#editAdModal" class="btn btn-success no-wrap edit-btn"><i class="fas fa-edit"></i> Edit</button></td>
                                    
                                    <td><button ad-item-id="'.  $itemID.'" data-bs-toggle="modal" data-bs-target="#deleteAdModal" class="btn btn-danger no-wrap delete-btn"><i class="fas fa-trash"></i> Delete</button></td>
                                </tr>';
                            
                      }
                      echo '</table>';
            
                   } else {
                    echo '<p class="text-center mt-5">No records found!</p>';
                   }

            ?>
          </div>
         


 
          
 




        <!-- New Ad Item Modal -->
        

          
          </div>
        </main>



      </div>
    </div>


   <?php  require 'partials/footer.php';  ?>