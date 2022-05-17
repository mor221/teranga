
<?php  
	try{
		$bdd = new PDO('mysql:host=localhost;dbname=projetteranga;charset=utf8','root','');
	}
	catch(exception $e){
			die('Erreur: '. $e->getMessage());
		}
	$reponses = $bdd->query("SELECT * FROM produits WHERE NomCategorie = 'fruits_legumes' ");
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>teranga</title>
	<link rel="stylesheet" type="text/css" href="teranga.css">
	<script type="text/javascript" src="jquery-3.5.1.min.js"></script>
	<script type="text/javascript" src="teranga.js"></script>
 <script type="text/javascript">
	 var myArray = [ "teal","#ff410 ","#ff4107","#f04e46","#b104d4","#990021","#ed3300","#ebc400"];
		var n = document.getElementsByClassName("article")
		for (var i = 0; i < n.length; i+=3) {
			var rand = myArray[Math.floor(Math.random() * myArray.length)];
			n[i].style.backgroundColor = rand;
			n[i+1].style.backgroundColor = rand;
			n[i+2].style.backgroundColor = rand;
	 	}
</script>

</head>
<body>

	<div id="conteneur_1">

		<div id="top">
			<div id="logo"><img src="icones/logo.png" height="100%" width="100%"></div>
			<div id="session"></div>
			<div id="parametres">
				<figure>
					<img src="icones/stats.png">
					<figcaption>Statistiques</figcaption>
				</figure>
				<figure>
					<img src="icones/option.png">
					<figcaption>Paramètres</figcaption>
				</figure>
				<figure>
					<img src="icones/exit50.png">
					<figcaption>Déconnexion</figcaption>
				</figure>
			</div>
		</div>

		<div id="conteneur_2">

			<div id="menu">

				<div id="search"><div class="option"><img src="icones/chercher.png"/>
					<p><input type="text" name="recherche" id="recherche" placeholder="Rechercher" size="15px"></p></div>
				</div>
				<div id="options">
					<script type="text/javascript">
						 function recp(id){$('#conteneur_3').load('data.php?id='+id);}
						
					</script> 
					<div class="option" onClick="recp('fruits_legumes')" ><img src="icones/fruits.png"/><p>Fruits & légumes</p></div>
					<div class="option" onClick="recp('boulangerie')"><img src="icones/donut.png"/><p>Boulangerie </p></div>
					<div class="option" onClick="recp('vetements')"><img src="icones/tshirt.png"/><p>Vêtements</p></div>
					<div class="option" onClick="recp('beaute')"><img src="icones/lipstick.png"/><p>Beauté</p></div>	
					<div class="option" onClick="recp('electro_menager')"><img src="icones/laver.png"/><p>Electroménager</p></div>
					<div class="option" onClick="recp('vworkout')"><img src="icones/haltere.png"/><p>Workout </p></div>
					<div class="option" onClick="recp('bricolage')"><img src="icones/mart.png"/><p>Bricolage</p></div>		
					<div class="option" onClick="recp('tel_tablette')"><img src="icones/tech.png"/><p>Tel & Tablettes</p></div>	
					<div class="option" onClick="recp('jeux_videos')"><img src="icones/manette1.png"/><p>Jeux Vidéos</p></div>
					<div class="option" onClick="recp('boissons')"><img src="icones/soda.png"/><p>Boissons</p></div>
					<div class="option" onClick="recp('informatique')"><img src="icones/ordis.png"/><p>Informatique</p></div>
					<div class="option" onClick="recp('bebe')"><img src="icones/bebe.png"/><p>Bébé</p></div>
					<div class="option" onClick="recp('livre')"><img src="icones/livre.png"/><p>Livres</p></div>
					<div class="option" onClick="recp('films')"><img src="icones/film.png"/><p>Films</p></div>
					<div class="option" onClick="recp('musique')"><img src="icones/musique.png"/><p>Musique</p></div>
					<div class="option" onClick="recp('inc')"><img src="icones/inconnu.png"/><p>Categorie</p></div>
					<div class="option" onClick="recp('inc')"><img src="icones/inconnu.png"/><p>Categorie</p></div>
					<div class="option" onClick="recp('inc')"><img src="icones/inconnu.png"/><p>Categorie</p></div>
				</div>	
			</div>

			<div id="conteneur_3">
				<div id="articles">
					<?php 

		 			while ($donnees = $reponses->fetch()){
		 				$nomProduit = $donnees["NomProduit"]; 
		 				$prixProduit = $donnees["PrixProduit"];

		 			 ?>
					<div class="article" onclick="calcul(this)">
						<div class="mini">
							<p class="p1"><?php echo $nomProduit; ?></p><p class="p2"><?php echo $prixProduit  ?></p>
						</div>
						<div class="mini"><?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $donnees['ImageProduit'] ).'" width ="80px"  height ="80px" />'; ?>
					</div>
					</div>
					<?php 

					}
					echo '
					 <script type="text/javascript">
 					 var myArray = [ "teal","#ff410 ","#ff4107","#f04e46","#373f73","#655cb8","#990021","#ed3300","#ebc400"];

	
					var n = document.getElementsByClassName("article")
					for (var i = 0; i < n.length; i+=3) {
					var rand = myArray[Math.floor(Math.random() * myArray.length)];

					n[i].style.backgroundColor = rand;
					n[i+1].style.backgroundColor = rand;
					n[i+2].style.backgroundColor = rand;

					}
					</script>';
					$reponses->closeCursor();
					 ?>
				</div>

				<div id="bottom">
					<p>Teranga shop | &copy; Tout droits reserves à <span>Serigne Mor Sylla</span></p>
				</div>
			</div>
			<script type="text/javascript">
				var z = 0;
				var i = 0;

				function calcul(parent){
					var nom = parent.getElementsByClassName('mini')[0].getElementsByClassName('p1')[0].innerHTML;
					var prix = parent.getElementsByClassName('mini')[0].getElementsByClassName('p2')[0].innerHTML;
					var n = document.getElementsByClassName('ligne');
					var nani = document.getElementsByClassName('details_table')[0].getElementsByTagName('tbody')[0].getElementsByTagName('tr');
					//alert(nani.length);
					//var childs = document.getElementsByClassName('ligne')[z].childNodes;
					var childs = nani[z].childNodes;
					var seTrouve = new Boolean(false);
						for (i = 0; i < nani.length; i++) {
							if (nani[i].childNodes[3].innerHTML == nom){
								seTrouve = true;
								var l = i;
							}
						}
					if (seTrouve == false) {
									childs[3].innerHTML = nom;
									childs[5].innerHTML = prix;
									childs[1].innerHTML = 1;
									childs[7].innerHTML = '<img src="icones/retour.png" onclick = "rm(this)">';
									document.getElementById('montant_paye').innerHTML = parseInt(document.getElementById('montant_paye').innerHTML)+ parseInt(prix);
									z++;
					}

					else{
						nani[l].childNodes[5].innerHTML = parseInt(nani[l].childNodes[5].innerHTML)+parseInt(prix);
						nani[l].childNodes[1].innerHTML = parseInt(nani[l].childNodes[1].innerHTML) + 1;
						document.getElementById('montant_paye').innerHTML = parseInt(document.getElementById('montant_paye').innerHTML)+ parseInt(prix);
					}

				}
				function rm(popo){

					var test = popo;
					var reduction = popo;
					reduction = reduction.parentNode.parentNode;
					reduction = parseInt(reduction.getElementsByTagName('td')[2].innerHTML);

					var testerons = test.parentNode;
					var testerons = test.parentNode.parentNode;
					testerons.remove();
					var tableau = document.getElementsByClassName('details_table')[0];
					var tbody = tableau.getElementsByTagName('tbody')[0];
					document.getElementById('montant_paye').innerHTML = parseInt(document.getElementById('montant_paye').innerHTML) -  reduction ;
					tbody.insertRow().innerHTML = '<tr class="ligne">'+'<td></td>'+'<td></td>'+'<td></td>'+'<td></td>'+'</tr>';
					/*
					var te = tbody.insertRow();
					var colonne1 = te.insertCell(0);
					var colonne2 = te.insertCell(1);
					var colonne3 = te.insertCell(2);
					var colonne4 = te.insertCell(3);
					*/
					z--;
				}
			</script>
			<div id="caisse_container"> 
				<div id="caisse">
					<div id="details">
						<table class="details_table">
							<thead>
								<tr>
									<th class="qtt">quantité</th>
									<th class="art">articles</th>
									<th class="price">prix (FCFA)</th>
									<th class="image"></th>
								</tr>
							</thead>
							<tbody>
								<tr class="ligne">
									<td class="qtt"></td>
									<td class="art"></td>
									<td class="price"></td>
									<td class="image"></td>
								</tr>
								<tr class="ligne">
									<td class="qtt"></td>
									<td class="art"></td>
									<td  class="price"></td>
									<td class="image"></td>
								</tr>							
								<tr class="ligne">
									<td></td>
									<td></td>
									<td></td>
									<td></td>
								</tr>								
								<tr class="ligne">
									<td></td>
									<td></td>
									<td></td>
									<td></td>
								</tr>								
								<tr class="ligne">
									<td></td>
									<td></td>
									<td></td>
									<td></td>
								</tr>								
								<tr class="ligne">
									<td></td>
									<td></td>
									<td></td>
									<td></td>
								</tr>								
								<tr class="ligne">
									<td></td>
									<td></td>
									<td></td>
									<td></td>
								</tr>								
								<tr class="ligne">
									<td></td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
								<tr class="ligne">
									<td></td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
								<tr class="ligne">
									<td></td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
								<tr class="ligne">
									<td></td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
								<tr class="ligne">
									<td></td>
									<td></td>
									<td></td>
									<td></td>
								</tr>							
													

	
							</tbody>
						</table>
						<table class="recap_table">
							<tbody>
								<tr>
									<td>&Agrave; payer (FCFA)</td>
									<td id="montant_paye">0</td>
								</tr>
								<tr>
									<td>Montant tendu</td>
									<td></td>
								</tr>
								<tr>
									<td>&Agrave; rendre</td>
									<td></td>
								</tr>
							</tbody>
						</table>
					</div>
					<style>
