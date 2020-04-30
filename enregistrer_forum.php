<?php
$donnees['menu'] = "Theme";
$donnees['titre_page'] = "theme";
?>
<?php include "entete.php"; 
$sujet=$_POST["titre"]; 
$id_membre= $_SESSION['id_membre'];
?>
	
<h2> Poster </h2>
<?php
if(isset($_POST["forum"])){
	$message = $_POST["forum"];
	$requete="INSERT INTO forum (id_membre,date,texte,sujet) VALUES (?,NOW(),?,?)"; 
	$reponse=$pdo->prepare($requete); 
	$reponse->execute(array($id_membre ,$message,$sujet));

}

 header("Location: forum.php#comment");
 exit();
?>