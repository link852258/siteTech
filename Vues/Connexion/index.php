<!DOCTYPE html>
<html>
    <head>
        <title>Technicienne</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    </head>
    <body>
        <div class="container">
            <div class="row justify-content-center ">
                <div class="col-6">
                    <h1>Connexion</h1>
                    <form method="POST" id="frmConnexion" action="nutrition.php">
                        <div class="form-group">
                            <label for="txtNomUtilisateur">Nom d'utilisateur</label>
                            <input type="text" id="txtNomUtilisateur" class="form-control" name="txtNomUtilisateur">
                        </div>
                        <div class="form-group">
                            <label for="psdMDP">Mot de passe</label>
                            <input type="password" id="psdMDP" class="form-control" name="psdMDP">
                        </div>
                        <button type="submit" class="btn btn-primary" id="btnSoumettre" name="btnSoumettre">Soumettre</button>
                    </form>
                </div>
            </div>


<?php require_once('./Vues/Partiels/bas.php'); ?>