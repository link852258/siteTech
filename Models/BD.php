<?php
    function ouvrirConnection(){ 
        $serveur = "localhost";
        $nomUtilisateur = "root";
        $MDP = "Ganon753!";
        $nomDB = "Technicienne";
        $conn = new mysqli($serveur, $nomUtilisateur, $MDP, $nomDB);
        return $conn;
    }
    
    function connexionTechnicienne($nomUtilisateur, $MDP){
        $conn = ouvrirConnection();
        $sql= "CALL CONNEXIONTECHNICIENNE(?,?);";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("is",$nomUtilisateur,$MDP);
        $stmt->execute();
        $resultat = $stmt->get_result();
        $conn->close();
        return $resultat;
        
    }
    
    function insererTechnicienne($tech){
        $conn = ouvrirConnection();
        $sql= "CALL INSERERTECH(?,?,?,?,?,?,?);";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssisi",$tech->obtenirMatricule(),$tech->obtenirNom(),$tech->obtenirPrenom(), $tech->obtenirDateEmbauche(), $tech->obtenirAnc(), $tech->obtenirTel(), $_SESSION['ID']);
        $stmt->execute();
        $conn->close();
    }

    function modifierTechnicienne($tech){
        $conn = ouvrirConnection();
        $sql = "CALL MODIFIER_UNE_TECHNICIENNE(?,?,?,?,?,?,?,?);";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("issssisi", $tech->obtenirID(), $tech->obtenirMatricule(), $tech->obtenirNom(), $tech->obtenirPrenom(), $tech->obtenirDateEmbauche(), $tech->obtenirAnc(), $tech->obtenirTel(), $_SESSION['ID']);
        $stmt->execute();
        $conn->close();
    }

    function obtenirTechniciennes(){
        $conn = ouvrirConnection();
        $sql = "select * from TECHNICIENNES where ACTIVE = 1;";
        $resultat = $conn->query($sql);
        $conn->close();
        $techs = array();
        while($range = $resultat->fetch_assoc()){
            $tech = new Technicienne($range['MATRICULE'], $range['PRENOM'], $range['NOM'], $range['DATEEMBAUCHE'], $range['ANCIENNETE']);
            $tech->setID($range['ID']);
            array_push($techs, $tech);
        }
        return $techs;
    }

    function obtenirTechnicienne($ID){
        $conn = ouvrirConnection();
        $sql = "select * from TECHNICIENNES where ID=".$ID." AND ACTIVE = 1;";
        $resultat = $conn->query($sql);
        $conn->close();
        $range = $resultat->fetch_assoc();
        $tech = new Technicienne($range['MATRICULE'], $range['PRENOM'], $range['NOM'], $range['DATEEMBAUCHE'], $range['ANCIENNETE']);
        $tech->setID($range['ID']);
        $tech->setTel($range['TELEPHONE']);
        return $tech;
    }

    function supprimerTechnicienne($numTech){
        $conn = ouvrirConnection();
        $sql = "CALL SUPPRIMER_UNE_TECHNICIENNE(?,?);";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ii", $numTech, $_SESSION['ID']);
        $conn->execute();
        $conn->close();
    }

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
        $stmt->bind_param("iiiiii",$TechDepPri->ID,$TechDepPri->IDTech,$TechDepPri->IDPri,$TechDepPri->IDDep,$TechDepPri->ordre, $_SESSION['ID']);
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
        $sql = "CALL INSERERTS(?);";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $poste);
        $stmt->execute();
        $conn->close();
    }

    function insererTSDPT($liste){
        $conn = ouvrirConnection();
        $sql = "CALL INSERER_TSDPT(?,?,?);";
        $stmt = $conn->prepare($sql);
        foreach($liste as $ordre ){
            $stmt->bind_param("iii", $ordre->ID, $ordre->raison, $_SESSION['ID']);
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

?>