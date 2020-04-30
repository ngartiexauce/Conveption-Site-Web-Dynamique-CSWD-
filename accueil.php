<?php
	$donnees['menu'] = "Acceuil";
	$donnees['titre_page']="page d'acceuil";
 
	include "entete.php"; 
	echo"<img width='100%' src=images/logo.jpg alt='photo' ></br>";
	echo"<h2>Meilleures photos</h2>";
	$requete = "SELECT id_photo,COUNT(id_photo) AS nb_jaime  FROM aime  GROUP BY id_photo ORDER BY nb_jaime DESC LIMIT 20  ;"; 
	$reponse = $pdo->prepare($requete); 
	$reponse->execute();
	$enregistrements3 = $reponse->fetchAll();
	if(count($enregistrements3) != 0){
		$dossier_image = "images\\";
		for ($i=0; $i<count($enregistrements3); $i++) {	
			$id_photo =  $enregistrements3[$i]['id_photo'];		
			$requete = "SELECT * FROM photo WHERE id=$id_photo ;"; 
				$reponse = $pdo->prepare($requete); 
				$reponse->execute();
				$enregistrements = $reponse->fetchAll();

			$id_membre=$enregistrements[0]['id_membre'];
			$requete = "SELECT * FROM membre WHERE id=$id_membre ;"; 
				$reponse = $pdo->prepare($requete); 
				$reponse->execute();
				$enregistrements2 = $reponse->fetchAll();

			$id_theme=$enregistrements[0]['id_theme'];
			$requete = "SELECT * FROM theme WHERE id=$id_theme ;"; 
				$reponse = $pdo->prepare($requete); 
				$reponse->execute();
				$enregistrements4 = $reponse->fetchAll();

			$chemin_image =$dossier_image.$enregistrements[0]['nom'];
			echo "<p id='theme'>".$enregistrements4[0]['nom']."</p>";
			echo "<p><strong>@".$enregistrements2[0]['pseudo']."     </strong><em id='date'>".$enregistrements[0]['date']."</em></p>";
			echo"<img width='100%' src=".$chemin_image." alt='photo' ></br>";
			echo "<p id='nb_jaime'>Nombres de votes: ".$enregistrements3[$i]['nb_jaime']."</p>";
		}
	}else{
		echo"<p>Pas de photos</p>";
	}
		include "pied.php"; 
	
?>
