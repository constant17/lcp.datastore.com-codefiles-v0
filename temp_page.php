<?php
	include("mon_prenom.php");
	include(d_path."/DBConnector.php");
	$get_connected = new DBConnector();
	
	if(isset($_POST['searchthis']))
	{	
		$print_sug = $get_connected->get_suggestions($_POST['searchthis']);
		echo $print_sug;
	}
	
	if(isset($_POST['t']) && isset($_POST['p_page']))
	{
		if($_POST['t'] == 'doc'){
			$show_result_by_type = $get_connected->get_result_by_type(str_replace("-", " ",$_POST['p_page']), 'doc');
			echo $show_result_by_type;
		}
		else if($_POST['t'] == 'img'){
			$show_result_by_type = $get_connected->get_result_by_type(str_replace("-", " ",$_POST['p_page']), 'img');
			echo $show_result_by_type;
		}
		else if($_POST['t'] == 'aud'){
			$show_result_by_type = $get_connected->get_result_by_type(str_replace("-", " ",$_POST['p_page']), 'aud');
			echo $show_result_by_type;
		}
		else if($_POST['t'] == 'soft'){
			$show_result_by_type = $get_connected->get_result_by_type(str_replace("-", " ",str_replace("-", " ",$_POST['p_page'])), 'soft');
			echo $show_result_by_type;
		}
		else if($_POST['t'] == 'vid'){
			
			$show_result_by_type = $get_connected->get_result_by_type(str_replace("-", " ",str_replace("-", " ",$_POST['p_page'])), 'vid');
			echo $show_result_by_type;
		}
		else if($_POST['t'] == '')
		{
			$what_is_searched = str_replace("-", " ",$_POST['p_page']);
			$print_result = $get_connected->get_search_result(str_replace("-", " ",$_POST['p_page']));
			$key_definition = $get_connected->define_the_key(trim(str_replace("-", " ",$_POST['p_page'])), d_path);
			if($key_definition != ""){
				$key_definition = "<br><div class='dfinition'><div class='wordwrap'><br>".$key_definition."</div></div>";
			echo "<script> document.getElementById('search_input').value = '".str_replace("-", " ",str_replace("-", " ",$_POST['p_page']))."';</script>;<div class='search_area_searching_page'>
				<div class='search_bk'>".nom_du_site."</div>
                <div class='input-group'>
                 <input class='form-control input-lg' name='keyword' id='search_input' onKeyUp='readInput(this.value)' type='text' placeholder='Que recherchez vous?'>
                        <span class='input-group-addon' onClick='call_eag()' style='cursor:pointer;'>Rechercher</span>
                   </div>  
                  
					<a href='#'><div id='search_result'></div></a>".$key_definition."
				<div id='get_result'>".$print_result."</div></div>";
			}
			else{ 
				echo "<script>
				document.getElementById('search_input').value = '".str_replace("-", " ",str_replace("-", " ",$_POST['p_page']))."';
				</script>;
				<div class='search_area_searching_page'>
					<div class='search_bk'>".nom_du_site."</div>
                <div class='input-group'>
                 <input class='form-control input-lg' name='keyword' id='search_input' onKeyUp='readInput(this.value)' type='text' placeholder='Que recherchez vous?'>
                        <span class='input-group-addon' onClick='call_eag()' style='cursor:pointer;'>Rechercher</span>
                   </div>  
                  
					<a href='#'><div id='search_result'></div></a>".$key_definition."
				<div id='get_result'>".$print_result."</div></div>";
					}
		}
		else if($_POST['t'] == 'all')
		{
			$what_is_searched = str_replace("-", " ",$_POST['p_page']);
			$print_result = $get_connected->get_search_result(str_replace("-", " ",$_POST['p_page']));
			$key_definition = $get_connected->define_the_key(trim(str_replace("-", " ",$_POST['p_page'])), d_path);
			if($key_definition != ""){
				$key_definition = "<div class='dfinition'><div class='wordwrap'><br>".$key_definition."</div></div>";
			echo "<script> document.getElementById('search_input').value = '".str_replace("-", " ",str_replace("-", " ",$_POST['p_page']))."';
				</script>;
				<div class='search_area_searching_page'>
					<div class='search_bk'>".nom_du_site."</div>
                <div class='input-group'>
                 <input class='form-control input-lg' name='keyword' id='search_input' onKeyUp='readInput(this.value)' type='text' placeholder='Que recherchez vous?'>
                        <span class='input-group-addon' onClick='call_eag()' style='cursor:pointer;'>Rechercher</span>
                   </div>  
                  
					<a href='#'><div id='search_result'></div></a>".$key_definition."
				<div id='get_result'>".$print_result."</div></div>";
			}
			else{ 
				echo "<script>
				document.getElementById('search_input').value = '".str_replace("-", " ",$_POST['p_page'])."';
				</script>;
				<div class='search_area_searching_page'>
					<div class='search_bk'>".nom_du_site."</div>
                <div class='input-group'>
                 <input class='form-control input-lg' name='keyword' id='search_input' onKeyUp='readInput(this.value)' type='text' placeholder='Que recherchez vous?'>
                        <span class='input-group-addon' onClick='call_eag()' style='cursor:pointer;'>Rechercher</span>
                   </div>  
                  
					<a href='#'><div id='search_result'></div></a><div id='get_result'>".$print_result."</div></div>";
					}
		}
	}
	else if(!isset($_POST['t']) && isset($_POST['p_page']))
	{
		$what_is_searched = str_replace("-", " ",$_POST['p_page']);
		$print_result = $get_connected->get_search_result(str_replace("-", " ",$_POST['p_page']));
		$key_definition = $get_connected->define_the_key(trim(str_replace("-", " ",$_POST['p_page'])), d_path);
		if($key_definition != ""){
			$key_definition = "<div class='dfinition'><div class='wordwrap'><br>".$key_definition."</div></div>";
		echo "<script> document.getElementById('search_input').value = '".str_replace("-", " ",$_POST['p_page'])."';
			</script>;
			<div class='search_area_searching_page'>
					<div class='search_bk'>".nom_du_site."</div>
                <div class='input-group'>
                 <input class='form-control input-lg' name='keyword' id='search_input' onKeyUp='readInput(this.value)' type='text' placeholder='Que recherchez vous?'>
                        <span class='input-group-addon' onClick='call_eag()' style='cursor:pointer;'>Rechercher</span>
                   </div>  
                  
					<a href='#'><div id='search_result'></div></a>".$key_definition."
				<div id='get_result'>".$print_result."</div></div>";
		}
		else{ 
			echo "<script>
			document.getElementById('search_input').value = '".str_replace("-", " ",$_POST['p_page'])."';
			</script>;
			<div class='search_area_searching_page'>
					<div class='search_bk'>".nom_du_site."</div>
                <div class='input-group'>
                 <input class='form-control input-lg' name='keyword' id='search_input' onKeyUp='readInput(this.value)' type='text' placeholder='Que recherchez vous?'>
                        <span class='input-group-addon' onClick='call_eag()' style='cursor:pointer;'>Rechercher</span>
                   </div>  
                  
					<a href='#'><div id='search_result'></div></a><div id='get_result'>".$print_result."</div></div>";
				}
	}
	
?>
<script>
	document.getElementById('search_input').onkeypress = function(e){
                if (!e) e = window.event;
                var keyCode = e.keyCode || e.which;
                if (keyCode == '13'){
                  // Enter pressed
                  call_my_eagl(this.value);
                  return false;
              }
	}
</script>