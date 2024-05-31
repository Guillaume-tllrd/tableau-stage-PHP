<?php
session_start();
if ($_POST) { // Vérifie si le formulaire a été soumis en utilisant la méthode POST
    if (
        isset($_POST["id"]) && !empty($_POST["id"]) && // Vérifie si l'ID est défini et non vide
        isset($_POST["statut_de_la_recherche"]) && !empty($_POST["statut_de_la_recherche"]) && // Vérifie si le prénom est défini et non vide
        isset($_POST["nom_de_lentreprise"]) && !empty($_POST["nom_de_lentreprise "]) && // Vérifie si le nom est défini et non vide
        isset($_POST["date_denvoi"]) && !empty($_POST["date_denvoi"]) &&
        isset($_POST["date_de_relance"]) && !empty($_POST["date_de_relance"]) &&
        isset($_POST["type_de_postulation"]) && !empty($_POST["type_de_postulation"]) &&
        isset($_POST["methode_de_postulation"]) && !empty($_POST["methode_de_postulation"]) &&
        isset($_POST["intitule_du_poste"]) && !empty($_POST["intitule_du_poste"]) &&
        isset($_POST["type_de_contrat"]) && !empty($_POST["type_de_contrat"]) &&
        isset($_POST["email"]) && !empty($_POST["email"]) &&
        isset($_POST["commentaires"]) && !empty($_POST["commentaires"]) 
        ) {
        require_once("connect.php");

        $id = strip_tags($_POST["id"]); // strip_tags est une sécurité qui permet de ne pas prendre en compte les balises HTML si jamais elles sont incrites dans le SQL
        $statut_de_la_recherche = strip_tags($_POST["statut_de_la_recherche"]);
        $nom_de_lentreprise = strip_tags($_POST["nom_de_lentreprise"]);
        $date_denvoi = strip_tags($_POST["date_denvoi"]);
        $date_de_relance = strip_tags($_POST["date_de_relance"]);
        $type_de_postulation = strip_tags($_POST["type_de_postulation"]);
        $methode_de_postulation = strip_tags($_POST["methode_de_postulation"]);
        $intitule_du_poste = strip_tags($_POST["intitule_du_poste"]);
        $type_de_contrat = strip_tags($_POST["type_de_contrat"]);
        $email = strip_tags($_POST["email"]);
        $commentaires = strip_tags($_POST["commentaires"]);

        $sql = "UPDATE stage SET statut_de_la_recherche = :statut_de_la_recherche, nom_de_lentreprise = :nom_de_lentreprise, date_denvoi = :date_denvoi, date_de_relance = :date_de_relance, type_de_postulation = :type_de_postulation, methode_de_postulation = :methode_de_postulation, intitule_du_poste = :intitule_du_poste, type_de_contrat = :type_de_contrat, email = :email, commentaires = :commentaires WHERE id = :id";

        $query = $db->prepare($sql);
        $query -> bindValue(":id", $id, PDO::PARAM_INT); // , PDO permet de protéger contrre les injections SQL paramètre integer sinon cest en string par défault
        $query->bindValue(":statut_de_la_recherche", $statut_de_la_recherche); // bindValue sert à protéger
        $query->bindValue(":nom_de_lentreprise", $nom_de_lentreprise); 
        $query->bindValue(":date_denvoi", $date_denvoi);
        $query->bindValue(":date_de_relance", $date_de_relance);
        $query->bindValue(":type_de_postulation", $type_de_postulation);
        $query->bindValue(":methode_de_postulation", $methode_de_postulation);
        $query->bindValue(":intitule_du_poste", $intitule_du_poste);
        $query->bindValue(":type_de_contrat", $type_de_contrat);
        $query->bindValue(":email", $email);
        $query->bindValue(":commentaires", $commentaires);
        $query->execute();
        header("Location: index.php");
        } else {
            echo "Remplissez le formulaire!";
        }
}
if (isset($_GET["id"])&& !empty($_GET["id"])){
    // déja ça va vérifier si la var est défini avec isset et ensuite si il y a l'id dqns l'url

require_once("connect.php"); // ne pas oublier de connecter avec require_once
// echo $_GET["id"];
$id = strip_tags($_GET["id"]);

$sql = "SELECT * FROM stage WHERE id = :id";
$query = $db->prepare($sql); // on prépare la requête, on demande la $db mais il faut la connecter avec require
// on accroche la valeur id de la requête à celle de la variable $id
$query->bindValue(":id", $id, PDO::PARAM_INT);
$query->execute();

$stage = $query->fetch();

} else {
    header("Location : index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modification de l'offre</title>
</head>
<body>
    <?php include("navbar.php"); ?>
    <h1>Modifier l'offre de <?= $stage["nom_de_lentreprise"]?> pour le poste de <?=$stage["intitule_du_poste"]?></h1>
   
    <form action="create.php" method="post">
    
        <select name="statut_de_la_recherche" id="statut">
            <option value="statut de la recherche">statut de la recherche</option>
            <option value="a postulé">a postulé</option>
            <option value="ne correpond pas">ne correpond pas</option>
            <option value="entretien">entretien</option>
            <option value="refus">refus</option>
            <option value="pas de réponse">pas de réponse</option>
        </select>

        <label for="nom_de_lentreprise">nom de l'entreprise</label>
        <input type="text" name="nom_de_lentreprise" value="<?=$stage["nom_de_lentreprise"]?>">

        <label for="date_denvoi">date d'envoi</label>
        <input type="date" name="date_denvoi" value="<?=$stage["date_denvoi"]?>">

        <label for="date_de_relance">date de relance(j+7)</label>
        <input type="date" name="date_de_relance">

        <select name="type_de_postulation" id="type_de_postulation" >
            <option value="type de postulation">type de postulation</option>
            <option value="spontanée">spontanée</option>
            <option value="réponse à une offre">réponse à une offre</option>
            <option value="recommandation">recommandation</option>
            <option value="sollicitation directe">sollicitation directe</option>
        </select>

        <select name="methode_de_postulation" id="">
            <option value="méthode de postulation">méthode de postulation</option>
            <option value="en personne">en personne</option>
            <option value="e-mail">e-mail</option>
            <option value="Linkedin">Linkedin</option>
            <option value="recommandation">recommandation</option>
            <option value="sollicitation directe">sollicitation directe</option>
        </select>

        <label for="intitule_du_poste">Intitulé du poste</label>
        <input type="text" name="intitule_du_poste" value ="<?=$stage["intitule_du_poste"]?>">
        
        <select name="type_de_contrat" id="">
            <option value="type de contrat">type de contrat</option>
            <option value="stage">stage</option>
            <option value="CDD">CDD</option>
            <option value="CDI">CDI</option>
        </select>
        
        <label for="email">email</label>
        <input type="email" name="email" value="<?=$stage["email"]?>">

        <label for="commentaires">commentaires</label>
        <textarea name="commentaires" id="commentaires"></textarea>

        <button type="submit">Modifier</button>
    </form>
</body>
</html>