<?php

class ModeleAdmin {
    
    function insertNew(string $titre, string $article, string $date){
        global $dsn,$username,$pwd;
        $y = new NewsGateway(new Connection($dsn, $username, $pwd));
        $verif = $y->insert($titre, $article, $date);
        if($verif==0){
            throw new Exception('Problème insertion News');
        }
    }
    //utile que pour add des admins
    function insertAdmin(string $login, string $password){
        global $dsn,$username,$pwd;
        $y = new AdminGateway(new Connection($dsn, $username, $pwd));
        $y->insert($login, password_hash($password, PASSWORD_DEFAULT));
    }
    
    function connexion($login, $mdp){
        global $dsn,$username,$pwd;
        $y = new AdminGateway(new Connection($dsn, $username, $pwd));
        $hash = $y->getPassword($login);
       
        
        if(password_verify($mdp,$hash)){
            $_SESSION['login']=$login;
            $_SESSION['role']='admin';           
        }
        else {
            throw new Exception("Login ou Mot de passe invalide");
        }
    }
    
    function deconnexion(){
        session_unset();
        session_destroy();
        $_SESSION=array();
    }
    
    function isAdmin(){
        if (isset ($_SESSION['login']) && isset($_SESSION['role'])){
            $login=$_SESSION['login'];
            $role=$_SESSION['role'];
            return new Admin($login, $role);
        }
        else {
            return NULL;        
        }
    }
    
    function suppNews($id){
        global $dsn,$username,$pwd;
        $y = new CommentairesGateway(new Connection($dsn, $username, $pwd));
        $z = new NewsGateway(new Connection($dsn, $username, $pwd));
        $verif = $y->suppCom($id);
        if($verif==0){
            throw new Exception('Problème suppression commentaires');
        }
        $verif = $z->suppNews($id);
        if($verif==0){
            throw new Exception('Problème suppression News');
        }
    }
    
    
    
}