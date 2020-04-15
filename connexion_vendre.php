<?php
session_start();
$pseudo = isset($_POST["pseudo"])? $_POST["pseudo"] : "";
$email= isset($_POST["email"])? $_POST["email"] : "";

//identifier votre BDD
$database = "projet";
//connectez-vous de votre BDD
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

if (isset($_POST['button1'])) {
	if ($db_found) {
		$sql = "SELECT * FROM Vendeur WHERE Pseudo_vendeur  = '$pseudo' AND Email_vendeur = '$email'";
		//$r = mysql_fetch_array($sql);
		//mysqli_fetch_array ( mysqli_result $r [, string $sql = MYSQLI_BOTH ] ) : mixed;
	//	$p = $r['Pseudo_vendeur'];
		$_SESSION['d'] = $pseudo;
		$result = mysqli_query($db_handle, $sql);
//regarder s'il y a de résultat
		if (mysqli_num_rows($result) == 0) {
			echo "Vendeur non trouvé";
			exit();
		} else {

			while ($data = mysqli_fetch_assoc($result)) {
				//echo "Pseudo : " . $data['Pseudo'] . "<br>";
			//	echo "Email : " . $data['Email'] . "<br>";
			//	echo "Photo de profil :". "<img src=".$data['Photo']." />" . "<br>";
				
			}
		}
	} else {
		echo "Database not found";
	}
}

//fermer la connexion
//mysqli_close($db_handle);
//echo "Database close";
?>
<!DOCTYPE html>
<html>
<head>
	<title>ECE Ebay</title>
	<meta charset="utf-8">
</head>
<body>


	<h2>Connecté en tant que vendeur</h2>
	<h1>Bienvenue <?php //echo $pseudo;
		echo $_SESSION['d']; ?> !</h1>

		<h2>vos items : </h2>
		<?php
		if ($db_found) {
			$pseudo=$_SESSION['d'];
			$sql = "SELECT ID_item FROM Item, Vendeur WHERE Vendeur.ID_vendeur  = Item.ID_vendeur AND Pseudo_vendeur  = '$pseudo'";

			$result = mysqli_query($db_handle, $sql);

			if (mysqli_num_rows($result) == 0) {
				echo "pas d'item";
			//exit();
			} else {
				while ($data = mysqli_fetch_assoc($result)) {	
					echo "ID item : " . $data['ID_item'] . "<br>";

				}
			}
		}
		?>
		<h1>Ajouter un item</h1>
		<form action="ajouter_item_vendeur.php" method="post">
			<table>
				<tr>
					<td><input type="radio" id="ferraille ou tresor" name="categorie" value="ferraille ou tresor" checked>
						<label for="ferraille ou tresor"> ferraille ou tresor</label>
					</tr>
					<tr>
						<td><input type="radio" id="bon pour le musee" name="categorie" value="bon pour le musee" checked>
							<label for="bon pour le musee"> bon pour le musee</label>
						</tr>
						<tr>
							<td><input type="radio" id="accessoire VIP" name="categorie" value="accessoire VIP" checked>
								<label for="accessoire VIP"> accessoire VIP</label>
							</tr>
							<tr>
								<td>Nom :</td>
								<td><input type="text" name="nom"></td>
							</tr>
							<tr>
								<td>Photo :</td>
								<td><input type="text" name="photo"></td>
							</tr>
							<tr>
								<td>Description :</td>
								<td><input type="text" name="description"></td>
							</tr>
							<tr>
								<td>Vidéo :</td>
								<td><input type="text" name="video"></td>
							</tr>
							<tr>
								<td>Prix :</td>
								<td><input type="number" step="0.01" name="prix"></td>
							</tr>

							<tr>
								<td><input type="radio" id="vente par meilleure offre" name="vente"  value="vente par meilleure offre" class="radio">
									<label for="vente par meilleure offre"> vente par meilleure offre</label>

								</tr>
								<tr>
									<td><input type="radio" id="vente par enchere" name="vente" value="vente par enchere" class="radio">
										<label for="vente par enchere"> vente par enchere</label>

									</tr>
									<tr>
										<td><input type="radio" id="aucun système de vente" name="vente" value="aucun système de vente" class="radio">
											<label for="aucun système de vente"> aucun système de vente</label>

										</tr>
										<tr>
											<td><input type="checkbox" id="1" name="achat_imm" value="1" checked>
												<label for="achat immediat"> achat immédiat</label>
											</tr>


											<tr></tr>
											<tr>
												<td colspan="2" align="center">
													<input type="submit" name="button2" value="ajouter">	
												</td>
											</tr>
										</table>
									</form>


								</body>
								</html>
<!--

					<td><input type="radio" id="vente par enchere" name="achat" value="vente par enchere" checked>
							<label for="vente par enchere"> vente par enchère</label>
						</tr>
						<tr>
							<td><input type="radio" id="vente par meilleure offre" name="achat" value="vente par meilleure offre" checked>
								<label for="vente par meilleure offre"> vente par meilleure offre</label>
							</tr>
							-->