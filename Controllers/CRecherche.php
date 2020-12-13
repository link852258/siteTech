<?php require_once("./Models/BD.php"); ?>
<?php

    function afficher(){
        require_once('./Vues/Partiels/tete.php');
        require_once('./Vues/Recherche/afficherRechercher.php');
        require_once('./Vues/Partiels/bas.php');
    }

?>