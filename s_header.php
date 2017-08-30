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
        	<li id="vid" ><a href="acceuil"  class="deco-none">Acceuil</a></li>
            <li id="all" ><a href="index.php?p=frm"  class="deco-none">Forum</a></li>
            <li id="our_services" class="dropdown"><a href="#" class="dropbtn">Services</a>
            <div class="dropdown-content">
                <a href="paiement_en_ligne"  class="deco-none">Payements sur internet</a>
                <a href="admission_universitaire"  class="deco-none">Demandes d&acute;admission Universitaires</a>
                <a href="requete_fichier">Requ&ecirc;te de fichier/document</a>
                <a href="#"  class="deco-none">Demande de service informatique</a>
              </div></li>
            <li id="terms" onClick="get_terms()"  class="deco-none"><a href="#">Annonces et Concours</a></li>
      		<li id="connexion" onClick="log_pop_up()" class="deco-none"><a href="#">Messagerie</a></li>
            <li id="my_acc" class="dropdown"><a href="#" class="dropbtn">Mon compte</a>
            <div class="dropdown-content">
                <a href="#">Param&egrave;tres</a>
                <a href="logout.php">Deconnexion</a>
              </div>
            </li>
            
      </ul>
      <ul id="nope_menu">
      		<li id="terms" onClick="get_terms()"><a href="#">Annonces et Concours</a></li>
      		<li id="connexion" onClick="log_pop_up()"><a href="m_index.php">Messagerie</a></li>
             <li id="my_acc" class="dropdown"><a href="#" class="dropbtn">Mon compte</a>
            <div class="dropdown-content">
                <a href="#">Param&egrave;tres</a>
                <a href="logout.php">Deconnexion</a>
              </div>
            </li>
            
  </ul>
  		
    	<select onchange="location = this.value;"> 
        <option value="" > Selectionner le menu</option>       
        <option value="index.php?t=vid" id="vid1" >Acceuil</option> 
        <option value="index.php" id="all" >Services</option>
        <option><a href="#">Payements sur internet</a></option>
        <option><a href="#">Demandes d&acute;admission Universitaires</a></option>
        <option><a href="#">Requ&ecirc;te de fichier/document</a></option>
        <option><a href="#">Demande de service informatique</a></option>
  		</select>
</nav>
