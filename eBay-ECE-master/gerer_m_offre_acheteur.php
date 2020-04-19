<?php
$id_ach = isset($_POST["id_ach"])? $_POST["id_ach"] : "";
$id_util = isset($_POST["id_util"])? $_POST["id_util"] : "";
$prix = isset($_POST["prix"])? $_POST["prix"] : "";


//identifier votre BDD
$database = "projet";
//connectez-vous de votre BDD
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

if (isset($_POST['button8'])) {
	if ($db_found) {

		$sql = "UPDATE meilleure_offre SET  Prix_acheteur = '$prix', en_cours_vendeur  ='1'  WHERE ID_acheteur = '$id_ach' AND  ID_item = '$id_util'";


				$result = mysqli_query($db_handle, $sql);
				$data = mysqli_fetch_assoc($result);

				header('Location: pannier2.php');
		
} else {
	echo "Database not found";
}

}
