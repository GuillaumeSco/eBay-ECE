		<?php

		$id = isset($_POST["suppr"])? $_POST["suppr"] : "";

			//identifier votre BDD
		$database = "projet";
//connectez-vous de votre BDD
		$db_handle = mysqli_connect('localhost', 'root', '');
		$db_found = mysqli_select_db($db_handle, $database);
		
		if (isset($_POST['button3'])) {
			if ($db_found) {



				

				$sql = "DELETE FROM vendeur";
				$sql .= " WHERE ID_vendeur= $id";
				$result = mysqli_query($db_handle, $sql);
				echo "Delete successful. <br>";
				header('Location: connexion_Admin.php');

				//$result = $result = mysqli_query($db_handle, $sql);


			} else {
				echo "Database not found";
			}
		}

		?>
