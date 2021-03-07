
        <nav class="navbar navbar-dark bg-dark">
            <a class="btn btn-light mr-1" href="?action=retourAccueil">Accueil</a>
            <a class="navbar-brand text-white ">Listes des commentaires</a>
        </nav>
        <?php
            echo'<section class="jumbotron">';
                    if(isset($TCom) && !empty($TCom)){
                        foreach ($TCom as $c){
                            echo'<span class="text-left text-muted">Par '.$c->getPseudo().'</span></br>';
                            echo'<p class="text-left text-dark">'.$c->getCommentaire().'</p>';
                        }
                    }
                    else{
                        echo'<p> Aucun commentaire pour cette news !</br></br>';
                    }
            echo'</section>';
        ?>
        <section class="jumbotron">
            <?php
            echo '<form method="post" action="?action=AjoutCom&c='.$_GET['c'].'">';
                ?>
                <label  class="col-sm-1 ">Pseudo</label>
                <?php
                    if(isset($_SESSION['pseudo'])){
                        echo '<input name="lePseudo" type="text" class="form-control mb-3" value="'.$_SESSION['pseudo'].'" placeholder="pseudo">';  
                    }
                    else {
                        echo'<input name="lePseudo" type="text" class="form-control mb-3"  placeholder="pseudo">';
                    }
                ?>   
                <span class="text-left mt-3">Zone de texte</span>
                <textarea name="leCom"class="form-control mt-3" placeholder="Entrez un commentaire"></textarea>
                <input type="submit" class="btn btn-primary mb-2" value="Confirmez"/>
            </form>
        </section>
