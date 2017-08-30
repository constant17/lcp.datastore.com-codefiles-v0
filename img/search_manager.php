
<?php
	include("mon_prenom.php");
	include("../db_management/DBConnector.php");
	$get_connected = new DBConnector();
	$path = '../db_management';
	if(isset($_POST['searchthis']))
	{	
		$print_sug = $get_connected->get_suggestions($_POST['searchthis']);
		/*$p_result= "<div class='drop_down_text'>";
		for($i = 0; $i< sizeof($print_sug); $i++)
		{
				$p_result.='<a href="index.php?q='.$print_sug[$i].'">'.$print_sug[$i].'</a>';
		}
		$p_result.= '</div>';*/
		echo $print_sug;
	}
	
	else if(isset($_POST['search_doc']))
	{
		$what_is_searched = str_replace("-", " ",$_POST['search_doc']);
		$print_result = $get_connected->get_result_by_type(str_replace("-", " ",$_POST['search_doc']), 'img');
		$key_definition = $get_connected->define_the_key(trim(str_replace("-", " ",$_POST['search_doc'])), $path);
		if($key_definition != "")
			$key_definition = "<div class='dfinition'><div class='wordwrap'><u>D&eacute;finition de la cl&eacute; de recherche</u>
			<br>".$key_definition."</div></div>";
		else $key_definition = "";
		echo "<script> document.getElementById('keyword').value = '".str_replace("-", " ",$_POST['search_doc'])."';
			</script>;
			<div class='search_area_searching_page'>
                    <div class='search_bk'>".nom_du_site."</div>
                    
                    <div class='input-group'>
                        <input class='form-control input-lg' name='keyword' id='keyword' onkeyup='readInput(this.value)' type='text' placeholder='Rechercher un document'>
                        <span class='input-group-addon' onClick='call_eag()' style='cursor:pointer;'>Rechercher</span>
                    </div>
                    <div id='search_result' class='point'></div>
                    <div id='search_result' class='point'></div>".$key_definition."
			<div>".$print_result."</div>
		</div>";
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