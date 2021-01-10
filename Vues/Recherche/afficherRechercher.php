<div class="row">
    <div class="col">
        <form id="frmRechercher" class="form-inline">
            <div class="form-group mr-3">
                <label for="dteDebut" class="mr-1">Date de Début</label>
                <input type="date" id="dteDebut" class="form-control" name="dteDebut">
            </div>
            <div class="form-group mr-3">
                <label for="dteFin" class="mr-1">Date de Fin</label>
                <input type="date" id="dteFin" class="form-control" name="dteFin">
            </div>
            <div class="form-group mr-3">
                <label for="slcDepartement" class="mr-1">Departement</label>
                <select id="slcDepartement" class="form-control" name="slcDepartement">
                    <?php $departements = obtenirDepartement(); ?>
                    <?php while($departement = $departements->fetch_assoc()){ ?>
                        <option value="<?php echo $departement['IDDEP']; ?>"> <?php echo $departement['NOMDEP']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Soumettre</button>
        
        </form>
    </div>
</div>
<div class="row">
    <div class="col" id="mainCol">
    <?php require_once('afficherTables.php'); ?>
    </div>
</div>
<div class="row">
    <div class="col" id="PaginationTable">
    <?php if(isset($_SESSION['nbPage'])){ ?>
        <?php $nbPage = $_SESSION['nbPage']; ?>
        <?php require_once('pagination.php'); ?>
    <?php } ?>
    </div>
</div>