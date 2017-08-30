<?php
 include_once("mon_prenom.php");
 include_once("db_management/DBConnector.php");
 $error_msg = "OK";
 $mysqli = mysqli_connect(host, server_username, server_pass, db_name);
if (isset($_POST['username'], $_POST['lastname'],$_POST['phone'], $_POST['firstname'], $_POST['p'])) {
    // Sanitize and validate the data passed in
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
	$profession = filter_input(INPUT_POST, 'p', FILTER_SANITIZE_STRING);
	$fname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING);
	$phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_NUMBER_INT);
    $lastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_STRING);
    
	$cn = new DBConnector();
 	$pass = $cn->get_passpord();
    $password = filter_input(INPUT_POST, $pass, FILTER_SANITIZE_STRING);
 	
    $prep_stmt = "SELECT ID FROM dwd_utilisateurs WHERE dwd_user_phone_number = ? LIMIT 1";
    $stmt = $mysqli->prepare($prep_stmt);
 
   // check existing email  
    if ($stmt) {
        $stmt->bind_param('s', $phone);
        $stmt->execute();
        $stmt->store_result();
 
        if ($stmt->num_rows == 1) {
            $error_msg .= '<p class="error">Le numero de &acute;lephone fourni est d&eacute;j&agrave; associ&eacute;e &agrave; un compte!</p>';
                        $stmt->close();
        }
    } else {
        $error_msg .= '<p class="error">Erreur de stockage de donnees - Ligne 39</p>';
                $stmt->close();
    }
    // TODO: 
    // We'll also have to account for the situation where the user doesn't have
    // rights to do registration, by checking what type of user is attempting to
    // perform the operation.

    if (empty($error_msg)){
 
        // Create hashed password using the password_hash function.
        // This function salts it with a random salt and can be verified with
        // the password_verify function.
        $password = password_hash($pass, PASSWORD_BCRYPT);
 
        // Insert the new user into the database 
        if ($insert_stmt = $mysqli->prepare("INSERT INTO dwd_utilisateurs (dwd_user_name, dwd_user_firstName, 
		dwd_user_password, dwd_user_profession,  dwd_user_login, dwd_user_phone_number,) VALUES (?, ?, ?, ?, ?, ?)")) {
            $insert_stmt->bind_param('ssssss', $lastname, $fname, $password, $profession, $username, $phone);
            echo'Erreur de stockage 1';
            if (! $insert_stmt->execute()) {
                //header('Location: ../error.php?err=Registration failure: INSERT');
				echo'Erreur de stockage';
            }
			else{
				$stmt = $mysqli->prepare("SELECT ID dwd_utilisateurs WHERE dwd_user_phone_number = ? LIMIT 1");
				$stmt->bind_param('s', $phone);  // Bind "$email" to parameter.
				$stmt->execute();    // Execute the prepared query.
				$stmt->store_result();
				// get variables from result.
				$stmt->bind_result($user_db_id);
				
				$insert_stmt = $mysqli->prepare("INSERT INTO dwd_userpasses (dwd_user_id, dwd_userpass) VALUES (?, ?)");
            	$insert_stmt->bind_param('ss', $user_db_id, $pass);
				$insert_stmt->execute();
            // Execute the prepared query.	
				echo 'GOOOD';
			}
        }
      
		
    }
	 if (!empty($error_msg)) {
            echo $error_msg;
        }
}
else echo 'Donnees incompletes';

?>