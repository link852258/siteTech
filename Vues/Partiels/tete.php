<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Technicienne</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="#">Gestion TS</a>
            <?php if(isset($_SESSION['ID'])) {?>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" 
                    role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Temps Supplémentaire</a>

                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="nutrition.php">Nutrition</a>
                        <a class="dropdown-item" href="distribution.php">Distribution</a>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="gestionNutrition.php">Gestion Nutrition</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="gestionDistribution.php">Gestion Distribution</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="technicienne.php">Gestion Techniciennes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="recherche.php">Recherche</a>
                </li>
                </ul>
                <span class="navbar-text text-white mr-3">
                    <?php echo 'Bonjour '.$_SESSION['prenom'];?>
                </span>
                <button class="btn btn-danger" id="btnDeco" name="btnDeco">Déconnexion</button>
                <?php }?>
            </div>
        </nav>
        <div class="container-fluid">