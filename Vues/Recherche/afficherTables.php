<h1><?php echo $nomDep; ?></h1>
<?php $priorites = obtenirPriorite(); ?>
<?php while($priorite = $priorites->fetch_assoc()){ ?>
<div class="row">
    <div class="col" id="<?php echo 'mainCol'.$i; ?>">
        <h2>Priorité <?php echo $priorite['ORDRE']; ?></h2>
        <h6><?php echo $priorite['NOM']; ?></h6>
        <?php if(isset($_SESSION['offset'])){ ?>
        <?php $res = obtenirTechniciennesSelonDate($_SESSION['IDDepartement'], $i, $_SESSION['dateDebut'],$_SESSION['dateFin'], $_SESSION['offset']); ?>
        <?php $dates = obtenirDateTSSelonDate($_SESSION['IDDepartement'], $_SESSION['dateDebut'],$_SESSION['dateFin'], $_SESSION['offset']); ?>
        <?php } ?>
        <?php require('indexTable.php'); ?>
    </div>
</div>
<?php }?>