<?php
class Users extends Controller
{
    public function register()
    {
        $registerModel = $this->getModel();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form
            $registerModel->setName(trim($_POST['name']));
            $registerModel->setEmail(trim($_POST['email']));
            $registerModel->setPassword(trim($_POST['password']));
            $registerModel->setConfirmPassword(trim($_POST['confirm_password']));

            //validation
            if (empty($registerModel->getName())) {
                $registerModel->setNameErr('Please enter a name');
            }
            if (empty($registerModel->getEmail())) {
                $registerModel->setEmailErr('Please enter an email');
            } elseif ($registerModel->emailExist($_POST['email'])) {
                $registerModel->setEmailErr('Email is already registered');
            }
            if (empty($registerModel->getPassword())) {
                $registerModel->setPasswordErr('Please enter a password');
            } elseif (strlen($registerModel->getPassword()) < 4) {
                $registerModel->setPasswordErr('Password must contain at least 4 characters');
            }

            if ($registerModel->getPassword() != $registerModel->getConfirmPassword()) {
                $registerModel->setConfirmPasswordErr('Passwords do not match');
            }

            if (
                empty($registerModel->getNameErr()) &&
                empty($registerModel->getEmailErr()) &&
                empty($registerModel->getPasswordErr()) &&
                empty($registerModel->getConfirmPasswordErr())
            ) {
                //Hash Password
                $registerModel->setPassword(password_hash($registerModel->getPassword(), PASSWORD_DEFAULT));

                if ($registerModel->signup()) {
                    //header('location: ' . URLROOT . 'users/login');
                    flash('register_success', 'You have registered successfully');
                    redirect('/login');
                } else {
                    die('Error in sign up');
                }
            }
        }
        // Load form
        //echo 'Load form, Request method: ' . $_SERVER['REQUEST_METHOD'];
        $viewPath = VIEWS_PATH . 'users/Register.php';
        require_once $viewPath;
        $view = new Register($this->getModel(), $this);
        $view->output();
    }
    public function login()
    {
        $userModel = $this->getModel();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //process form
            $userModel->setEmail(trim($_POST['email']));
            $userModel->setPassword(trim($_POST['password']));

            //validate login form
            if (empty($userModel->getEmail())) {
                $userModel->setEmailErr('Please enter an email');
            } elseif (!($userModel->emailExist($_POST['email']))) {
                $userModel->setEmailErr('No user found');
            }

            if (empty($userModel->getPassword())) {
                $userModel->setPasswordErr('Please enter a password');
            } elseif (strlen($userModel->getPassword()) < 4) {
                $userModel->setPasswordErr('Password must contain at least 4 characters');
            }

            // If no errors
            if (
                empty($userModel->getEmailErr()) &&
                empty($userModel->getPasswordErr())
            ) {
                //Check login is correct
                $loggedUser = $userModel->login();
                if ($loggedUser) {
                    //create related session variables
                    $this->createUserSession($loggedUser);
                    die('Success log in User');
                } else {
                    $userModel->setPasswordErr('Password is not correct');
                }
            }
        }
        // Load form
        //echo 'Load form, Request method: ' . $_SERVER['REQUEST_METHOD'];
        $viewPath = VIEWS_PATH . 'users/Login.php';
        require_once $viewPath;
        $view = new Login($userModel, $this);
        $view->output();

        //$this->view($viewPath);
    }

    public function createUserSession($user)
    {
        $_SESSION['user_id'] = $user->id;
        $_SESSION['user_name'] = $user->name;
        $_SESSION['user_type'] = $user->user_type;
        //header('location: ' . URLROOT . 'pages');
        redirect('pages');
    }

    public function logout()
    {
        echo 'logout called';
        unset($_SESSION['user_id']);
        unset($_SESSION['user_name']);
        session_destroy();
        redirect('users/login');
    }

    public function isLoggedIn()
    {
        return isset($_SESSION['user_id']);
    }
    public function Editprofile()
    {
        $EditProfileModel = $this->getModel();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form
            $EditProfileModel->setFirstName(trim($_POST['name']));

            $EditProfileModel->setEm(trim($_POST['email']));
            $EditProfileModel->setpass(trim($_POST['password']));
            
            
            $EditProfileModel->setMob(trim($_POST['phone']));


            //validation
            if (empty($EditProfileModel->getFirstName($_SESSION['user_id']))) {
                $EditProfileModel->setFNameErr('Please enter your first name');
            }
           
            if (empty($EditProfileModel->getEm($_SESSION['user_id']))) {
                $EditProfileModel->setEmailErr('Please enter an email');
            } elseif ($EditProfileModel->emailExist($_POST['email'])) {
                $EditProfileModel->setEmailErr('Email is already registered');
            }
            if (empty($EditProfileModel->getpass($_SESSION['user_id']))) {
                $EditProfileModel->setPasswordErr('Please enter a password');
            } elseif (strlen($EditProfileModel->getpass($_SESSION['user_id'])) < 8) {
                $EditProfileModel->setPasswordErr('Password must contain at least 8 characters');
            }

           /* if ($EditProfileModel->getpassword($_SESSION['user_id'])) != $EditProfileModel->getConfirmPassword($_SESSION['user_id']) {
                $EditProfileModel->setConfirmPasswordErr('Passwords do not match');
            }*/
          
            
            if (empty($EditProfileModel->getMob($_SESSION['user_id']))){
              
            } elseif(($EditProfileModel->getMob($_SESSION['user_id'])) < 11){
                $EditProfileModel->setMobileErr('Mobile number must not be less than 11 characters check again');
            }

            if (
                empty($EditProfileModel->getNameErr()) &&
                
                empty($EditProfileModel->getEmailErr()) &&
                empty($EditProfileModel->getPasswordErr()) &&
                empty($EditProfileModel->getConfirmPasswordErr())&&
                
                empty($EditProfileModel->getMobileErr())

            ) {
                //Hash Password
                $EditProfileModel->setpass(password_hash($EditProfileModel->getpass($_SESSION['user_id']), PASSWORD_DEFAULT));
                $EditProfileModel->EditProfile($_SESSION['user_id']);
                if ($EditProfileModel->EditProfile($_SESSION['user_id'])) {
                    //header('location: ' . URLROOT . 'users/login');
                    flash('Edit_success', 'You have editted your profile successfully');
                    redirect('pages/Index');
                } else {
                    die('Error in Edit');
                }
            }
        }
        
        // Load form
        //echo 'Load form, Request method: ' . $_SERVER['REQUEST_METHOD'];
        $viewPath = VIEWS_PATH . 'users/EditProfile.php';
        require_once $viewPath;
        $viewp = new EditProfile($this->getModel(), $this);
        $viewp->output();
    }
    public function admin_add_doc()
{
    $admin_add_docModel = $this->getModel();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Process form
        $admin_add_docModel->setName(trim($_POST['name']));
        $admin_add_docModel->setEmail(trim($_POST['email']));
        $admin_add_docModel->setjob(trim($_POST['job']));
        $dir= ImageRoot;
        $filename=$_FILES['img']['name'];
        move_uploaded_file($_FILES['img']['tmp_name'],$dir.$filename);
        $admin_add_docModel->setimg(trim($filename));
        
        //validation
        if (empty($admin_add_docModel->getName())) {
            $admin_add_docModel->setNameErr('Please enter a name');
        }
        if (empty($admin_add_docModel->getEmail())) {
            $admin_add_docModel->setEmailErr('Please enter an email');
        } elseif ($admin_add_docModel->emailExist($_POST['email'])) {
            $admin_add_docModel->setEmailErr('Email is already registered');
        }
        if (empty($admin_add_docModel->getjob())) {
            $admin_add_docModel->setjobErr('Please enter a Job description');
        } 

       

        if (
            empty($admin_add_docModel->getNameErr()) &&
            empty($admin_add_docModel->getEmailErr()) &&
            empty($admin_add_docModel->getjobErr()) 
            
        ) {
            //Hash Password
            
            if ($admin_add_docModel->add_doc()) {
                //header('location: ' . URLROOT . 'users/login');
                flash('Done', 'You have Added a doctor  successfully');
                redirect('/admin');
            } else {
                die('Error in adding a Doctor');
            }
        }
    }
    // Load form
    //echo 'Load form, Request method: ' . $_SERVER['REQUEST_METHOD'];
    $viewPath = VIEWS_PATH . 'users/admin_add_doc.php';
    require_once $viewPath;
    $view = new admin_add_doc($this->getModel(), $this);
    $view->output();
}

}


