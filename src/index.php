
<?php
require_once("connect.php");

$sql = "SELECT * FROM stage";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Tableau de suivi de recherche de stage</h1>
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
            <td><?=$stage["intitulé_du_poste"]?></td>
            <td><?=$stage["type_de_contrat"]?></td>
            <td><?=$stage["email"]?></td>
            <td><?=$stage["commentaires"]?></td>
        </tr>
        <?php
        }
        ?>
    <tbody>
</body>
</html>