body {font-family: Arial, Helvetica, sans-serif;}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  background-color: #f5f7f8;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width:400px;
  height: 570px;
  min-width: 350px;
  box-shadow: 0 4px 2px -2px gray;
  border-radius: 5px;


}
.parapara{
	font-weight: bold;
	font-size: 20px;
}


/* The Close Button */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}
#numeros{
	width: 90%;
	margin-left: auto;
	margin-right: auto;
	margin-top: 15px;
	margin-bottom: 25px;
    padding: 20px 3px 20px 5px;
	box-sizing: border-box;
	display: grid;
	grid-template-columns: repeat(3,105px);
	grid-auto-rows: 50px;
	grid-gap: 15px 15px;
	box-shadow: 2px 4px 3px 0px rgba(158, 177, 187,0.7);
}
.numero{
	background-color: #e1e2e3;
	box-shadow: 0 5px 5px 0 rgba(0,0,0, .5);
	text-align: center;
	font-weight: bold;
	font-size: 20px;
}
.numero:hover,.numero:active,.numero:focus{
	cursor: pointer;
	transform: scale(1.04);
}
.numImg{
	display: flex;
}
.numImg img{
	margin:auto;
	padding-top: 7px;

}
legend:first-of-type{
	opacity: 0.5;
	font-size: 15px;
}
legend:last-of-type{
	font-size: 15px;
	opacity:1;
}
form{
	width: 90%;
	margin-left: auto;
	margin-right: auto;

}
form p{
	color: red;

}
fieldset span{
	width: 100%;
	font-weight: bold;
	font-size: 15px;
}
fieldset{
	  border-radius: 5px;
	  border-color: black;

}
input, input::placeholder{
	font-weight: bold;
	color: black;
	font-size: 15px;
}
input{
	background-color: #f5f7f8;
	height: 25px;
}
input, input:focus{
	border: none;
	outline: none;
}
#button_finition{
	width: 90%;
	margin-left: auto;
	margin-right: auto;
	margin-top: 25px;
	display: grid;
	grid-template-columns: 1fr 2fr 1fr;
	grid-auto-rows: 35px;
	grid-gap: 15px 15px;
}
.button_finition :hover,.button_finition:active, .button_finition:focus, .button_finition:visited {
	cursor: pointer;
	transform: scale(1.04);
}
#button_finition button{
	text-transform: uppercase;
	font-weight: bold;
	background-color: #f5f7f8;
}
.rouge::-webKit-input-placeholder{
	color: red;
}
#buttonMonnaie{
	border: 2px solid #2ECC71;
	color:  #2ECC71;
}
#cancel{
	border: none;
	color: #E67E22;
}
#finish{
	border: 2px solid black;
}
#buttonMonnaie:hover,#buttonMonnaie:active,#buttonMonnaie:focus,#buttonMonnaie:visited{
	cursor: pointer;
	transform: scale(1.04);
	border-color: #2ECC71.

}
#cancel:hover,#cancel:active,#cancel:focus,#cancel:visited{
cursor: pointer;
transform: scale(1.04);
border: none;
}
#finish:hover,#finish:active,#finish:focus,#finish:visited{
	cursor: pointer;
	transform: scale(1.04);
}
</style>
</head>
<body>
<!-- Trigger/Open The Modal -->
<div id="buttons">
						<div class="buttons_validation">
							<div class="item1"><img src="icones/money.png"></div>
							<div id = "myBtn" class="item2"><p>Encaisser par cash</p></div>
						</div>						
						<div class="buttons_validation">
							<div class="item1"><img src="icones/card.png"></div>
							<div class="item2"><p>Encaisser via Carte</p></div>
						</div>
						<div class="buttons_validation">
							<div class="item1"><img src="icones/vider_panier.png"></div>
							<div id ="toZero" class="item2"><p>Annuler</p></div>
						</div>
					</div>			

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    	<span class="close"></span>
    	<p class="parapara">Encaisser</p>
   		<form action="" method="post">
  			<fieldset>
  		  		<legend>montant-tendu*</legend>
  		  		<span><input type="text" placeholder="0" name="montant_tendu" id="montant_tendu" readonly> FCFA</span>
  			</fieldset>
		</form>
		<div id="numeros">
			<div class="numero" onclick="remplir(this)"><p>1</p></div>
			<div class="numero" onclick="remplir(this)"><p>2</p></div>
			<div class="numero" onclick="remplir(this)"><p>3</p></div>			
			<div class="numero" onclick="remplir(this)"><p>4</p></div>
			<div class="numero" onclick="remplir(this)"><p>5</p></div>
			<div class="numero" onclick="remplir(this)"><p>6</p></div>			
			<div class="numero" onclick="remplir(this)"><p>7</p></div>
			<div class="numero" onclick="remplir(this)"><p>8</p></div>
			<div class="numero" onclick="remplir(this)"><p>9</p></div>			
			<div class="numero" onclick="remplir(this)"><p>0</p></div>
			<div class="numero numImg" onclick="vider(this)"><img src="icones/refresh.png"></div>
			<div class="numero numImg" onclick="effacer(this)"><img src="icones/clear.png"></div>			
		</div>
		<script type="text/javascript">
			function remplir(element){
				var para = element.getElementsByTagName('p')[0];
				var numero = para.innerHTML;
				var valeure = $('input[name=montant_tendu]').val();
				$('input[name=montant_tendu]').val(valeure+numero);
			}
			function vider(element){
				$('input[name=montant_tendu]').val("");
			}
			function effacer(element){
				$('input[name=montant_tendu]').val(function(index, value){ return value.substr(0, value.length - 1);})
			}
		</script>
		<form action="" method="post">
  			<fieldset>
  		  		<span><input type="text" placeholder="à rendre" name="aRendre" id="aRendre" readonly> FCFA</span>
  			</fieldset>
		</form>
		<div id="button_finition">
			<button id="finish">Finir</button>
			<button id="buttonMonnaie" onclick="verifMonnaie()">Rendre monnaie</button>
			<button id="cancel">Annuler</button>
		</div>
  </div>

