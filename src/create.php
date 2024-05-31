<?php
require_once("connect.php");

$user_id = strip_tags($_POST["user_id"]);
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

$sql = "INSERT INTO stage (user_id, statut_de_la_recherche, nom_de_lentreprise, date_denvoi, date_de_relance, type_de_postulation, methode_de_postulation, intitule_du_poste, type_de_contrat, email, commentaires) VALUES (:user_id, :statut_de_la_recherche, :nom_de_lentreprise, :date_denvoi, :date_de_relance, :type_de_postulation, :methode_de_postulation, :intitule_du_poste, :type_de_contrat, :email, :commentaires)";

$query = $db->prepare($sql);
$query->bindValue(":user_id", $user_id, PDO::PARAM_INT);
$query->bindValue(":statut_de_la_recherche", $statut_de_la_recherche);
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

