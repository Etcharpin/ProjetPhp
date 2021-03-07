<?php


class Modele {

    
    function getNews():array{
        global $dsn,$username,$pwd;
        $y = new NewsGateway(new Connection($dsn, $username, $pwd));
        return $y->getNews();
    }
    
    function RechercherDate($laDate): array{
        global $dsn,$username,$pwd;
        $y = new NewsGateway(new Connection($dsn, $username, $pwd));
        return $y->findDate($laDate);
    }
    
    function AjouterCom(Commentaire $unCom){
        global $dsn,$username,$pwd;
        if(strcmp($unCom->getPseudo(), $_SESSION['pseudo'])!= 0){
            $_SESSION['pseudo'] = $unCom->getPseudo();
        }
        $y = new CommentairesGateway(new Connection($dsn, $username, $pwd));
        $this->incNbCom();
        $verif = $y->insertCom($unCom);
        if($verif==0){
            throw new Exception("Problème insertion Commentaire");
        }
    }
    
    function getCom($id){
        global $dsn,$username,$pwd;
        $y = new CommentairesGateway(new Connection($dsn, $username, $pwd));
        return $y->getCom($id);
    }
    
    function getNombreTotal(){
        global $dsn,$username,$pwd;
        $y = new CommentairesGateway(new Connection($dsn, $username, $pwd));        
        return $y->getNbCom();
    }
    
    function getNbCom(){
        if(isset($_COOKIE['nbCom'])){
            $nbCom = $_COOKIE['nbCom'];
        }
        else {
            $nbCom = 0;
        }
        if($nbCom<=0){
            $nbCom=0;
        }
        return $nbCom;

    }

    function incNbCom(){
        setcookie("nbCom",$this->getNbCom()+1,time()+365*24*3600);
    }
}
?>