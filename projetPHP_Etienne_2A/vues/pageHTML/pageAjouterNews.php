

        <nav class="navbar navbar-dark bg-dark">
            <a class="btn btn-light mr-1" href="?action=retourAccueil">Accueil</a>
            <a class="navbar-brand text-white ">Ajouter une news</a>
            
        </nav>
        <section class="jumbotron">
            <form method="post" action="?action=AjouterNews">
                <div class="form-group row">
                  <label  class="col-sm-2 ">titre</label>
                  <div class="col-sm-10">
                      <input name="leTitre" type="text" class="form-control" id="titreNews" placeholder="titre">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Resume</label>
                  <div class="col-sm-10">
                      <input name="lArticle" type="text" class="form-control" id="resumeNews" placeholder="resume de la news">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Date</label>
                  <div class="col-sm-10">
                      <input name="laDate" type="date" class="form-control" id="date">
                  </div>
                </div>
                <input type="submit" class="btn btn-primary mb-2" value="Confirmez"/>
            </form>
        </section>

