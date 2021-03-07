
<html>
    <body>
    
        <nav class="navbar navbar-dark bg-dark">
            <a class="btn btn-primary mr-1" href="?action=retourAccueil">Accueil</a>
            <?php
            
                if(isset($_SESSION['role']) && $_SESSION['role']=='admin'){
                    echo" <a href='?action=Deconnexion' class='btn btn-primary mt-2 mb-2 ml-4' type='button'>Deconnexion</a>";
                }
                else{
                    echo"<a class='btn my-2 btn-primary' href='?action=connexionAdmin' type='submit' >Connexion Admin</a>";
                }
            ?>
            <a class="navbar-brand text-white">Que de News !</a>
            <form class="form-inline" method="post" action="?action=Rechercher">;
                <input class="form-control mr-sm-2" type="date" name="laDate">
                <input class="btn btn-outline-success my-2 my-sm-0" type="submit" value="Rechercher">
            </form>
        </nav>
   <?php
    if(isset($_SESSION['role']) && $_SESSION['role']=='admin'){
        echo" <div class='bg-success'> ";
           echo" <a href='?action=callAjoutNews' class='btn btn-light mt-2 mb-2 ml-4' type='button'>Ajouter News</a>";
        echo"</div>";
   }
    if(isset($TNews)){
        foreach($TNews as $n){
            echo'<section class="jumbotron">';
                echo'<div class="container">';
                    echo '<p class="text-right">';
                    if(isset($_SESSION['role']) && $_SESSION['role']=='admin'){
                        echo '<a href="?action=SupprimerNews&a='.$n->getIdNews().'">   <img class="" src="Ressources/poubelle.png" />  </a>';
                    }
                    echo '</p>';
                    echo'<h1 class=" text-left">'.$n->getTitre().'</h1>';
                    echo'<p class="lead text-muted">'.$n->getArticle().'</br></br></p>';
                    echo'<span class="text-left">'.$n->getDate().'</span></br></br>';
                    echo'<p class="text-right">';
                    echo '<a href="?action=callPageCommentaire&c='.$n->getIdNews().'" class="btn btn-secondary">Voir les commentaires</a>';
                    
                    
            echo'</p>';
        echo'</div>';  
    echo'</section>';                    
                }   
            }
            
            ?>
</body>

</html>
