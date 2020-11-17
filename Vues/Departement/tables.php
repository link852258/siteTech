<div class="row">
    <div class="col">
    <h1><?php echo $nomDep; ?></h1>
    <h2>Priorité 1</h2>
        <?php $resultat = obtenirTechDepPri(1, $IDDep);?>
        <?php require('table.php');?>
    </div>
</div>
<div class="row">
    <div class="col">
        <h2>Priorité 2</h2>
        <?php $resultat = obtenirTechDepPri(2, $IDDep);?>
        <?php require('table.php');?>
    </div>
</div>
<div class="row">
    <div class="col">
        <h2>Priorité 3</h2>
        <?php $resultat = obtenirTechDepPri(3, $IDDep);?>
        <?php require('table.php');?>
    </div>
</div>