</div>

<script>
var tozero = document.getElementById("toZero");

var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

document.getElementById("cancel").onclick = function() {
  modal.style.display = "none";
}
document.getElementById("finish").onclick = function() {
  modal.style.display = "none";
  location.reload();
}
//remettre à zero la caisse
tozero.onclick = function(){
	location.reload();
}
// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
  		document.getElementsByTagName('fieldset')[1].style.borderColor= "black";
		document.getElementsByTagName('fieldset')[1].style.color= "black";
		$('input[name=aRendre]').removeClass('rouge');
		$('#lalegende').remove();
		$('input[name=montant_tendu]').val("");
		$('input[name=aRendre]').val("");




}
function verifMonnaie(){
	var montant_a_payer = document.getElementById('montant_paye').innerHTML;
	montant_a_payer = parseInt(montant_a_payer);
	var montant_ten = parseInt($('input[name=montant_tendu]').val())





	if (montant_ten >= montant_a_payer) {
		var resultat = montant_ten - montant_a_payer ;
		$('input[name=aRendre]').val(resultat);
		document.getElementsByTagName('fieldset')[1].style.borderColor= "green";
		document.getElementsByTagName('fieldset')[1].style.color= "green";
		var newLegend = document.createElement("LEGEND");
		newLegend.setAttribute("id","lalegende");
		if ($('#lalegende').length){

		}
		else{
			newLegend.textContent = 'à rendre';
		var arendre = document.getElementsByTagName('fieldset')[1];
		arendre.prepend(newLegend);
		}
		

	}
	else{
		document.getElementsByTagName('fieldset')[1].style.borderColor= "red";
		document.getElementsByTagName('fieldset')[1].style.color= "red";
		document.getElementById('aRendre').placeholder = "Montant insuffisant";
		$('input[name=aRendre]').addClass('rouge');
	}
	
}

</script>
				</div>
			</div>

		</div>
		
	</div>
		
</body>
</html>