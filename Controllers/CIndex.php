<?php require_once("./Models/BD.php"); ?>
<?php
    function afficher(){
        require_once('./Vues/Connexion/index.php');
        require_once('./Vues/Partiels/bas.php');
    }

    function connexion($nomUtilisateur, $MDP){
        $resultat = connexionTechnicienne($nomUtilisateur, $MDP);
        $res = $resultat->fetch_assoc();
        return $res;
    }
?>