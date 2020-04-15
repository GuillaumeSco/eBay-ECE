<?php
//récupérer les données venant de formulaire
$categorie = isset($_POST["categorie"])? $_POST["categorie"] : "";
$nom = isset($_POST["nom"])? $_POST["nom"] : "";
$photo = isset($_POST["photo"])? $_POST["photo"] : "";
$description = isset($_POST["description"])? $_POST["description"] : "";
$video = isset($_POST["video"])? $_POST["video"] : "";
$prix = isset($_POST["prix"])? $_POST["prix"] : "";
$vente = isset($_POST["vente"])? $_POST["vente"] : "";
$achat_imm = isset($_POST["achat_imm"])? $_POST["achat_imm"] : "0";

//identifier votre BDD
$database = "projet";
//connectez-vous de votre BDD
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

if (isset($_POST['button2'])) {
	if ($db_found) {
			//$recID = "SELECT ID_vendeur FROM vendeur WHEN Pseudo_vendeur = '$pseudo'";
			//$resID = mysqli_query($db_handle, $recID);
			//$dataID = mysqli_fetch_assoc($resID);
			$sql = "INSERT INTO item(categorie_item, Nom_item, Photo_item, Description_item, Video_item, Prix_item, vente_item, achat_imm_item)
			VALUES('$categorie', '$nom', '$photo', '$description', '$video', '$prix', '$vente', '$achat_imm')";
			$result = mysqli_query($db_handle, $sql);
			echo "Add successful. <br>";
//on afficher le livre ajouté
			$sql = "SELECT * FROM item";
			if ($nom != "") {
				$sql .= " WHERE Nom_item ='$nom'";
				if ($photo != "") {
					$sql .= " AND Photo_item ='$photo'";
				}
			}
			$result = mysqli_query($db_handle, $sql);
			while ($data = mysqli_fetch_assoc($result)) {
				echo "Nom_item: " . $data['Nom_item'] . "<br>";
				echo "Photo_item: " . $data['Photo_item'] . "<br>";
				header('Location: connexion_Admin.php');
			}
		
	} else {
		echo "Database not found";
	}
}
//fermer la connexion
mysqli_close($db_handle);
?>