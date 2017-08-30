<?php
	include_once("../mon_prenom.php");
	include_once("../db_management/DBConnector.php"); $header="header.php";
	include_once('pages/'.$header);
	
	$page = "default.php";  $search = "home.php";
	$id = -1; $file_name = ""; $the_keys = "";
	$get_connected = new DBConnector();
	
	if(isset($_GET['f']))
	{
		$file_name = $get_connected->get_file_name($_GET['f']);
		$the_keys = $get_connected->get_file_keys($_GET['f']);
	}
	if(isset($_GET['f']))
	{
		$page = 'default.php';	
		$id = $_GET['f'];
		
	}
	else if(isset($_GET['t']) && $_GET['t'] == 'vid')
	{
		$page = 'present_img.php';	
		
	}
	include('pages/'.$page);
	include('pages/'.$search);
?>