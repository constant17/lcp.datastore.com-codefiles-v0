<script>
 	function call_eag(){
				dat = document.getElementById("keyword").value;
				call_my_eagl(dat);
				//alert(dat);
			}
	
</script>
 <div id="old_search">
 <div class='search_area_searching_page'>
                    <div class='search_bk'><?php echo nom_du_site; ?></div>
                    <div class="input-group">
                            <input class="form-control input-lg" name="keyword" id="keyword" onkeyup="readInput(this.value)" type="text" placeholder="Rechercher une image" style="position:relative;">
                            <span class="input-group-addon" onClick="call_eag()" style="cursor:pointer;">Rechercher</span>
                        </div>
                    <div id="search_result" class="point"></div>
            </div>
    
<div class="b_cont" id="disp_default">
		<div class="container">
        

    
<?php
	
	echo '<ul class="row first">';
	$conn = new DBConnector();
	$con = $conn->makeTheConnection();
	$my_query = "SELECT DISTINCT * FROM dwd_all_file_info WHERE dwd_afi_file_type IN ('png', 'jpeg', 'tiff', 'gif', 'jpeg', 'bmp', 'jfif', 'svg', 'bpg')  ORDER BY dwd_afi_file_num_of_downloads DESC LIMIT 18";
	$my_result = mysqli_query($con, $my_query)or die(mysqli_error($con));;
	if(mysqli_num_rows($my_result) >0 ){ $i = 0;
		while($result_line = mysqli_fetch_array($my_result)){
			
		echo'<li style="margin-bottom:2em;">
			<img alt="'.$result_line['dwd_afi_file_keywords'].'"  src="../'.$result_line['dwd_afi_file_dir_path'].'">
			<div class="text">'.$result_line['dwd_afi_file_name'].'</div>
			</li>';
		$i++;
		}
	}
  echo '</ul>';?>




    </div> <!-- /container -->
        <?php
			/*$conn = new DBConnector();
			$con = $conn->makeTheConnection();
			$my_query = "SELECT DISTINCT * FROM dwd_all_file_info WHERE dwd_afi_file_type IN ('png', 'jpeg', 'tiff', 'gif', 'jpeg', 'bmp', 'jfif', 'svg', 'bpg')  ORDER BY dwd_afi_file_num_of_downloads DESC LIMIT 18";
			$my_result = mysqli_query($con, $my_query)or die(mysqli_error($con));;
			if(mysqli_num_rows($my_result) >0 ){ $i = 0;
			while($result_line = mysqli_fetch_array($my_result)){
				if(($i+1) % 6 ==0)
				echo '<div class="row">';
              echo'<div class="col-xs-2 col-md-2">
                     <div style="font-size:5vw;cursor:pointer; color:#676565;">
                        <span class="glyphicon glyphicon-picture" aria-hidden="true"></span>
                    </div>
                   <a style="font-weight:normal; font-size:1vw;cursor:pointer;" class="wordwrap"> '.$result_line['dwd_afi_file_name'].'</a>
                </div>
              '; 
			  if(($i+1) % 6 ==0)
				echo '</div>';$i++;
			  		}
			  }*/?>
          </div>
        </div>
       </div>
      <div id="disp_result"></div>