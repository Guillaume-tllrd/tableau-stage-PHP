<?php
session_start();

// EN premier, on vérifie si le formulaire a été envoyé: on fait if
if(!empty($_POST)){
    // à partir d'ici je sais que le formulaire a été envoyé
    // on vérifie donc que tous les champs requis sont remplis:
    if(isset($_POST["pseudo"], $_POST["email"], $_POST["pass"]) && !empty($_POST["pseudo"]) && !empty($_POST["email"]) && !empty($_POST["pass"])
    ){

        if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
            die("L'adresse email est incorrecte");
        }
        // on va hasher le mdp pour ne pas pouvoir le récupérer dans la db
        $pass = password_hash($_POST["pass"], PASSWORD_ARGON2ID);

        // mtn on peut l'enregistrer en base de donnée
        require_once("connect.php");

    $sql = "INSERT INTO `users` (`username`, `email`, `pass`) VALUES (:pseudo, :email, '$pass')";

    // mtn on prépare la requête 
    $query = $db->prepare($sql);
    $query-> bindValue(":pseudo", $_POST["pseudo"], PDO:: PARAM_STR);
    $query-> bindValue(":email", $_POST["email"], PDO::PARAM_STR);

    $query->execute();

    //on récupère l'id du nouvel utilisateur:
    $id = $db->lastInsertId();

    // permet de récupérer le dernier id insert, de ce fait je peux mettre $id au lieu de $user["id"] dans la $_SESSION["user"]
    $_SESSION["user"] = [
        "id" => $id,
        "pseudo" => $_POST["pseudo"],
        "email" => $_POST["email"],
    ];
    // une fois que l'on a fait ça, on est connecté on peut donc redirigé vers une autre page
    header("Location: index.php");
    exit;
} else {
    die("Le formulaire est incomplet");
}
};
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Inscription</h1>

    <form method="post">
        <div>
            <label for="pseudo">Pseudo :</label>
            <input type="text" name="pseudo" id="pseudo">
        </div>
        <div>
            <label for="email">Email :</label>
            <input type="email" name="email" id="email">
        </div>
        <div>
            <label for="pass">Mot de passe: </label>
            <input type="password" name="pass" id="pass">
        </div>
        <button type="submit">S'inscrire</button>
    </form>
</body>
</html>