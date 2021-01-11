<table class="table table-bordered">
    <thead class="thead-dark">
        <tr>
            <th style="width:200px" scope="col">Nom\Date</th>
            <?php while($date = $dates->fetch_assoc()){ ?>
            <th style="width:200px" ><?php echo $date['DATETS'];?></th>
            <?php } ?>
        </tr>
    </thead>
    <tbody>
    <?php while($range = $res->fetch_assoc()){ ?>
        <tr>
            <td><?php echo $range['NOMCOMPLET']; ?></td>
            <?php $descriptions = obtenirDescriptionTSSelonDate($range['IDTECH'], $range['IDPRIORITE'], $range['IDDEP'], $_SESSION['dateDebut'], $_SESSION['dateFin'], $_SESSION['offset']); ?>
            <?php while($description = $descriptions->fetch_assoc()){ ?>
                <td><?php if(is_null($description['DESCRIPTION'])) echo 'N/A'; else echo $description['DESCRIPTION']." ".$description['ORDRE']; ?></td>
            <?php }?>
        </tr>
    <?php }?>
    </tbody>
</table>