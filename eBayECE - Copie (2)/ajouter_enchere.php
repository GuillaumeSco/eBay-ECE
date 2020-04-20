<?php
//récupérer les données venant de formulaire
$id = isset($_POST["custId"])? $_POST["custId"] : "";
$prix = isset($_POST["prix"])? $_POST["prix"] : "";
$date = isset($_POST["date"])? $_POST["date"] : "";




//identifier votre BDD
$database = "projet";
//connectez-vous de votre BDD
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

if (isset($_POST['button5'])) {
	if ($db_found) {
	//echo "id: " . $id . "<br>";
//	echo "prix: " . $prix . "<br>";
	//	echo "date: " . $date . "<br>";

		$sql = "INSERT INTO enchere(Prix_actuel, date_fin, Prix_reel, ID_item )
		VALUES('$prix', '$date', '$prix', '$id' )";
		$result = mysqli_query($db_handle, $sql);

		$message = 'Enchère ajoutée.';

		echo "<SCRIPT>
       		 alert('$message')
      	  window.location.replace('connexion_vendre.php');
		    </SCRIPT>";





	}else {
		echo "Database not found";
	}
}
?>