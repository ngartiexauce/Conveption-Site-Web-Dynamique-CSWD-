<?php
$donnees['menu'] = "Accueil";
$donnees['titre_page'] = "page d'accueil";
?>
<?php include "entete1.php"; ?>

	<h1> Deconnexion </h1>
	<?php unset($_SESSION['id_membre']); ?>
	<p>Vous êtes deconnecté.</p>

<?php include "pied.php"; ?>