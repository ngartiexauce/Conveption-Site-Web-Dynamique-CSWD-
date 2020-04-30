<?php
$donnees['menu'] = "Accueil";
$donnees['titre_page'] = "page d'accueil";
?>
<?php include "entete.php"; ?>
	
	<?php 
		$pseudo = $_POST['pseudo'];
		$motdepasse = $_POST['motdepasse'];
		$requete = "SELECT * FROM membre WHERE pseudo='$pseudo'";
		$reponse = $pdo->prepare($requete); 
		$reponse->execute();
		$enregistrements = $reponse->fetchAll();
		if(count($enregistrements)!=0){
			$code = 0;
		}else{
			echo "eeeeeeeeeeeeeeeeeee";
			$requete="INSERT INTO membre (pseudo,motdepasse) VALUES (?, MD5(?))"; 
			$reponse=$pdo->prepare($requete); 
			$reponse->execute(array($pseudo, $motdepasse));
			$code = 1;
		}
		header("Location: inscription.php?code=".$code."");

include "pied.php"; ?>