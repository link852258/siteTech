<?php for($i = 1; $i <= 3; $i++){?>
<div class="row">
    <div class="col" id="<?php echo 'mainCol'.$i; ?>">
        <h2><?php echo 'Priorité '.$i;?></h2>
        <?php $res = obtenirTS($i, $IDDep); ?>
        <?php $dates = obtenirDateTS($i, $IDDep); ?>
        <?php require('indexTable.php'); ?>
    </div>
</div>
<?php }?>