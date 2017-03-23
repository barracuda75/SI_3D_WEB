<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>My Urban Ride</title>
    <link rel="stylesheet" href="css/styles.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">
</head>
<body>
    <header>
        <?php if (isset($_SESSION['id'])) :?>
            <div class="connexion">
                <a href="logout.php">Déconnexion</a>
                <a href="profil.php">Mon Profil</a>
            </div>
        <?php else :?>
            <div class="connexion">
                <a href="login.php">Connecte toi</a>
            </div>
        <?php endif; ?>
        <div class="nav-side-user">
          <img class="bag" src="img-layout/panier.png" alt="bag">
        </div>
        <nav class="nav-header">
          <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="game.php">Pimp Your Ride</a></li>
            <li><a href="">Nos Designs</a></li>
            <li><a href="">Nos Accessoires</a></li>
          </ul>
        </nav>
    </header>