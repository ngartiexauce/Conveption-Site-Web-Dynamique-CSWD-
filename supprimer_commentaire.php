
<?php
$donnees['menu'] = "Accueil";
$donnees['titre_page'] = "page d'accueil";
?>
<?php include "entete.php"; ?>
	
	<h2> Voter </h2>
	<?php 
		$id_photo=$_GET["id_photo"]; 
		$id_commentaire = $_GET['id_commentaire'];
		$requete="DELETE from commentaire WHERE id=$id_commentaire;"; 
			$reponse=$pdo->prepare($requete); 
			$reponse->execute();	
	header("Location: interagir.php?id_photo=".$id_photo."#comment");
	exit();
			



	?>

<?php include "pied.php"; ?>