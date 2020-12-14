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
        $sql= "Call CONNEXIONTECHNICIENNE(?,?);";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("is",$nomUtilisateur,$MDP);
        $stmt->execute();
        $resultat = $stmt->get_result();
        $conn->close();
        return $resultat;
        
    }
    
    function insererTechnicienne($tech){
        $conn = ouvrirConnection();
        $sql= "CALL INSERERTECH(?,?,?,?,?,?);";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssis",$tech->obtenirMatricule(),$tech->obtenirNom(),$tech->obtenirPrenom(), $tech->obtenirDateEmbauche(), $tech->obtenirAnc(), $tech->obtenirTel());
        $stmt->execute();
        $conn->close();
    }

    function modifierTechnicienne($tech){
        $conn = ouvrirConnection();
        $sql = "UPDATE TECHNICIENNES 
        SET MATRICULE='".$tech->obtenirMatricule()."', NOM='".$tech->obtenirNom()."', PRENOM='".$tech->obtenirPrenom()."', DATEEMBAUCHE='".$tech->obtenirDateEmbauche()."', ANCIENNETE='".$tech->obtenirAnc()."', TELEPHONE='".$tech->obtenirTel()."' WHERE ID=".$tech->obtenirID().";";
        if(!$conn->query($sql)){
            echo "UPDATE ".$conn->error;
        }
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
        $sql = "UPDATE TECHNICIENNES SET ACTIVE = 0 WHERE ID = '".$numTech."';";
        $conn->query($sql);
        if(!$conn->query($sql)){
            echo ("Fuck".$conn->error);
        }
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
        $sql= "CALL INSERERTECHDEP(?,?,?,?);";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("iiii",$IDTech, $IDPriorite, $IDDEP, $ordre);
        $stmt->execute();
        $conn->close();
    }

    function supprimerTechnicienneDep($ID){
        $conn = ouvrirConnection();
        $sql= "CALL DELETETECHDEP(?);";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i",$ID);
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
        $sql = "CALL UPDATETECHDEPPRI(?,?,?,?,?);";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("iiiii",$TechDepPri->ID,$TechDepPri->IDTech,$TechDepPri->IDPri,$TechDepPri->IDDep,$TechDepPri->ordre);
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

    function obtenirTS($IDPri, $IDPDep){
        $conn = ouvrirConnection();
        $sql = "CALL OBTENIRTS(?,?);";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ii",$IDPri,$IDPDep);
        $stmt->execute();
        $resultat = $stmt->get_result();
        $conn->close();
        return $resultat;
    }

    function obtenirDateTS($IDPri, $IDPDep){
        $conn = ouvrirConnection();
        $sql = "CALL OBTENIRDATETS(?,?);";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ii", $IDPri, $IDPDep);
        $stmt->execute();
        $resultat = $stmt->get_result();
        $conn->close();
        return $resultat;
    }

    function obtenirDescriptionTS($ID){
        $conn = ouvrirConnection();
        $sql = "CALL OBTENIRDESCRIPTION(?);";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $ID);
        $stmt->execute();
        $resultat = $stmt->get_result();
        $conn->close();
        return $resultat;
    }

    function insererTS($liste){
        $conn = ouvrirConnection();

        $sql = "CALL INSERERTS(?,?);";
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

?>