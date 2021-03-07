<?php

class Controleur {
    
            
    function __construct() {
       
        global $rep,$vues; 
        


        $dVueEreur = array ();



            $action=$_REQUEST['action'];         
            
            switch($action) {

                case NULL:
                    $this->Reinit();
                    break;

                case "Rechercher":
                    $this->RechercherDate($dVueEreur);
                    break;

                case "AjoutCom":
                    $this->AjoutCom($dVueEreur);
                    break;               

                case "callPageCommentaire":
                    $this->callPageCommentaire();
                    break;

                case "retourAccueil":
                    $this->Reinit();
                    break;
                
                case "connexionAdmin":
                    $this->ConnexionAdmin($dVueEreur);
                    break; 
                
                case "seConnecter":
                    $this->seConnecter($dVueEreur);
                    break;

                default:

                    $dVueEreur[] ="Erreur d'appel php, action inconnue !";
                    require ($rep.$vues['erreur']);
                    break;
            }
        exit(0);
    }

    function Reinit() {
        global $rep,$vues;
        $modele = new Modele();
        $TNews = $modele->getNews();
        require ($rep.$vues['pagePrincipale']);
        
    }

    
    function RechercherDate(array $dVueEreur){
        global $rep,$vues;
        $modele = new Modele();
        $date = $_POST['laDate'];
        $TNews = $modele->RechercherDate($date);
        $nbComTotal= Validation::nettoyerInt($modele->getNombreTotal());
        $nbCom=Validation::nettoyerInt($modele->getNbCom());
        require ($rep.$vues['pagePrincipale']);
    }
    
    
    function AjoutCom(array $dVueEreur){
        global $rep,$vues;
        $lePseudo=Validation::nettoyerString($_POST['lePseudo']);
        $leCom=Validation::nettoyerString($_POST['leCom']);
        
        if(!Validation::val_pseudo($lePseudo) ){
            $dVueEreur[]="Pseudo Invalide(Ne pas mettre d'espace ou de caractères spéciaux)";
            require ($rep.$vues['erreur']);
        }
        
        elseif(Validation::val_isVide($leCom)){
            $dVueEreur[]='Commentaire Vide';
            require ($rep.$vues['erreur']);
        }
        
        else{
            $modele = new Modele();
            $id = Validation::nettoyerInt($_GET['c']);
            if(Validation::val_int($id)){
                $dVueEreur[]='Id invalide';
                require ($rep.$vues['erreur']);
            }
            $modele->AjouterCom(new Commentaire(null,$lePseudo, $leCom, $id));
        }
        $this->callPageCommentaire();
        
    }
    
    
    
    function callPageCommentaire(){
        global $rep,$vues;
        $modele = new Modele();
        $id =Validation::nettoyerInt($_GET['c']);
        
        if(Validation::val_int($id)){
                $dVueEreur[]='Id invalide';
                require ($rep.$vues['erreur']);
        }
        
        $TCom = $modele->getCom($id);
        require ($rep.$vues['pageCommentaire']);
    }
   
    function ConnexionAdmin(array $dVueEreur) {
        global $rep,$vues;
        require ($rep.$vues['pageConnexionAdmin']);
    }
    
    function seConnecter(array $dVueErreur){
        global $rep,$vues;
        
        $login= Validation::nettoyerString($_POST['login']);
        $password = Validation::nettoyerString($_POST['password']);
        
        if(!Validation::val_pseudo($login)){
            $dVueEreur[]='Login Invalide(Seuls les caractères sont autorisées)';
            require ($rep.$vues['erreur']);
            $this->ConnexionAdmin($dVueEreur);
        }
        
        elseif(Validation::val_isVide($password)){
             $dVueEreur[]='mot de passe vide ';
            require ($rep.$vues['erreur']);
            $this->ConnexionAdmin($dVueEreur);
        }
        
        else{
            $m = new ModeleAdmin();
            $m->connexion($login, $password);
            $this->Reinit();
        }
        
    }
}
?>