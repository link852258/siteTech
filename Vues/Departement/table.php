<table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">Nom</th>
            <th scope="col">Ordre</th>
            <th scope="col">Modifier</th>
            <?php if($_SESSION['admin'] == 1) { ?>
            <th scope="col">Supprimer</th>
            <?php } ?>
        </tr>
    </thead>
    <tbody>
    <?php while($range = $resultat->fetch_assoc()){ ?>
        <tr>
        
            <td> <?php echo $range['NOMCOMPLET']; ?> </td>
            <td> <?php echo $range['ORDRE']; ?> </td>
            <td> <button class="btn btn-primary" value="<?php echo $range['ID']; ?>" data-toggle="modal" data-target="#mdlAjoutTechDep">Modifier</button> </td>
            <?php if($_SESSION['admin'] == 1) { ?>
            <td> <button class="btn btn-danger" value="<?php echo $range['ID']; ?>">Supprimer</button> </td>
            <?php } ?>
        </tr>
    <?php } ?>
    </tbody>
</table>