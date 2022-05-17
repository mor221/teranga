<?php 
try{
		$bdd = new PDO('mysql:host=localhost;dbname=projetteranga;charset=utf8','root','');
	}
	catch(exception $e){
			die('Erreur: '. $e->getMessage());
		}

	 $id = $_GET['id'];

	$reponses = $bdd->query("SELECT * FROM produits WHERE NomCategorie = '$id' ");
	if ($donnees = $reponses->fetch()) {
		echo '<div id="articles">';
		do{
		 				$nomProduit = $donnees["NomProduit"]; 
		 				$prixProduit = $donnees["PrixProduit"];

		 					echo '<div class="article" onclick="calcul(this)">';
				 				echo '<div class="mini">';
					 				echo '<p class="p1">';
					 					echo $nomProduit;

					 				echo '</p>';
					 				echo '<p class="p2">';
					 					echo $prixProduit;
					 				echo '</p>';
				 				echo '</div>';
				 				echo '<div class="mini">';
				 					echo '<img src="data:image/jpeg;base64,';
				 					echo base64_encode( $donnees['ImageProduit']);
				 					echo '" width ="80px"  height ="80px" />';
				 				echo '</div>';
				 			echo '</div>';
				 			
				 
		}while ($donnees = $reponses->fetch());
						 				echo '</div>';
			echo '<div id="bottom">';
				echo'<p>Teranga shop | &copy; Tout droits reserves à 3S | tel: 337119815</p>';
		    echo'</div>';
	}
	else{
		echo'<div id="boite_erreur">';
			echo '<img src="icones/boite3.png"/>';
			echo '<p>Aucun article disponible dans cette section.</p>';
		echo '</div>'; 
		echo '<div id="bottom">';
			 echo'<p>Teranga shop | &copy; Tout droits reserves à 3S | tel: 337119815</p>';
		 echo'</div>';
	}
					$reponses->closeCursor();
 ?>
 <script type="text/javascript">
	 var myArray = [ "teal","#ff410","#ff4107","#f04e46","#655cb8","#373f73","#990021","#ed3300","#ebc400"];
	var n = document.getElementsByClassName("article");
		for (var i = 0; i < n.length; i+=3) {
			var rand = myArray[Math.floor(Math.random() * myArray.length)];
			n[i].style.backgroundColor = rand;
			n[i+1].style.backgroundColor = rand;
			n[i+2].style.backgroundColor = rand;
	 	}
</script>