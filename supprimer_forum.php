
<?php
$donnees['menu'] = "Accueil";
$donnees['titre_page'] = "page d'accueil";
?>
<?php include "entete.php"; ?>
	
	<h2> Voter </h2>
	<?php 
		$id_forum=$_GET["id_forum"]; 
		$pro=$_GET["pro"];
		$requete="DELETE from commentaire_forum WHERE id_forum=$id_forum;"; 
			$reponse=$pdo->prepare($requete); 
			$reponse->execute();	
		$requete="DELETE from forum WHERE id=$id_forum;"; 
			$reponse=$pdo->prepare($requete); 
			$reponse->execute();
	if($pro == 0){
		header("Location: forum.php?forum=".$id_forum."#comment");
	}else{
		header("Location: profil.php");
	}
	exit();
			



	?>

<?php include "pied.php"; ?>