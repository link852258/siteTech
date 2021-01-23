<?php
require_once("./Models/BD.php");

function genererFichier(){
    $monfichier = fopen("tableau.csv", "w");
    fwrite($monfichier, remplirFichier());
    fclose($monfichier);
}

function remplirFichier(){
    $txt = "Nutrition";
    $nbColonnes = nbColonnes();
    for($i = 1; $i < 4; $i++){
        $txt = $txt.str_repeat(",", $nbColonnes)."\n";
        $txt = $txt.str_repeat(",", $nbColonnes)."\n";
        $txt = $txt."Priorite ".$i.str_repeat(",", $nbColonnes)."\n";
        $txt = $txt."Nom/Date,";
        $dates = obtenirDatesPourFichier();
        while($date = $dates->fetch_assoc()){
            $txt = $txt.$date['DATETS'].",";
        }
        $txt = substr($txt,0,-1)."\n";
        $techniciennes = obtenirTechniciennePourFichier($i);
        while($technicienne = $techniciennes->fetch_assoc()){
            $txt = $txt.$technicienne['NOMCOMPLET'].",";
            $descriptions = obtenirDescriptionPourFichier($technicienne['IDTECH'], $i);
            while($description = $descriptions->fetch_assoc()){
                if(is_null($description['DESCRIPTION'])) 
                    $txt = $txt."N/A,"; 
                else 
                    $txt = $txt.$description['DESCRIPTION']." ".$description['ORDRE'].",";
            }
            $txt = substr($txt,0,-1)."\n";
        }
    }
    //$txt = substr($txt,0,-1)."\n";
    return $txt;
}

function obtenirTechniciennePourFichier($IDPriorite){
    $resultat = obtenirTechniciennesSelonDateImpression($_SESSION['IDDepartement'], $IDPriorite, $_SESSION['dateDebut'],$_SESSION['dateFin']);
    return $resultat;
}

function obtenirDatesPourFichier(){
    $resultat = obtenirDateTSSelonDateImpression($_SESSION['IDDepartement'], $_SESSION['dateDebut'],$_SESSION['dateFin']);
    return $resultat;
}

function obtenirDescriptionPourFichier($IDTech, $IDPriorite){
    $resultat = obtenirDescriptionTSSelonDateImpression($IDTech, $IDPriorite, $_SESSION['IDDepartement'], $_SESSION['dateDebut'],$_SESSION['dateFin']);
    return $resultat;
}

function nbColonnes(){
    $resultat = obtenirNombreDateTSSelonDateImpression($_SESSION['IDDepartement'], $_SESSION['dateDebut'],$_SESSION['dateFin']);
    $nbColonnes = $resultat->fetch_assoc();
    return $nbColonnes['NBDATE'];
}

function telechargerFichier(){

}

?>