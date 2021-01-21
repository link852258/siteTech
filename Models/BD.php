<?php
    function ouvrirConnection(){ 
        $serveur = "localhost";
        $nomUtilisateur = "TECHNICIENNE";
        $MDP = "Technicienne123!";
        $nomDB = "Technicienne";
        $conn = new mysqli($serveur, $nomUtilisateur, $MDP, $nomDB);
        return $conn;
    }

    require_once("./Models/BDTechnicienne.php");

    function obtenirTechDepPri($IDPriorite, $IDDep){
        $conn = ouvrirConnection();
        $sql= "CALL GETTECHDEPPRI(?,?);";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ii",$IDPriorite, $IDDep);
        $stmt->execute();
        $resultat = $stmt->get_result();
        $conn->close();
        return $resultat;
    }

    function obtenirPriorite(){
        $conn = ouvrirConnection();
        $sql= "CALL GETPRIORITE();";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $resultat = $stmt->get_result();
        $conn->close();
        return $resultat;
    }

    function insererTechDep($IDTech, $IDPriorite, $IDDEP, $ordre){
        $conn = ouvrirConnection();
        $sql= "CALL INSERERTECHDEP(?,?,?,?,?);";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("iiiii", $IDTech, $IDPriorite, $IDDEP, $ordre, $_SESSION['ID']);
        $stmt->execute();
        $conn->close();
    }

    function supprimerTechnicienneDep($ID){
        $conn = ouvrirConnection();
        $sql= "CALL DELETETECHDEP(?,?);";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ii", $ID, $_SESSION['ID']);
        $stmt->execute();
        $conn->close();
    }

    //Methode pour retrouver les informations avant la modification d'une technicienne dans son departement
    function obtenirTechDepPriUnique($ID){
        $conn = ouvrirConnection();
        $sql = "CALL GETTECHDEPPRIUNIQUE(?);";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i",$ID);
        $stmt->execute();
        $resultat = $stmt->get_result();
        $conn->close();
        $res = $resultat->fetch_assoc();
        $TechDepPri = new TechDepPri($res['ID'], $res['IDTECH'], $res['IDPRIORITE'], $res['IDDEP'], $res['ORDRE']);
        return $TechDepPri;
    }

    function modifierTechnicienneDep($TechDepPri){
        $conn = ouvrirConnection();
        $sql = "CALL UPDATETECHDEPPRI(?,?,?,?,?,?);";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("iiiiii",$TechDepPri->ID, $TechDepPri->IDTech, $TechDepPri->IDPri, $TechDepPri->IDDep, $TechDepPri->ordre, $_SESSION['ID']);
        $stmt->execute();
        $resultat = $stmt->get_result();
        $conn->close();
    }

    function obtenirReponseTS(){
        $conn = ouvrirConnection();
        $sql = "CALL OBTENIRREPONSETS();";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $resultat = $stmt->get_result();
        $conn->close();
        return $resultat;
    }

    function obtenirTechTS($IDPri, $IDDep){
        $conn = ouvrirConnection();
        $sql = "CALL OBTENIRTECHNICIENNETS(?,?);";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ii",$IDPri,$IDDep);
        $stmt->execute();
        $resultat = $stmt->get_result();
        $conn->close();
        return $resultat;
    }

    //Modifie l'ordre des techniciennes dans la BD
    function modifierTechOrdre($liste){
        $conn = ouvrirConnection();
        $sql = "CALL MODIFIERORDRETECH(?,?);";
        $stmt = $conn->prepare($sql);
        foreach($liste as $ordre ){
            $stmt->bind_param("ii",$ordre->ID,$ordre->ordre);
            $stmt->execute();
        }
        $conn->close();
    }

    function obtenirTS($IDPri, $IDDep){
        $conn = ouvrirConnection();
        $sql = "CALL OBTENIRTS2(?,?);";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ii",$IDPri,$IDDep);
        $stmt->execute();
        $resultat = $stmt->get_result();
        $conn->close();
        return $resultat;
    }

    function obtenirDateTS($IDDep){
        $conn = ouvrirConnection();
        $sql = "CALL OBTENIRDATETS2(?);";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $IDDep);
        $stmt->execute();
        $resultat = $stmt->get_result();
        $conn->close();
        return $resultat;
    }

    function obtenirDescriptionTS($IDTech, $IDPriorite, $IDDep){
        $conn = ouvrirConnection();
        $sql = "CALL OBTENIRDESCRIPTION2(?,?,?);";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("iii",$IDTech, $IDPriorite, $IDDep);
        $stmt->execute();
        $resultat = $stmt->get_result();
        $conn->close();
        return $resultat;
    }

    function insererTS($poste){
        $conn = ouvrirConnection();
        $sql = "CALL INSERERTS(?,?);";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("si", $poste, $_SESSION['ID']);
        $stmt->execute();
        $conn->close();
    }

    function insererTSDPT($liste){
        $conn = ouvrirConnection();
        $sql = "CALL INSERER_TSDPT(?,?);";
        $stmt = $conn->prepare($sql);
        foreach($liste as $ordre ){
            $stmt->bind_param("ii", $ordre->ID, $ordre->raison);
            $stmt->execute();
        }
        $conn->close();
    }

    //Inserer la date du TS dans la table DATETS
    function insererDateTS($date){
        $conn = ouvrirConnection();
        $sql = "CALL INSERERDATETS(?);";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $date);
        $stmt->execute();
        $conn->close();
    }

    //Rechercher un groupe de TS selon une date
    function pagination($dateDeDebut, $dateDeFin, $IDDepartement){
        $conn = ouvrirConnection();
        $sql = "SELECT CREERPAGINATION(?,?,?) AS NBPAGE;";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssi", $dateDeDebut, $dateDeFin, $IDDepartement);
        $stmt->execute();
        $resulat = $stmt->get_result();
        $res = $resulat->fetch_assoc();
        $conn->close();
        return $res['NBPAGE'];
    }

    function obtenirTechniciennesSelonDate($IDDepartement, $IDPriorite, $dateDeDebut, $dateDeFin, $offset){
        $conn = ouvrirConnection();
        $sql = "CALL OBTENIR_TECHNICIENNES_TS_SELON_DATE(?,?,?,?,?);";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("iissi", $IDDepartement, $IDPriorite, $dateDeDebut, $dateDeFin, $offset);
        $stmt->execute();
        $resulat = $stmt->get_result();
        $conn->close();
        return $resulat;
    }

    function obtenirDateTSSelonDate($IDDepartement, $dateDeDebut, $dateDeFin, $offset){
        $conn = ouvrirConnection();
        $sql = "CALL DATE_TS_PAR_DATE(?,?,?,?);";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("issi", $IDDepartement, $dateDeDebut, $dateDeFin, $offset);
        $stmt->execute();
        $resulat = $stmt->get_result();
        $conn->close();
        return $resulat;
    }

    function obtenirDescriptionTSSelonDate($IDTech, $IDPriorite, $IDDepartement, $dateDeDebut, $dateDeFin, $offset){
        $conn = ouvrirConnection();
        $sql = "CALL DESCRIPTION_TS_PAR_DATE(?,?,?,?,?,?);";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("iiissi", $IDTech, $IDPriorite, $IDDepartement, $dateDeDebut, $dateDeFin, $offset);
        $stmt->execute();
        $resulat = $stmt->get_result();
        $conn->close();
        return $resulat;
    }

    function obtenirDepartement(){
        $conn = ouvrirConnection();
        $sql = "CALL OBTENIR_DEPARTEMENT();";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $resulat = $stmt->get_result();
        $conn->close();
        return $resulat;
    }

    function obtenirPosteSelonDepartement($IDDepartement){
        $conn = ouvrirConnection();
        $sql = "CALL OBTENIR_POSTES_SELON_DEPARTEMENT(?);";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $IDDepartement);
        $stmt->execute();
        $resulat = $stmt->get_result();
        $conn->close();
        return $resulat;
    }

    function obtenirLogs(){
        $conn = ouvrirConnection();
        $sql = "CALL OBTENIRLOGS();";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $resulat = $stmt->get_result();
        $conn->close();
        return $resulat;
    }

    function obtenirDernierTS($IDDepartement){
        $conn = ouvrirConnection();
        $sql = "CALL OBTENIR_LE_DERNIER_TS(?);";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $IDDepartement);
        $stmt->execute();
        $resultat = $stmt->get_result();
        $dernierTS = $resultat->fetch_assoc();
        $conn->close();
        return $dernierTS;
    }



    function supprimerLeDernierTS($IDTS, $IDDepartement){
        $conn = ouvrirConnection();
        $sql = "CALL SUPPRIMER_LE_DERNIER_TS(?,?,?);";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("iii", $IDTS, $IDDepartement, $_SESSION['ID']);
        $stmt->execute();
        $conn->close();
    }
?>