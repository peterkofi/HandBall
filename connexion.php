
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>FCHandball - Connexion</title>
    </head>
   
    <body>
    <?php 
  include("menu.php");
  ?>
        <div class="col-lg-6 offset-3 ">
              
            <form action=" " style="height:400px; padding:100px 40px;" method="post">
            <h1 class="text-center mt-5 pb-5">Connexion</h1>
                <div class="row mt-3">
                    <div class="col-4">
                        <label for="inputPassword6" class="col-form-label text-dark">Email</label>
                    </div>
                    <div class="col-8">
                        <input type="email" name="email" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline">
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-4">
                        <label for="inputPassword6" class="col-form-label text-dark">Mot de passe</label>
                    </div>
                    <div class="col-8">
                        <input type="password" name="motPasse" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline">
                    </div>
                </div>

                <div class="row mt-3 mb-3">
                    <div class="col-12">
                        <a href="SecGeneral.php">
                            <button type="button" name="Connexion" class=" btn btn-success form-control"> Se connecter</button>
                        </a>
                        
                    </div>
                </div>
            </form>
            
        </div>
        <?php 
  include("footer.php");
  ?>
    </body>
   
    </html>

