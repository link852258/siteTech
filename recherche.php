<?php require_once("./Controllers/CRecherche.php"); ?>
<?php require_once('./Models/BD.php');?>

<?php
    session_start();
    if(!isset($_SESSION['ID'])){
        header('Location:/');
    }
    elseif(isset($_POST['methode'])){
        if($_POST['methode'] === "Ajout"){
            afficher(1, "Nutrition");
        }
        elseif ($_POST['methode'] === "Deco"){
            session_destroy();
        }
        else{
            afficher();
        }
    }
    else{
        afficher();
    }

?>