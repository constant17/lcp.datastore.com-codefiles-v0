<div id="home_search">
		<div class="form_area">
      <center><b><h2>Demande de paiement en ligne</h2></b></center>
      <div class="wordwrap"><div class="alert alert-success" id="success_notif" style="display:none;"></div></div>
      <table cols="2" class="reg_info" cellpadding="0" cellspacing="10" width="90%" height="60%" style="margin:auto;"><tr><td>
      <div class="instruct"><div class="wordwrap">&rArr; Veuillez copier le lien de la page de paiement sur internet, puis coller le dans le box indiqu&eacute;... <br>&rArr; Veuillez donner le motif ou la raison du paiement (exemple: frais d&acute;inscription, frais de d&acute;achat d&acute;une marchandise).<br>&rArr; Veuillez donner le plus de details possibles concernant le paiement en incluant les &eacute;lements suivants:<br>&bull; Le nom de la marchandise, universite, ou autre (A..Z)<br>&bull; Au moins une lettre en miniscule (a..z)<br>&bull; Au moins un chiffre (0..9)<br>&rArr; Votre mot de passe et la confirmation du mot de passe doivent &ecirc;tre identiques</div></div></td></tr></table>
        <form action="paiement_en_ligne" method="post" name="p_form">
        	<table cols="2" cellpadding="0" cellspacing="10" width="90%" height="60%" style="margin:auto;">
        	<div id="disp_error_pr" class="alert alert-danger" style="display:none;padding:0.5rem;text-align:center;width:96%;"></div>
            <div class='input-group' style="margin:1rem;">
            	 <span class='input-group-addon'>Lien de paiement         </span>
                 <input class='form-control input-sm' name='p_link' id='p_link' type='text' 
                 placeholder='Saisissez le lien de paimement'>
            </div>
            <div class='input-group' style="margin:1rem;">
            	 <span class='input-group-addon'>Motif de paiement         </span>
                 <input type="text" name="p_motif" placeholder='Saisissez le motif' 
            						 class='form-control input-sm' id="p_motif" />
            </div>
            <div class='input-group' style="margin:1rem;"><span class='input-group-addon'>Autres commentaires (facultatif): </span>
            <textarea type="text" name="p_comment" 
                             id="p_comment" placeholder="Veuillez saisir votre commentaire..." class="form-control"></textarea></div>
            <tr><td><div class='input-group' style="">
            	 <span class='input-group-addon'>Date limite du paiement         </span>
                 <select name="p_day" id="p_day" class='form-control select-sm' >
            											<option value="-1" class="log_input">Jour</option>
                                                        <option  value="1">01</option>
                                                        <option  value="2">02</option>
                                                        <option  value="3">03</option>
                                                        <option  value="4">04</option>
                                                        <option  value="5">05</option>
                                                        
            										</select></td>
                                                    <td><select name="p_month" id="p_month" class='form-control'>
            											<option value="-1">Mois</option>
                                                        <option  value="1">01</option>
                                                        <option  value="2">02</option>
                                                        <option  value="3">03</option>
                                                        <option  value="4">04</option>
                                                        <option  value="5">05</option>
            										</select></td>
                                                    <td><select name="p_year" id="p_year" class='form-control'>
            											<option value="-1">Ann&eacute;e</option>                                                        <option value="2017">2017</option><option value="2018">2018</option>
            										</select></td>
                     </div></tr></table>
                     <button class="log_bttn" value="send_p_request" onclick="return paymentRequest(this.form,
                                   this.form.p_link,
                                   this.form.p_motif,
                                   this.form.p_day,
                                   this.form.p_month,
                                   this.form.p_year);" type="submit"> Envoyer </button>
                                   </form>
        </div>
</div>


<script>
	function paymentRequest(form, p_link, p_motif, p_day, p_month, p_year){
		if(p_link.value == '' || p_motif.value =='' ||  p_month.value == '' || p_year =='' ){
			$('#disp_error_pr').html('Veuillez fournir toutes les informations demandees svp!');
					disp_error_pr.style.display = "block";
					var fade_out = function() {
					  $("#disp_error_pr").fadeOut().empty();
					}
					setTimeout(fade_out, 5000);
				return false;
		}
		else{
			form.submit();
			return true;
		}
		
	}
	function notif_success(){
		$('#success_notif').html('Votre demande a &eacute;t&eacute; envoy&eacute;e avec succ&egrave;s, nous vous contacterons dans les plus brefs d&eacute;lais pour plus d&acute;information sur votre achat en ligne. Merci pour confiance.');
		success_notif.style.display = "block";
					var fade_out = function() {
					  $("#success_notif").fadeOut().empty();
					}
					setTimeout(fade_out, 5000);
					document.getElementById("p_form").reset;
		}
</script>

<?php
		$mysqli = mysqli_connect('localhost', 'root', "", 'dark_web_data'); $date = "";
		echo $_SESSION['user_id'];
		
		if(isset($_POST['p_link'],$_POST['p_motif'], $_POST['p_day'],$_POST['p_month'],$_POST['p_year'])){
				$date = $_POST['p_day'].'/'.$_POST['p_month'].'/'.$_POST['p_year'];
				if ($insert_stmt = $mysqli->prepare("INSERT INTO dwd_payment_requests 
				(user_id, payment_motif, payment_link, payment_due_date, payment_comments) VALUES ( ?, ?, ?, ?, ?)")) 
				{
					
					$insert_stmt->bind_param('sssss', $_SESSION['user_id'], $_POST['p_motif'], $_POST['p_link'], 
					$date, $_POST['p_comment']);
					// Execute the prepared query.
					if (! $insert_stmt->execute()) {
						$error_msg .= '<div class="alert alert-warning"> UNE ERREUR S&acute;EST PRODUITE LORS DE L&acute;ENREGISTREMENT DE VOS DONNEES, VEUILLEZ REESSAYER SVP!.</div>';
						echo $error_msg;
				}
				else{
					echo '<script>notif_success();</script>';
					}
				
            }
		}
?>