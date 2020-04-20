

<?php
$nom = isset($_POST["nom"])? $_POST["nom"] : "";
$prenom = isset($_POST["prenom"])? $_POST["prenom"] : "";
$email= isset($_POST["email"])? $_POST["email"] : "";
$id = isset($_POST["custId"])? $_POST["custId"] : "";
$prix = isset($_POST["prix"])? $_POST["prix"] : "";




//identifier votre BDD
$database = "projet";
//connectez-vous de votre BDD
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

if (isset($_POST['button1'])) {
	if ($db_found) {
		$sql = "SELECT * FROM Acheteur WHERE Nom_acheteur  = '$nom' AND Email_acheteur = '$email' AND Prenom_acheteur = '$prenom'";

		$result = mysqli_query($db_handle, $sql);
		$data = mysqli_fetch_assoc($result);
		$id_ach = $data['ID_acheteur'];
//regarder s'il y a de résultat
		if (mysqli_num_rows($result) == 0) {
			echo "Acheteur non trouvé";
			$message = 'Champ(s) incorrect(s).';

		echo "<SCRIPT>
       		 alert('$message')
      	  window.location.replace('encherir.php');
		    </SCRIPT>";
		}

		$sql4 = "SELECT Prix_actuel FROM  enchere WHERE ID_item = '$id'";
		$result4 = mysqli_query($db_handle, $sql4);
		$data4 = mysqli_fetch_assoc($result4);
		$prix_ench =$data4['Prix_actuel'];
		


		echo "<a href=encheres.php>retour</a>  

		

		<div class=login>
		<div class=login-screen>
		<div class=app-title>
		<h2>Connecté à votre compte</h2>
		<h1>Bienvenue <?php echo $id; ?> !</h1>
		</div>

		prix ench : ".$data4['Prix_actuel']."";
		echo "prix ac :".$prix."<br>";

		$sql2 = "SELECT ID_acheteur FROM Acheteur WHERE Nom_acheteur  = '$nom' AND Email_acheteur = '$email' AND Prenom_acheteur = '$prenom' AND Clause ='1'";
			$result2 = mysqli_query($db_handle, $sql2);
			$data2 = mysqli_fetch_assoc($result2);
			$id_ach = $data2['ID_acheteur'];


		$sql5 ="SELECT solde FROM  paiement WHERE ID_acheteur = '$id_ach'";
		$result5 = mysqli_query($db_handle, $sql5);
		$data5 = mysqli_fetch_assoc($result5);
		$solde =$data5['solde'];
		echo "solde : ".$data5['solde']."<br>";

		$nv_solde =$solde-$prix_ench;
		echo "nv_solde : ".$nv_solde."<br>";
		if ($nv_solde<=0) {


			$message = 'Solde insuffisant.';

		echo "<SCRIPT>
       		 alert('$message')
      	  window.location.replace('encheres.php');
		   </SCRIPT>";

			echo "pas assez d'argent
			</div></div>";
		}
		else {

			if ($prix-$prix_ench>0) {
				$sql = "UPDATE enchere
				SET Prix_actuel = '$prix', Prix_reel = '$prix_ench' + 1, ID_acheteur = '$id_ach'
				WHERE ID_item = '$id'";
				$result = mysqli_query($db_handle, $sql);

				$message = 'Enchère effectuée.';

				echo "<SCRIPT>
       			 alert('$message')
      			  window.location.replace('encheres.php');
		  		  </SCRIPT>";



			}
			else {
				$message = 'Prix inférieur à enchère en cours';

				echo "<SCRIPT>
       			 alert('$message')
      			  window.location.replace('encheres.php');
		  		  </SCRIPT>";
			}

			
				
		/*	while ($data = mysqli_fetch_assoc($result)) {
				echo "ID_item : " . $data['ID_item'] . "<br>";
			//	echo "Pseudo : " . $data['Pseudo'] . "<br>";
			//	echo "Email : " . $data['Email'] . "<br>";
			//	echo "Photo de profil :". "<img src=".$data['Photo']." />" . "<br>";
				
			}*/
			//creation de l'item dans le panier de l'acheteur
			
		/*	$sql3 = "INSERT INTO item_panier(ID_acheteur,ID_item)
			VALUES( '" . $data2['ID_acheteur'] . "', '$id')";
			$result3 = mysqli_query($db_handle, $sql3);
			echo "ID_acheteur : " . $data2['ID_acheteur'] . "<br>";
			echo "id item : " . $id . "<br>";

			
				$sql6 = "UPDATE paiement	SET solde  ='$nv_solde'  WHERE  ID_acheteur = '$id_ach'";
				$result6 = mysqli_query($db_handle, $sql6);
				$data6 = mysqli_fetch_assoc($result6);
				echo "solde : " . $data6['solde'] . "<br>";*/
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
<!DOCTYPE html>
<html>
<head>
	<title>ECE Ebay</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../connexion_Admin.css">
</head>
<body>


	
</body>
</html>