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

	<form action="creation_compte2.php" method="post">
		<a href="index.html">retour</a>

		<div class="login">
			<div class="login-screen">
				<div class="app-title">
					<h1>informations de l'acheteur</h1>



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
					<div class="control-group">

						<input type="adresse" class="login-field" value="" placeholder="adresse" id="login-pass" name="adresse">
						<label class="login-field-icon fui-lock" for="login-pass"></label>

					</div>
					

					<div class="control-group">

						<input type="checkbox" id="1" name="clause" value="1" checked>
						<label for="achat immediat"> clause d'achat</label>
					</div>
				</div>
			</div>
		</div>

		<div class="login">
			<div class="login-screen">
				<div class="app-title">
					<h1>Informations de paiement</h1>



				</div>

				<div class="login-form">

					<div class="control-group">

						<input type="text" class="login-field" value="" placeholder="ville" id="login-name" name="ville">
						<label class="login-field-icon fui-user" for="login-name"></label>

					</div>

					<div class="control-group">

						<input type="number" class="login-field" value="" min="0" placeholder="code postal" id="login-name" name="code_postal">
						<label class="login-field-icon fui-user" for="login-name"></label>

					</div>

					<div class="control-group">

						<input type="text" class="login-field" value="" placeholder="pays" id="login-pass" name="pays">
						<label class="login-field-icon fui-lock" for="login-pass"></label>

					</div>
					<div class="control-group">

						<input type="number" class="login-field" value="" min="0" placeholder="telephone" id="login-pass" name="telephone">
						<label class="login-field-icon fui-lock" for="login-pass"></label>

					</div>

					<div class="control-group">

						<input type="text" class="login-field" value="" placeholder="type de carte" id="login-pass" name="type_de_carte">
						<label class="login-field-icon fui-lock" for="login-pass"></label>

					</div>

					<div class="control-group">

						<input type="number" class="login-field" value="" min="0" placeholder="numero de carte" id="login-pass" name="numero_de_carte">
						<label class="login-field-icon fui-lock" for="login-pass"></label>

					</div>

					<div class="control-group">

						<input type="date" class="login-field" value="" placeholder="date expiration" id="login-pass" name="date_expiration">
						<label class="login-field-icon fui-lock" for="login-pass"></label>

					</div>

					<div class="control-group">

						<input type="number" class="login-field" value="" min="0" placeholder="code de securite" id="login-pass" name="code_de_securite">
						<label class="login-field-icon fui-lock" for="login-pass"></label>

					</div>
									
					<input class="btn btn-primary btn-large btn-block" type="submit" name="button6" value="Créer">
				</div>
			</div>
		</div>
	</form>
	
</body>
</html>