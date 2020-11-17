<table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">Nom</th>
            <th scope="col">Ordre</th>
            <th scope="col">Modifier</th>
            <th scope="col">Supprimer</th>
        </tr>
    </thead>
    <tbody>
    <?php while($range = $resultat->fetch_assoc()){ ?>
        <tr>
        
            <td> <?php echo $range['NOMCOMPLET']; ?> </td>
            <td> <?php echo $range['ORDRE']; ?> </td>
            <td> <button class="btn btn-primary" value="<?php echo $range['ID']; ?>" data-toggle="modal" data-target="#mdlAjoutTechDep">Modifier</button> </td>
            <td> <button class="btn btn-danger" value="<?php echo $range['ID']; ?>">Supprimer</button> </td>
        </tr>
    <?php } ?>
    </tbody>
</table>