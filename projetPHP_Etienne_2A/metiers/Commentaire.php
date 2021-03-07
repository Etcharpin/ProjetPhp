<?php

class Commentaire {
    private $idCom;
    private $pseudo;
    private $commentaire;
    private $idNews;
    
    function __construct($idCom,$pseudo, $commentaire, $idNews) {
        $this->idCom = $idCom;
        $this->pseudo = $pseudo;
        $this->commentaire = $commentaire;
        $this->idNews = $idNews;
    }
    
    function getPseudo() {
        return $this->pseudo;
    }

    function getCommentaire() {
        return $this->commentaire;
    }

    function setPseudo($pseudo) {
        $this->pseudo = $pseudo;
    }

    function setCommentaire($commentaire) {
        $this->commentaire = $commentaire;
    }
    function getIdNews() {
        return $this->idNews;
    }

    function setIdNews($idNews) {
        $this->idNews = $idNews;
    }

    function getIdCom() {
        return $this->idCom;
    }

    function setIdCom($idCom) {
        $this->idCom = $idCom;
    }


}
