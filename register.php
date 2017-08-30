<?php
include_once 'mon_prenom.php';
include_once d_path.'DBConnector.php';
        if (!empty($error_msg)) {
            echo $error_msg;
        }
  
   	$mysqli = mysqli_connect(host, server_username, server_pass, db_name);
	$error_msg = "";
    if (isset($_POST['user_firstname'], $_POST['user_lastname'], $_POST['phone_num'],  $_POST['username'], $_POST['profession'])) {
        // Sanitize and validate the data passed in
        $u_fname = filter_input(INPUT_POST, 'user_firstname', FILTER_SANITIZE_STRING);
        $u_lname = filter_input(INPUT_POST, 'user_lastname', FILTER_SANITIZE_STRING);
        $profession = filter_input(INPUT_POST, 'profession', FILTER_SANITIZE_STRING);
		$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
     	$phone = filter_input(INPUT_POST, 'phone_num', FILTER_SANITIZE_NUMBER_INT);
		if (!filter_var($phone, FILTER_VALIDATE_INT) || strlen($phone) != 8)
		{
			$error_msg .= '<p class="error">NUMERO DE TELEPHONE INVALIDE.</p>';
			echo $error_msg;
		}
		$cn = new DBConnector();
		$passs = $cn->get_passpord();
		$gen_password = password_hash($passs, PASSWORD_BCRYPT);
		
        /*if (strlen($password) != 128) {
            // The hashed pwd should be 128 characters long.
            // If it's not, something really odd has happened
            $error_msg .= '<p class="error">Invalid password configuration.</p>';
			echo $error_msg;
        }*/
     
        // Username validity and password validity have been checked client side.
        // This should should be adequate as nobody gains any advantage from
        // breaking these rules.
        //
     
       /* $prep_stmt = "SELECT ID FROM dwd_utilisateurs WHERE dwd_user_phone_number = ? LIMIT 1";
        $stmt = $mysqli->prepare($prep_stmt);
     
       // check existing email  
        if ($stmt) {
            $stmt->bind_param('s', $phone);
            $stmt->execute();
            $stmt->store_result();
     
            if ($stmt->num_rows == 1) {
                // A user with this email address already exists
                $error_msg .= '<p class="error">A user with this phone number already exists.</p>';
                            $stmt->close();
            }
        } else {
            $error_msg .= '<p class="error">Database error Line 39</p>';
                    $stmt->close();
        }*/
     
    
        
        // TODO: 
        // We'll also have to account for the situation where the user doesn't have
        // rights to do registration, by checking what type of user is attempting to
        // perform the operation.
     
        if (empty($error_msg)) {
     
            // Create hashed password using the password_hash function.
            // This function salts it with a random salt and can be verified with
            // the password_verify function.
            //$password = password_hash($password, PASSWORD_BCRYPT);
     
            // Insert the new user into the database 
           if ($insert_stmt = $mysqli->prepare("INSERT INTO dwd_utilisateurs (dwd_user_name, dwd_user_firstname, dwd_user_password,   
												 dwd_user_profession, dwd_user_login, dwd_user_phone_number) VALUES (?, ?, ?, ?, ?, ?)")) 
				{
					$insert_stmt->bind_param('ssssss', $u_fname, $u_lname, $gen_password, $profession, $username, $phone);
					// Execute the prepared query.
					if (! $insert_stmt->execute()) {
						$error_msg .= '<div class="alert alert-warning"> UNE ERREUR S&acute;EST PRODUITE LORS DE L&acute;ENREGISTREMENT DE VOS DONNEES, VEUILLEZ REESSAYER SVP!.</div>';
				}
            }
		if ($stmt = $mysqli->prepare("SELECT ID, dwd_user_phone_number 
			FROM dwd_utilisateurs
		   WHERE dwd_user_phone_number = ?
			LIMIT 1")) {
				$stmt->bind_param('s', $phone);  // Bind "$email" to parameter.
				$stmt->execute();    // Execute the prepared query.
				$stmt->store_result();
				// get variables from result.
				$stmt->bind_result($user_id, $user_phone);
				$stmt->fetch();
				if ($stmt->num_rows == 1) {
					if ($insert_stmt = $mysqli->prepare("INSERT INTO dwd_userpasses (dwd_user_id, dwd_userpass) VALUES (?, ?)")) 
					{
						$insert_stmt->bind_param('ss', $user_id, $passs);
						// Execute the prepared query.
						if (!$insert_stmt->execute()) {
								$error_msg .= '<div class="alert alert-warning"> UNE ERREUR S&acute;EST PRODUITE LORS DE L&acute;'.
								'ENREGISTREMENT DE VOS DONNEES, VEUILLEZ REESSAYER SVP!.</div>';
						}
					}
				}
			}
		
            header('Location: ./register_success.php');
            
        }
	}

    ?>