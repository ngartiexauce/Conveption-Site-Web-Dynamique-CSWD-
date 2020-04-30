<?php
	$donnees['menu'] = "Theme";
	$donnees['titre_page'] = "Forum";
	include "entete.php"; 
	

			

	
	echo"<h2>Forum</h2>";
	echo"<div id='comment'>";
	echo"<form id = 'forum-form'  action='enregistrer_forum.php' method='post'>
		    <label for='titre'>Sujet: </label><br>
		    <input type='text' id='titre' name='titre'   maxlength='40' required><br>
		    <label for='forum'>Message: </label><br>
			<textarea id='forum' name='forum' form='forum-form' rows='5' cols='40' maxlength='100' required></textarea><br>
			<input type='submit' value='Poster'>
		</form>";
	$requete = "SELECT * FROM forum ORDER BY date DESC;"; 
	$reponse = $pdo->prepare($requete); 
	$reponse->execute();
	$enregistrements3 = $reponse->fetchAll();
	
	$id_membre_1 = $_SESSION['id_membre'];
	if(count($enregistrements3)!=0){
		echo"<h2>Derniers messages sur le forum</h2>";
		for($i=0; $i < count($enregistrements3); $i = $i+1){
			$id_membre = $enregistrements3[$i]['id_membre'];
			$requete = "SELECT * FROM membre WHERE id=$id_membre;"; 
			$reponse = $pdo->prepare($requete); 
			$reponse->execute();
			$enregistrements2 = $reponse->fetchAll();
			echo"<div id='forum-bloc'>";
			echo"<p id='sujet'>Sujet :".$enregistrements3[$i]['sujet']."</p>";
			if($enregistrements3[$i]['id_membre'] == $id_membre_1){
				echo "<p>@<strong>".$enregistrements2[0]['pseudo'].":</strong> ".$enregistrements3[$i]['texte']."</p>";
				echo "<a id='supp' href='supprimer_forum.php?id_forum=".$enregistrements3[$i]['id']."&pro=0'>supprimer</a>";
			}else{

				echo "<p>@<strong>".$enregistrements2[0]['pseudo']."</strong>:".$enregistrements3[$i]['texte']."</p>";
			}

			echo"<a id='repondre' href='forum_interagir.php?id_forum=".$enregistrements3[$i]['id']."'>Répondre</a>";
			echo "<p id='date'>".$enregistrements3[$i]['date']."</p>";
			echo"</div>";			
		}
	}
	echo"</div>";
  	include "pied.php"; ?>