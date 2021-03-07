<?php

class NewsGateway {
    
    private $con;
    
    function __construct($con) {
        $this->con =$con;
    }

    function insert(string $titre, string $article,string $date) :bool{
        $query="INSERT INTO tnews VALUES(null,:titre,:article,STR_TO_DATE(:date,'%Y-%m-%d'))";

        return $this->con->executeQuery($query,array(':titre' =>array($titre,PDO::PARAM_STR),
                                                     ':article'=>array($article,PDO::PARAM_STR),
                                                     ':date'=>array($date,PDO::PARAM_STR)));     
    }

    
    function findDate($date) :array{
        $tabDate=array();
        $query="SELECT * FROM tnews WHERE date=STR_TO_DATE(:date,'%Y-%m-%d')";
        $this->con->executeQuery($query,array(':date' =>array($date,PDO::PARAM_STR)));
        $results= $this->con->getResults();
        foreach ($results as $val){
            $tabDate[]= new News($val['idNews'],$val['titre'],$val['article'],$val['date']);
        }
        if(sizeof($tabDate,COUNT_NORMAL)!=0){
            return $tabDate;
        }
        else{
            throw new Exception("Aucune news à cette date");
        }
    }
    
    function getNews(){
        $listeNews=array();
        $query="SELECT * FROM tnews ORDER BY date DESC";
        $this->con->executeQuery($query);
        $result = $this->con->getResults();
        if(sizeof($result)!=0){
            foreach ($result as $row){
                $listeNews[] = new News($row['idNews'],$row['titre'],$row['article'],$row['date']);
            }
            return $listeNews;
        }
        else{
            throw new Exception("Pas de News pour le moment");
        }
    }
    
    function suppNews($id): bool{
        $query="DELETE FROM tnews WHERE idNews = :id ";
        return $this->con->executeQuery($query,array(':id' =>array($id,PDO::PARAM_INT)));
    }
}