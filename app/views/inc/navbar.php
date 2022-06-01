<html>
<head>
<script src="<?php echo URLROOT; ?>css/jquery-3.5.1.min.js"></script>

<script src="<?php echo URLROOT; ?>css/bootstrap.bundle.min.js"></script>

<script src="css/owl.carousel.min.js"></script>

<script src="<?php echo URLROOT; ?>css/wow.min.js"></script>

<script src="<?php echo URLROOT; ?>css/theme.js"></script>


<link rel="stylesheet" href="<?php echo URLROOT; ?>css/maicons.css">

<link rel="stylesheet" href="<?php echo URLROOT; ?>css/bootstrap.css">



<link rel="stylesheet" href="<?php echo URLROOT; ?>css/animate.css">

<link rel="stylesheet" href="<?php echo URLROOT; ?>css/theme.css">

<script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>


</head>
<header>
<div class="topbar">
      <div class="container">
        <div class="row">
          <div class="col-sm-8 text-sm">
            <div class="site-info">
              <a href="#"><span class="iconify" data-icon="akar-icons:phone"></span> +01020666323</a>
              <span class="divider">|</span>
              <a href="#"><span class="iconify" data-icon="clarity:email-line"></span> El-borg@gmail.com</a>
            </div>
          </div>
          <div class="col-sm-4 text-right text-sm">
            <div class="social-mini-button">
              <a href="#"><span class="iconify" data-icon="akar-icons:facebook-fill"></span></a>
              <a href="#"><span class="iconify" data-icon="icon-park:twitter"></span></a>
              
              <a href="#"><span class="iconify" data-icon="akar-icons:instagram-fill"></span></a>
            </div>
          </div>
        </div> <!-- .row -->
      </div> <!-- .container -->
    </div> <!-- .topbar -->

    <nav class="navbar navbar-expand-lg navbar-light shadow-sm">
      <div class="container">
        <a class="navbar-brand" href="Index"><span class="text-primary">El Borg</span>-Dental Clinc</a>

        <form action="#">
          <div class="input-group input-navbar">
            <div class="input-group-prepend">
              
            </div>
           
          </div>
        </form>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupport" aria-controls="navbarSupport" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarSupport">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
            <a class="nav-link" href="<?php echo URLROOT . 'pages/Index'; ?>">Home</a>

            </li>
            <li class="nav-item ">
            <a class="nav-link" href="<?php echo URLROOT . 'pages/search'; ?>">Search</a>

            </li> 
            <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT . 'pages/about'; ?>">About Us</a>

            </li>
            <li class="nav-item">
              <a class="nav-link" href="search">Doctors</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="blog.html">News</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contactus.php">Contact</a>
            </li>
           
           
              <?php
            if (isset($_SESSION['user_id'])): 
              
            
            ?>
           
             <li class="nav-item">
              <a class="btn btn-primary ml-lg-3" href="<?php echo URLROOT . 'users/Logout'; ?>" >Sign out</a>
              </li>
              <li class="nav-item">
              <a class="btn btn-primary ml-lg-3" href="<?php echo URLROOT . 'users/Editprofile'; ?>" >View Profile</a>
            </li>
            <?php if ($_SESSION['user_type']==1): ?>

<li class="nav-item">
  <a class="btn btn-primary ml-lg-3" href="<?php echo URLROOT . 'pages/admin'; ?>" >Admin</a>
  </li>

            <?php endif ;?>
            
            <?php
            elseif (!isset($_SESSION['user_id'])): 
            
            
            ?>
            <li class="nav-item">
              <a class="btn btn-primary ml-lg-3" href="<?php echo URLROOT . 'users/Login'; ?>" >Login/Register</a>
            </li>
            <?php endif ;?>
           

            
           
            
            </div>
            </ul>
            </div> <!-- .navbar-collapse -->
          </div> <!-- .container -->
        </nav>
      </header>
     
</html>
          