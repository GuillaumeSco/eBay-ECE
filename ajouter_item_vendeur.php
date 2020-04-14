<?php
$categorie= isset($_POST["categorie"])? $_POST["categorie"] : "";
$nom= isset($_POST["nom"])? $_POST["nom"] : "";
$photo= isset($_POST["photo"])? $_POST["photo"] : "";
$description= isset($_POST["description"])? $_POST["description"] : "";
$video= isset($_POST["video"])? $_POST["video"] : "";
$prix= isset($_POST["prix"])? $_POST["prix"] : "";
$achat= isset($_POST["achat"])? $_POST["achat"] : "";
$achat_imm= isset($_POST["achat_imm"])? $_POST["achat_imm"] : "";

//identifier votre BDD
$database = "projet";
//connectez-vous de votre BDD
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

if (isset($_POST['button2'])) {
	if ($db_found) {
			$sql = "INSERT INTO item(ferraille ou tresor, bon pour le musée, accessozqfegrhtjykuire VIP, Nom, Photo, Description, Vidéo, Prix, meilleure offre, vente par enchère, achat immédiat)
			VALUES('$categorie', '$categorie', '$categorie','$nom' , '$photo', '$description', '$video', '$prix', '$achat', '$achat_imm' )";
			$result = mysqli_query($db_handle, $sql);
			echo "Add successful. <br>";
			//header('Location: connexion_vendre.php');
//on afficher le livre ajouté
			
		
	} else {
		echo "Database not found";
	}
}

//fermer la connexion
mysqli_close($db_handle);
?>