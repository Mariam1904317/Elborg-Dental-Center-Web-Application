<?php
require_once 'UserModel.php';
class deleteModel extends UserModel
{
    public  $title = 'User delete Page';
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

   
   
   public function delete(){
    
    $sql = "DELETE FROM user WHERE id='" . $_GET['id'] . "'";
    deleteData($sql);
  
    
   }
   
    public function ViewUser($ID){
		
		$this->dbh->query('SELECT * from users where id= :id');
        $this->dbh->bind(':id', $ID);

        $record = $this->dbh->resultSet();
		
		return $record;
	}

   
}