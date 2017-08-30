<?php
	$page = "home.php";
	$head = "header.php";
	$footer = "racine.php";
	if(isset($_SESSION['user_id']) && !isset($_POST['online_payment'])){
			$head = "c_header.php";
			
		}
	if(isset($_SESSION['user_id']) && (isset($_POST['online_payment'])|| isset($_POST['college_admission']))){
			$head = "s_header.php";
			$footer = "racine.php";
		}
	include_once(d_path."/DBConnector.php");
	
	if(isset($_GET['q']))
	{
		if($_GET['q'] != '' && $_GET['q'] == 'login')
			$page = "login_index.php";
		else if($_GET['q'] != '' && $_GET['q'] == 'sign_up')
			$page = "register.php";
	}
	else if(isset($_POST['online_payment'])){
		$page = "payment_request.php";
		$footer = "racine.php";
		
	}
	else if(isset($_POST['college_admission'])){
		$page = "college_admin_request.php";
	}
	else if(isset($_POST['doc_requrest'])){
		$page = "doc_request.php";
	}
	else if(isset($_POST['messagerie'])){
		$page = "messagerie.php";
		$head = "s_header.php";
	}
	include_once($head);
	include($page);
	include($footer);
?>