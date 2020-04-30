
<?php
$donnees['menu'] = "Accueil";
$donnees['titre_page'] = "page d'accueil";
?>
<?php include "entete.php"; ?>
	
	<h2> Voter </h2>
	<?php 
		$id_forum=$_GET["id_forum"]; 
		$id_commentaire = $_GET['id_commentaire'];
		$requete="DELETE from commentaire_forum WHERE id=$id_commentaire;"; 
			$reponse=$pdo->prepare($requete); 
			$reponse->execute();	
	header("Location: forum_interagir.php?id_forum=".$id_forum."#comment");
	exit();
			



	?>

<?php include "pied.php"; ?>