<?php
session_start();
$nom = isset($_POST["nom"])? $_POST["nom"] : "";
$prenom = isset($_POST["prenom"])? $_POST["prenom"] : "";
$email= isset($_POST["email"])? $_POST["email"] : "";

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
			echo "Acheteur non trouvé";
		} else {
			$data = mysqli_fetch_assoc($result);
			$_SESSION['a'] = $data['ID_acheteur'];
			
			//	echo "Nom : " . $data['Nom_acheteur'] . "<br>";
			//	echo "Email : " . $data['Email_acheteur'] . "<br>";


		}
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
</head>
<body>

	<?php $ID_acheteur =  $_SESSION['a'];   ?>

	<?php	$sql2 = "SELECT * FROM Acheteur WHERE ID_acheteur  = '$ID_acheteur'";
	$result2 = mysqli_query($db_handle, $sql2);
	$data2 = mysqli_fetch_assoc($result2);  
	$nom = $data2['Nom_acheteur'];
	$prenom = $data2['Prenom_acheteur'];
	$email = $data2['Email_acheteur'];
	$adresse = $data2['Adresse_acheteur'];

	?>

	<h2>Connecté à votre compte</h2>


	<h1>Bienvenue <?php echo $nom ." ". $prenom ; ?> !</h1>
	<h3>informations sur votre compte acheteur</h3>
	<p><?php 
	echo "Nom : ". $nom ."<br>";
	echo "Prénom : ".$prenom ."<br>";
	echo "Email : ".$email ."<br>"; 
	
	echo "Adresse : ".$adresse."<br>";  
	if($data2['Clause']==1) {
		echo "Clause de validation d'achat acceptée <br>"; 
	} 
	else {
		echo "Clause de validation d'achat non acceptée <br>"; 
		echo "<form action=modifier_clause.php method=post>";
		echo "<input class=btn btn-primary btn-large btn-block type=submit name=button7 value=modifier>";


		header('Location.reload(true)');
		
		echo"<input type=hidden name=nom value=".$nom.">"; 
		echo"<input type=hidden name=email value=".$email.">"; 
		echo"<input type=hidden name=prenom value=".$prenom.">"; 
		echo "</form>";
	}
	?></p>
	
	<h3>informations sur votre moyen de paiement</h3>
	<p> <?php  
	if ($db_found) {
		$sql2 = "SELECT ID_acheteur FROM Acheteur WHERE Nom_acheteur  = '$nom' AND Email_acheteur = '$email' AND Prenom_acheteur = '$prenom'";
		$result2 = mysqli_query($db_handle, $sql2);
		$data2 = mysqli_fetch_assoc($result2);
		$id_ach = $data2['ID_acheteur'];


		$sql5 ="SELECT * FROM  paiement WHERE ID_acheteur = '$ID_acheteur'";
		$result5 = mysqli_query($db_handle, $sql5);
		$data5 = mysqli_fetch_assoc($result5);
		echo "ville : ".$data5['ville']."<br>";
		echo "code postal : ".$data5['code_postal']."<br>";
		echo "pays : ".$data5['pays']."<br>";
		echo "numéro de téléphone : ".$data5['tel']."<br>";
		echo "type de carte : ".$data5['type_carte']."<br>";
		echo "numéro de la carte : ".$data5['ID_carte']."<br>";
		echo "date d'expiration de la carte : ".$data5['date']."<br>";
		echo "code de sécurité : ".$data5['code_securite']."<br>";
		echo "solde : ".$data5['solde']."<br>";

	}

	?></p>




</body>
</html>