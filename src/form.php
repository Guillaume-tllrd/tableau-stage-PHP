<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="create.php" method="post">

        <select name="statut" id="statut">
            <option value="a postulé">a postulé</option>
            <option value="ne correpond pas">ne correpond pas</option>
            <option value="entretien">entretien</option>
            <option value="refus">refus</option>
            <option value="pas de réponse">pas de réponse</option>
        </select>

        <label for="nom de l'entreprise">nom de l'entreprise</label>
        <input type="text" name="nom de l'entreprise">

        <label for="date d'envoi">date d'envoi</label>
        <input type="date" name="date d'envoi">

        <label for="date de relance">date de relance(j+7)</label>
        <input type="date" name="date de relance">

        <select name="type" id="type">
            <option value="spontanée">spontanée</option>
            <option value="réponse à une offre">réponse à une offre</option>
            <option value="recommandation">recommandation</option>
            <option value="sollicitation directe">sollicitation directe</option>
        </select>

        <select name="méthode" id="">
            <option value="en personne">en personne</option>
            <option value="e-mail">e-mail</option>
            <option value="Linkedin">Linkedin</option>
            <option value="recommandation">recommandation</option>
            <option value="sollicitation directe">sollicitation directe</option>
        </select>
        <select name="type de contrat" id="">
            <option value="stage">stage</option>
            <option value="CDD">CDD</option>
            <option value="CDI">CDI</option>
        </select>

        <label for="email">email</label>
        <input type="text" name="email">

        <label for="commentaires">commentaires</label>
        <input type="text" name="commentaires">

        <button type="submit">Envoyer</button>
    </form>
</body>
</html>