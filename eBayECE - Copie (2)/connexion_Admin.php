<?php
$mdp = isset($_POST["mdp"])? $_POST["mdp"] : "";

//identifier votre BDD
$database = "projet";
//connectez-vous de votre BDD
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

if (isset($_POST['button1'])) {
	if ($db_found) {
		$sql = "SELECT * FROM admin WHERE mdp_admin  = '$mdp'";

		$result = mysqli_query($db_handle, $sql);
//regarder s'il y a de résultat
		if (mysqli_num_rows($result) == 0) {
			$message = 'Mauvais mot de passe.';
    echo "<SCRIPT> //not showing me this
        alert('$message')
        window.location.replace('Admin_login.html');
    	</SCRIPT>";
		} else {
			while ($data = mysqli_fetch_assoc($result)) {
				echo "Mot de passe : " . $data['mdp_admin'] . "<br>";				
			}
		}
	} else {
		echo "Database not found";
	}
}
//fermer la connexion
//mysqli_close($db_handle);
?>

<!DOCTYPE html>
<html>
<head>
	<title>ECE Ebay</title>
	<a href="index.html">retour</a>
	<meta charset="utf-8">
	<link href="images/favicon.ico" rel="icon" type="images/x-icon" />
	<link rel="stylesheet" type="text/css" href="connexion_Admin.css">
	<div class="app-title">
		<h1>Connecté en tant qu'admin</h1>
	</div>
