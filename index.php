<?php require_once("./Controllers/CIndex.php"); ?>
<?php require_once('./Models/BD.php');?>

<?php
    session_start();

    if(isset($_SESSION['ID'])){
        header('Location:/nutrition.php');
    }
    else{
        if(isset($_POST['nomUtilisateur'])  && isset($_POST['MDP']) ){

            $resulat = connexion($_POST['nomUtilisateur'], $_POST['MDP']);
            if(!is_null($resulat)){
                $_SESSION['ID'] = $resulat['ID'];
                $_SESSION['prenom'] = $resulat['PRENOM'];
                $_SESSION['admin'] = $resulat['ADMIN'];
            }
        }
        elseif ($_POST['methode'] === "Deco"){
            session_destroy();
        }
        else{
            afficher();
        }
    }
?>