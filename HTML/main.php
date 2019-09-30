<?php session_start();
session_unset();
?>
<!DOCTYPE HTLM>
<html lang="fr">
    <meta charset="utf-8">
    <title>
        Acceuil
    </title>

    <body>
        <center>
            <div class = "row">
                <section class = "col-lg-4 offset-lg-4">
                    <br><br>
                    <div class = "jumbotron">
                        <form method="post" action="">
                            <h1>
                                Connexion CashCash
                            </h1>
                            <br>
                            <div class= "offset-1">
                                <div class="form-group row">
                                    <label for="inputId" class="col-4 col-form-label">Login: </label> 
                                    <div class="col-lg-5">
                                        <input name="identifiant" type="text" class="form-control " placeholder="" id="identifiant">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPwd" class="col-4 col-form-label">Mot de passe: </label> 
                                    <div class="col-lg-5">
                                        <input name="motdepasse" type="password" class="form-control" placeholder="" id="motdepasse">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <button name="submit" type="submit" class="btn btn-primary">Se Connecter</button>

                        </form>

                    </div>
                </section>
            </div>

        </center>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" 
                crossorigin="anonymous"></script>
    </body>
</html>