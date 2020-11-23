<?php
class Technicienne {

    public $ID;
    public $matricule;
    public $prenom;
    public $nom;
    public $dateEmbauche;
    public $anciennete;
    public $tel;

    function __construct($matricule, $prenom, $nom, $dateEmbauche, $anciennete){
        $this->matricule = $matricule;
        $this->prenom = $prenom;
        $this->nom = $nom;
        $this->dateEmbauche = $dateEmbauche;
        $this->anciennete = $anciennete;
    }

    function obtenirAnc(){
        return $this->anciennete;
    }

    function setDateEmbauche($dateEmbauche){
        $this->dateEmbauche = $dateEmbauche;
    }

    function obtenirDateEmbauche(){
        return $this->dateEmbauche;
    }

    function setTel($tel){
        $this->tel = $tel;
    }

    function obtenirTel(){
        return $this->tel;
    }

    function setID($ID){
        $this->ID = $ID;
    }

    function obtenirID(){
        return $this->ID;
    }

    function obtenirNom(){
        return $this->nom;
    }

    function obtenirPrenom(){
        return $this->prenom;
    }

    function obtenirMatricule(){
        return $this->matricule;
    }
}
?>
