<?php session_start(); ?>
<?php require_once("connexion_base.php"); ?>

<!DOCTYPE>
<html lang='fr'>

<head>
	<meta charset="utf-8">
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<title> <?php echo $donnees['titre_page'] ?> </title>
</head>

<body>
		<h1> EMB Photography Contest </h1>
<div id="coteacote">
	<?php if(isset($_SESSION['id_membre']) == true){?>
	<aside>
		<article>
			<a href="accueil.php">Accueil</a>
		</article>
		<article>
			<h3>Thèmes :</h3>
			<?php $requete = "SELECT * FROM theme ;"; 
			$reponse = $pdo->prepare($requete); 
			$reponse->execute();
			$enregistrements = $reponse->fetchAll();
			?>
			<ul>
			<?php
			for ($i=0; $i<count($enregistrements); $i++) { 
				?><li> <?php echo $enregistrements[$i]['nom'] ; ?> </li>
				</br>
				<?php
			}
			?>
			</ul>
		</article>
	</aside>
	<?php } ?>
	<section>
		