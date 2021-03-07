<?php

class CommentairesGateway {
    private $con;
    
    function __construct($con) {
        $this->con =$con;
    }
    
    function insertCom(Commentaire $unCom): bool{
        $query="INSERT INTO Commentaire VALUES(null,:pseudo,:texte,:idNews)";
        return $this->con->executeQuery($query,array(':texte' =>array($unCom->getCommentaire(),PDO::PARAM_STR),
                                                     ':pseudo'=>array($unCom->getPseudo(),PDO::PARAM_STR),
                                                     'idNews'=>array($unCom->getIdNews(),PDO::PARAM_INT)));
    }
    
    function getCom($id): array{
        $listeCom=array(); 
        $query="SELECT * FROM Commentaire WHERE idNews=:id";
        $this->con->executeQuery($query,array(':id' =>array($id,PDO::PARAM_INT)));
        $result = $this->con->getResults();
        foreach ($result as $row){
            $listeCom[] = new Commentaire($row['idCom'],$row['pseudo'],$row['commentaire'],$row['idNews']);
        }
        return $listeCom;
    }
    
    function suppCom($id) : bool{
        $query="DELETE FROM Commentaire WHERE idNews = :id ";
        return $this->con->executeQuery($query,array(':id' =>array($id,PDO::PARAM_INT)));
    }

    function getNbCom(): int{
        $query="SELECT count(*) FROM Commentaire";
        $this->con->executeQuery($query);
        $result= $this->con->getResults();
        return $result[0]['count(*)'];
    }
    
}
