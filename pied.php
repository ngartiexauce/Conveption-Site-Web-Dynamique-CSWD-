</section>
<aside>
	<article>
		<?php 
		if (isset($_SESSION['id_membre'])){?>
				<p><a href="profil.php"><?php echo $_SESSION['pseudo'] ;?></a></p>
				<p><a href="deconnexion.php">Se deconnecter</a></p>
				<?php
			} else {
				?> <p><a href="connexion.php?code=3">Se connecter</a> </p>
				<p><a href="inscription.php?code=2">S'inscrire</a></p>
				<?php } ?>
	</article>
	<?php
	if(isset($_SESSION['id_membre']) == true){ ?>
		<article>
		<?php
			
				if (isset($_GET['id'])){
					if(strtotime($enregistrements[0]['date_fin']) > time() ){
					?><a href="poster.php?id=<?php echo $id ; ?>&code=0"> <?php echo "Poster une photo dans ce theme" ; ?> </a>
					<?php
					}else{
						echo"<p>Concours terminé</p>";
					} 
				} else {
				echo "<p>Choisissez un thème pour poster une photo</p>" ;}?>

		</article>
		<article>
		<p><a href="forum.php">Forum</a></p>
		</article>
	<?php }?>
</aside>

</div>
<footer>Ce site a été créé par Madeleine, Blaise et Exaucé</footer>
</body>
	
</html>