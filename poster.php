<?php
$donnees['menu'] = "Theme";
$donnees['titre_page'] = "theme";
?>
<?php include "entete.php"; ?>
	
<?php 
	$id=$_GET["id"]; 
	$code=$_GET["code"];
?>	
	
<h2> Poster </h2>
<?php
$alertes = array(
"Choisissez une photo:",
"Votre photo est envoyée, bonne chance pour la suite^^",
"Chargement echoué, réessayez",
"Erreur de Chargement,réessayez",
'Seuls les formats de fichier JPG, JPEG et PNG files sont permis.',
'Choisissez une photo.');
$code=$_GET["code"];
	echo "<p>".$alertes[$code]."</p>";
	if($code != 1){
	?>
		<form action="enregistrer_poste.php?id= <?php echo $id ; ?>" method="post" enctype="multipart/form-data">
		<p>Photo : 
		<input type="file" name="nom"></p>
		<input type="submit" value="poster" name="poster">
		</form>
	<?php
	}
	include "pied.php"; ?>