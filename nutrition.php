<?php
    require_once("./Controllers/CDepartement.php");
    if(isset($_POST['methode'])){
        if($_POST['methode'] === "Ajout"){
            AjouterTechDep($_POST['hdnID'], $_POST['IDTech'], $_POST['IDPriorite'], $_POST['ordre']);
            actualiserTableau(1,"Nutrition");
        }
        elseif ($_POST['methode'] === "Modifier"){
            $TechDepPri = modifierTechDep($_POST['ID']);
            
            echo json_encode($TechDepPri);
        }
        elseif ($_POST['methode'] === "Valider"){
            validerTechDep($_POST['ID'], $_POST['hdnID'], $_POST['IDTech'], $_POST['IDPriorite'], $_POST['ordre']);
            actualiserTableau(1,"Nutrition");
        }
        elseif ($_POST['methode'] === "Supprimer"){
            supprimerTechDep($_POST['ID']);
            actualiserTableau(1,"Nutrition");
        }
        else{
            afficher(1,"Nutrition");
        }
    }
    else{
        afficher(1,"Nutrition");
    }
?>