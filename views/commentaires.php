<?php
<HTML>
<HEAD>
<TITLE>Commentaires</TITLE>
<META NAME="GENERATOR" CONTENT="MAX's HTML Beauty++ 2004">
 
<style type="text/css">
	* {margin: 0; padding: 0; border: 0;}
	body {background-color: #000000;}
	#main {width: 50%; margin: auto; background-color: white; padding: 10px 15px;}
	h1 {width: 90%; margin: 30px auto 5px auto; text-align: center; padding: 4px 0px; background-color: #474747; font: 20px verdana; color: white; letter-spacing: 2px;}
	h2 {width: 90%; margin: 0px auto 20px auto; text-align: center; padding: 2px 0px; background-color: #808080; font: 10px verdana; color: white; letter-spacing: 3px;}
	form {width: 90%; margin: 40px auto;}
	label {width: 50px; margin-right: 15px; font: small-caps bold 15px arial;}
	#titre {border: 1px outset black; margin: 5px 10px 10px 0px; font: 14px arial; padding: 3px 5px 2px 5px;}
	#titre:focus {background-color: #dddddd; border: 1px inset black;}
	#submit {width: 60px; background-color: white; border: 1px outset black; margin: 3px 2px 5px 0px; font: 10px arial;}
	#submit:hover {border: 1px inset black}
	#champs {margin: 20px 0px 30px 0px; text-align: center; font: 15px arial; color: red;}
	hr {width: 40%; height: 1px; margin: auto; color: black; border-color: black; background-color: black;}
	#retour {width: 90%; margin: 20px auto 20px auto; text-align: center; padding: 2px 0px; background-color: #474747; font: 13px verdana; color: white; letter-spacing: 2px;}
	#retour a {color: white; text-decoration: none;}
	#retour a:hover {color: white; text-decoration: underline;}
	div.message {width: 90%; margin: 10px auto 10px auto; background-color: #dddddd; border-top: 1px solid black; padding: 5px;}
	.pseudo {font: bold 11px arial; color: black;}
	.contenu {font: 13px arial; color: black;}
 
</style>
 
</HEAD>
 
<BODY>
 
<div id="main">
	<h1>COMMENTAIRES</h1>
	<h2>Ajoutez un Commentaire</h2>
 
        <!-- Création du formulaire -->
	<form method="post" action="#">
	<label for="pseudo">Auteur:</label>
	<input type="text" name="pseudo" id="titre" size="20" maxlentgh="25" /><br />
	<label for="message">Commentaire:</label><br />
	<textarea name="message" id="titre" cols="60" rows="8"></textarea><br />
	<input type="submit" id="submit" value="Ajouter" />
	<input type="reset" id="submit" value="Effacer" />
	</form>
 
	<?php
	// Connexion à la BDD
	$connect = mysql_connect('localhost', 'root', '');
	mysql_select_db('lcg');
 
        // On récupère l'identifiant de la page dans l'URL qui l'id de la news qui deviendra la variable id_news du commentaire
	$idarticle = mysql_real_escape_string(htmlspecialchars($_GET['idarticle']));
	//----------------------------------------------
	//      On ajoute les infos dans la BDD
	//----------------------------------------------
 
	// On vérifie que le formulaire a bien été validé et que tous les champs ont été rempli
	if (isset($_POST['pseudo']) AND isset($_POST['message']))
	{
		if (($_POST['pseudo'] != NULL) AND ($_POST['message'] != NULL))
		{	
			// On récupère les infos remplis par le visiteur
 
			$pseudo = mysql_real_escape_string(htmlspecialchars($_POST['pseudo']));
			$message = mysql_real_escape_string(htmlspecialchars($_POST['message']));
 
			// Requête pour ajouter les infos dans la table
			mysql_query("INSERT INTO commentaires (id, pseudo, message, timestamp, idarticle) VALUES('', '" . $pseudo . "', '" . $message . "','" . time() . "', '" . $idarticle . "')");
		}
		else  // Alerte si les 2 champs n'ont pas été rempli
		{
			echo '<div id="champs">Vous n\'avez pas rempli tous les champs</div>';
		}
	}
	// Déconnexion BDD
	mysql_close($connect);
	?>
 
	<hr />
 
        <!-- On ajoute un petit lien pour revenir à la page principale après avoir donner son commentaire -->
	<div id="retour"><a href="index.php">Retour aux News</a></div>