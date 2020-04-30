<?php
$donnees['menu'] = "Accueil";
$donnees['titre_page'] = "page d'accueil";
?>
<?php include "entete.php"; ?>

	<?php 
		$motdepasse = $_POST['motdepasse'];
		$requete = "SELECT * FROM membre WHERE pseudo = ?;"; 
		$reponse = $pdo->prepare($requete); 
		$reponse->execute(array($_POST['pseudo']));
		$enregistrements = $reponse->fetchAll();
		$nombreReponses = count($enregistrements);
		if($nombreReponses > 0){ 
			if($enregistrements[0]['motdepasse'] == md5($_POST['motdepasse'])) { 
			$_SESSION['pseudo']=$_POST['pseudo'];
			$_SESSION['id_membre']=$enregistrements[0]['id'];
			$code=0;	
			}else{ 
				$code = 1;
			} 
		}else{
			$code = 2 ;
		}
		header("Location: connexion.php?code=".$code."");
		exit();
 include "pied.php"; ?>