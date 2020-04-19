<!DOCTYPE html>
<html>
<head>
	<title>eBay ECE</title>
	<meta charset="utf-8">

	<link rel="stylesheet" type="text/css" href="css/index.css">
<link href="images/favicon.ico" rel="icon" type="images/x-icon" />

	<link rel="stylesheet"  href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script type="text/javascript">


	</script>
	

	<div class="col-sm-12">
		<a href="../index.html">eBay Projet Piscine</a>
	</div>
</div>
<div class="nav">
	<ul class=menu>
		<div class="col-sm-2">
			<div class="dropdown">
				<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Catégories <i class="fas fa-angle-down"></i>
				</button>
				<div class="dropdown-menu">
					<a class="dropdown-item" href="#"></span><a href="#">Ferraille ou Trésor <i class="fas fa-gem"></i></a></a>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item" href="#"></span><a href="#">Bon pour le musée <i class="fas fa-landmark"></i></a></a>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item" href="#"></span><a href="#">Accessoire VIP <i class="fas fa-glass-cheers"></i></a></a>
				</div>
			</div>
		</div>
		<div class="col-sm-2">
			<div class="dropdown">
				<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Achat <i class="fas fa-angle-down"></i>
				</button>
				<div class="dropdown-menu">
					<a class="dropdown-item" href="#"></span><a href="encheres.php">Enchères <i class="fas fa-bullhorn"></i></a></a>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item" href="#"></span><a href="achatimmediat.php">Achetez-le maintenant <i class="fas fa-cash-register"></i></a></a>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item" href="#"></span><a href="meilleureoffre.php">Meilleure offre <i class="fas fa-euro-sign"></i></a></a>
				</div>
			</div>

		</div>
		<div class="col-sm-2">
			<button class="btn btn-primary dropdown-toggle" type="button">
				<a href="../Vendeur_login.html" style="color:#FFF;">Vente <i class="fas fa-piggy-bank"></i></a>
			</button>	
		</div>
		<div class="col-sm-2">
			<button class="btn btn-primary dropdown-toggle" type="button">
				<a href="../Acheteur_login.html" style="color:#FFF;">Votre Compte <i class="fas fa-balance-scale-right"></i></i></a>
			</button>
		</div>
		<div class="col-sm-2">
			<button class="btn btn-primary dropdown-toggle" type="button">
				<a href="../panier.php" style="color:#FFF;">Votre Panier <i class="fas fa-shopping-cart"></i></a>
			</button>
		</div>
		<div class="col-sm-2">
			<button class="btn btn-primary dropdown-toggle" type="button">
				<a href="../Admin_login.html" style="color:#FFF;">Admin <i class="fas fa-address-card"></i></i></a>
			</button>
		</div>
	</ul>
</div>		






	<lu class="item_list">
		<li class="item">
			<div class="col-sm-12">
				<div class="app-title">
					<h2>Acquérir un item par enchères</h2>
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
								$sql = "SELECT * FROM Item WHERE achete = '0' AND vente_item = 'vente par enchere'";
								$result = mysqli_query($db_handle, $sql);
								if (mysqli_num_rows($result) == 0) {
									echo "pas d'item";
									//exit();
								} else {
									while ($data = mysqli_fetch_assoc($result)) {	
										echo "<form action=encherir.php method=post>";

										echo "Photo :". "<img src=".$data['Photo_item']." />" . "<br>";

									echo "Nom : " . $data['Nom_item'] ;
									echo"<input type=hidden name=custId value=".$data['Nom_item']."<br>";
									echo "<br>";
									echo "Description : " . $data['Description_item'];
									echo"<input type=hidden name=custId value=".$data['Description_item']."<br>";

									echo"<br><td><input class=btn btn-primary btn-large btn-block type=submit name=button5 value=Achetez-le maintenant>";

									echo"<br>----------------------------------------<br>";
									
										echo "</form>";

									}







								}
							}
							?>
</head>
<body>
						</div>					
					</div>
				</li>
			</lu>

		</div>

	</div>
	

	<div class="wrapper">
		Copyright &copy; 2020 eBay ECE
		<div class="push"></div>
	</div>
	<footer class="footer"><small></small><br></footer>
	

</body>
</html>