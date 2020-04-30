<?php
$donnees['menu'] = "Theme";
$donnees['titre_page'] = "theme";
?>
<?php include "entete.php"; ?>


<h2> Enregistrer poste </h2>

<?php
$id=$_GET["id"];
$Alerte = '';
$dossier_image = "images\\";

$fileType = pathinfo($_FILES["nom"]["name"],PATHINFO_EXTENSION);
$nom =   date('dmYHis').".".$fileType;
echo $nom;
$chemin_final = $dossier_image . $nom;

if(isset($_POST["poster"]) && !empty($_FILES["nom"]["name"])){
    $allowTypes = array('jpg','png','jpeg');
    if(in_array($fileType, $allowTypes)){
        if(move_uploaded_file($_FILES["nom"]["tmp_name"], $chemin_final)){
            $insert = $pdo->query("INSERT into photo (id_membre, id_theme, nom, date) VALUES ('".$_SESSION['id_membre']."','".$id."', '".$nom."', NOW())");
            if($insert){
            	$code=1;
            }else{
            	$code=2;
            } 
        }else{
        	$code=3;
        }
    }else{
    	$code=4;
    }
}else{
	$code=5;
}

 header("Location: poster.php?id=".$id."&code=".$code."");
 exit();
?>
	

<?php include "pied.php"; ?>