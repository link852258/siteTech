<div class="modal" tabindex="-1" role="dialog" id="mdlAjoutTechDep">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Ajouter Technicienne</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" id="frmAjouterTechnicienneDep">
            <input type="hidden" id="hdnIDPrincipal" name="hdnIDPrincipal" value="">
            <input type="hidden" id="hdnIDDep" name="hdnIDDep" value="<?php echo $IDDep; ?>">
            <div class="form-group">
                <label for="slcTechnicienne">Techniciennes</label>
                <select id="slcTechnicienne" class="form-control" name="slcTechnicienne">
                    <?php foreach($techs as &$tech ){ ?>
                        <option value="<?php echo $tech->obtenirID(); ?>"> <?php echo $tech->obtenirMatricule().", ".$tech->obtenirPrenom(); ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="slcPriorite">Priorité</label>
                <select id="slcPriorite" class="form-control" name="slcPriorite">
                    <?php while($range = $priorites->fetch_assoc()){ ?>
                        <option value="<?php echo $range['IDPRIORITE']; ?>"> <?php echo "Priorité ".$range['ORDRE'];; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="nbrOrdre">Ordre</label>
                <input type="number" id="nbrOrdre" class="form-control" name="nbrOrdre">
            </div>
            <button type="submit" class="btn btn-primary" id="btnSoumettreDepartement" name="btnSoumettreDepartement">Soumettre</button>
        </form>
      </div>
      <div class="modal-footer">
            <button class="btn btn-primary" id="btnValiderDepartement" name="btnValiderDepartement" >Modifier</button>
            <button class="btn btn-danger" id="btnAnnulerDepartement" name="btnAnnulerDepartement" >Annuler</button>
      </div>
    </div>
  </div>
</div>