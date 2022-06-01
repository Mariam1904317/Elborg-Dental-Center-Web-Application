<?php
require_once 'UserModel.php';
class editUserModel extends UserModel
{
    public  $title = 'User edit Page';
    protected $ID;
    protected $name;
    protected $nameErr;
    protected $confirmPassword;
   
    


    public function __construct()
    {
        parent::__construct();
        $this->ID="";
        $this->name     = "";
        $this->confirmPassword = "";
       
    }
    public function getID(){
        return $this->ID;
    }
    public function setID($ID){
        $this->ID=$ID;
    }

   public function getName($ID)
    {
        $this->dbh->query("select name from users where id= :ID");
    
    $this->dbh->bind(':ID', $ID);
   
    return $this->dbh->single();
       
    }

    public function setName($ID,$name)
    {
        $this->dbh->query("update users set name= :name where id= :ID");
        $this->dbh->bind(':name', $name);
        $this->dbh->bind(':ID', $ID);
        $this->dbh->execute();
        $this->name = $name;
    }

   
    public function getConfirmPassword($ID)
    {
        $this->dbh->query("select password from users where id= :ID");
    $this->dbh->bind(':ID', $ID);
    $this->dbh->execute();
    return $this->dbh->single();
        return $this->confirmPassword;
    }
    public function setConfirmPassword($ID,$confirmPassword)
    {
        $this->dbh->query("update users set password= :password where id= :ID");
        $this->dbh->bind(':role', $confirmPassword);
        $this->dbh->bind(':ID', $ID);
        $this->dbh->execute();
        $this->confirmPassword = $confirmPassword;
    }

   
    public function ViewUser($ID){
		
		$this->dbh->query('SELECT * from users where id= :id');
        $this->dbh->bind(':id', $ID);

        $record = $this->dbh->resultSet();
		
		return $record;
	}

   
}