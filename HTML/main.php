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
                        <form method="post" action="./acceuil.php">
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

        <?php 
        include 'bootstrap.php';
        ?>
    </body>
</html>