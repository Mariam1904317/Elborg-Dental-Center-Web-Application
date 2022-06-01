<?php
require_once 'RegisterModel.php';
class EditProfileModel extends RegisterModel
{
    public  $title = 'Edit Profile Page';
    
   /* public function EditProfile($ID,$Fname,$Lname, $email, $password,$address,$mobile)
    {
        $result = $this->dbh->query("update users set FirstName='$Fname',LastName='$Lname', Email='$email', Password='$password', Address='$address', Mobile='$moile' WHERE ID='$ID'");
        

        return ($result)?true:false;
    }*/
    public function deleteuser($productID)
    {
        $result = $this->dbh->query("delete from products where ID =".$_SESSION['user_id']);
        

        return ($result)?true:false;
    }

    protected $name;
    
    protected $phone;
    protected $password;
    protected $email;
    protected $cpassword;
    /*
    public function __construct(){
        parent::__construct();
        $this->FirstName = "";
        $this->LastName = "";
        $this->Mobile = "";
        $this->Email = "";
        $this->Address = "";
    }*/

public function getFirstName($id){
    $this->dbh->query("SELECT name from users where `id`=:id");
    $this->dbh->bind(':id',$id);
    return $this->dbh->single()->name;

}

   public function setFirstName($name){
       $this->name=$name;
   } 

  



public function getMobi($id){
    $this->dbh->query("SELECT phone from users where `id`=:id");
    $this->dbh->bind(':id',$id);
    return $this->dbh->single()->phone;

}
public function setMobi($phone){
    $this->phone=$phone;
} 
public function getpass($id){
    $this->dbh->query("SELECT password from users where `id`=:id");
    $this->dbh->bind(':id',$id);
    return $this->dbh->single()->password;

}
public function setpass($password){
    $this->password=$password;
} 

public function getEm($id){
    $this->dbh->query("SELECT email from users where `id`=:id");
    $this->dbh->bind(':id',$id);
    return $this->dbh->single()->email;

}
public function setEm($email){
    $this->email=$email;
} 
 
    public function EditProfile($id)
    {
        $this->dbh->query("UPDATE users SET `name`= :name ,  `password`=:password, `phone`= :phone, `email`=:email  WHERE `id`=:id");
        $this->dbh->bind(':name',$this->name);
        
        $this->dbh->bind(':password',$this->password);
        $this->dbh->bind(':phone',$this->phone);
        
        $this->dbh->bind(':email',$this->email);
        $this->dbh->bind(':id',$id);
        return $this->dbh->execute();
    


    }
}