</head>
<body>
	

	<div class="login">
		<div class="login-screen">
			<div class="app-title">
				<h1>Suppression</h1>
			</div>
			<div class="login-form">
				<?php
				if ($db_found) {
					$sql = "SELECT * FROM vendeur";
					$result = mysqli_query($db_handle, $sql);
					if (mysqli_num_rows($result) == 0) {
						echo "pas de vendeur";
			//exit();
					} 
					else {
						while ($data = mysqli_fetch_assoc($result)) {	
							echo "<form action=supprimer_vendeur_admin.php method=post>";
							echo "<table>";
							echo "<tr>";
							echo " <td><input type=radio name=suppr value=". $data['ID_vendeur'] . ">";
				//	"<label for=". $data['ID_item'] . "> ". $data['ID_item'] . "</label>";
							echo "<td>ID vendeur : " . $data['ID_vendeur'] . "</td>";
							echo "<td>Nom : " . $data['Nom_vendeur'] . "</td>";
							echo "</tr>";
					//echo "Photo de profil :". "<img src=".$data['Photo']." />" . "<br>";

						}
						echo "<tr></tr>";
						echo "</table>";

						echo "<input class=btn btn-primary btn-large btn-block type=submit name=button3 value=supprimer>";
						echo "</form>";
					}
				}


				if ($db_found) {
					$sql = "SELECT * FROM Item WHERE achete = '0'";
					$result = mysqli_query($db_handle, $sql);
					if (mysqli_num_rows($result) == 0) {
						echo "pas d'item";
			//exit();
					} else {
						while ($data = mysqli_fetch_assoc($result)) {	
							echo "<form action=supprimer_item_admin.php method=post>";
							echo "<table>";
							echo "<tr>";
							echo " <td><input type=radio name=suppr value=". $data['ID_item'] . ">";
				//	"<label for=". $data['ID_item'] . "> ". $data['ID_item'] . "</label>";
							echo "<td>ID item : " . $data['ID_item'] . "</td>";
							echo "<td>Nom item : " . $data['Nom_item'] . "</td>";
							echo "</tr>";
					//echo "Photo de profil :". "<img src=".$data['Photo']." />" . "<br>";

						}
						echo "<tr></tr>";
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
				<table>
					<h1>Ajouter un vendeur</h1>
				</div>

				<div class="login-form">
					<div class="control-group">

						<form action="ajouter_vendeur.php" method="post">

							<tr align="center">
								<td>Pseudo :</td>
								<td align="center"><input type="text" name="pseudo"></td>
							</tr>
							<tr align="center">
								<td>Email :</td>
								<td align="center"><input type="email" name="email"></td>
							</tr >
							<tr align="center">
								<td>Nom :</td>
								<td><input type="text" name="nom"></td>
							</tr>
							<tr align="center">
								<td>Image de fond (URL) :</td>
								<td><input type="text" name="image"></td>
							</tr>
							<tr align="center">
								<td>Photo de profil (URL) :</td>
								<td><input type="text" name="photo"></td>
							</tr>
							<tr></tr>
						</table><br>

						<input class="btn btn-primary btn-large btn-block" type="submit" name="button1" value="ajouter">






					</div>
				</div>
			</div>
		</div>
	</form>



<form action="ajouter_item_admin.php" method="post">
	<div class="login">
		<div class="login-screen">
			<div class="app-title">
				<table>
					<h1>Ajouter un item</h1>
				</div>

				<div class="login-form">

					<div class="control-group">

						<tr>
							<td><label for="ferraille ou tresor"> Ferraille ou trésor</label></td>

							<td><input type="radio" id="ferraille ou tresor" name="categorie" value="ferraille ou tresor" checked></td>

						</tr>

						<tr>
							<td><label for="bon pour le musee"> Bon pour le musee</label></td>
							<td><input type="radio" id="bon pour le musee" name="categorie" value="bon pour le musee" checked></td>

						</tr>

						<tr>	
							<td>						<label for="accessoire VIP"> Accessoire VIP</label></td>
							<td>						<input type="radio" id="accessoire VIP" name="categorie" value="accessoire VIP" checked></td>
						</tr>

						<tr>
							<td>						Nom :</td>
							<td>						<input type="text" name="nom"></td>
						</tr>
						<tr>
							<td>						Photo :</td>
							<td>						<input type="text" name="photo"></td>
						</tr>
						<tr>
							<td>						Description :</td>
							<td>						<input type="textarea" name="description"></td>
						</tr>
						<tr>
							<td>						Vidéo :</td>
							<td>						<input type="text" name="video"></td>
						</tr>
						<tr>
							<td>						Prix :</td>
							<td>						<input type="number" step="0.01" min="0" name="prix"></td>
						</tr>
						<tr>
							<td>						<label for="vente par meilleure offre"> Vente par meilleure offre</label></td>
							<td>						<input type="radio" id="vente par meilleure offre" name="vente" value="vente par meilleure offre" checked></td>
						</tr>					
						<tr>
							<td>						<label for="vente par enchere"> Vente par enchère</label></td>	
							<td>						<input type="radio" id="vente par enchere" name="vente"  value="vente par enchere" checked></td>
						</tr>
						<tr>
							<td>						<label for="aucun système de vente"> Aucun système de vente</label></td>
							<td>						<input type="radio" id="aucun système de vente" name="vente"  value="aucun systeme de vente" checked></td>
						</tr>
						<tr>
							<td>						<label for="achat immediat"> Achat immédiat</label></td>
							<td>						<input type="checkbox" id="1" name="achat_imm" value="1" checked></td>
						</tr>						



					</div>	
				</table><br>

				<input class="btn btn-primary btn-large btn-block" type="submit" name="button2" value="ajouter">

			</div>
		</div>
	</div>
</div>


</form>

	<div class="login">
		<div class="login-screen">
			<div class="app-title">
				
					<h1>gérer les enchères</h1>
				
		<?php			
if ($db_found) {
					$sql = "SELECT ID_item FROM Item WHERE achete = '0' AND vente_item = 'vente par enchere'";
					$result = mysqli_query($db_handle, $sql);
					if (mysqli_num_rows($result) == 0) {
						echo "pas d'item";
			//exit();
					}
					while ($data = mysqli_fetch_assoc($result)) {	
							echo "<form action=gerer_ench_admin.php method=post>";
							echo "<table>";
							echo "<tr>";
							$id = $data['ID_item'];
							$sql2 = "SELECT * FROM enchere WHERE ID_item = '$id'";
							$result2 = mysqli_query($db_handle, $sql2);
							$data2 = mysqli_fetch_assoc($result2);
							$prix_ac =$data2['Prix_actuel'];
							$id_ach =$data2['ID_acheteur'];
							echo"<input type=hidden name=id_ach value=".$id_ach.">";
							echo"<input type=hidden name=id value=".$id.">";
				//	"<label for=". $data['ID_item'] . "> ". $data['ID_item'] . "</label>";
							echo "ID item : " . $data['ID_item'] . "<br>";
							echo "Prix actuel : " . $prix_ac . "<br>";
							echo "Date de fin : " . $data2['date_fin'] . "<br>";
							echo "</tr>";
					//echo "Photo de profil :". "<img src=".$data['Photo']." />" . "<br>";
echo "<tr></tr>";
						echo "</table>";

						echo "<input class=btn btn-primary btn-large btn-block type=submit name=button3 value='Arreter la vente'>";
						echo "</form>";
						}
						



				}
					
?>

			
		</div>
	</div>
</div>




</body>
</html>