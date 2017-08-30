
<script>
    	$('#search_result').click(function(){
				data = document.getElementById('search_result').innerHTML;
				$('keyword').html(data);
				call_my_eagl(data, '');
			});
		function call_eag(){
				dat = document.getElementById("keyword").value;
				call_my_eagl(dat, get_type());
				//alert(dat);
			}
    </script>
    
    <div id="home_search">
		<div class="search_area">
                <div class="header_for_search"><?php echo nom_du_site; ?></div>
                <div class='input-group'>
                 <input class='form-control input-lg' name='keyword' id='keyword' onKeyUp="readInput(this.value)" type='text' placeholder='Que recherchez vous?'>
                        <span class='input-group-addon' onClick='call_eag()' style='cursor:pointer;'>Rechercher</span>
                   </div>  
                  <div id="search_result"></div>
		</div>
    </div>
    
  
