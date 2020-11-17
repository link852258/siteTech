<?php
class TechDepPri {
    public $ID;
    public $IDTech;
    public $IDPri;
    public $IDDep;
    public $ordre;

    function __construct($ID, $IDTech, $IDPri, $IDDep, $ordre){
        $this->ID = $ID;
        $this->IDTech = $IDTech;
        $this->IDPri = $IDPri;
        $this->IDDep = $IDDep;
        $this->ordre = $ordre;
    }

    function getID(){
        return $this->ID;
    }

    function getIDTech(){
        return $this->IDTech;
    }

    function getIDPri(){
        return $this->IDPri;
    }

    function getIDDep(){
        return $this->IDDep;
    }

    function getOrdre(){
        return $this->ordre;
    }
}
?>
