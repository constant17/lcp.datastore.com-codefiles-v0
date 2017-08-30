<?php include_once("../mon_prenom.php");
	// Include database connection and functions here.  See 3.1. 
	include_once("../db_management/DBConnector.php");
	include_once("../db_management/login_functions.php");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo nom_du_site; ?></title>
<link rel="stylesheet" type="text/css" href="design/assets/css/main.css" />
<link rel="stylesheet" type="text/css" href="../design/assets/css/main.css" />
<link rel="stylesheet" type="text/css" href="../design/bootstrap/css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="../design/bootstrap/css/bootstrap.min.css" />
<link rel="stylesheet" href="../design/bootstrap/css/bootstrap-theme.css" />
<link rel="stylesheet" href="../design/bootstrap/css/bootstrap-theme.min.css" />
<script src="../design/js/jquery-3.1.1"></script>
<script type="text/JavaScript" src="../design/js/sha512.js"></script> 
<script type="text/JavaScript" src="../design/js/forms.js"></script> 

</head>

<body>
	<?php
		//if(!isset($_SESSION['user_id'], $_SERVER['login_string']))
			//header('Location: ../acceuil');
		//else
			include("control/controller.php");
	?>
<!--div class="page_content" id="p_content">

       <a href="files/pdf/Pagoui.pdf"> <p>It appears your web browser doesn't support iframes.</p></a></div-->
<script>

	function readInput(str)
            {
                 if(str!= ''){
                    $('#search_result').html(' ');
                    $.ajax(
                    {
						url:"search_manager.php",
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
          
			function call_my_eagl(str)
            {
                if(str!= ''){
                    $.ajax(
                    {
                        url:"search_manager.php",
                        method: "post",
                        data:{search_doc:str},
                        dataType:"text",
                        success:function(data)
                        {
							 $('#old_search').html('')
                             $('#disp_default').html('')
                             $('#disp_result').html(data)
                             $('#keyword').html(str)
                             
                        }
                    });
                 }
				 if_user_hits_enter('keyword');
            }
			
			
			function if_user_hits_enter(get_input_id)
			{
				document.getElementById(get_input_id).onkeypress = function(e){
					if (!e) e = window.event;
					var keyCode = e.keyCode || e.which;
					if (keyCode == '13'){
					  // Enter pressed
					  call_my_eagl(this.value);
					  $('#search_result').html('');
					  return true;
					}
				}
				//get_file_type(file_type)
			}
			
				//function that detects when the user hits enter
				if_user_hits_enter('keyword');
</script>
</body>




<!--script>PDFObject.embed("files/pdf/Pagoui.pdf", "#p_content");</script-->
