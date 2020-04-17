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
		$_SESSION['d'] = $pseudo;
		$result = mysqli_query($db_handle, $sql);
//regarder s'il y a de résultat
		if (mysqli_num_rows($result) == 0) {
			echo "Vendeur non trouvé";
			header('Location: Vendeur_login.html');
			exit();
		} 
	} else {
		echo "Database not found";
	}
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>ECE Ebay</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="connexion_vendre.css">
	<div class="app-title">
		<h1>Connecté en tant que vendeur</h1>
	</div>
</head>
<body>

	
	<h1>Bienvenue <?php echo $_SESSION['d']; ?> !</h1><br><br>

	<p>Photo de profil, Nom, Image de fond</p><br>



	<div class="login">
		<div class="login-screen">
			<div class="app-title">
				<h2>Vos items : </h2>
			</div>
			<div class="login-form">
				<?php
				if ($db_found) {
					$sql = "SELECT ID_item FROM Item";
					$result = mysqli_query($db_handle, $sql);
					if (mysqli_num_rows($result) == 0) {
						echo "pas d'item";
			//exit();
					} else {
						while ($data = mysqli_fetch_assoc($result)) {	
							echo "<form action=supprimer_item_vendeur.php method=post>";
							echo "<table>";
							echo "<tr>";
							echo " <td><input type=radio name=suppr value=". $data['ID_item'] . ">";
				//	"<label for=". $data['ID_item'] . "> ". $data['ID_item'] . "</label>";
							echo "ID item : " . $data['ID_item'] . "<br>";
							echo "</tr>";
					//echo "Photo de profil :". "<img src=".$data['Photo']." />" . "<br>";

						}
						echo "<tr></tr>";
						echo "<td colspan=2 align=center>";
						echo "</table>";
						echo "<input class=btn btn-primary btn-large btn-block type=submit name=button3 value=supprimer>";
						echo "</form>";





					}
				}
				?>

			</div>
		</div>
	</div>


	<div class="login">
		<div class="login-screen">
			<div class="app-title">
				<h1>Ajouter un item</h1>
			</div>
			<div class="login-form">

				<form action="ajouter_item_vendeur.php" method="post">
					<table>
						<tr>
							<td><label for="ferraille ou trésor"> ferraille ou tresor</label></td>
							<td><input type="radio" id="ferraille ou tresor" name="categorie" value="ferraille ou tresor" checked></td>

						</tr>
						<tr>
							<td><label for="bon pour le musee"> bon pour le musee</label></td>
							<td><input type="radio" id="bon pour le musee" name="categorie" value="bon pour le musee" checked></td>

						</tr>
						<tr>
							<td><label for="accessoire VIP"> accessoire VIP</label></td>
							<td><input type="radio" id="accessoire VIP" name="categorie" value="accessoire VIP" checked></td>
							
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
							<td><input type="textarea" name="description"></td>
						</tr>
						<tr>
							<td>Vidéo :</td>
							<td><input type="text" name="video"></td>
						</tr>
						<tr>
							<td>Prix :</td>
							<td><input type="number" step="0.01" min="0" name="prix"></td>
						</tr>

						<tr>
							<td><label for="vente par meilleure offre"> vente par meilleure offre</label></td>
							<td><input type="radio" id="vente par meilleure offre" name="vente" value="vente par meilleure offre" checked></td>
						</tr>
						<tr>
							<td><label for="vente par enchere"> vente par enchère</label></td>
							<td><input type="radio" id="vente par enchere" name="vente"  value="vente par enchere" checked></td>				
						</tr>
						<tr>
							<td><label for="aucun système de vente"> aucun système de vente</label></td>
							<td><input type="radio" id="aucun système de vente" name="vente"  value="aucun systeme de vente" checked></td>
						</tr>
						<tr>
							<td><label for="achat immediat"> achat immédiat</label></td>
							<td><input type="checkbox" id="1" name="achat_imm" value="1" checked></td>
						</tr>


						<tr></tr>
						</table>

								<input class="btn btn-primary btn-large btn-block" type="submit" name="button1" value="ajouter">	
							
						
					
				</form>
			</div>
		</div>
	</div>



</body>
</html>
