<?php
require('DataBaseModel.php');

class User
{
    private $db;

    public function __construct() 
    {
        $this->db = new DataBase();
    }

    public function insert ($username,$password,$user_type)
    {
        $sql = "INSERT INTO `users`(`username`, `password`, `user_type`) VALUES (:username,:password,:user_type)";

        $password=password_hash($password, PASSWORD_DEFAULT);

        $sth = $this->db->prepare($sql);
        $sth->bindParam(':username', $username);
        $sth->bindParam(':password', $password);
        $sth->bindParam(':user_type', $user_type);
        $sth->execute();
    }

    public function read ($username)
    {
        $sql= "SELECT * FROM `users` WHERE USERNAME=:username";

        $sth = $this->db->prepare($sql);
        $sth->bindParam(':username', $username);
        $sth->execute();

        $result = $sth->setFetchMode(PDO::FETCH_ASSOC);
        $result=$sth->fetchAll();

        return $result;
    }

    public function update ($username,$password)
    {
        $sql= "UPDATE `users` SET `PASSWORD`=:password WHERE `USERNAME`=:username";

        $sth = $this->db->prepare($sql);
        $sth->bindParam(':username', $username);
        $sth->bindParam(':password', $password);
        $sth->execute();
    }

    public function login($username,$password)
    {
        $sql= "SELECT * FROM `users` WHERE USERNAME=:username";

        $sth = $this->db->prepare($sql);
        $sth->bindParam(':username', $username);
        $sth->execute();

        $result = $sth->setFetchMode(PDO::FETCH_ASSOC);
        $result=$sth->fetchAll();
        
        foreach ($result as $key => $user) {
            
            if(password_verify($password, $user["password"])){

                session_start();
                $_SESSION["user"]=$user["username"];
                return true;
            }
            else{
                return false;
            }
        }
    }
}

/*$u= new User();
$u->insert("admin","adminaiat","ADMINISTRADOR");*/
?>