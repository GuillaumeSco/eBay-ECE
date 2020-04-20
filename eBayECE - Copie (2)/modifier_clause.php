<?php 

$email = isset($_POST["email"])? $_POST["email"] : "";
$nom = isset($_POST["nom"])? $_POST["nom"] : "";
$prenom = isset($_POST["prenom"])? $_POST["prenom"] : "";


//identifier votre BDD
$database = "projet";
//connectez-vous de votre BDD
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);


if(isset($_POST['button7'])) {

	$sql2 = "SELECT * FROM Acheteur WHERE Nom_acheteur  = '$nom' AND Email_acheteur = '$email' AND Prenom_acheteur = '$prenom'";
	$result2 = mysqli_query($db_handle, $sql2);
	$data2 = mysqli_fetch_assoc($result2);
	$id_ach =$data2['ID_acheteur'];


	$sql = "UPDATE acheteur
	SET Clause = '1'
	WHERE ID_acheteur = '$id_ach'";
	$result = mysqli_query($db_handle, $sql);
	header('Location: connexion_compte.php');
} 
?>