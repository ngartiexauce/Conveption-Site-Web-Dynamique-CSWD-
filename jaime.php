<?php
$donnees['menu'] = "Accueil";
$donnees['titre_page'] = "page d'accueil";
?>
<?php include "entete.php"; ?>
	
	<h2> Voter </h2>
	<?php 
		$id_membre = $_SESSION['id_membre'];
		$jaime = $_GET['jaime'];
		$id_photo = $_GET['id_photo'];
		$id = $_GET['id'];
		$requete = "SELECT * FROM aime WHERE id_photo=$id_photo and id_membre =$id_membre;"; 
			$reponse = $pdo->prepare($requete); 
			$reponse->execute();
			$enregistrements = $reponse->fetchAll();
		if($jaime==1 and count($enregistrements)==0){
			$requete="INSERT INTO aime (id_membre,id_photo) VALUES (?, ?);"; 
			$reponse=$pdo->prepare($requete); 
			$reponse->execute(array($id_membre, $id_photo));
		}elseif($jaime == 0 and count($enregistrements)!=0){
			$requete="DELETE from aime WHERE id_membre=$id_membre and id_photo=$id_photo;"; 
			$reponse=$pdo->prepare($requete); 
			$reponse->execute();	
		}
	header("Location: theme.php?id=".$id."#".$id_photo."");
	exit();
			



	?>

<?php include "pied.php"; ?>