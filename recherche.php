<?php require_once("./Controllers/CRecherche.php"); ?>
<?php require_once('./Models/BD.php');?>

<?php
    session_start();
    if(!isset($_SESSION['ID'])){
        header('Location:/');
    }
    elseif(isset($_POST['methode'])){
        if($_POST['methode'] === "Recherche"){
            $_SESSION['IDDepartement'] = $_POST['IDDepartement'];
            $_SESSION['dateDebut'] = $_POST['dateDebut'];
            $_SESSION['dateFin'] = $_POST['dateFin'];
            afficherPagination($_POST['dateDebut'], $_POST['dateFin'], $_POST['IDDepartement']);
        }
        elseif ($_POST['methode'] === "Imprimer"){
            imprimer();
            afficher();
        }
        elseif ($_POST['methode'] === "Deco"){
            session_destroy();
        }
        else{
            afficher();
        }
    }
    elseif(isset($_GET['page'])){
        $page = $_GET['page'];
        if($page == 1){
            $_SESSION['offset'] = 0;
        }
        else{
            $_SESSION['offset'] = ($page - 1) * 9;
        }
        afficher();
    }
    else{
        afficher();
    }

?>