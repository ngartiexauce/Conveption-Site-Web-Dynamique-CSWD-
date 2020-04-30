<?php
$donnees['menu'] = "Theme";
$donnees['titre_page'] = "theme";

include "entete.php"; 	
 $id=$_GET["id"];
 	$dossier_image = "images\\";
	$requete = "SELECT * FROM photo WHERE id_theme=$id ORDER BY date DESC;"; 
		$reponse = $pdo->prepare($requete); 
		$reponse->execute();
		$enregistrements3 = $reponse->fetchAll();




				
 $requete = "SELECT * FROM theme WHERE id=$id ;"; 
	$reponse = $pdo->prepare($requete); 
	$reponse->execute();
	$enregistrements = $reponse->fetchAll();
?>
	
<h2> <?php echo $enregistrements[0]['nom'] ?> </h2>

<?php 

	$requete = "SELECT COUNT(id_photo) FROM aime,photo WHERE aime.id_photo=photo.id and photo.id_theme = $id  GROUP BY id_photo ;";
	$reponse = $pdo->prepare($requete); 
	$reponse->execute();
	$enregistrements7 = $reponse->fetchAll();

	if(count($enregistrements7) !=0){
		echo"<h2>Meilleure photo du thème</h2>";
		$maximum =  max($enregistrements7)[0];
		$requete = "SELECT  id_photo, COUNT(id_photo) AS nb_jaime 
					FROM aime,photo 
					WHERE aime.id_photo=photo.id and photo.id_theme = $id 
					GROUP BY id_photo 
					HAVING COUNT(id_photo) >= $maximum  
					ORDER BY id_photo;";
		$reponse = $pdo->prepare($requete); 
		$reponse->execute();
		$enregistrements6 = $reponse->fetchAll();

		$top = $enregistrements6[0]['id_photo'];
		$requete = "SELECT * FROM photo WHERE id=$top;"; 
		$reponse = $pdo->prepare($requete); 
		$reponse->execute();
		$top_photo = $reponse->fetchAll();

		$id_top_membre = $top_photo[0]['id_membre'];
		$requete = "SELECT * FROM membre WHERE id=$id_top_membre;"; 
		$reponse = $pdo->prepare($requete); 
		$reponse->execute();
		$top_membre = $reponse->fetchAll();

		$id_gagnant = $top_membre[0]['id'];
		$requete = "UPDATE theme SET id_gagnant=$id_gagnant where id=$id ;"; 
		$reponse = $pdo->prepare($requete); 
		$reponse->execute();
	
		$chemin_image =$dossier_image.$top_photo[0]['nom'];
		echo "<p><strong>@".$top_membre[0]['pseudo']."     </strong><em>".$top_photo[0]['date']."</em></p>";
		echo"<img width=100% src=".$chemin_image." alt='photo' ></br>";
		echo "<p id='nb_jaime'>Nombres de votes: ".$maximum."</p>";

	}else{
		$requete = "UPDATE theme SET id_gagnant=0 where id=$id ;"; 
		$reponse = $pdo->prepare($requete); 
		$reponse->execute();
	}

	echo"<h2>Toutes les  photos</h2>";
	if(count($enregistrements3) !=0){
		for ($i=0; $i<count($enregistrements3); $i++) { 
			$id_membre=$enregistrements3[$i]['id_membre'];

			$requete = "SELECT * FROM membre WHERE id=$id_membre ;"; 
				$reponse = $pdo->prepare($requete); 
				$reponse->execute();
				$enregistrements2 = $reponse->fetchAll();
			$id_perso = $_SESSION['id_membre'];
			$id_photo = $enregistrements3[$i]['id'];

			$requete = "SELECT COUNT(id_photo) AS nb_jaime  FROM aime  WHERE id_photo=$id_photo GROUP BY id_photo ORDER BY nb_jaime DESC LIMIT 20  ;"; 
			$reponse = $pdo->prepare($requete); 
			$reponse->execute();
			$enregistrements5 = $reponse->fetchAll();



			$requete = "SELECT * FROM aime WHERE id_photo=$id_photo and id_membre =$id_perso;"; 
				$reponse = $pdo->prepare($requete); 
				$reponse->execute();
				$enregistrements4 = $reponse->fetchAll();

			$chemin_image =$dossier_image.$enregistrements3[$i]['nom'];
			echo "<p><strong>@".$enregistrements2[0]['pseudo']."</strong><em>     ".$enregistrements3[$i]['date']."</em></p>";
			echo"<img width='100%' src=".$chemin_image." alt='photo' ></br>";

			if(count($enregistrements5)== 0){
				$enregistrements5[0]['nb_jaime']=0;
			}

			echo "<p id='nb_jaime'>Nombres de votes: ".$enregistrements5[0]['nb_jaime']."</p>";
			echo "<div id=".$enregistrements3[$i]['id'].">";

			if(strtotime($enregistrements[0]['date_fin']) > time() ){
				if(count($enregistrements4) != 0){
					echo"<a href='jaime.php?id_photo=".$enregistrements3[$i]['id']."&jaime=0&id=".$id."'> Je n'aime plus</a><br>" ;		
				}else{
					echo"<a href='jaime.php?id_photo=".$enregistrements3[$i]['id']."&jaime=1&id=".$id."'> J'aime</a><br>" ;
				}
			}
			echo"<a href='interagir.php?id_photo=".$enregistrements3[$i]['id']."#comment'> Donnez votre avis</a><br>" ;
			echo "</div>";
		}
	}else{
		echo"<p>Pas de photos dans ce thème.<p>";
	}

?>


<?php include "pied.php"; ?>