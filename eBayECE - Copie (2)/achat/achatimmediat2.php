<!DOCTYPE html>
<html>
<head>
	<title>ECE Ebay</title>
	<a href="../index.html">retour</a>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../connexion_Admin.css">
</head>
<body>


	

	
</body>
</html>

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
			
			$message = 'Champ(s) incorrect(s).';

   			 echo "<SCRIPT>
       		 alert('$message')
      	  window.location.replace('acheter_imm.php');
		    </SCRIPT>";


			echo "

			<div class=login>
			<div class=login-screen>
			<div class=app-title>
			<h2>Connecté à votre compte</h2>
			<h1>Bienvenue <?php echo $id; ?> !</h1>
			
			</div>
			Acheteur non trouvé<br>"




			;
		}



		$sql4 = "SELECT Prix_item FROM  item WHERE ID_item = '$id'";
		$result4 = mysqli_query($db_handle, $sql4);
		$data4 = mysqli_fetch_assoc($result4);
		$prix_item =$data4['Prix_item'];
		echo "var : ".$data4['Prix_item']."";

		$sql2 = "SELECT ID_acheteur FROM Acheteur WHERE Nom_acheteur  = '$nom' AND Email_acheteur = '$email' AND Prenom_acheteur = '$prenom' AND Clause ='1'";
			$result2 = mysqli_query($db_handle, $sql2);
			$data2 = mysqli_fetch_assoc($result2);
			$id_ach = $data2['ID_acheteur'];


		$sql5 ="SELECT solde FROM  paiement WHERE ID_acheteur = '$id_ach'";
		$result5 = mysqli_query($db_handle, $sql5);
		$data5 = mysqli_fetch_assoc($result5);
		$solde =$data5['solde'];
		echo "<br>solde : ".$data5['solde']."";

		$nv_solde =$solde-$prix_item;
		echo "<br>nv_solde : ".$nv_solde."";
		if ($nv_solde<=0) {
			$message = 'Solde insuffisant.';

   			 echo "<SCRIPT>
       		 alert('$message')
      	 	 window.location.replace('achatimmediat.php');
		    </SCRIPT>";
		}
		else {
			
				$sql = "UPDATE Item
				SET achete = '1'
				WHERE ID_item = '$id'";
				$result = mysqli_query($db_handle, $sql);
		
			
			$sql3 = "INSERT INTO item_panier(ID_acheteur,ID_item)
			VALUES( '" . $data2['ID_acheteur'] . "', '$id')";
			$result3 = mysqli_query($db_handle, $sql3);
			echo "ID_acheteur : " . $data2['ID_acheteur'] . "<br>";
			echo "id item : " . $id . "<br>";

			
				$sql7 = "UPDATE paiement	SET solde  ='$nv_solde'  WHERE  ID_acheteur = '$id_ach'";
				$result7 = mysqli_query($db_handle, $sql7);
				$data7 = mysqli_fetch_assoc($result7);
				echo "solde : " . $data7['solde'] . "<br>";

				$message = 'Objet acheté.';

   			 echo "<SCRIPT>
       		 alert('$message')
      	  window.location.replace('achatimmediat.php');
		    </SCRIPT>";
		}
	
//	header('Location: achatimmediat.php');
} else {
	echo "Database not found";
}
}

//fermer la connexion
//mysqli_close($db_handle);
//echo "Database close";
?>
