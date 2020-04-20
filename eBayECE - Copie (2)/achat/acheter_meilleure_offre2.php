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
$prix  = isset($_POST["prix"])? $_POST["prix"] : "";


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
      	  window.location.replace('acheter_meilleure_offre.php');
		    </SCRIPT>";

		}


		$sql2 = "SELECT ID_acheteur FROM Acheteur WHERE Nom_acheteur  = '$nom' AND Email_acheteur = '$email' AND Prenom_acheteur = '$prenom' AND Clause ='1'";
		$result2 = mysqli_query($db_handle, $sql2);
		$data2 = mysqli_fetch_assoc($result2);
		$id_ach = $data2['ID_acheteur'];


		$sql5 ="SELECT solde FROM  paiement WHERE ID_acheteur = '$id_ach'";
		$result5 = mysqli_query($db_handle, $sql5);
		$data5 = mysqli_fetch_assoc($result5);
		$solde =$data5['solde'];
		echo "solde : ".$data5['solde']."";

		$nv_solde =$solde-$prix;
		echo "nv_solde : ".$nv_solde."";
		if ($nv_solde<=0) {

			$message = 'Solde insuffisant.';

			echo "<SCRIPT>
       		 alert('$message')
      	  window.location.replace('meilleureoffre.php');
		    </SCRIPT>";
			
		}
		else {

			$sql6 ="SELECT ID_vendeur FROM  item WHERE ID_item = '$id'";
			$result6 = mysqli_query($db_handle, $sql6);
			$data6 = mysqli_fetch_assoc($result6);
			$id_vendeur =$data6['ID_vendeur'];

			
			$sql3 = "INSERT INTO meilleure_offre(Prix_acheteur,ID_acheteur, ID_vendeur, ID_item)
			VALUES('$prix ', '$id_ach',' $id_vendeur', '$id')";
			$result3 = mysqli_query($db_handle, $sql3);
		/*	while ($data = mysqli_fetch_assoc($result)) {
				echo "ID_item : " . $data['ID_item'] . "<br>";
			//	echo "Pseudo : " . $data['Pseudo'] . "<br>";
			//	echo "Email : " . $data['Email'] . "<br>";
			//	echo "Photo de profil :". "<img src=".$data['Photo']." />" . "<br>";
				
			}*/
			//creation de l'item dans le panier de l'acheteur
			
			header('Location: meilleureoffre.php');

			
			
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
