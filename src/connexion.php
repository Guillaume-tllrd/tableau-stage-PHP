<?php
session_start();

if(!empty($_POST)){
    // ici le formulaire a été envoyé
    // on vérifie donc que tous les chanps requis sont remplis 
    if(isset($_POST["email"], $_POST["pass"]) && !empty($_POST["email"]) && !empty($_POST["pass"])
    ){
        // d'abord on vérifie que l'email est un email en réfléchissant à l'inverse si ce n'est pas un email on lui envoie un message sinon on va se connecter à la bdd
        if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
            die("Ce n'est pas un email");
        }
        require_once("connect.php");

        // on vérifie que l'user est dans la bdd avec cet email:
        $sql = "SELECT * FROM `users` WHERE `email` =:email";

        $query = $db->prepare($sql);
        $query-> bindValue(":email", $_POST["email"], PDO::PARAM_STR);
        $query->execute();

        $user = $query->fetch();

        if(!$user){
            die("L'utilisateur et/ou le mot de passe est incorrect");
        }

        // ici il y un utilisateur donc on va vérifier le mdp :
            // on va utliser une fonction: password_verify ça va demander 2 paramètres : le mdp tapé dans le formulaire et le hashe dans la base de donné
        if(!password_verify($_POST["pass"], $user["pass"])){
            die("l'utilisateur et/ou le mdp est incorrect");
        }
        
        // ici l'utilisateur et le mot de passe sont corrects
        // on va donc pouvoir ouvrir la session ou "connecter l'utilisateur"
        $_SESSION["user"] = [
            "id" => $user["id"],
            "pseudo"=>$user["pseudo"],
            "email" => $user["email"],
        ];
    // une fois que l'on a fait ça, on est connecté on peut donc redirigé vers une autre page (par ex l'index)
        header("Location: index.php");
        exit;
    } else {
        die("le formulaire est incomplet");
    }
} 
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <h1>Connexion</h1>

    <form action="connexion.php" method="post">
    <div>
        <label for="email">Email :</label>
        <input type="email" name="email" id="email">
    </div>
    <div>
        <label for="pass">Mot de passe:</label>
        <input type="password" name="pass" id="pass">
    </div>
    <button type="submit">Me connecter</button>
    <div><a href="inscription.php">Cliquez ici si vous n'êtes pas enregistré</a></div>
    </form>
</body>
</html>