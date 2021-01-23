<?php

function obtenirTechniciennesSelonDateImpression($IDDepartement, $IDPriorite, $dateDeDebut, $dateDeFin){
    $conn = ouvrirConnection();
    $sql = "CALL OBTENIR_TECHNICIENNES_TS_SELON_DATE_IMPRESSION(?,?,?,?);";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iiss", $IDDepartement, $IDPriorite, $dateDeDebut, $dateDeFin);
    $stmt->execute();
    $resulat = $stmt->get_result();
    $conn->close();
    return $resulat;
}

function obtenirDateTSSelonDateImpression($IDDepartement, $dateDeDebut, $dateDeFin){
    $conn = ouvrirConnection();
    $sql = "CALL DATE_TS_PAR_DATE_IMPRESSION(?,?,?);";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iss", $IDDepartement, $dateDeDebut, $dateDeFin);
    $stmt->execute();
    $resulat = $stmt->get_result();
    $conn->close();
    return $resulat;
}

function obtenirDescriptionTSSelonDateImpression($IDTech, $IDPriorite, $IDDepartement, $dateDeDebut, $dateDeFin){
    $conn = ouvrirConnection();
    $sql = "CALL DESCRIPTION_TS_PAR_DATE_IMPRESSION(?,?,?,?,?);";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iiiss", $IDTech, $IDPriorite, $IDDepartement, $dateDeDebut, $dateDeFin);
    $stmt->execute();
    $resulat = $stmt->get_result();
    $conn->close();
    return $resulat;
}

function obtenirNombreDateTSSelonDateImpression($IDDepartement, $dateDeDebut, $dateDeFin){
    $conn = ouvrirConnection();
    $sql = "CALL NOMBRE_DATE_TS_PAR_DATE_IMPRESSION(?,?,?);";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iss", $IDDepartement, $dateDeDebut, $dateDeFin);
    $stmt->execute();
    $resulat = $stmt->get_result();
    $conn->close();
    return $resulat;
}

?>