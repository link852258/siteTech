<?php require_once("./Controllers/CIndex.php"); ?>
<?php require_once('./Models/BD.php');?>
<?php require_once('./Models/GestionTSPriorite.php');?>

<?php

    if(isset($_POST['methode'])){
        if($_POST['methode'] === "Ajout"){
            cAjouter();
            cAfficherIndex();
        }
        elseif ($_POST['methode'] === "Modifier"){
            $tech = modifierTech($_POST['ID']);
            echo json_encode($tech);
        }
        elseif ($_POST['methode'] === "Valider"){
            validerTech($_POST['ID'], $_POST['matricule'], $_POST['prenom'], $_POST['nom'], $_POST['anciennete'], $_POST['telephone']);
            actualiserTableau();
        }
        elseif ($_POST['methode'] === "Supprimer"){
            supprimerTech($_POST['matricule']);
            actualiserTableau();
        }
        else{
            afficher();
        }
    }
    else{
        afficher();
    }

?>