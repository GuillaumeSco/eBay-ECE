
<!DOCTYPE html>
<html>
<head>
	<title>Ebay ECE</title>
	<a href="connexion_vendre.php">retour</a>
	<meta charset="utf-8">
	<link href="images/favicon.ico" rel="icon" type="images/x-icon" />
	<link rel="stylesheet" type="text/css" href="ajouter_item_vendeur.css">
</head>
<body>

<div class="login">
		<div class="login-screen">

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
$pseudo_vend = isset($_POST["pseudo_vend"])? $_POST["pseudo_vend"] : "";

//identifier votre BDD
$database = "projet";
//connectez-vous de votre BDD
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

if (isset($_POST['button2'])) {
	if ($db_found) {

		$sql2 = "SELECT ID_vendeur FROM vendeur WHERE Pseudo_vendeur = '$pseudo_vend'";
		$result2 = mysqli_query($db_handle, $sql2);
		$data2= mysqli_fetch_assoc($result2);
		$id_vend = $data2['ID_vendeur'];
		//echo "id vend: " . $data2['ID_vendeur'] . "<br>";

	/*	$sql4 = "SELECT Prix_item FROM  item WHERE ID_item = '$id'";
		$result4 = mysqli_query($db_handle, $sql4);
		$data4 = mysqli_fetch_assoc($result4);
		$prix_item =$data4['Prix_item'];
		echo "var : ".$data4['Prix_item']."";*/


		$sql = "INSERT INTO item(categorie_item, Nom_item, Photo_item, Description_item, Video_item, Prix_item, vente_item, achat_imm_item, ID_vendeur)
		VALUES('$categorie', '$nom', '$photo', '$description', '$video', '$prix', '$vente', '$achat_imm', '$id_vend')";
		$result = mysqli_query($db_handle, $sql);
	//	echo "Add successful. <br>";

		if ($vente=='vente par enchere') {
			$sql = "SELECT * FROM item WHERE Nom_item ='$nom' AND Photo_item ='$photo' ";
			$result = mysqli_query($db_handle, $sql);
			$data = mysqli_fetch_assoc($result);
			$id = $data['ID_item'];
			echo "<form action=ajouter_enchere.php method=post>";
			echo"<input type=hidden name=custId value=".$id.">"; ?>
			<tr>
			<td>Prix de l'enchère :
			<input type="float" min="0" step="0.01" name="prix"><br></td>
			<td>date de fin de l'enchère :
			<input type="date" name="date"><br></td>
			</tr> 
			<?php echo"<input class=btn btn-primary btn-large btn-block type=submit name=button5 value=Ajouter l'enchère>". "<br>";
			echo "</form>";		
		}
		else {
			$message = 'Item ajouté.';
   			 echo "<SCRIPT>
        	alert('$message')
        	window.location.replace('connexion_vendre.php');
    		</SCRIPT>";
		}


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
		//	echo "Nom_item: " . $data['Nom_item'] . "<br>";
		//	echo "Photo_item: " . $data['Photo_item'] . "<br>";
			//header('Location: connexion_vendre.php');
		}
		
	} else {
		echo "Database not found";
	}
}
//fermer la connexion
mysqli_close($db_handle);
?>

</div>
</div>
</body>
</html>