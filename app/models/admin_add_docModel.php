<?php
require_once 'UserModel.php';
class admin_add_docModel extends UserModel{
    public  $title = 'Admin Add Doctor Page';
    protected $name;
    protected $nameErr;
    protected $job;
    protected $joberr;
    protected $img;


    public function __construct()
    {
        parent::__construct();
        $this->name     = "";
        $this->nameErr = "";

       
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getNameErr()
    {
        return $this->nameErr;
    }
    
    

    public function setNameErr($nameErr)
    {
        $this->nameErr = $nameErr;
    }

   
    public function getjob()
    {
        return $this->name;
    }

    public function setjob($job)
    {
        $this->job = $job;
    }
    public function getjobErr()
    {
        return $this->joberr;
    }
    public function setjobErr($joberr)
    {
        $this->joberr = $joberr;
    }
    public function getimg()
    {
        return $this->img;
    }
    public function setimg($img)
    {
        $this->img=$img;
    }



    public function add_doc()
    {
        $this->dbh->query("INSERT INTO doctors (`name`, `email`,`img`,`job`) VALUES(:uname, :email,:img,:job)");
        $this->dbh->bind(':uname', $this->name);
        $this->dbh->bind(':email', $this->email);
        $this->dbh->bind(':img', $this->img);
        $this->dbh->bind(':job', $this->job);
       

        return $this->dbh->execute();
    }
}