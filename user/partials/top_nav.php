<?php 
  $msg = '';
  require ('../core/function.php');
?>
<header style="height: 60px;" class="navbar sticky-top bg-dark flex-md-nowrap p-0 shadow" data-bs-theme="dark">
    <style>
          .brand {
            text-decoration: none;
            padding: 10px;
            font-size: 19px;
          }

          .top-nav-btn {
              flex-grow: 1;
              margin-left: 15px;
          }
      </style>
      

      <div id="" class="w-100 d-flex">
          <div>
              <a class="brand" href="#">SellDot</a>
          </div>
          <div style="flex-grow:100">

          </div>
          <div class="top-nav-btn"> 
              <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="fas fa-user-circle"></i> <?=$logged_user_first_name?>
                </button>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="user_profile.php">My Profile</a></li>
                  <li class="p-1">
                      <form action="" method="post">
                        <button name="btn_log_out" class="btn btn-dark w-100" type="submit">
                          <svg class="bi"><use xlink:href="#door-closed"/></svg>
                          Sign out
                        </button>
                      </form>
                  </li>
                </ul>
              </div>
          </div>
          <div class="top-nav-btn">
             <button class="btn btn-secondary w-100"> <i class="fas fa-bell"></i></button>
          </div>
      </div>
</header>