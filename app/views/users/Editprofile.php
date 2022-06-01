<?php
class Editprofile extends view
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
    $action = URLROOT . 'users/Editprofile';
   

    $text = <<<EOT
    <div class="row">
    <div class="col-md-6 mx-auto">
    <div class="card card-body bg-light mt-5">
    <h2>Edit Profile</h2>
    <form action="" method="post">
EOT;

    echo $text;
   
    $this->printname();
    $this->printEmail();
    $this->printPassword();
    $this->printmob();

    $text = <<<EOT
    <div class="container">
    <div class="checkbox mb-3 mt-3">
       
      </div>
      <div class="row mt-4">
        <div class="col">
          <input type="submit" value="Submit" class="form-control btn btn-lg btn-primary btn-block">
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
  private function printname()
  {
    $val = $this->model->getFirstName($_SESSION['user_id']);
    $err = $this->model->getNameErr();
    $valid = (!empty($err) ? 'is-invalid' : '');

    $this->printInput('name', 'name', $val, $err, $valid);
  }
  private function printmob()
  {
    $val = $this->model->getmob($_SESSION['user_id']);
    $err = $this->model->getMobileErr();
    $valid = (!empty($err) ? 'is-invalid' : '');

    $this->printInput('phone', 'phone', $val, $err, $valid);
  }
  private function printEmail()
  {
    $val = $this->model->getEmail($_SESSION['user_id']);
    $err = $this->model->getEmailErr();
    $valid = (!empty($err) ? 'is-invalid' : '');

    $this->printInput('email', 'email', $val, $err, $valid);
  }

  private function printPassword()
  {
    $val = $this->model->getPassword($_SESSION['user_id']);
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
}
