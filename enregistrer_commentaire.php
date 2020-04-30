<?php
$donnees['menu'] = "Theme";
$donnees['titre_page'] = "theme";
?>
<?php include "entete.php"; 
$id_photo=$_GET["id_photo"]; 
$id_membre= $_SESSION['id_membre'];
?>
	
<h2> Poster </h2>
<?php
if(isset($_POST["commentaire"])){
	$commentaire = $_POST["commentaire"];
	$requete="INSERT INTO commentaire (id_membre,id_photo,date,texte) VALUES (?, ?,NOW(),?)"; 
	$reponse=$pdo->prepare($requete); 
	$reponse->execute(array($id_membre,$id_photo ,$commentaire));

}
include "pied.php";
 header("Location: interagir.php?id_photo=".$id_photo."#comment");
 exit();
?>