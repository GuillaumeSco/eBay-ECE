<?php
$nom = isset($_POST["nom"])? $_POST["nom"] : "";
$prenom = isset($_POST["prenom"])? $_POST["prenom"] : "";
$email= isset($_POST["email"])? $_POST["email"] : "";
$id = isset($_POST["custId"])? $_POST["custId"] : "";


//identifier votre BDD
$database = "projet";
//connectez-vous de votre BDD
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

if (isset($_POST['button1'])) {
	if ($db_found) {
		$sql = "SELECT * FROM Acheteur WHERE Nom_acheteur  = '$nom' AND Email_acheteur = '$email' AND Prenom_acheteur = '$prenom'";

		$result = mysqli_query($db_handle, $sql);
//regarder s'il y a de résultat
		if (mysqli_num_rows($result) == 0) {
			echo "Acheteur non trouvé";
		} else {
			$sql = "UPDATE Item
			SET achete = '1'
			WHERE ID_item = '$id'";
			$result = mysqli_query($db_handle, $sql);
			while ($data = mysqli_fetch_assoc($result)) {
				echo "ID_item : " . $data['ID_item'] . "<br>";
			//	echo "Pseudo : " . $data['Pseudo'] . "<br>";
			//	echo "Email : " . $data['Email'] . "<br>";
			//	echo "Photo de profil :". "<img src=".$data['Photo']." />" . "<br>";
				
			}
			
		}
		header('Location: achatimmediat.php');
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
	<link href="images/favicon.ico" rel="icon" type="images/x-icon" />
	<a href="index.html">retour</a>
	<meta charset="utf-8">
</head>
<body>


	<h2>Connecté à votre compte</h2>
	<h1>Bienvenue <?php echo $id; ?> !</h1>

	
</body>
</html>