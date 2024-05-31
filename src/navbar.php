<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>
    
</body>
</html>
<nav>
    <ul>
        <li><a href="index.php">Accueil</a></li>
        <?php if(!isset($_SESSION["user"])): ?>
        <li><a href="inscription.php">Inscription</a></li>
        <li><a href="connexion.php">Connexion</a></li>
        <?php else : ?>
        <li><a href="déconnexion.php"><i class="fa-solid fa-right-from-bracket"></i></a></li>
        <!-- <?php endif; ?> -->
    </ul>
</nav>