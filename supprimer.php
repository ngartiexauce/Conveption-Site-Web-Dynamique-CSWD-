
<?php
$donnees['menu'] = "Accueil";
$donnees['titre_page'] = "page d'accueil";
?>
<?php include "entete.php"; 
		$dossier_image = "images\\"; 
		$id_photo = $_GET['id_photo'];
		$nom = $_GET['nom'];
		$chemin_final=$dossier_image.$nom;
		unlink($chemin_final) ;
		$requete="DELETE from photo WHERE id=$id_photo;"; 
			$reponse=$pdo->prepare($requete); 
			$reponse->execute();
		$requete="DELETE from commentaire WHERE id_photo=$id_photo;"; 
			$reponse=$pdo->prepare($requete); 
			$reponse->execute();
		$requete="DELETE from aime WHERE id_photo=$id_photo;"; 
			$reponse=$pdo->prepare($requete); 
			$reponse->execute();	
	header("Location: profil.php");
	exit();
			



	?>

<?php include "pied.php"; ?>