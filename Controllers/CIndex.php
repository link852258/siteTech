<?php require_once("./Models/BD.php"); ?>
<?php
    function afficher(){
        require_once('./Vues/Partiels/tete.php');
        require_once('./Vues/Accueil/afficherIndex.php');
        require_once('./Vues/Accueil/ajoutTS.php');
        require_once('./Vues/Partiels/bas.php');
    }

    function cAjouter(){
        $listePrincipale = separerListe($_POST['liste']);
        $groupe = obtenirGroupeTS();
        insererDateTS($_POST['date'], $groupe);
        foreach($listePrincipale as $listeSecondaire ){
            if(count($listeSecondaire) != 0){
                $liste = gestionPriorite($listeSecondaire);
                cModifierTechOrdre($liste);
                insererTS($liste);
            }
        }
    }

    function cModifierTechOrdre($liste){
        modifierTechOrdre($liste);
    }

    function cAfficherIndex(){
        require_once('./Vues/Accueil/afficherTables.php');
    }



    function separerListe($liste){
        $listePrincipal = array();
        for($i = 1; $i <= 3; $i++ ){
            $listeSecondaire = array();
            foreach($liste as $ts ){
                if($ts['priorite'] == $i){
                    array_push($listeSecondaire,$ts);
                }
            }
            if(count($listeSecondaire) != 0)
                array_push($listePrincipal,$listeSecondaire);
        }
        return $listePrincipal;
    }

    function gestionPriorite($liste){
        $gtsps = array();
        foreach($liste as $ts ){
            $test = new GTSP();
            $test->ID = $ts['ID'];
            $test->raison = $ts['reponse'];
            array_push($gtsps,$test);
        }
        $gtspsTrie = array();
        $gtsOui = NULL;
        $gtsNon = array();
        $gtsPlancher = array();
        $gtsPasAppele = array();
        $surLePlancher = 1;
        $non = 3;
        $pasRejoint = 2;
        $oui = 4;
        foreach($gtsps as $allo){
            if($allo->raison == $oui){
                $gtsOui = $allo;
            }
            elseif($allo->raison == $non){
                array_push($gtsNon, $allo);  
            }
            elseif($allo->raison == $surLePlancher){
                array_push($gtsPlancher, $allo);
            }
            else {
                array_push($gtsPasAppele, $allo);
            }
        }
        $i = 1;
        foreach($gtsPlancher as $tech){
            $tech->ordre = $i;
            $i++;
            array_push($gtspsTrie, $tech);
        }
        foreach($gtsPasAppele as $tech){
            $tech->ordre = $i;
            $i++;
            array_push($gtspsTrie, $tech);
        }
        foreach($gtsNon as $tech){
            $tech->ordre = $i;
            $i++;
            array_push($gtspsTrie, $tech);
        }
        if(!is_null($gtsOui)){
            $gtsOui->ordre = $i;
            array_push($gtspsTrie, $gtsOui);
        }
        return $gtspsTrie;
    }
?>