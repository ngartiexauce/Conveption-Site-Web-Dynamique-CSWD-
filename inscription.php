<?php
$donnees['menu'] = "Accueil";
$donnees['titre_page'] = "page d'accueil";
include "entete.php"; 
$code=$_GET["code"];
if($code==0 or $code ==2){
	if($code == 0){
		echo"<p>Pseudo indisponible.Veuillez choisir un autre s'il vous plait.</p>";
	}
		?>	
	<h2> Inscription </h2>
	<form action="enregistrer_membre.php" method="post">
	<p>Pseudo : 
	<input type="text" name="pseudo" required></p>
	<p>Mot de passe : 
	<input type="password" name="motdepasse" required=""></p>
	<input type="submit" value="S'inscrire">
	</form>
<?php
}else{
	echo"<p>Bravo, vous êtes inscrit.</p>";
}

include "pied.php"; ?>