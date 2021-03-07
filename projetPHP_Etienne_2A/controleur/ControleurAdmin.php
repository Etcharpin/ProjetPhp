<?php


class ControleurAdmin {

    function __construct() {

        global $rep,$vues; 



        $dVueEreur = array ();


        try{

           $action = Validation::nettoyerString($_REQUEST['action']);
            if(Validation::val_action($action)){
                $dVueEreur[]="action incorrect";
                require ($rep.$vues['erreur']);
                        
            }
            
            $_REQUEST[$action]=$action;

            switch($action) {

                case NULL:
                        $this->Reinit();
                        break;


                case "AjouterNews":
                        $this->AjouterNews($dVueEreur);
                        break;
   

                case "callAjoutNews":
                    $this->callAjoutNews($dVueEreur);
                    break;


                case "SupprimerNews" :
                    $this->SupprimerNews($dVueEreur);
                    break;

                case "Deconnexion":
                    $this->Deconnexion($dVueEreur);
                    break;

                default:
                    $dVueEreur[] ="Erreur d'appel php";
                    require ($rep.$vues['erreur']);
                    break;
                }

            }catch (PDOException $e){
                echo $e->getMessage();
                $dVueEreur[] =	"Erreur inattendue!!! ";
                require ($rep.$vues['erreur']);

             }
        exit(0);
    }

    function Reinit() {
        global $rep,$vues;
        $modele = new Modele();
        $TNews = $modele->getNews();
        require ($rep.$vues['pagePrincipale']);
    }
    
    
    
    function callAjoutNews(array $dVueEreur) {
        global $rep,$vues;             
        require ($rep.$vues['pageAjouterNews']);
        
    }
    
    function AjouterNews(array $dVueEreur){
            global $rep,$vues;
            $leTitre= Validation::nettoyerString($_POST['leTitre']);
            $lArticle = Validation::nettoyerString($_POST['lArticle']);
            if(Validation::val_isVide($leTitre)){
                $dVueEreur[]='Le champ  Titre est vide';
                require ($rep.$vues['erreur']);
                $this->callAjoutNews($dVueEreur);
                
            }         
            elseif(Validation::val_isVide($lArticle)){
                $dVueEreur[]='Le champ  Article est vide';
                require ($rep.$vues['erreur']);
                $this->callAjoutNews($dVueEreur);
            }
            else{
                $laDate = $_POST['laDate'];
                $modele = new ModeleAdmin();
                $modele->insertNew($leTitre, $lArticle, $laDate);
                $this->Reinit();
            }
            
    }
    
    function SupprimerNews(array $dVueEreur){
        global $rep,$vues;
        $id = Validation::nettoyerInt($_GET['a']);
        if(Validation::val_int($id)){
                $dVueEreur[]='Id invalide';
               require ($rep.$vues['erreur']);
        }
        $modele = new ModeleAdmin();
        $modele->suppNews($id);
        $this->Reinit();
    }
    
    function Deconnexion(array $dVueErreur){
        global $rep,$vues;
        $modele = new ModeleAdmin();
        $modele->deconnexion();
        $this->Reinit();
    }

}

?>

