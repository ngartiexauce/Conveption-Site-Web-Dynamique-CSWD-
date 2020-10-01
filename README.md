# Conception-Site-Web-Dynamique-CSWD
Dynamic Website Design - Licence 2 
Project is currently live at https://pedagovic.uf-mi.u-bordeaux.fr/~eluwehadjimn/cswd/projet/accueil.php

## EMB

## PHOTOGRAPHY

## CONTEST

&nbsp;

```
 Projet de conception site web dynamique.
 Exaucé LUWEH ADJIM NGARTI
 Madeleine EYRAUD
 Blaise ESPERABE VIGNAU
```

&nbsp;

# **Objectifs:**

## -Permettre aux membres de partager et commenter des photos.
##  -Mettre en place un concours de photos parenthème pour élire la meilleure photo au bout d’un délai fixé.
## - Donner la possibilité à chaque membre de voter pour sa meilleure photo.
##  -Mettre en place un forum afin que les membres puissent échanger sur des sujets divers et proposer des idées pour les thèmes avenirs.
##  -Mettre à la disposition de tout le monde(inscrit ou non), une galerie des meilleures photos postées.

&nbsp;


# **Captures d’écran de quelques parties du site.**

&nbsp;


## **Accueil du site:**


![alt text](https://raw.githubusercontent.com/ngartiexauce/Conveption-Site-Web-Dynamique-CSWD-/master/images/md/accueil.png "Accueil")


&nbsp;
## **Présentation et meilleures photos:**
![alt text](https://raw.githubusercontent.com/ngartiexauce/Conveption-Site-Web-Dynamique-CSWD-/master/images/md/presentation.png)


&nbsp;
## **S’inscrire:**
![alt text](https://raw.githubusercontent.com/ngartiexauce/Conveption-Site-Web-Dynamique-CSWD-/master/images/md/sinscrire.png)


&nbsp;
## **Se connecter:**
![alt text](https://raw.githubusercontent.com/ngartiexauce/Conveption-Site-Web-Dynamique-CSWD-/master/images/md/seconnecter.png)


&nbsp;
## **Une fois connecté(e):**
![alt text](https://raw.githubusercontent.com/ngartiexauce/Conveption-Site-Web-Dynamique-CSWD-/master/images/md/unefoisconnecte.png)


&nbsp;
## **Dans un thème:**
![alt text](https://raw.githubusercontent.com/ngartiexauce/Conveption-Site-Web-Dynamique-CSWD-/master/images/md/dansuntheme.png)


&nbsp;
## **Dans un thème, chaque photo :**
![alt text](https://raw.githubusercontent.com/ngartiexauce/Conveption-Site-Web-Dynamique-CSWD-/master/images/md/dansunthemechaquephoto.png)


&nbsp;
## **Aimer une photo:**
![alt text](https://raw.githubusercontent.com/ngartiexauce/Conveption-Site-Web-Dynamique-CSWD-/master/images/md/aimerunephoto.png)


&nbsp;
## **Ne plus aimer une photo:**
![alt text](https://raw.githubusercontent.com/ngartiexauce/Conveption-Site-Web-Dynamique-CSWD-/master/images/md/neplusaimer.png)


&nbsp;
## **Commenter une photo:**
![alt text](https://raw.githubusercontent.com/ngartiexauce/Conveption-Site-Web-Dynamique-CSWD-/master/images/md/commenterunephoto.png)



&nbsp;
## **Thème déjà terminé(commenter seulement ):**
![alt text](https://raw.githubusercontent.com/ngartiexauce/Conveption-Site-Web-Dynamique-CSWD-/master/images/md/themedejatermine.png)



&nbsp;
## **Forum:**
![alt text](https://raw.githubusercontent.com/ngartiexauce/Conveption-Site-Web-Dynamique-CSWD-/master/images/md/forum.png)


&nbsp;
## **Répondre à message sur un forum:**
![alt text](https://raw.githubusercontent.com/ngartiexauce/Conveption-Site-Web-Dynamique-CSWD-/master/images/md/repondreaunmessagesurunforum.png)


&nbsp;
## **Titres remportés et la possibilité de supprimer son compte:**
![alt text](https://raw.githubusercontent.com/ngartiexauce/Conveption-Site-Web-Dynamique-CSWD-/master/images/md/titre.png)


&nbsp;
## **Voir ses forums et toutes ses photos:**
![alt text](https://raw.githubusercontent.com/ngartiexauce/Conveption-Site-Web-Dynamique-CSWD-/master/images/md/voirsesforumsettoutessesphotos.png)


&nbsp;
## **Supprimer une photo de son profil:**
![alt text](https://raw.githubusercontent.com/ngartiexauce/Conveption-Site-Web-Dynamique-CSWD-/master/images/md/supprimerunephotodesonprofil.png)


&nbsp;
## **Télécharger des photos:**
![alt text](https://raw.githubusercontent.com/ngartiexauce/Conveption-Site-Web-Dynamique-CSWD-/master/images/md/telechargerdesphotos.png)


&nbsp;
## **Voir le profil des autres:**
![alt text](https://raw.githubusercontent.com/ngartiexauce/Conveption-Site-Web-Dynamique-CSWD-/master/images/md/voirleprofildesautres.png)


&nbsp;
## **Sur le profil d’un(e) autre membre:**
![alt text](https://raw.githubusercontent.com/ngartiexauce/Conveption-Site-Web-Dynamique-CSWD-/master/images/md/surleprofildunautremembre.png)


&nbsp;
## **Se déconnecter:**
![alt text](https://raw.githubusercontent.com/ngartiexauce/Conveption-Site-Web-Dynamique-CSWD-/master/images/md/sedeconnecter.png)


&nbsp;
# **Menus et structure:** 


&nbsp;
## **Structure:**
![alt text](https://raw.githubusercontent.com/ngartiexauce/Conveption-Site-Web-Dynamique-CSWD-/master/images/md/structure.png)


&nbsp;
## **Menu côté gauche:**
![alt text](https://raw.githubusercontent.com/ngartiexauce/Conveption-Site-Web-Dynamique-CSWD-/master/images/md/menucotegauche.png)


&nbsp;
## **Menu côté droit:**
![alt text](https://raw.githubusercontent.com/ngartiexauce/Conveption-Site-Web-Dynamique-CSWD-/master/images/md/menucotedroit.png)


&nbsp;
## **Tables de la base de données et leurs relations:**
![alt text](https://raw.githubusercontent.com/ngartiexauce/Conveption-Site-Web-Dynamique-CSWD-/master/images/md/table.png)


&nbsp;
# **Code PHP particulièrement spécifique à notre projet:**


&nbsp;
# **Enregistrer poste:**
 ```php
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
```

&nbsp;
# **Supprimer poste:**
```php
<?php
$donnees['menu'] = "Accueil";
$donnees['titre_page'] = "page d'accueil";
?>
<?php include "entete.php"; 
		$dossier_image = "images\\"; 
		$id_photo = $_GET['id_photo'];
		$nom = $_GET['nom'];
		$chemin_final=$dossier_image.$nom;
		unlink($chemin_final) ;
		$requete="DELETE from photo WHERE id=$id_photo;"; 
			$reponse=$pdo->prepare($requete); 
			$reponse->execute();
		$requete="DELETE from commentaire WHERE id_photo=$id_photo;"; 
			$reponse=$pdo->prepare($requete); 
			$reponse->execute();
		$requete="DELETE from aime WHERE id_photo=$id_photo;"; 
			$reponse=$pdo->prepare($requete); 
			$reponse->execute();	
	header("Location: profil.php");
	exit();
			
	?>

```

&nbsp;
# **Code source:**

![alt text](https://raw.githubusercontent.com/ngartiexauce/Conveption-Site-Web-Dynamique-CSWD-/master/images/md/codesource.png)


&nbsp;
# **CSS:**

```css
h1,h2,h3,h4
{
	color: #cccccc;
	text-align: center;
	background-color: 404040;
}

.loremipsum
{
	font-style: italic;
	text-align: left;
}

a { color: black } /* lien non visité */

article
{
	margin: 10px;
	padding: 5px;
	border: 1px solid #AAAAAA;
	background-color: #dddddd;
}

```


```css
header
{
	margin: 10px;
	padding: 10px;
	border: 10px solid #FF6666;
	color: white;
}

footer
{
	margin: 5px 10px;
	padding: 20px;
	border: 1px solid #000000;
	text-align: center;
	color: white;
	position: relative;
	bottom: 0px;
}

```


```css
ul.menu {
	list-style-type: none;
	margin: 0;
	padding: 0;
	
	display: flex; /* ou block pour vertical */
	flex-flow: row;
	justify-content: center; /* ou bien flex-start ou bien flex-end */
	
	background-color: #CCCCCC;
	border: 4px solid #AAAAAA;
}

ul.menu li a{
	text-decoration: none;
	padding: .75em 1.25em;
	
	display: block;
	
	color: black;
	background-color: #AEDFBC;
	
	transition: background .4s ease-in-out;
}


```




&nbsp;
## **Responsive:**

```css

ul.menu li a:hover
{
	background-color: #999999;
}

@media screen and (max-width: 640px) {
	.loremipsum {
		background-color: #FFFFFF;
	}
}

@media screen and (min-width: 641px) {
	.loremipsum {
		background-color: #CCCCCC;
	}
}
```


&nbsp;
## **Positionner côte à côte:**
```css
body{
	background-color: #cccccc;
	width: auto;
}
section, aside, header, footer{
	padding: 10px;
}
header, footer{
	background-color: #888888;
}

#coteacote{
	display: flex;
}
section{
	width: 60%;
	background-color: white;
}
aside{
	width: 20%;
	background-color: #cccccc;
}

```


&nbsp;
## **Responsive:**
```css
#tout{
	width: 800px;
	margin: 0 auto;
}

/* max width pour les petits ecrans */
@media screen and (max-width: 640px){
	#coteacote{
		display: block;
	}
	section, aside{
		width: auto;
	}
	ul.menu {
		display: block;
	}
}

```


&nbsp;
## **Les items et les liens:**

```css
#supp1{
	text-align: right;
	color: red;
	position: relative;
}

#supp2{
	text-align: right;
	color: red;
	position: relative;
	left:;
}

#repondre{
	text-align: right;
	color: blue;
	position: relative;

}

#retirer{
	color: red;
}
#nb_jaime{
	color: green;
}
#certif{
	position: center;
}

```


&nbsp;
## **Mise en forme des messages postés sur le forum:**

```css
#forum-bloc{
	border-width: 1px;
	border-style:solid;
	border-radius: 10px;
	background:#bad8d7;
  	display: block;
  	width: 100%;
  	overflow: hidden;
  	white-space: nowrap;
  	text-overflow: ellipsis;
  	margin: 0px 0px 10px 0px;
	
}
```



&nbsp;
## **Mise en forme des commentaires de photos:**
```css

#chat{
	border-width: 1px;
	border-style:none;
	border-radius: 8px;
	background:#e8eced;
  	display: block;
  	width: 100%;
  	overflow: hidden;
  	white-space: nowrap;
  	text-overflow: ellipsis;
  	margin: 0px 0px 8px 0px;

}	
	
#date{
	font-style: italic;
}	


```



# **Contribution de chaque participant:**

Tout le monde a travaillé comme il se doit pour l’aboutissement de ce projet.
 


&nbsp;
# **Éléments de notre site qui fonctionnent:**

## - Se créer un compte, se connecter et se déconnecter
## - Poster et supprimer des photos
## - Voter et commenter des photos
## - Retirer un vote à une photo
## - Attribution de titre à la fin de chaque Contest
## - Rechercher un autre utilisateur à partir de son pseudo
## - Afficher la liste de tous les membres
## - Lancer et supprimer des discussion sur le forum
## - Participer à une discussion sur le forum
## - Avoir toutes ses discussion du forum sur son profil
## - Afficher toutes les photos associées au nombre de votes par thème
## - Présenter les vingt meilleures photos à l’accueil pour les utilisateurs non inscrits ou déconnectés
## - Exporter des photos depuis son profil
## - Supprimer définitivement son compte



&nbsp;
# **Éléments de notre site qui ne fonctionnent pas:**

## • RAS


&nbsp;
# **Difficultés rencontrées:**

## - Requête DELETE sur plusieurs tables
## - Sinon pas de difficultés de majeures.



&nbsp;
# **Perspectives futures:**

## - Mettre en place un chat en plus du forum pour des communications privées.


