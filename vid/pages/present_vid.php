<script> 
		var myVideo = document.getElementById("video1"); 
		
		function playPause() { 
			if (myVideo.paused) 
				myVideo.play(); 
			else 
				myVideo.pause(); 
		} 
		
		function makeBig() { 
			myVideo.width = 560; 
		} 
		
		function makeSmall() { 
			myVideo.width = 320; 
		} 
		
		function makeNormal() { 
			myVideo.width = 420; 
		} 
</script>
    <div class='search_area_searching_page'>
                    <div class='search_bk'><?php echo nom_du_site; ?></div>
                    <input class="input" name="keyword" id="keyword" onkeyup="readInput(this.value)" type="text" placeholder="Rechercher un document similaire" />
                    <div id="search_result" class="point"></div>
            </div>
<div class="b_cont">
	<!--Present the book to th euser-->
        <video id="player_a" class="projekktor" poster="intro.png" title="Example de video - darkweb" height="300" controls>
            <!--source src="../files/mp4_videos/" type="video/ogg" /-->
            <source src="files/mp4_videos/yt-LRZ4A2tXyj8.mp4" type="video/mp4" />
        </video>
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