

<script>

		$('#connect').click(function(){
				displayError();
			});
			
			
        function myFunction() {
            document.getElementById("myDropdown").classList.toggle("show");
        }
        
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
			else{
				modal.style.display = "block";
				document.getElementById("keyword").style.zIndex = "-1";
			}
			// Get the button that opens the modal
			var btn = document.getElementById("connect");
			
			// Get the <span> element that closes the modal
			var span = document.getElementsByClassName("close")[0];
			
			// When the user clicks on <span> (x), close the modal
			span.onclick = function() {
				modal.style.display = "none";
				modalMedWind.style.display = "none";
				document.getElementById("keyword").style.zIndex = "1";
			}
			
			// When the user clicks anywhere outside of the modal, close it
			window.onclick = function(event) {
				if (event.target == modal) {
					modal.style.display = "none";
					document.getElementById("keyword").style.zIndex = "1";
				}
				else if (event.target == modalMedWind) {
					modalMedWind.style.display = "none";
					document.getElementById("keyword").style.zIndex = "1";
				}
			}
		}
		function reg_pop_up()
		{	
			//Pop up function 
			// Get the div
			var reg_box = document.getElementById('reg_box');
			reg_box.style.display = "block";
			document.getElementById("keyword").style.zIndex = "-1";
			// Get the button that opens the modal
			var reg_btn = document.getElementById("connect");
			
			// Get the <span> element that closes the modal
			var reg_span = document.getElementsByClassName("close")[0];
			
			// When the user clicks on <span> (x), close the modal
			reg_span.onclick = function() {
				reg_box.style.display = "none";
				document.getElementById("keyword").style.zIndex = "1";
			}
			
			// When the user clicks anywhere outside of the modal, close it
			window.onclick = function(event) {
				if (event.target == reg_box) {
					reg_box.style.display = "none";
					document.getElementById("keyword").style.zIndex = "1";
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
							url:"../process_login.php",
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
			function displayError()
            {
                 if($('#phone').val() == '' || $('#password').val() == ''){
                    $('#disp_error').html('Veuillez entrer vos identifiants svp!');
					disp_error.style.display = "block";
					var fade_out = function() {
					  $("#disp_error").fadeOut().empty();
					}
					setTimeout(fade_out, 5000);
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
									disp_error.style.display = "block";
									var fade_out = function() {
									  $("#disp_error").fadeOut().empty();
									}
									setTimeout(fade_out, 5000);
							}
						});
					 }
				
            }
			
</script>
<nav>
  <ul id="yep_menu">
  			<li id="all" ><a href="../acceuil">Tout</a></li>
        	<li id="vid" ><a href="vid/"> Videos</a></li>
            <li id="img" ><a href="../img/">Images</a></li>
            <li id="doc" ><a href="../doc/">Documents</a></li>
            <li id="soft" ><a href="#"><b>Logiciels</b></a></li>
            <li id="aud" ><a href="../aud/">Audio</a></li>
            <li id="all" ><a href="../index.php?p=frm">Forum</a></li>
            <li id="our_services" class="dropdown"><a href="#" class="dropbtn">Services</a>
            <div class="dropdown-content">
                <a href="#">Payements sur internet</a>
                <a href="#">Demandes d&acute;admission Universitaires</a>
                <a href="#">Requ&ecirc;te de fichier/document</a>
                <a href="#">Demande de service informatique</a>
              </div></li>
            <li id="messenger" onClick=""><a href="../messagerie">Messagerie</a></li>
            <li id="connect" onClick="log_pop_up()"><a href="#">Connexion</a></li>
            <li id="sign_up" onClick="reg_pop_up()"><a href="#">Inscription</a></li>
            
      </ul>
      <ul id="nope_menu">
      		<li id="terms" onClick="get_terms()"><a href="#">Messagerie</a></li>
      		<li id="connexion" onClick="log_pop_up()"><a href="#">Connexion</a></li>
            <li id="sign_up" onClick="reg_pop_up()"><a href="#">Inscription</a></li>
            
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
        <option value= "doc/" id="doc1" >Documents</option> 
        <option value="img/" id="img1" >Images</option> 
        <option value="aud/" id="aud1" > Audio</option> 
        <option value="soft/" id="soft1" >Logiciels</option> 
        <option value="index.php" id="all" >Services</option>
  		</select>
</nav>

<!--Pop up for login box-->
<?php //if(password_verify('kany_fils12316LCP', '$2y$10$IXjFOKgJsMJ3zToNu1JOL.2kv/AwYQbs2g7uVTj0XKqheOeuNgzPe')) echo 'Password_verify is working';?>
<!--login box-->
<div id="login_box" class="log_box"><span clas class="close">&times;</span>
      <div class="log_box_content">
      <center><h3>Connexion</h3></center>
      	<div id="disp_error" class="d_error"></div>
      	<table cols="2" class="reg_info" cellpadding="0" cellspacing="10" width="60%" height="60%" style="margin:2rem;"><tr><td>
         	&rArr;      Veuillez saisir votre num&eacute;ro de t&eacute;lephone et mot de passe pour vous connecter<br></td></tr></table>
                           
               <div class='input-group' style="margin:1rem;">
            	 <span class='input-group-addon'>Num&eacute;ro de t&eacute;l</span>
                 <input class='form-control input-sm' name='phone' id='phone' type='number' 
                 placeholder='Veuillez saisir votre num&eacute;ro de t&eacute;lephone:(+235)'>
            </div>
            <div class='input-group' style="margin:1rem;">
            	 <span class='input-group-addon' >Mot de passe   </span>
                 <input class='form-control input-sm' type="password"  name="password" id="password" 
                 placeholder="Veuillez saisir votre Mot de passe" >
            </div>
            <center>
                <button class="log_bttn" onclick="displayError()" id="connect" > Se connecter</button>
                </center>
         <table cols="2" class="reg_info" cellpadding="0" cellspacing="10" width="60%" height="60%" style="margin:auto;"><tr><td>
                Vous avez oubli&eacute; votre mot de passe? Cliquez <a href="#"><b>ici</b></a> pour le reinitialiser.</td></tr></table>
      </div>

