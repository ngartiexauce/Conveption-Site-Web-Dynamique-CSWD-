<?php
	$donnees['menu'] = "Theme";
	$donnees['titre_page'] = "interagir-forum";
	include "entete.php"; 
	echo"<h2> Forum </h2>";
	$id_forum=$_GET["id_forum"];
	$requete = "SELECT * FROM forum WHERE id=$id_forum ;"; 
	$reponse = $pdo->prepare($requete); 
	$reponse->execute();
	$enregistrements= $reponse->fetchAll();

	$id_membre = $enregistrements[0]['id_membre'];
	$requete = "SELECT * FROM membre WHERE id=$id_membre ;"; 
	$reponse = $pdo->prepare($requete); 
	$reponse->execute();
	$enregistrements1= $reponse->fetchAll();
	echo"<div id='forum-bloc'>";
	echo"<p id='sujet'>Sujet: ".$enregistrements[0]['sujet']."<p>";
	echo "<p>@<strong>".$enregistrements1[0]['pseudo'].":</strong> ".$enregistrements[0]['texte']."</p>";
	echo "<p id='date'>".$enregistrements[0]['date']."</p>";
	echo"</div>";
			

	

	$requete = "SELECT * FROM commentaire_forum WHERE id_forum=$id_forum ORDER BY date DESC;"; 
	$reponse = $pdo->prepare($requete); 
	$reponse->execute();
	$enregistrements2 = $reponse->fetchAll();
	echo"<div id='comment'>";

	echo"<form id = 'inter-agir'  action='enregistrer_commentaire_forum.php?id_forum=".$id_forum."' method='post'>
		<label for='commentaire'>Répondre: </label><br>
		<textarea id='commentaire' name='commentaire' form='inter-agir' rows='5' cols='50' maxlength='70' required></textarea><br>
		<input type='submit' value='Envoyer'>
	</form>";
	

	$id_membre_1 = $_SESSION['id_membre'];
	for($i=0; $i < count($enregistrements2); $i = $i+1){
		$id_membre = $enregistrements2[$i]['id_membre'];
		$requete = "SELECT * FROM membre WHERE id=$id_membre;"; 
		$reponse = $pdo->prepare($requete); 
		$reponse->execute();
		$enregistrements3 = $reponse->fetchAll();
		echo"<div id='chat'>";
		if($enregistrements2[$i]['id_membre'] == $id_membre_1){
			echo "<p>@<strong>".$enregistrements3[0]['pseudo']."</strong>:".$enregistrements2[$i]['texte']."</p>";
			echo"<a id='supp2' href='supprimer_commentaire_forum.php?id_commentaire=".$enregistrements2[$i]['id']."&id_forum=".$id_forum."'>supprimer</a>";
		}else{
			echo "<p>@<strong>".$enregistrements3[0]['pseudo']."</strong>:".$enregistrements2[$i]['texte']."</p>";
		}
		echo "<p id='date'>".$enregistrements2[$i]['date']."</p>";
		echo"</div>";			
	}
	echo"</div>";
  	include "pied.php"; ?>