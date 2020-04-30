<?php
$donnees['menu'] = "Profil";
$donnees['titre_page'] = "page de profil";
?>
<?php include "entete.php"; ?>
	
	<h2> Votre profil </h2>
	<?php
	if (!isset($_SESSION['id_membre'])){
		echo "Vous devez vous connecter pour avoir acces a votre profil.";
	} else {
		$id_membre=$_SESSION['id_membre'];
		/*echo "<p>Bonjour ".$_SESSION['pseudo']."!</p>" ;*/
		$requete = "SELECT * FROM theme WHERE id_gagnant = $id_membre;"; 
			$reponse = $pdo->prepare($requete); 
			$reponse->execute();
			$enregistrements3 = $reponse->fetchAll();
		echo"<div ='certif'><img  src=images/icon-reference.svg alt='photo'></div>";
		if(count($enregistrements3) == 0){
			echo"<p class='prof'>Aucune victoire<p>";
		}else{
			echo"<p class='prof'>Thèmes remportés:</p>";
			echo"<ul>";
			for($i=0; $i<count($enregistrements3); $i=$i+1){
				echo"<li>".$enregistrements3[$i]['nom']."</li>";
			}
			echo "</ul>";
		}
		$requete = "SELECT * FROM forum WHERE id_membre=$id_membre  ORDER BY date DESC LIMIT 5;"; 
		$reponse = $pdo->prepare($requete); 
		$reponse->execute();
		$enregistrements4 = $reponse->fetchAll();
		if(count($enregistrements4)!=0){
			echo"<p class='prof'>Vos forums:</p>";
			
	
			echo"<ul>";
			for($i=0; $i<count($enregistrements4); $i=$i+1){
				echo"
					<li><a href=forum_interagir.php?id_forum=".$enregistrements4[$i]['id'].">".$enregistrements4[$i]['sujet']."</a></li>
					<a id='supp2' href='supprimer_forum.php?id_forum=".$enregistrements4[$i]['id']."&pro=1'>supprimer</a>";
			}
			echo"</ul>";

		}

		
		$requete = "SELECT * FROM photo WHERE id_membre=$id_membre ORDER BY date DESC;"; 
		$reponse = $pdo->prepare($requete); 
		$reponse->execute();
		$enregistrements = $reponse->fetchAll();

		if(count($enregistrements) !=0){	
			echo"<h2>Toutes vos photo</h2>";
			$dossier_image = "images\\"; 
			for ($i=0; $i<count($enregistrements); $i++) { 
				$id_theme=$enregistrements[$i]['id_theme'];
				$requete = "SELECT * FROM theme WHERE id=$id_theme ;"; 
					$reponse = $pdo->prepare($requete); 
					$reponse->execute();
					$enregistrements2 = $reponse->fetchAll();
				echo "<p id='theme'>".$enregistrements2[0]['nom']."</p>";
				$chemin_image =$dossier_image.$enregistrements[$i]['nom'];
				echo"<img width='100%' src=".$chemin_image." alt='photo'   ></br>";
				echo "<p id='date'>".$enregistrements[$i]['date']."</p>";
				echo"<a id='retirer' href='supprimer.php?id_photo=".$enregistrements[$i]['id']."&nom=".$enregistrements[$i]['nom']."'>Rétirer la photo</a><br>" ;
			}
		}else{
			echo"<p>Vous n'avez pas de photos.</br>Choisissez un thème et postez des photos pour défier les autres membres</p>";
		}
	}
?>
	

<?php include "pied.php"; ?>