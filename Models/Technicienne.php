<?php
class Technicienne {

    public $ID;
    public $matricule;
    public $prenom;
    public $nom;
    public $anciennete;
    public $tel;

    function __construct($matricule, $prenom, $nom, $anciennete){
        $this->matricule = $matricule;
        $this->prenom = $prenom;
        $this->nom = $nom;
        $this->anciennete = $anciennete;
    }

    function obtenirAnc(){
        return $this->anciennete;
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
