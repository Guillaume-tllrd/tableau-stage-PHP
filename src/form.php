<?php
session_start();
// NE PAS OUBLIER LE SESSION START pour maintenir la session
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php include("navbar.php"); ?>
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
        <input type="text" name="nom_de_lentreprise">

        <label for="date_denvoi">date d'envoi</label>
        <input type="date" name="date_denvoi">

        <label for="date_de_relance">date de relance(j+7)</label>
        <input type="date" name="date_de_relance">

        <select name="type_de_postulation" id="type_de_postulation">
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
        <input type="text" name="intitule_du_poste">
        
        <select name="type_de_contrat" id="">
            <option value="type de contrat">type de contrat</option>
            <option value="stage">stage</option>
            <option value="CDD">CDD</option>
            <option value="CDI">CDI</option>
        </select>
      
        <label for="email">email</label>
        <input type="email" name="email">

        <label for="commentaires">commentaires</label>
        <textarea name="commentaires" id="commentaires"></textarea>

        <label for="user_id"></label>
        <input type="hidden" name="user_id" id="user_id" value="<?= ($_SESSION['user']['id']) ?>">
        <button type="submit">Ajouter</button>
       <!-- <?php echo "<pre>";
       var_dump($_SESSION['user']['id']);
       echo "</pre>" ;?> -->
    </form>
</body>
</html>

