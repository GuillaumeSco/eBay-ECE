<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" type="text/css" href="css/login/Vendeur_login.css">
	<link href="images/favicon.ico" rel="icon" type="images/x-icon" />

	<meta charset="utf-8" />
	<title> ACHETEUR LOGIN </title>

	<link rel="stylesheet"  href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script type="text/javascript">


	</script>

</head>
<body>

	<form action="pannier2.php" method="post">
		<a href="index.html">retour</a>

		<div class="login">
			<div class="login-screen">
				<div class="app-title">
					<h1>Acheteur Login</h1>



				</div>

				<div class="login-form">

					<div class="control-group">

						<input type="text" class="login-field" value="" placeholder="nom" id="login-name" name="nom">
						<label class="login-field-icon fui-user" for="login-name"></label>

					</div>

					<div class="control-group">

						<input type="text" class="login-field" value="" placeholder="prenom" id="login-name" name="prenom">
						<label class="login-field-icon fui-user" for="login-name"></label>

					</div>

					<div class="control-group">

						<input type="email" class="login-field" value="" placeholder="email" id="login-pass" name="email">
						<label class="login-field-icon fui-lock" for="login-pass"></label>

					</div>
			<!--		<?php
					$id = isset($_POST["custId"])? $_POST["custId"] : "";
					$database = "projet";
//connectez-vous de votre BDD
					$db_handle = mysqli_connect('localhost', 'root', '');
					$db_found = mysqli_select_db($db_handle, $database);
					echo"<input type=hidden name=custId value=".$id.">";
					
			//	echo "Photo de profil :". "<img src=".$data['Photo']." />" . "<br>";
					?>-->


					<input class="btn btn-primary btn-large btn-block" type="submit" name="button1" value="Connexion">

					<a class="login-link" href="creation_compte.php">S'enregistrer ?</a>
				</div>
			</div>
		</div>

	</form>
	
</body>
</html>