<script>

		$('#connect').click(function(){
				displayError();
			});
			
			
        
        // Close the dropdown menu if the user clicks outside of it
        //window.onclick = function(event) {
          //if (!event.target.matches('.dropbtn')) {
        
            //var dropdowns = document.getElementsByClassName("dropdown-content");
            //var i;
            //for (i = 0; i < dropdowns.length; i++) {
              //var openDropdown = dropdowns[i];
              //if (openDropdown.classList.contains('show')) {
                //openDropdown.classList.remove('show');
              //}
            //}
          //}
        //}
		
		function log_pop_up()
		{
			//Pop up function 
			
			var modal = document.getElementById('login_box');
			var modalMedWind = document.getElementById('login_box_small_sc');
			var winWidth = Math.max(document.documentElement.clientWidth, window.innerWidth || 0);
			var winHeight = Math.max(document.documentElement.clientHeight, window.innerHeight || 0);
			if(winWidth != 0 && winWidth <= 640)
				modalMedWind.style.display = "block";
			else
				modal.style.display = "block";
			// Get the button that opens the modal
			var btn = document.getElementById("connect");
			
			// Get the <span> element that closes the modal
			var span = document.getElementsByClassName("close")[0];
			
			// When the user clicks on <span> (x), close the modal
			span.onclick = function() {
				modal.style.display = "none";
				modalMedWind.style.display = "none";
			}
			
			// When the user clicks anywhere outside of the modal, close it
			window.onclick = function(event) {
				if (event.target == modal) {
					modal.style.display = "none";
				}
				else if (event.target == modalMedWind) {
					modalMedWind.style.display = "none";
				}
			}
		}
		function reg_pop_up()
		{	
			//Pop up function 
			// Get the div
			var reg_box = document.getElementById('reg_box');
			reg_box.style.display = "block";
			// Get the button that opens the modal
			var reg_btn = document.getElementById("connect");
			
			// Get the <span> element that closes the modal
			var reg_span = document.getElementsByClassName("close")[0];
			
			// When the user clicks on <span> (x), close the modal
			reg_span.onclick = function() {
				reg_box.style.display = "none";
			}
			
			// When the user clicks anywhere outside of the modal, close it
			window.onclick = function(event) {
				if (event.target == reg_box) {
					reg_box.style.display = "none";
				}
			}
		}
		
		function displayError()
            {
                 if($('#phone').val() == '' || $('#password').val() == ''){
                    $('#disp_error').html('Veuillez entrer vos identifiants svp!');
				 }
				 /*else if(formhash($('#phone').val(), $('#password').val()) != ''){
					  $('#disp_error').html(formhash($('#phone').val(), $('#password').val()));
				 }*/
				 else{
						$.ajax(
						{
							url:"process_login.php",
							method: "post",
							data:{phone: $('#phone').val(), pass:$('#password').val()},
							dataType:"text",
							success:function(data)
							{
								if(data == 'ok')
									window.location.href ='acceuil';
								else
									$('#disp_error').html(data)
							}
						});
					 }
				
            }
			
</script>
<nav>
  <ul id="yep_menu">
        	<li id="vid" ><a href="vid/" >Videos</a></li>
            <li id="img" ><a href="img/" >Images</a></li>
            <li id="doc" ><a href="doc/" >Documents</a></li>
            <li id="soft" ><a href="soft/">Logiciels</a></li>
            <li id="aud" ><a href="aud/">Audio</a></li>
            <li id="all" ><a href="index.php?p=frm" >Forum</a></li>
            <li id="our_services" class="dropdown"><a href="#" class="dropbtn">Services</a>
            <div class="dropdown-content">
                <a href="paiement_en_ligne" >Payements sur internet</a>
                <a href="admission_universitaire">Demandes d&acute;admission Universitaires</a>
                <a href="requete_fichier">Requ&ecirc;te de fichier/document</a>
                <a href="#">Demande de service informatique</a>
              </div></li>
            <li id="terms" onClick="get_terms()" ><a href="#">Annonces et Concours</a></li>
      		<li id="connexion" onClick="log_pop_up()" ><a href="m_index.php">Messagerie</a></li>
             <li id="my_acc" class="dropdown"><a href="#" class="dropbtn">Mon compte</a>
            <div class="dropdown-content">
                <a href="#" >Param&egrave;tres</a>
                <a href="logout.php" >Deconnexion</a>
              </div>
            </li>
            
      </ul>
      <ul id="nope_menu">
      		<li id="terms" onClick="get_terms()"><a href="#">Annonces et Concours</a></li>
      		<li id="connexion" onClick="log_pop_up()"><a href="#">Messagerie</a></li>
             <li id="my_acc" class="dropdown"><a href="#" class="dropbtn">Mon compte</a>
            <div class="dropdown-content">
                <a href="#">Param&egrave;tres</a>
                <a href="logout.php">Deconnexion</a>
              </div>
            </li>
            
  </ul>
  		
    	<select onchange="location = this.value;"> 
        <option value="" >
			<?php 
				$type_fichier = "Selectionner le type de fichier";
				if(isset($_GET['t']) && $_GET['t'] === doc) $type_fichier = "Documents";
				if(isset($_GET['t']) && $_GET['t'] === vid) $type_fichier = "Videos";
				if(isset($_GET['t']) && $_GET['t'] === img) $type_fichier = "Images";
				if(isset($_GET['t']) && $_GET['t'] === aud) $type_fichier = "Fichiers audio";
				if(isset($_GET['t']) && $_GET['t'] === soft) $type_fichier = "Logiciels";
				echo $type_fichier;
			?>
        </option>       
        <option value="vid/" id="vid1" >Videos</option> 
        <option value="doc/" id="doc1" >Documents</option> 
        <option value="img/" id="img1" >Images</option> 
        <option value="aud/" id="aud1" > Audio</option> 
        <option value="soft/" id="soft1" >Logiciels</option> 
        <option value="index.php" id="all" >Services</option>
  		</select>
</nav>
