<?php
$pseudo_vend = isset($_POST["pseudo_vend"])? $_POST["pseudo_vend"] : "";
$id_util = isset($_POST["id_util"])? $_POST["id_util"] : "";


//identifier votre BDD
$database = "projet";
//connectez-vous de votre BDD
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

if (isset($_POST['button3'])) {
	if ($db_found) {

		$sql = "SELECT ID_vendeur FROM vendeur WHERE Pseudo_vendeur = '$pseudo_vend'";

		$result = mysqli_query($db_handle, $sql);
		$data = mysqli_fetch_assoc($result);
		$id_v =$data['ID_vendeur'];


		$sql4 = "SELECT * FROM  meilleure_offre WHERE ID_vendeur = '$id_v'";
		$result4 = mysqli_query($db_handle, $sql4);
		$data4 = mysqli_fetch_assoc($result4);
		$prix_item = $data4['Prix_acheteur'];
		$id= $data4['ID_item'];
		echo "var : ".$data4['Prix_acheteur']."";

		$id_ach = $data4['ID_acheteur'];
		


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
		/*	while ($data = mysqli_fetch_assoc($result)) {
				echo "ID_item : " . $data['ID_item'] . "<br>";
			//	echo "Pseudo : " . $data['Pseudo'] . "<br>";
			//	echo "Email : " . $data['Email'] . "<br>";
			//	echo "Photo de profil :". "<img src=".$data['Photo']." />" . "<br>";
				
			}*/
			//creation de l'item dans le panier de l'acheteur
			
			$sql3 = "INSERT INTO item_panier(ID_acheteur,ID_item)
			VALUES( '$id_ach', '$id')";
			$result3 = mysqli_query($db_handle, $sql3);
			echo "ID_acheteur : " . $id_ach . "<br>";
			echo "id item : " . $id . "<br>";

			
			$sql6 = "UPDATE paiement	SET solde  ='$nv_solde'  WHERE  ID_acheteur = '$id_ach'";
			$result6 = mysqli_query($db_handle, $sql6);
			$data6 = mysqli_fetch_assoc($result6);
			echo "solde : " . $data6['solde'] . "<br>";

			$sql6 = "UPDATE meilleure_offre	SET en_cours_vendeur  ='2'  WHERE  ID_acheteur = '$id_ach'";
			$result6 = mysqli_query($db_handle, $sql6);
			$data6 = mysqli_fetch_assoc($result6);
		}

//	header('Location: achatimmediat.php');
	} else {
		echo "Database not found";
	}
}

if (isset($_POST['button4'])) {
	if ($db_found) {

		$sql = "SELECT ID_vendeur FROM vendeur WHERE Pseudo_vendeur = '$pseudo_vend'";

		$result = mysqli_query($db_handle, $sql);
		$data = mysqli_fetch_assoc($result);
		$id_v =$data['ID_vendeur'];


		$sql4 = "SELECT * FROM  meilleure_offre WHERE ID_vendeur = '$id_v'";
		$result4 = mysqli_query($db_handle, $sql4);
		$data4 = mysqli_fetch_assoc($result4);
		//$prix_item = $data4['Prix_acheteur'];
		$id= $data4['ID_item'];
		$id_ach = $data4['ID_acheteur'];
		echo "id_i : ".$id."";
		echo "id_a: ".$id_ach."";
		echo "id_v : ".$id_v."";
		

		$sql6 = "UPDATE meilleure_offre	SET en_cours_vendeur  = '0' , Decompte=Decompte-1 WHERE  ID_acheteur = '$id_ach' AND ID_vendeur = $id_v AND ID_item = $id_util";
		$result6 = mysqli_query($db_handle, $sql6);
		$data6 = mysqli_fetch_assoc($result6);
				//, Decompte-1
		$sql7 = "SELECT Decompte FROM meilleure_offre WHERE ID_acheteur = '$id_ach' AND ID_vendeur = $id_v AND ID_item = $id_util";
		$result7 = mysqli_query($db_handle, $sql7);
		$data7 = mysqli_fetch_assoc($result7);
		$decompte = $data7['Decompte'];
		if($decompte==0)
		{
			$sql8 = $sql6 = "UPDATE meilleure_offre	SET en_cours_vendeur  = '2'  WHERE  ID_acheteur = '$id_ach' AND ID_vendeur = $id_v AND ID_item = $id_util";
			$result8 = mysqli_query($db_handle, $sql8);
			$data8 = mysqli_fetch_assoc($result8);
		}

		header('Location: connexion_vendre.php');
	}
	
//	header('Location: achatimmediat.php');
} else {
	echo "Database not found";
}
