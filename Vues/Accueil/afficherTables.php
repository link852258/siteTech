<div class="row">
    <div class="col" id="mainCol1">
        <?php $res = obtenirTS(1, $IDDep); ?>
        <?php $dates = obtenirDateTS(1, $IDDep); ?>
        <?php require('indexTable.php'); ?>
    </div>
</div>
<div class="row">
    <div class="col" id="mainCol2">
        <?php $res = obtenirTS(2, $IDDep); ?>
        <?php $dates = obtenirDateTS(2, $IDDep); ?>
        <?php require('indexTable.php'); ?>
    </div>
</div>
<div class="row">
    <div class="col" id="mainCol3">
        <?php $res = obtenirTS(3, $IDDep); ?>
        <?php $dates = obtenirDateTS(3, $IDDep); ?>
        <?php require('indexTable.php'); ?>
    </div>
</div>