<?php
session_start();
require_once("connect.php");

if(!isset($_SESSION["user"])){
    header("Location: connexion.php");
    exit;
}

// faire attention à bien mettre le include en dessous du header sinon MESSAGE D'ERREUR
$sql = "SELECT * FROM stage WHERE user_id =:id";

$query = $db->prepare($sql);
$query ->bindValue(":id", $_SESSION['user']['id'], PDO::PARAM_INT);
$query->execute();
$stage = $query-> fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>Document</title>
</head>
<body>
<?= include("navbar.php")?>
    <h1>Tableau de suivi de recherche de stage de <?=$_SESSION['user']['pseudo'] ?></h1>
    <table>
    <a href="form.php">Ajouter un nouveau stage</a>
    <thead>
        <td>id</td>
        <td>Statut de la recherche</td>
        <td>Nom de l'entreprise</td>
        <td>Date d'envoi</td>
        <td>Date de relance (j+7)</td>
        <td>type de postulation</td>
        <td>méthode de postulation</td>
        <td>intitulé du poste</td>
        <td>type de contrat</td>
        <td>email</td>
        <td>commentaires</td>
        <td>Actions</td>
    </thead>
    <tbody>
    <?php
        foreach($stage as $stage){
    ?>
        <tr>
            <td><?=$stage["id"]?></td>
            <td><?=$stage["statut_de_la_recherche"]?></td>
            <td><?=$stage["nom_de_lentreprise"]?></td>
            <td><?=$stage["date_denvoi"]?></td>
            <td><?=$stage["date_de_relance"]?></td>
            <td><?=$stage["type_de_postulation"]?></td>
            <td><?=$stage["methode_de_postulation"]?></td>
            <td><?=$stage["intitule_du_poste"]?></td>
            <td><?=$stage["type_de_contrat"]?></td>
            <td><?=$stage["email"]?></td>
            <td><?=$stage["commentaires"]?></td>
            <td>
                <a href="update.php?id=<?= $stage['id']?>">Modifier</a>
                <a href="delete.php?id=<?= $stage['id']?>"><i class="fa-solid fa-trash-can"></i></a>
            </td>
        </tr>
        <?php
        }// remplace l'accolade fermante
        ?>
        
    <tbody>
        <img src="../" alt="">
</body>
</html>

