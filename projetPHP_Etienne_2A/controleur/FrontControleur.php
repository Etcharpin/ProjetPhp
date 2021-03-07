<?php

class FrontControleur {

    function __construct() {
        global $rep,$vues; 
        
        session_start();

        $dVueEreur = array ();

        $listeActions_Admin = array('AjouterNews','callAjoutNews','SupprimerNews','Deconnexion');
        
        try{    
            $y = new ModeleAdmin();
            $admin = $y->isAdmin();
            $action = Validation::nettoyerString($_REQUEST['action']);
            if(Validation::val_action($action)){
                $dVueEreur[]="action incorrect";
                require ($rep.$vues['erreur']);
                        
           }
            $action=$_REQUEST['action'];
            
           
            if(in_array($action, $listeActions_Admin)){
                if($admin==NULL){
                    new Controleur();
                }
                else{
                    new ControleurAdmin();
                }
            }
            else {
                new Controleur();
            }
        }
            

        catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
