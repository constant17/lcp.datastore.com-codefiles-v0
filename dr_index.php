
<?php
	$_POST['doc_requrest'] = 'on';
?>

<?php include_once("mon_prenom.php");
	// Include database connection and functions here.  See 3.1. 
	 session_start();
	 // 2 hours in seconds
	$inactive = 7200; 
	ini_set('session.gc_maxlifetime', $inactive); // set the session max lifetime to 2 hours
	
	if (isset($_SESSION['testing']) && (time() - $_SESSION['testing'] > $inactive)) {
		// last request was more than 2 hours ago
		session_unset();     // unset $_SESSION variable for this page
		session_destroy();   // destroy session data
	}
	
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo nom_du_site; ?></title>
<link rel="stylesheet" href="design/assets/css/main.css" />
<link rel="stylesheet" href="design/bootstrap/css/bootstrap.css" />
<link rel="stylesheet" href="design/bootstrap/css/bootstrap.min.css" />
<link rel="stylesheet" href="design/bootstrap/css/bootstrap-theme.css" />
<script src="design/js/jquery-3.1.1"></script>
<script type="text/JavaScript" src="design/js/sha512.js"></script> 
<script type="text/JavaScript" src="design/js/forms.js"></script> 

	</head>
	<body>
    <!--div class="header"-->
	
      <?php 
 		include_once(e_path."/my_eagle.php");
		?> <!--/div-->
    <div id="page_content"></div>			
	</body>
</html>