<?php
$pseudo = isset($_POST["pseudo"])? $_POST["pseudo"] : "";
$email= isset($_POST["email"])? $_POST["email"] : "";

//identifier votre BDD
$database = "projet";
//connectez-vous de votre BDD
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

if (isset($_POST['button1'])) {
	if ($db_found) {
		$sql = "SELECT * FROM Vendeur WHERE Pseudo  = '$pseudo' AND Email = '$email'";
				
		$result = mysqli_query($db_handle, $sql);
//regarder s'il y a de résultat
		if (mysqli_num_rows($result) == 0) {
			echo "Vendeur non trouvé";
		} else {
			while ($data = mysqli_fetch_assoc($result)) {
				echo "Pseudo : " . $data['Pseudo'] . "<br>";
				echo "Email : " . $data['Email'] . "<br>";
				echo "Photo de profil :". "<img src=".$data['Photo']." />" . "<br>";
				
			}
		}
	} else {
		echo "Database not found";
	}
}

//fermer la connexion
//mysqli_close($db_handle);
echo "Database close";
?>
<!DOCTYPE html>
<html>
<head>
	<title>ECE Ebay</title>
	<meta charset="utf-8">
</head>
<body>

			
	<h2>Connecté</h2>
	 <h1>Bienvenue <?php echo $pseudo; ?> !</h1>

	
</body>
</html>