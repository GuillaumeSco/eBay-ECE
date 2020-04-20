<?php
//récupérer les données venant de formulaire
$nom = isset($_POST["nom"])? $_POST["nom"] : "";
$prenom = isset($_POST["prenom"])? $_POST["prenom"] : "";
$email = isset($_POST["email"])? $_POST["email"] : "";
$adresse = isset($_POST["adresse"])? $_POST["adresse"] : "";
$clause = isset($_POST["clause"])? $_POST["clause"] : 0;

$ville = isset($_POST["ville"])? $_POST["ville"] : "";
$code_postal = isset($_POST["code_postal"])? $_POST["code_postal"] : "";
$pays = isset($_POST["pays"])? $_POST["pays"] : "";
$telephone = isset($_POST["telephone"])? $_POST["telephone"] : "";
$type_de_carte = isset($_POST["type_de_carte"])? $_POST["type_de_carte"] : "";
$numero_de_carte = isset($_POST["numero_de_carte"])? $_POST["numero_de_carte"] : "";
$date_expiration = isset($_POST["date_expiration"])? $_POST["date_expiration"] : "";
$code_de_securite = isset($_POST["code_de_securite"])? $_POST["code_de_securite"] : "";


//identifier votre BDD
$database = "projet";
//connectez-vous de votre BDD
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

if (isset($_POST['button6'])) {

	if ($db_found) {
		$sql = "SELECT * FROM acheteur";
		if ($nom != "") {
			$sql .= " WHERE Nom_acheteur = '$nom'";
			if ($email != "") {
				$sql .= " OR Email_acheteur = '$email'";
				if ($prenom != "") {
				$sql .= " OR Prenom_acheteur = '$prenom'";
			}
			}
		}
		$result = mysqli_query($db_handle, $sql);
		if (mysqli_num_rows($result) != 0) {
			echo "acheteur already exists. Duplicate not allowed.";
		} else {
			$sql = "INSERT INTO acheteur(Nom_acheteur, Prenom_acheteur, Email_acheteur, Adresse_acheteur, Clause)
			VALUES('$nom', '$prenom ', '$email', '$adresse', '$clause')";
			$result = mysqli_query($db_handle, $sql);
			echo "Add successful. <br>";


			$sql2 = "SELECT ID_acheteur FROM Acheteur WHERE Nom_acheteur  = '$nom' AND Email_acheteur = '$email' AND Prenom_acheteur = '$prenom'";
			$result2 = mysqli_query($db_handle, $sql2);
			$data2 = mysqli_fetch_assoc($result2);
			$var = $data2['ID_acheteur'];

echo "ID_acheteur : " . $data2['ID_acheteur'] . "<br>";
			$sql3 ="INSERT INTO paiement(ville, code_postal, pays, tel, type_carte, ID_carte, date, code_securite, solde, ID_acheteur)
			VALUES('$ville', '$code_postal', '$pays', '$telephone', '$type_de_carte', '$numero_de_carte' , '$date_expiration', '$code_de_securite','500.00', '$var')";
			$result3 = mysqli_query($db_handle, $sql3);
			$data3 = mysqli_fetch_assoc($result2);
		/*	echo "ID_acheteur : " .$ville. "<br>";
			echo "ID_acheteur : ". $code_postal. "<br>";
			echo "ID_acheteur : " .$pays."<br>";
			echo "ID_acheteur : " .$code_postal. "<br>";
			echo "ID_acheteur : " .$telephone ."<br>";
			echo "ID_acheteur : " .$type_de_carte ."<br>";
			echo "ID_acheteur : " .$numero_de_carte ."<br>";
			echo "ID_acheteur : " .$date_expiration ."<br>";
			echo "ID_acheteur : " .$code_de_securite. "<br>";

			echo "ID_acheteur : " . $data3['ID_acheteur'] . "<br>";*/
header('Location: Acheteur_login.html');


			
//on afficher le livre ajouté
			
		}
	} else {
		echo "Database not found";
	}
}
//fermer la connexion
mysqli_close($db_handle);
?>