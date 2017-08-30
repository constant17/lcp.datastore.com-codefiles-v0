<?php
include 'mon_prenom.php';
include_once d_path.'/DBConnector.php';
include_once  d_path.'/login_functions.php';
 
 $error_msg = ""; $c = new DBConnector();
	if (isset($_POST['phone'], $_POST['pass'])) {
				$phone = $_POST['phone'];
				$password = $_POST['pass']; // The hashed password.
				$cn = new DBConnector();
				$mysqli = $cn->makeTheConnection();
				if (login($phone, $password, $mysqli) == true) {
					// Login success 
					echo 'ok';
				} else {
					// Login failed 
					$error_msg = '<div class="alert alert-danger">Le numero de telephone et le mot de passe ne correspondent pas</div>';
					echo $error_msg;
					//header('Location: ../acceuil');
				}
			} else {
				// The correct POST variables were not sent to this page. 
				echo 'Invalid Request';
			}
                   
?>