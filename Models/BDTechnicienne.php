<?php

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
    $sql = "CALL OBTENIR_TOUTES_LES_TECHNICIENNES_SELON_ADMIN(?);";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $_SESSION['admin']);
    $stmt->execute();
    $resultat = $stmt->get_result();
    $conn->close();
    $techs = array();
    while($range = $resultat->fetch_assoc()){
        $tech = new Technicienne($range['MATRICULE'], $range['PRENOM'], $range['NOM'], $range['DATEEMBAUCHE'], $range['ANCIENNETE']);
        $tech->setID($range['ID']);
        $tech->setActive($range['ACTIVE']);
        array_push($techs, $tech);
    }
    return $techs;
}

function obtenirTechnicienne($ID){
    $conn = ouvrirConnection();
    $sql = "select * from TECHNICIENNES where ID=".$ID.";";
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
    $stmt->execute();
    $conn->close();
}

function reactiverTechnicienne($numTech){
    $conn = ouvrirConnection();
    $sql = "CALL REACTIVER_UNE_TECHNICIENNE(?,?);";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $numTech, $_SESSION['ID']);
    $stmt->execute();
    $conn->close();
}


?>