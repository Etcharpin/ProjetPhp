<?php

class Admin {
    
    private $login;
    private $role;
    
    function __construct($login, $role) {
        $this->login = $login;
        $this->role = $role;
    }
    
    function getLogin() {
        return $this->login;
    }

    function getMdp() {
        return $this->mdp;
    }

    function getRole() {
        return $this->role;
    }

    function setLogin($login) {
        $this->login = $login;
    }

    function setMdp($mdp) {
        $this->mdp = $mdp;
    }

    function setRole($role) {
        $this->role = $role;
    }
    
}