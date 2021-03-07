<?php

class News {
    private $idNews;
    private $titre;
    private $article;
    private $date;    
    
    function __construct($idNews, $titre, $article, $date) {
        $this->idNews = $idNews;
        $this->titre = $titre;
        $this->article = $article;
        $this->date = $date;
    }

    function getIdNews() {
        return $this->idNews;
    }

    function getTitre() {
        return $this->titre;
    }

    function getArticle() {
        return $this->article;
    }

    function getDate() {
        return $this->date;
    }

    function setIdNews($idNews) {
        $this->idNews = $idNews;
    }

    function setTitre($titre) {
        $this->titre = $titre;
    }

    function setArticle($article) {
        $this->article = $article;
    }

    function setDate($date) {
        $this->date = $date;
    }

}