</div>

<div id="login_box_small_sc" class="log_box"><span clas class="close">&times;</span>
      <div class="log_box_content">
      <center><h3>Connexion</h3></center>
         	&rArr;      Veuillez saisir votre numero de t&eacute;lephone et mot de passe pour vous connecter<br>
        <form action= "process_login.php" method="post" name="login_form">                    
            <input type="number" name="phone" id="phone" class="log_input"  placeholder="Num&eacute;ro de t&eacute;lephone:(+235)"/>
            
            <div class='input-group'>
            	 <span class='input-group-addon' onClick='call_eag()' style='cursor:pointer;'>Numero de t&eacute;lephone</span>
                 <input class='form-control input-sm' name='phone' id='phone' type='text' 
                 placeholder='Num&eacute;ro de t&eacute;lephone:(+235)'>
            </div>
            <div class='input-group'>
            	 <span class='input-group-addon' onClick='call_eag()' style='cursor:pointer;'>Mot de passe</span>
                 <input class='form-control input-sm' type="password"  name="password" id="password" placeholder="Mot de passe" >
            </div>
            <button class="log_bttn" onclick="formhash(this.form, this.form.password);"> Se connecter</button>
         </form>     
                Vous avez oubli&eacute; votre mot de passe? Cliquez <a href="#">ici</a> pour le reinitialiser.
      </div>

</div>

<!-- Registration box -->
<div id="reg_box" class="reg_box">
      <div class="log_box_content">
      <center><b><h3>Inscription</h3></b></center>
      <table cols="2" class="reg_info" cellpadding="0" cellspacing="10" width="60%" height="60%" style="margin:auto;"><tr><td>
         	&rArr;      Les numeros de telephones doivent avoir un format valide<br>
            &rArr;      Le mot de passe doit avoir au moins six characteres<br>
            &rArr;      Le mot de passe doit contenir les &eacute;lements suivants:<br>
            	&bull;     Au moins une lettre en majusule (A..Z)<br>
            	&bull;     Au moins une lettre en miniscule (a..z)<br>
                &bull;     Au moins un chiffre (0..9)<br>
           &rArr;       Votre mot de passe et la confirmation du mot de passe doivent &ecirc;tre identiques</td></tr></table>
        <center><form action="../register.php"
                method="post" 
                name="registration_form" 
                id='username' style="width:85%;"/>
		
       		<div class='input-group' style="margin:1rem;">
            	 <span class='input-group-addon'>Nom         </span>
                 <input class='form-control input-sm' name='user_firstname' id='user_firstname' type='text' 
                 placeholder='Veuillez saisir votre nom'>
            </div>
            
            <div class='input-group' style="margin:1rem;">
            	 <span class='input-group-addon'>Pr&eacute;nom</span>
                 <input class='form-control input-sm' name='user_lastname' id='user_lastname' type='text' 
                 placeholder='Veuillez saisir votre pr&eacute;nom'>
            </div>
             <div class='input-group' style="margin:1rem;">
            	 <span class='input-group-addon'>prof&eacute;ssion</span>
                 <input class='form-control input-sm' name='profession' id='profession' type='text' 
                 placeholder='Veuillez saisir votre prof&eacute;ssion'>
            </div>
            <div class='input-group' style="margin:1rem;">
            	 <span class='input-group-addon'>Num&eacute;ro de t&eacute;l</span>
                 <input class='form-control input-sm' name='phone_num' id='phone_num' type='number' 
                 placeholder='Veuillez saisir votre num&eacute;ro de t&eacute;lephone:(+235)'>
            </div>
            
            <div class='input-group' style="margin:1rem;">
            	 <span class='input-group-addon'>Nom d&acute;utilisateur</span>
                 <input class='form-control input-sm' name='username' id='username' type='text' 
                 placeholder='Veuillez saisir votre nom d&acute;utilisateur'>
            </div>
            
            <button class="log_bttn"
                   value="Register" 
                   onclick="return regformhash(this.form,
                                   this.form.user_firstname,
                                   this.form.user_lastname,
                                   this.form.user_profession,
                                   this.form.phone_num,
                                   this.form.username);"> S&acute;inscrire</button><br>
        </form></center>
      </div>

</div>


  <!--button onclick="myFunction()" class="dropbtn">Dropdown</button>
  <div id="myDropdown" class="dropdown-content">
    <a href="#">Link 1</a>
    <a href="#">Link 2</a>
    <a href="#">Link 3</a>
  </div>
</div-->