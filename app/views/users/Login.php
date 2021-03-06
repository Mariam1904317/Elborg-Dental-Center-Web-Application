<html>
  <head>

  <script src="<?php echo URLROOT; ?>css/jquery-3.5.1.min.js"></script>

<script src="<?php echo URLROOT; ?>css/bootstrap.bundle.min.js"></script>

<script src="css/owl.carousel.min.js"></script>

<script src="<?php echo URLROOT; ?>css/wow.min.js"></script>

<script src="<?php echo URLROOT; ?>css/theme.js"></script>

<script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>
<link rel="stylesheet" href="css/maicons.css">

<link rel="stylesheet" href="css/bootstrap.css">



<link rel="stylesheet" href="css/animate.css">

<link rel="stylesheet" href="css/theme.css">


  </head>





<?php
class Login extends view
{
  public function output()
  {
    $title = $this->model->title;

    require APPROOT . '/views/inc/header.php';
    flash('register_success');
    $text = <<<EOT
    <div class="jumbotron jumbotron-fluid">
    <div class="container">
      <h1 class="display-4"> $title</h1>
    </div>
  </div>

  </div>
  </div>
  </div>
EOT;
    echo $text;
    $this->printForm();
    require APPROOT . '/views/inc/footer.php';
  }

  private function printForm()
  {
    $action = URLROOT . 'users/login';
    $registerUrl = URLROOT . 'users/register';

    $text = <<<EOT
    <div class="row">
    <div class="col-md-6 mx-auto">
    <div class="card card-body bg-light mt-5">
    <h2>Login</h2>
    <form action="" method="post">
EOT;

    echo $text;
    $this->printEmail();
    $this->printPassword();

    $text = <<<EOT
    
    <div class="container">
    <div class="checkbox mb-3 mt-3">
        <label>
          <input type="checkbox" value="remember-me"> Remember me
        </label>
      </div>
      <div class="row mt-4">
        <div class="col">
          <input type="submit" value="Login" class="form-control btn btn-lg btn-primary btn-block">
        </div>
        <div class="col">
          <a href="http://localhost/mvc/public/users/register" class="form-control btn btn-lg btn-block">New User, Sign up</a>
        </div>
      </div>
      </div>
    </form>
    </div>
    </div>
    </div>
EOT;
    echo $text;
  }

  private function printEmail()
  {
    $val = $this->model->getEmail();
    $err = $this->model->getEmailErr();
    $valid = (!empty($err) ? 'is-invalid' : '');

    $this->printInput('email', 'email', $val, $err, $valid);
  }

  private function printPassword()
  {
    $val = $this->model->getPassword();
    $err = $this->model->getPasswordErr();
    $valid = (!empty($err) ? 'is-invalid' : '');

    $this->printInput('password', 'password', $val, $err, $valid);
  }

  private function printInput($type, $fieldName, $val, $err, $valid)
  {
    $label = str_replace("_", " ", $fieldName);
    $label = ucwords($label);
    $text = <<<EOT
    <div class="form-group">
      <label for="$fieldName"> $label: <sup>*</sup></label>
      <input type="$type" name="$fieldName" class="form-control form-control-lg $valid" id="$fieldName" value="$val" required="">
      <span class="invalid-feedback">$err</span>
    </div>
EOT;
    echo $text;
  }
}?>
</html>