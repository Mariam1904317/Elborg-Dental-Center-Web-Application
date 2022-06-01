<?php
class admin extends View
{
  public function output()
  {
    require APPROOT . '/views/inc/header.php';

   
  
?>
<div class="back-to-top"></div>

 <div class="page-hero bg-image overlay-dark" style="background-image: url(<?php echo URLROOT; ?>img/bgg.jpg);">
    <div class="hero-section">
      <div class="col-lg">
      <a class="btn btn-primary ml-lg-3" href="<?php echo URLROOT . 'users/admin_add_doc'; ?>" >Add Doctor</a>
      </div>
      <div class="col-lg">
        <button type="button" class="btn btn-primary" onclick="location.href='admin-all-users.php'">Add Admin</button>
      </div>
      <div class="col-lg">
        <button type="button" class="btn btn-primary" onclick="location.href='admin-all-admins.php'">View Administrators</button>
      </div>
      <div class="col-lg">
        <button type="button" class="btn btn-primary" onclick="location.href='admin-all-products.php'">Manage Treatments</button>
      </div>
      <div class="col-lg">
        <button type="button" class="btn btn-primary" onclick="location.href='adminmessages.php'">View Appointments</button>
      </div>
    </div>
  </div>

  <?php 
  }
}
  
  
  ?>