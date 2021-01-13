<?php $priorites = obtenirPriorite(); ?>
<?php while($priorite = $priorites->fetch_assoc()){ ?>
<div class="row">
    <div class="col">
    <h2>Priorité <?php echo $priorite['ORDRE']; ?></h2>
    <h6><?php echo $priorite['NOM']; ?></h6>
        <?php $resultat = obtenirTechDepPri($priorite['ORDRE'], $IDDep);?>
        <?php require('table.php');?>
    </div>
</div>
<?php } ?>