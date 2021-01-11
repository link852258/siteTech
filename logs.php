<?php require_once("./Controllers/CLogs.php"); ?>
<?php require_once('./Models/BD.php');?>

<?php
    session_start();
    if(!isset($_SESSION['ID'])){
        header('Location:/');
    }
    elseif ($_POST['methode'] === "Deco"){
        session_destroy();
    }
    else{
        afficher();
    }

?>