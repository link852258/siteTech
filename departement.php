<?php
    require_once("./Controllers/CDepartement.php");
    session_start();

    if(!isset($_SESSION['ID'])){
        header('Location:/');
    }
    else if(isset($_POST['methode'])){
        if($_POST['methode'] === "Ajout"){
            AjouterTechDep($_POST['hdnID'], $_POST['IDTech'], $_POST['IDPriorite'], $_POST['ordre']);
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
        elseif ($_POST['methode'] === "Deco"){
            session_destroy();
        }
        else{
            $techs = obtenirTechniciennes();
            afficher($techs);
        }
    }
    else{
        afficher();
    }
?>