<!DOCTYPE html>
<html>
<head>
	<title>eBay ECE</title>
	<meta charset="utf-8">

	<link rel="stylesheet" type="text/css" href="css/eBay.css">
	<link rel="stylesheet" type="text/css" href="css/eBay_item.css">

	<link rel= "stylesheet" href= "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

	<script src= "https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.j s"> </script>
	<script src= "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/j s/bootstrap.min.j s"> </script>
</head>
<body>
	<div class="container-fluid">
		<header class="header">
			<div class="row" style="height:30px;">
				<div class="col-sm-12">
					<a href="../index.html">eBay Projet Piscine</a>
				</div>
			</div>
			<div class="row">
				<ul class=menu>
					<div class="col-sm-2">
						<li class="titre">
							<a href="">Catégorie <i class="fas fa-angle-down"></i></a>
							<ul class="sous_menu">
								<li><a href="ferrailleoutresor.html">Ferraille ou Trésor <i class="fas fa-gem"></i></a></li>
								<li><a href="bonpourlemusee.html">Bon pour le musée <i class="fas fa-landmark"></i></a></li>
								<li><a href="accessoirevip.html">Accessoire VIP <i class="fas fa-glass-cheers"></i></a></li>
							</ul>
						</li>
					</div>
					<div class="col-sm-2">
						<li class="titre">
							<a href="">Achat <i class="fas fa-angle-down"></i></a>
							<ul class="sous_menu">
								<li><a href="encheres.php">Enchères <i class="fas fa-bullhorn"></i></a></li>
								<li><a href="achatimmediat.html">Achetez-le maintenant <i class="fas fa-cash-register"></i></a></li>
								<li><a href="meilleureoffre.html">Meilleure offre <i class="fas fa-euro-sign"></i></a></li>
							</ul>
						</li>
					</div>
					<div class="col-sm-2">
						<li class="titre">
							<a href="../Vendeur_login.html">Vente <i class="fas fa-piggy-bank"></i></i></a>
						</li>
					</div>
					<div class="col-sm-2">
						<li class="titre">
							<a href="../Acheteur_login.html">Votre Compte <i class="fas fa-balance-scale-right"></i></a>
						</li>
					</div>
					<div class="col-sm-2">
						<li class="titre">
							<a href="">Votre Panier <i class="fas fa-shopping-cart"></i></a>
						</li>
					</div>
					<div class="col-sm-2">
						<li class="titre">
							<a href="../Admin_login.html">Admin <i class="fas fa-address-card"></i></a>
						</li>
					</div>
				</ul>
			</div>			
		</header>





		<lu class="item_list">
			<li class="item">
				<div class="col-sm-12">


					<div class="app-title">
						<h2>Items Achat immediat</h2>
					</div>

					<div class="login">
						<div class="login-screen">
							<div class="middle">	
								<?php

//identifier votre BDD
								$database = "projet";
//connectez-vous de votre BDD
								$db_handle = mysqli_connect('localhost', 'root', '');
								$db_found = mysqli_select_db($db_handle, $database);

								if ($db_found) {
									$sql = "SELECT ID_item FROM Item WHERE achete = '0' AND vente_item = 'vente par enchere'";
									$result = mysqli_query($db_handle, $sql);
									if (mysqli_num_rows($result) == 0) {
										echo "pas d'item";
									//exit();
									} else {
										while ($data = mysqli_fetch_assoc($result)) {	
											echo "<form action=encherir.php method=post>";
											echo "<table>";
											echo "<tr>";
										//	echo " <td><input type=radio name=suppr value=". $data['ID_item'] . ">";
											//	"<label for=". $data['ID_item'] . "> ". $data['ID_item'] . "</label>";
											echo "<td>ID item : " . $data['ID_item'] ;
											echo"<input type=hidden name=custId value=".$data['ID_item'].">";
											echo"<td><input class=btn btn-primary btn-large btn-block type=submit name=button9 value=Encherir>". "<br>";
											echo "</tr>";
											//echo "Photo de profil :". "<img src=".$data['Photo']." />" . "<br>";


											echo "<tr></tr>";
											echo "</table>";
											echo "</form>";

										}
										

										




									}
								}
								?>

								<br>
								<p>présentation</p>



							</div>

							
							











							
						</div>
					</li>
				</lu>

			</div>

		</div>
	</div>

	<div id="footer">
		<small>Copyright &copy; 2020 eBay ECE</small><br>
	</div>

</body>
</html>