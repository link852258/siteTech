<table class="table table-bordered">
    <thead class="thead-dark">
        <tr>
            <th scope="col">Nom\Date</th>
            <?php while($range = $dates->fetch_assoc()){ ?>
            <th><?php echo $range['DATETS'];?></th>
            <?php } ?>
        </tr>
    </thead>
    <tbody>
    <?php while($range = $res->fetch_assoc()){ ?>
        <tr>
            <td><?php echo $range['NOMCOMPLET']; ?></td>
            <?php $descriptions = obtenirDescriptionTS($range['IDTECH'], $range['IDPRIORITE'], $range['IDDEP']); ?>
            <?php while($description = $descriptions->fetch_assoc()){ ?>
                <td><?php if(is_null($description['DESCRIPTION'])) echo 'N/A'; else echo $description['DESCRIPTION']; ?></td>
            <?php } ?>
        </tr>
    <?php } ?>
    </tbody>
</table>