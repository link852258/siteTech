<div class="modal" tabindex="-1" role="dialog" id="mdlAjoutTech">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Ajouter Technicienne</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" id="frmAjouterTechnicienne">
            <input type="hidden" id="hdnID" name="hdnID">
            <div class="form-group">
                <label for="nbrMatricule">Matricule</label>
                <input type="number" id="nbrMatricule" class="form-control" name="nbrMatricule" placeholder="XXXXXX">
            </div>
            <div class="form-group">
                <label for="txtPrenom">Prenom</label>
                <input type="text" id="txtPrenom" class="form-control" name="txtPrenom">
            </div>
            <div class="form-group">
                <label for="txtNom">Nom</label>
                <input type="text" id="txtNom" class="form-control" name="txtNom">
            </div>
            <div class="form-group">
                <label for="dteEmbauche">Date d'embauche</label>
                <input type="date" id="dteEmbauche" class="form-control" name="dteEmbauche">
            </div>
            <div class="form-group">
                <label for="txtNom">Anciennete</label>
                <input type="number" id="nbrAnciennete" class="form-control" name="nbrAnciennete">
            </div>
            <div class="form-group">
                <label for="txtTel">Téléphone</label>
                <input type="text" id="txtTel" class="form-control" name="txtTel" pattern="^\([0-9]{3}\)[0-9]{3}-[0-9]{4}$" placeholder="(XXX)XXX-XXXX">
            </div>
            <button type="submit" class="btn btn-primary" id="btnSoumettreTech" name="btnSoumettreTech">Soumettre</button>
        </form>
      </div>
      <div class="modal-footer">
            <button class="btn btn-primary" id="btnValiderTech" name="btnValiderTech" >Modifier</button>
            <button class="btn btn-danger" id="btnAnnulerTech" name="btnAnnulerTech" >Annuler</button>
      </div>
    </div>
  </div>
</div>