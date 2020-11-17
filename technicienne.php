<?php
    require_once("./Controllers/CTechnicienne.php");
    if(isset($_POST['methode'])){
        if($_POST['methode'] === "Ajout"){
            AjouterTech($_POST['matricule'], $_POST['prenom'], $_POST['nom'], $_POST['anciennete'], $_POST['telephone']);
            actualiserTableau();
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
            $techs = obtenirTechniciennes();
            afficher($techs);
        }
    }
    else{
        $techs = obtenirTechniciennes();
        afficher($techs);
    }
?>