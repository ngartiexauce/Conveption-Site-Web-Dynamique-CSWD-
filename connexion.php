<?php
$donnees['menu'] = "Accueil";
$donnees['titre_page'] = "page d'accueil";
?>
<?php include "entete.php"; 
$alerte=array(	"Bienvenue ! Vous etes connecté.",
				"Erreur de mot de passe. Réessayez!",
				"Désolé, ce pseudo n'existe pas.",
			    "Connectez vous:");
?>
	
	<h1> Connexion </h1>
	<?php
	$code = $_GET["code"];
	echo"<p>".$alerte[$code]."</p>";
	if($code!=0){
	 ?>
	<form action="verifier_connexion.php" method="post">
	<p>Pseudo : 
	<input type="text" name="pseudo" required></p>
	<p>Mot de passe : 
	<input type="password" name="motdepasse" required></p>
	<input type="submit" value="Se connecter">
	</form>

<?php }
include "pied.php"; ?>