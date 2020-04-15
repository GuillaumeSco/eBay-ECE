<?php
$pseudo = isset($_POST["pseudo"])? $_POST["pseudo"] : "";
$email= isset($_POST["email"])? $_POST["email"] : "";
$nom= isset($_POST["nom"])? $_POST["nom"] : "";
$image= isset($_POST["image"])? $_POST["image"] : "";
$photo= isset($_POST["photo"])? $_POST["photo"] : "";

//identifier votre BDD
$database = "projet";
//connectez-vous de votre BDD
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

if (isset($_POST['button1'])) {
	if ($db_found) {
		$sql = "SELECT * FROM Vendeur";
		if ($pseudo != "") {
			$sql .= " WHERE Pseudo_vendeur = '$pseudo'";
			if ($email != "") {
				$sql .= " OR Email_vendeur = '$email'";
			}
		}
		$result = mysqli_query($db_handle, $sql);
		if (mysqli_num_rows($result) != 0) {
			echo "vendeur already exists. Duplicate not allowed.";
		} else {
			$sql = "INSERT INTO Vendeur(Pseudo_vendeur, Email_vendeur, Nom_vendeur, Photo_vendeur, Image_fond)
			VALUES('$pseudo', '$email', '$nom', '$photo', '$image')";
			$result = mysqli_query($db_handle, $sql);
			echo "Add successful. <br>";
			header('Location: connexion_Admin.php');
//on afficher le livre ajouté
			
		}
	} else {
		echo "Database not found";
	}
}

//fermer la connexion
mysqli_close($db_handle);
?>