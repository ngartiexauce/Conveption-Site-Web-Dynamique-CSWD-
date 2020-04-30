<?php
$donnees['menu'] = "Theme";
$donnees['titre_page'] = "theme";
?>
<?php include "entete.php"; 
$id_forum=$_GET["id_forum"]; 
$id_membre= $_SESSION['id_membre'];
?>
	
<h2> Poster </h2>
<?php
if(isset($_POST["commentaire"])){
	$commentaire = $_POST["commentaire"];
	$requete="INSERT INTO commentaire_forum (id_membre,id_forum,date,texte) VALUES (?, ?,NOW(),?)"; 
	$reponse=$pdo->prepare($requete); 
	$reponse->execute(array($id_membre,$id_forum ,$commentaire));

}
include "pied.php";
 header("Location: forum_interagir.php?id_forum=".$id_forum."#comment");
 exit();
?>