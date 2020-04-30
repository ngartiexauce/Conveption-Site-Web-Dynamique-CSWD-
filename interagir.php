<?php
	$donnees['menu'] = "Theme";
	$donnees['titre_page'] = "interagir";
	include "entete.php"; 
	
	$id_photo=$_GET["id_photo"];
	$requete = "SELECT * FROM photo WHERE id=$id_photo ;"; 
	$reponse = $pdo->prepare($requete); 
	$reponse->execute();
	$enregistrements= $reponse->fetchAll();
	$dossier_image = "images\\";
	$chemin_image =$dossier_image.$enregistrements[0]['nom'];
	echo"<img width=100%  src=".$chemin_image." alt='photo'   ></br>";
			

	
	echo"<h2> Commenter</h2>";

	echo"<form id = 'commentaire'  action='enregistrer_commentaire.php?id_photo=".$id_photo."' method='post'>
		<label for='commentaire'>Commenter: </label><br>
		<textarea id='commentaire' name='commentaire' form='commentaire' rows='5' cols='40' maxlength='60' required></textarea><br>
		<input type='submit' value='Commenter'>
	</form>";
	$requete = "SELECT * FROM commentaire WHERE id_photo=$id_photo ORDER BY date DESC;"; 
	$reponse = $pdo->prepare($requete); 
	$reponse->execute();
	$enregistrements3 = $reponse->fetchAll();
	echo"<div id='comment'>";
	$id_membre_1 = $_SESSION['id_membre'];
	for($i=0; $i < count($enregistrements3); $i = $i+1){
		$id_membre = $enregistrements3[$i]['id_membre'];
		$requete = "SELECT * FROM membre WHERE id=$id_membre;"; 
		$reponse = $pdo->prepare($requete); 
		$reponse->execute();
		$enregistrements2 = $reponse->fetchAll();
		echo"<div id=chat>";
		if($enregistrements3[$i]['id_membre'] == $id_membre_1){
			echo "<p>@<strong>".$enregistrements2[0]['pseudo']."</strong>:".$enregistrements3[$i]['texte']."</p>";
			echo"<a id='supp1' href='supprimer_commentaire.php?id_commentaire=".$enregistrements3[$i]['id']."&id_photo=".$id_photo."'>supprimer</a>";
		}else{
			echo "<p>@<strong>".$enregistrements2[0]['pseudo']."</strong>:".$enregistrements3[$i]['texte']."</p>";
		}
		echo "<p id='date'>".$enregistrements3[$i]['date']."</p>";
		echo"</div>";			
	}
  	include "pied.php"; ?>