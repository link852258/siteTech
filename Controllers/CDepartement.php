<?php require_once("./Models/Technicienne.php");?>
<?php require_once("./Models/TechDepPri.php");?>
<?php require_once("./Models/BD.php"); ?>
<?php
    function afficher($IDDep, $nomDep){
        $techs = obtenirTechniciennes();
        $priorites = obtenirPriorite();
        require_once('./Vues/Partiels/tete.php');
        require_once('./Vues/Departement/ajoutDep.php');
        require_once('./Vues/Departement/afficherDep.php');
        require_once('./Vues/Partiels/bas.php');
    }

    function AjouterTechDep($IDDEP, $IDTech, $IDPriorite, $ordre){
        insererTechDep($IDTech, $IDPriorite, $IDDEP, $ordre);
    }

    function modifierTechDep($ID){
        $TechDepPri = obtenirTechDepPriUnique($ID);
        return $TechDepPri;
    }

    function validerTechDep($ID, $IDDEP, $IDTech, $IDPriorite, $ordre){
        $TechDepPri = new TechDepPri($ID, $IDTech, $IDPriorite, $IDDEP, $ordre);
        modifierTechnicienneDep($TechDepPri);
    }

    function supprimerTechDep($NumTech){
        supprimerTechnicienneDep($NumTech);
    }

    function actualiserTableau($IDDep, $nomDep){
        require_once('./Vues/Departement/tables.php');
    }
?>