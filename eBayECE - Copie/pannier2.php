<?php
$nom = isset($_POST["nom"])? $_POST["nom"] : "";
$prenom = isset($_POST["prenom"])? $_POST["prenom"] : "";
$email= isset($_POST["email"])? $_POST["email"] : "";

//identifier votre BDD
$database = "projet";
//connectez-vous de votre BDD
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);


?>

<!DOCTYPE html>
<html>
<head>
	<title>ECE Ebay</title>
	<a href="index.html">retour</a>
	<link href="images/favicon.ico" rel="icon" type="images/x-icon" />
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="connexion_Admin.css">

	<div class="app-title">
		<h2>Connecté à votre panier</h2>
	</div>
</head>
<body>

	<div class="login">
		<div class="login-screen">
			<h1>Bienvenue <?php echo $nom; ?> !</h1>
			<div class="login-form">





				<?php

				if (isset($_POST['button1'])) {
					if ($db_found) {
						$sql = "SELECT * FROM Acheteur WHERE Nom_acheteur  = '$nom' AND Email_acheteur = '$email' AND Prenom_acheteur = '$prenom'";

						$result = mysqli_query($db_handle, $sql);
//regarder s'il y a de résultat
						if (mysqli_num_rows($result) == 0) {
							$message = 'Champ(s) incorrect(s).';
							echo "<SCRIPT>
							alert('$message')
							window.location.replace('panier.php');
							</SCRIPT>";
						}
						else {
							$sql2 = "SELECT ID_acheteur FROM Acheteur WHERE Nom_acheteur  = '$nom' AND Email_acheteur = '$email' AND Prenom_acheteur = '$prenom'";
							$result2 = mysqli_query($db_handle, $sql2);
							$data2 = mysqli_fetch_assoc($result2);
							$sql3 = "SELECT ID_acheteur, ID_item FROM item_panier WHERE ID_acheteur  = " . $data2['ID_acheteur'] . "";
							$result3 = mysqli_query($db_handle, $sql3);
							$data3 = mysqli_fetch_assoc($result3);
		//$id_ach = $data3['ID_acheteur'];

							echo"<h2>item acheté</h2>";
							while ($data3 = mysqli_fetch_assoc($result3)) {
								echo "ID_acheteur : " . $data3['ID_acheteur'] . "<br>";
								echo "id : " . $data3['ID_item'] . "<br>";
							}


							$sql5 = "SELECT ID_acheteur FROM Acheteur WHERE Nom_acheteur  = '$nom' AND Email_acheteur = '$email' AND Prenom_acheteur = '$prenom'";
							$result5 = mysqli_query($db_handle, $sql5);
							$data5 = mysqli_fetch_assoc($result5);
							$id_ach = $data5['ID_acheteur'];
							echo "ID_acheteur : " . $id_ach . "<br>";

							echo"<h2>item en cours de négociation</h2>";
							$sql4 = "SELECT * FROM meilleure_offre WHERE ID_acheteur = '$id_ach' AND en_cours_vendeur = '0'";
							$result4 = mysqli_query($db_handle, $sql4);
	//	$data4 = mysqli_fetch_assoc($result4);
							while ($data4 = mysqli_fetch_assoc($result4)) {

								echo "<form action=gerer_m_offre_acheteur.php method=post>";


								echo "id : " . $data4['ID_item'] . "<br>";
								$id_util = $data4['ID_item'];
								echo "<input type=number class=login-field value='' min =0 step=0.01 placeholder='prix proposé' id='login-pass' name='prix'>
								<label class='login-field-icon fui-lock' for='login-pass'></label>";
								echo"<input type=hidden name=id_ach value=".$id_ach.">"; 
								echo"<input type=hidden name=id_util value=".$id_util.">";
								echo "	<input class=btn btn-primary btn-large btn-block type=submit name=button8 value=Proposer>";

								echo "</form>";
							}

						}
					} else {
						echo "Database not found";
					}
				}

//fermer la connexion
//mysqli_close($db_handle);
//echo "Database close";
				?>
			</div>
		</div>
	</div>
</body>
</html>