<div class="modal" tabindex="-1" role="dialog" id="mdlAjoutTS">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Ajouter TS</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" id="frmAjouterTS">
            <input type="hidden" id="hdnIDDep" name="hdnIDDep" value="1">
            <div class="form-group">
                <label for="dteDate">Dates</label>
                <input type="date" id="dteDate" name="dteDate" required>
            </div>
            <div class="form-group">
                <label for="txtPoste">Poste</label>
                <input type="text" id="txtPoste" name="txtPoste" required>
            </div>
            <?php for($i = 1; $i <= 3; $i++){ ?>
            <div class="form-group">
                <label for="dteDate"><?php echo "Priorité ".$i?></label>
            </div>
            <div class="form-group row">
              <?php $resTechTS = obtenirTechTS($i,$IDDep); ?>
                <?php require('selectTechTS.php'); ?>
            </div>
            <?php } ?>
            <button type="submit" class="btn btn-primary" id="btnSoumettre" name="btnSoumettre">Soumettre</button>
        </form>
      </div>
      <div class="modal-footer">
            <button class="btn btn-primary" id="btnValider" name="btnValider" >Modifier</button>
            <button class="btn btn-danger" id="btnAnnuler" name="btnAnnuler" >Annuler</button>
      </div>
    </div>
  </div>
</div>