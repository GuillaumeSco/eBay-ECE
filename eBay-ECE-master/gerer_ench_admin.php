

<?php
$id_ach = isset($_POST["id_ach"])? $_POST["id_ach"] : "";
$id = isset($_POST["id"])? $_POST["id"] : "";

//identifier votre BDD
$database = "projet";
//connectez-vous de votre BDD
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

if (isset($_POST['button3'])) {
	if ($db_found) {

		$sql = "SELECT * FROM  enchere WHERE ID_item = '$id'";
		$result = mysqli_query($db_handle, $sql);
		$data = mysqli_fetch_assoc($result);
		$prix_item =$data['Prix_actuel'];
		echo "   prix ac :   ".$data['Prix_actuel']."";
		echo "   id :     ".$id."";
		echo "   id ach :    ".$id_ach."";


		$sql2 = "SELECT ID_acheteur FROM Acheteur WHERE ID_acheteur  = '$id_ach' AND Clause ='1'";
		$result2 = mysqli_query($db_handle, $sql2);
		$data2 = mysqli_fetch_assoc($result2);
		$id_ach = $data2['ID_acheteur'];


		$sql5 ="SELECT solde FROM  paiement WHERE ID_acheteur = '$id_ach'";
		$result5 = mysqli_query($db_handle, $sql5);
		$data5 = mysqli_fetch_assoc($result5);
		$solde =$data5['solde'];
		echo "solde : ".$data5['solde']."";

		$nv_solde =$solde-$prix_item;
		echo "nv_solde : ".$nv_solde."";
		if ($nv_solde<=0) {
			echo "pas assez d'argent";
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

			
			$sql6 = "UPDATE paiement	SET solde  ='$nv_solde'  WHERE  ID_acheteur = '$id_ach'";
			$result6 = mysqli_query($db_handle, $sql6);
			$data6 = mysqli_fetch_assoc($result6);
			echo "solde : " . $data6['solde'] . "<br>";
		}



	}else {
		echo "Database not found";
	}
}
?>
