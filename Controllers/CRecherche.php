<?php require_once("./Models/Rechercher.php"); ?>
<?php require_once("./Models/BD.php"); ?>
<?php require_once("./Models/Impression.php"); ?>
<?php

    function afficher(){
        require_once('./Vues/Partiels/tete.php');
        require_once('./Vues/Recherche/afficherRechercher.php');
        require_once('./Vues/Partiels/bas.php');
    }

    function afficherPagination($dateDeDebut, $dateDeFin, $IDDepartement){
        $nbPage = creerPagination($dateDeDebut, $dateDeFin, $IDDepartement);
        $_SESSION['nbPage'] = $nbPage;
        if($nbPage != 0)
            echo $nbPage;
    }
    
    function creerPagination($dateDeDebut, $dateDeFin, $IDDepartement){
        $nbPage = pagination($dateDeDebut, $dateDeFin, $IDDepartement);
        return $nbPage;
    }
    
    function imprimer(){
        genererFichier();
    }



?>