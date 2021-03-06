<h1>Techniciennes</h1>
<table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">Matricule</th>
            <th scope="col">Prenom</th>
            <th scope="col">Nom</th>
            <th scope="col">Date d'embauche</th>
            <th scope="col">Ancienneté</th>
            <th scope="col">Modifier</th>
            <?php if($_SESSION['admin'] == 1) {?>
            <th scope="col">Supprimer/Réactiver</th>
            <?php } ?>
        </tr>
    </thead>
    <tbody>
    <?php foreach($techs as &$tech ){ ?>
        <tr>
            <td> <?php echo $tech->obtenirMatricule(); ?> </td>
            <td> <?php echo $tech->obtenirPrenom(); ?> </td>
            <td> <?php echo $tech->obtenirNom(); ?> </td>
            <td> <?php echo $tech->obtenirDateEmbauche(); ?> </td>
            <td> <?php echo $tech->obtenirAnc(); ?> </td>
            <td> <button class="btn btn-primary" value="<?php echo $tech->obtenirID(); ?>" data-toggle="modal" data-target="#mdlAjoutTech">Modifier</button> </td>
            <?php if($_SESSION['admin'] == 1) {?>
                <?php if($tech->obtenirActive() == false) {?>
                    <td> <button class="btn btn-success btnReactiver" value="<?php echo $tech->obtenirID(); ?>">Réactiver</button> </td>
                <?php }else{?>
                    <td> <button class="btn btn-danger btnSupprimerTech" value="<?php echo $tech->obtenirID(); ?>">Supprimer</button> </td>
                <?php }?>
            <?php } ?>
        </tr>
    <?php } ?>
    </tbody>
</table>