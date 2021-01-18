<div class="row">
    <div class="col" id="main">
        <?php require_once('afficherTables.php'); ?>
    </div>
</div>
<div class="row">
    <div class="col">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#mdlAjoutTS">
            Ajouter TS
        </button>
        <button id="btnSupprimerTS" type="button" class="btn btn-danger" value="<?php echo $dernierTS['MAXTS'];?>" >
            Supprimer TS
        </button>
    </div>
</div>