<?php
$donnees['menu'] = "Theme";
$donnees['titre_page'] = "theme";
?>
<?php include "entete.php"; ?>
	
<?php $id=$_GET["id"]; ?>	

<?php $requete = "SELECT * FROM photo WHERE id_theme=$id ORDER BY date DESC;"; 
			$reponse = $pdo->prepare($requete); 
			$reponse->execute();
			$enregistrements3 = $reponse->fetchAll();
			?>
			
<?php $requete = "SELECT * FROM theme WHERE id=$id ;"; 
			$reponse = $pdo->prepare($requete); 
			$reponse->execute();
			$enregistrements = $reponse->fetchAll();
			?>
	
<h2> <?php echo $enregistrements[0]['nom'] ?> </h2>

<?php 
//header("content-type:image/png");
for ($i=0; $i<count($enregistrements3); $i++) { 
	$id_membre=$enregistrements3[$i]['id_membre'];
	$requete = "SELECT * FROM membre WHERE id=$id_membre ;"; 
			$reponse = $pdo->prepare($requete); 
			$reponse->execute();
			$enregistrements2 = $reponse->fetchAll();
	echo "<p>".$enregistrements2[0]['pseudo']."</p>";
	
	/*if($row=$enregistrements3[$i]){
		$image_name=$row["nom"];
		$image_content=$row["photo"]; }
	echo "<img src=".$enregistrements3[$i]['photo'].">" ;*/
	
	echo "<p>".$enregistrements3[$i]['date']."</p>";
	}
?>


<?php include "pied.php"; ?>