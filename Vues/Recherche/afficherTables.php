<h1><?php echo $nomDep; ?></h1>
<?php for($i = 1; $i <= 3; $i++){?>
<div class="row">
    <div class="col" id="<?php echo 'mainCol'.$i; ?>">
        <h2><?php echo 'Priorité '.$i;?></h2>
        <?php if(isset($_SESSION['offset'])){ ?>
        <?php $res = obtenirTechniciennesSelonDate($_SESSION['IDDepartement'], $i, $_SESSION['dateDebut'],$_SESSION['dateFin'], $_SESSION['offset']); ?>
        <?php $dates = obtenirDateTSSelonDate($_SESSION['IDDepartement'], $_SESSION['dateDebut'],$_SESSION['dateFin'], $_SESSION['offset']); ?>
        <?php } ?>
        <?php require('indexTable.php'); ?>
    </div>
</div>
<?php }?>