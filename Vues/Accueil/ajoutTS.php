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
                <label for="slcPoste">Poste</label>
                <?php $postes = obtenirPosteSelonDepartement($IDDep)?>
                <select id="slcPoste" class="col-8 custom-select form-control" name="slcPoste" required>
                    <?php while($poste = $postes->fetch_assoc()){ ?>
                    <option value="<?php echo $poste['ACRONYME']; ?>"> <?php echo $poste['NOMPOSTE']; ?></option>
                    <?php } ?>
                </select>
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
            <button type="submit" class="btn btn-primary" id="btnSoumettreTS" name="btnSoumettreTS">Soumettre</button>
        </form>
      </div>
      <div class="modal-footer">
            <button class="btn btn-primary" id="btnValiderTS" name="btnValiderTS" >Modifier</button>
            <button class="btn btn-danger" id="btnAnnulerTS" name="btnAnnulerTS" >Annuler</button>
      </div>
    </div>
  </div>
</div>