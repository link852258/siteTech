<?php require_once("./Models/Technicienne.php");?>
<?php require_once("./Models/BD.php"); ?>
<?php
    function afficher($techs){
        require_once('./Vues/Partiels/tete.php');
        require_once('./Vues/Technicienne/afficherTech.php');
        require_once('./Vues/Technicienne/ajoutTech.php');
        require_once('./Vues/Partiels/bas.php');
    }

    function AjouterTech($matricule, $prenom, $nom, $anciennete, $telephone){
        $tech = new Technicienne($matricule, $prenom, $nom, $anciennete);
        $tech->setTel($telephone);
        insererTechnicienne($tech);
    }

    function modifierTech($ID){
        $tech = obtenirTechnicienne($ID);
        return $tech;
    }

    function validerTech($ID, $matricule, $prenom, $nom, $anciennete, $telephone){
        $tech = new Technicienne($matricule, $prenom, $nom, $anciennete);
        $tech->setID($ID);
        $tech->setTel($telephone);
        modifierTechnicienne($tech);
    }

    function supprimerTech($NumTech){
        supprimerTechnicienne($NumTech);
    }

    function actualiserTableau(){
        $techs = obtenirTechniciennes();
        require_once('./Vues/Technicienne/modSupTech.php');
    }
?>