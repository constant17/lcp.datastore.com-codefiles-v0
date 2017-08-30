
    <div class='search_area_searching_page'>
                    <div class='search_bk'><?php echo nom_du_site; ?></div>
                    <input class="input" name="keyword" id="keyword" onkeyup="readInput(this.value)" type="text" placeholder="Rechercher un document similaire" />
                    <div id="search_result" class="point"></div>
            </div>
            
<?php 
	$conn = new DBConnector();
	$conn->makeTheConnection();
	$text = $conn->get_s_suggestions(substr($file_name, 0, 3));
?>
<div class="b_cont">
	<!--Present the book to th euser-->
        <div class="col-xs-4">
        	<div class="liv_sim"><h5>Documents similaires</h5></div><br>
            
            <!--div style="font-size:4em;">
          		<span class="glyphicon glyphicon-book" aria-hidden="true"></span>
            </div-->
            <div class="row">
              <div class="col-xs-6 col-md-3">
                     <div style="font-size:4em;">
                        <span class="glyphicon glyphicon-book" aria-hidden="true"></span>
                    </div>
                   <a> <?php echo $text[0];?></a>
                </div>
              <div class="col-xs-6 col-md-3">
                     <div style="font-size:4em;">
                        <span class="glyphicon glyphicon-book" aria-hidden="true"></span>
                    </div>
                   <a> <?php echo $text[1];?></a>
                </div>
              <div class="col-xs-6 col-md-3">
                     <div style="font-size:4em;">
                        <span class="glyphicon glyphicon-book" aria-hidden="true"></span>
                    </div>
                   <a href="index.php?f=3"> <?php echo $text[2];?></a>
                </div>
            </div>
            <div class="row">
              <div class="col-xs-6 col-md-3">
                <div style="font-size:4em;">
          			<span class="glyphicon glyphicon-book" aria-hidden="true"></span>
            	</div>
                <a href="index.php?f=4"><?php echo $text[3];?></a>
              </div>
              <div class="col-xs-6 col-md-3">
                <div style="font-size:4em;color:#676565;">
          			<span class="glyphicon glyphicon-book" aria-hidden="true"></span>
            	</div>
               <a>ihbuh</a>
              </div>
            </div>
        </div>
        <div class="col-xs-4"><div class="wordwrap">
            <div class="book_back">
                <div class="book_text"><?php echo $file_name; ?></div>
                <div class="book_desc"><br><?php echo $the_keys; ?></div>
            </div>
        </div></div>
    	<div class="row"><div class="col-xs-4"><div class="liv_sim"><br>
        <h5>Description du document</h5><div class="wordwrap"><?php echo $the_keys; ?>
        </div></div>
        <div class="row"><div class="col-xs-4"><div class="liv_sim"><br><br>
        <button class="btn" value="telecharger">Telecharger le document</button>
        <button class="btn" value="recommander">Recommander le document</button>
        <button class="btn" value="ouvrir">Ouvrir le document</button></div>
    <!--Recommand similar books to the user-->
</div>
<script>
function readInput(str)
            {
                 if(str!= ''){
                    $('#search_result').html(' ');
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
			
</script>
<?php
	
?>