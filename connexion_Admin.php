<?php<?php
$mdp = isset($_POST["mdp"])? $_POST["mdp"] : "";

//identifier votre BDD
$database = "projet";
//connectez-vous de votre BDD
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

if (isset($_POST['button1'])) {
	if ($db_found) {
		$sql = "SELECT * FROM admin WHERE mdp  = '$mdp'";
				
		$result = mysqli_query($db_handle, $sql);
//regarder s'il y a de résultat
		if (mysqli_num_rows($result) == 0) {
			echo "mauvais mot de passe";
			exit();
		} else {
			while ($data = mysqli_fetch_assoc($result)) {
				echo "Mot de passe : " . $data['mdp'] . "<br>";				
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
	<meta charset="utf-8">
</head>
<body>
	<?php
		
		$requete = 'SELECT * FROM Vendeur';
		$resultat = mysqli_query($db_handle, $requete);
	
		while ($ligne = $resultat->fetch_assoc()) {
			echo $ligne['Pseudo'].' '.$ligne['Email'].' ';
			echo $ligne['Nom'].' '.$ligne['Photo'].'<br>';
		}
		
		?>
	<h2>Connecté</h2>
	<form action="ajouter_vendeur.php" method="post">
		<table>
			<tr>
				<td>Pseudo :</td>
				<td><input type="text" name="pseudo"></td>
			</tr>
			<tr>
				<td>Email :</td>
				<td><input type="text" name="email"></td>
			</tr>
			<tr>
				<td>Nom :</td>
				<td><input type="text" name="nom"></td>
			</tr>
			<tr>
				<td>Image :</td>
				<td><input type="text" name="image"></td>
			</tr>
			<tr>
				<td>Photo :</td>
				<td><input type="text" name="photo"></td>
			</tr>
			<tr></tr>
			<tr>
				<td colspan="2" align="center">
					<input type="submit" name="button1" value="ajouter">	
				</td>
			</tr>
		</table>
	</form>
</body>
</html>

<!--
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<?php
		
		$requete = 'SELECT * FROM Vendeur';
		$resultat = mysqli_query($db_handle, $requete);
	
		while ($ligne = $resultat->fetch_assoc()) {
			echo $ligne['Pseudo'].' '.$ligne['Email'].' ';
			echo $ligne['Nom'].' '.$ligne['Photo'].'<br>';
		}
		
		?>
	</body> 
</html> -->