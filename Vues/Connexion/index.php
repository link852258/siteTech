<?php require_once('./Vues/Partiels/tete.php'); ?>
    <div class="row justify-content-center mt-5">
        <div class="col-6">
            <h1>Connexion</h1>
            <form method="POST" id="frmConnexion" action="nutrition.php">
                <div class="form-group">
                    <label for="txtNomUtilisateur">Nom d'utilisateur</label>
                    <input type="text" id="txtNomUtilisateur" class="form-control" name="txtNomUtilisateur">
                </div>
                <div class="form-group">
                    <label for="psdMDP">Mot de passe</label>
                    <input type="password" id="psdMDP" class="form-control" name="psdMDP" autocomplete="current-password">
                </div>
                <button type="submit" class="btn btn-dark" id="btnSoumettre" name="btnSoumettre">Soumettre</button>
            </form>
        </div>
    </div>
<?php require_once('./Vues/Partiels/bas.php'); ?>