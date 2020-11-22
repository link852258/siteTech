<?php
    require_once("./Controllers/CDepartement.php");
    session_start();
    if(!isset($_SESSION['ID'])){
        header('Location:/');
    }
    else if(isset($_POST['methode'])){
        if($_POST['methode'] === "Ajout"){
            AjouterTechDep($_POST['hdnID'], $_POST['IDTech'], $_POST['IDPriorite'], $_POST['ordre']);
            actualiserTableau(2, "Distribution");
        }
        elseif ($_POST['methode'] === "Modifier"){
            $TechDepPri = modifierTechDep($_POST['ID']);
            
            echo json_encode($TechDepPri);
        }
        elseif ($_POST['methode'] === "Valider"){
            validerTechDep($_POST['ID'], $_POST['hdnID'], $_POST['IDTech'], $_POST['IDPriorite'], $_POST['ordre']);
            actualiserTableau(2, "Distribution");
        }
        elseif ($_POST['methode'] === "Supprimer"){
            supprimerTechDep($_POST['ID']);
            actualiserTableau(2, "Distribution");
        }
        elseif ($_POST['methode'] === "Deco"){
            session_destroy();
        }
        else{
            afficher(2, "Distribution");
        }
    }
    else{
        afficher(2, "Distribution");
    }
?>