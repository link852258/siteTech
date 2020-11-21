<?php require_once("./Controllers/CIndexNutDis.php"); ?>
<?php require_once('./Models/BD.php');?>
<?php require_once('./Models/GestionTSPriorite.php');?>

<?php
    session_start();
    if(isset($_POST['methode'])){
        if($_POST['methode'] === "Ajout"){
            cAjouter();
            cAfficherIndex(2, "Distribution");
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
            afficher(2, "Distribution");
        }
    }
    else{
        afficher(2, "Distribution");
    }

?>