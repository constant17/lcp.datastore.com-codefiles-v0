 <script>
 	function call_eag(){
				dat = document.getElementById("keyword").value;
				call_my_eagl(dat);
				//alert(dat);
			}
	
</script>
 <div id="old_search">
     <div class='search_area_searching_page' >
                        <div class='search_bk'><?php echo nom_du_site; ?></div>
                        
                        <div class="input-group">
                            <input class="form-control input-lg" name="keyword" id="keyword" onkeyup="readInput(this.value)" type="text" placeholder="Rechercher un logiciel">
                            <span class="input-group-addon" onClick="call_eag()" style="cursor:pointer;">Rechercher</span>
                        </div>
                        <div id="search_result" class="point"></div>
                </div>
        
    <div class="b_cont" id="disp_default">
            
            <?php
                $conn = new DBConnector();
                $con = $conn->makeTheConnection(); 
                $my_query = "SELECT DISTINCT * FROM dwd_all_file_info WHERE dwd_afi_file_type IN ('exe', 'apk', 'prg', 'msi', 'paf', 'osx', 'run', 'out', 'app')  ORDER BY dwd_afi_file_num_of_downloads DESC LIMIT 18";
                $my_result = mysqli_query($con, $my_query)or die(mysqli_error($con));;
                if(mysqli_num_rows($my_result) >0 ){ $i = 0;
                while($result_line = mysqli_fetch_array($my_result)){
                    if(($i+1) % 6 ==0)
                    echo '<div class="row">';
                  echo'<div class="col-xs-2 col-md-2">
                       
                            <span class="glyphicon glyphicon-floppy-save" aria-hidden="true" 
							style="font-size:5vw;cursor:pointer; color:#676565;"></span><br>                       
							<a style="font-weight:normal; font-size:1vw;cursor:pointer;" class="wordwrap"> '.$result_line['dwd_afi_file_name'].'</a>
                    </div>
                  '; 
                  if(($i+1) % 6 ==0)
                    echo '</div>';$i++;
                        }
                  }?>
            </div>
          </div>
      <div id="disp_result"></div>