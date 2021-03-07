<?php


class AdminGateway {
    
    private $con;
    
    function __construct($con) {
        $this->con = $con;
    }

    public function insert(string $login, string $password){
        $query="INSERT INTO admin VALUES(null,:login,:password)";
        
        $this->con->executeQuery($query, array(':login'=>array($login,PDO::PARAM_STR),
                                               ':password'=>array($password,PDO::PARAM_STR)));
    }
    
    function getPassword($log){
        $query = "SELECT password FROM Admin WHERE login=:log";
        $this->con->executeQuery($query, array(':log'=>array($log,PDO::PARAM_STR)));
        $result = $this->con->getResults();
        return $result[0]['password'];
    }
}