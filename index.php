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
    <script>
    	function type(ty){ type.typ = ty;}
		function get_type(){dt = ""; if(type.typ != null)return type.typ; else return dt}
    	function readInput(str)
            {
                 if(str!= ''){
                    $.ajax(
                    {
						url:"temp_page.php",
                        method: "post",
                        data:{searchthis:str},
                        dataType:"text",
                        success:function(data)
                        {
                            $('#search_result').html(data)
                        }
                    });
                 }
                 else{
                     $('#search_result').html(' ');
                }
				//function that detects when the user hits enter
				if_user_hits_enter('keyword');
            }
			
			function display_doc()
            {
              
                    $('#search_result').html(' ');
                    $.ajax(
                    {
						url:"display_doc.php",
                        method: "post",
                        data:{searchthis:str},
                        dataType:"text",
                        success:function(data)
                        {
                            $('#search_result').html(data)
                        }
                    });
            }
            //When the user hits enter
            function define_style(elt)
            {
					document.getElementById(elt).style.color = "black";
                	document.getElementById(elt).style.fontWeight = "bold";
            }
			
			function call_my_eagl(str, ty)
            {
                if(str!= ''){
                    $.ajax(
                    {
                        url:"temp_page.php",
                        method: "post",
                        data:{p_page:str, t:ty},
                        dataType:"text",
                        success:function(data)
                        {
                             $('#home_search').html('')
                             $('#page_content').html(data)
                             $('#search_input').html(str)
                             $('#search_result').html('')
                        }
                    });
                 }
				 if_user_hits_enter('search_input');
            }
			
			
			function if_user_hits_enter(get_input_id)
			{
				document.getElementById(get_input_id).onkeypress = function(e){
					if (!e) e = window.event;
					var keyCode = e.keyCode || e.which;
					if (keyCode == '13'){
					  // Enter pressed
					  call_my_eagl(this.value, type.typ);
					  
					  return true;
					}
				}
				//get_file_type(file_type)
			}
			
				//function that detects when the user hits enter
				if_user_hits_enter('keyword');
		
    </script> 
	
      <?php 
	  
 		include_once(e_path."/my_eagle.php");
		
		//if the user clicks on a specific type
		if(isset($_GET['k'])){
			echo "<script>call_my_eagl(".$_GET['k'].", ' '); 
				$('keyword').html(".$_GET['k'].");</script>";
			
		}
		else if(isset($_GET['q']))
		{
			if($_GET['q'] === login){echo "<script>define_style('".login."')</script>";}
			if($_GET['q'] === signup){echo "<script>define_style('".signup."')</script>";}
		}
		
		//if the clicks on one of the suggestions
		if(isset($_GET['k']) && $_GET['k'] != '')
		{
			if(isset($_GET['t']) && $_GET['t'] != '')
				//echo '<script>call_my_eagl("'.$_GET['k'].'", "")<!--/script>';
				echo '<script>call_my_eagl("'.trim($_GET['k']).'", "'.$_GET['t'].'")</script>';
			else
				//echo '<script>call_my_eagl("'.$_GET['k'].'", "'.$_GET['t'].'")<!--/script>';
				echo '<script>call_my_eagl("'.trim($_GET['k']).'", "")</script>';
		}
		
		?> <!--/div-->
    <div id="page_content"></div>			
	