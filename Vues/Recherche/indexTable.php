<table class="table table-bordered">
    <thead class="thead-dark">
        <tr>
            <th style="width:200px" scope="col">Nom\Date</th>
            <?php if(isset($_SESSION['offset'])){ ?>
                <?php while($date = $dates->fetch_assoc()){ ?>
                <th style="width:200px" ><?php echo $date['DATETS'];?></th>
                <?php } ?>
            <?php } ?>
        </tr>
    </thead>
    <tbody>

    <?php if(isset($_SESSION['offset'])){ ?>
        <?php while($technicienne = $techniciennes->fetch_assoc()){ ?>
            <tr>
                <td><?php echo $technicienne['NOMCOMPLET']; ?></td>
                <?php $descriptions = obtenirDescriptionTSSelonDate($technicienne['IDTECH'], $technicienne['IDPRIORITE'], $technicienne['IDDEP'], $_SESSION['dateDebut'], $_SESSION['dateFin'], $_SESSION['offset']); ?>
                <?php while($description = $descriptions->fetch_assoc()){ ?>
                    <td><?php if(is_null($description['DESCRIPTION'])) echo 'N/A'; else echo $description['DESCRIPTION']." ".$description['ORDRE']; ?></td>
                <?php }?>
            </tr>
        <?php }?>
    <?php } ?>
    </tbody>
</table>