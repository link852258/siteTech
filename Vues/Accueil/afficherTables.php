<h1><?php echo $nomDep; ?></h1>
<?php $priorites = obtenirPriorite(); ?>
<?php while($priorite = $priorites->fetch_assoc()){ ?>
<div class="row">
    <div class="col" id="<?php echo 'mainCol'.$priorite['ORDRE']; ?>">
        <h2>Priorité <?php echo $priorite['ORDRE'];?></h2>
        <h6><?php echo $priorite['NOM']; ?></h6>
        <?php $res = obtenirTS($priorite['ORDRE'], $IDDep); ?>
        <?php $dates = obtenirDateTS($IDDep); ?>
        <?php require('indexTable.php'); ?>
    </div>
</div>
<?php }?>