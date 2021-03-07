
        <nav class="navbar navbar-dark bg-dark">
            <a class="btn btn-light mr-1" href="?action=retourAccueil">Accueil</a>
            <a class="navbar-brand text-white ">Connexion Admin</a>
        </nav>
        <section class="jumbotron">
            <form method ="post" action="?action=seConnecter" >
                <div class="form-group row">
                  <label for="staticEmail" class="col-sm-2 col-form-label">Login</label>
                  <div class="col-sm-10">
                      <input name="login" type="text" class="form-control"  placeholder="entrez votre login">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                  <div class="col-sm-10">
                      <input type="password" class="form-control" name="password" placeholder="entrez votre password">
                  </div>
                </div>
                  <input type="submit" class="btn btn-primary mb-2" value="Confirmez"/>
            </form>
        </section>
