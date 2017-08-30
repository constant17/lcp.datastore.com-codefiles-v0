<div id="home_search">
		<div class="form_area">
      <!--center><b><h2>Requ&ecirc;te de fichier / Document</h2></b></center>
      <table cols="2" class="reg_info" cellpadding="0" cellspacing="10" width="90%" height="60%" style="margin:auto;"><tr><td>
      <div class="instruct"><div class="wordwrap">&rArr; Veuillez copier le lien de la page de paiement sur internet, puis coller le dans le box indiqu&eacute;... <br>&rArr; Veuillez donner le motif ou la raison du paiement (exemple: frais d&acute;inscription, frais de d&acute;achat d&acute;une marchandise).<br></div></div></td></tr></table>
        <form action="submit_payment_request" method="post">
        	<table cols="2" cellpadding="0" cellspacing="10" width="90%" height="60%" style="margin:auto;">
        	<tr><td>Nom du document: </td><td><input type='text' placeholder='Saisissez le lien' name='doc_name' 
            id="d_name"  class="form_input"/></td></tr>
            <tr><td>Auteur / Maison d'&eacute;dition (facultatif): </td><td><input type="text" name="doc_author" placeholder='Saisissez le motif' class="form_input" id="d_author" /></td></tr>
            <tr><td>Cat&eacute;gorie: </td><td><select name="doc_cat" id="d_cat" class="form_select" >
            											<option name="day" class="log_input">Selectionner la cat&eacute;gorie du document</option>
                                                        <option  value="roman">Musique</option>
                                                        <option  value="science">Science</option>
                                                        <option  value="education">Educatif</option>
                                                        <option  value="professional">Professionel</option>
                                                        <option  value="religion">Litterature g&eacute;nerale</option>
                                                        <option  value="religion">Religion</option></td></tr>
            <tr><td>Langue : </td><td><select name="college_level" id="c_level" class="form_select" >
            											<option name="day" class="log_input">Selectionner la langue du document</option>
                                                        <option  value="arabic">Arabe</option>
                                                        <option  value="english">Anglais</option>
                                                        <option  value="german">Allemand</option>
                                                        <option  value="china">Chinois</option>
                                                        <option  value="spanish">Espagnol</option>
                                                        <option  value="italian">Italien</option>
                                                        </td></tr>
            <tr><td>Type de document: </td><td><select name="doc_type" id="d_type" class="form_select" >
            											<option name="day" class="log_input">
                                                        Selectionner le type de fichier / document</option>
                                                        <option  value="text_type">Fichier Texte (doc, pdf, etc..)</option>
                                                        <option  value="video_type">Fichier Video (mp4, flv, etc..)</option>
                                                        <option  value="audio_type">Fichier audio (mp3, mpeg, etc..)</option></td></tr>                        
            <tr><td>Date limite :</td><td><select name="d_day" id="deadline_day" class="form_select" >
            											<option name="day" class="log_input">Jour</option>
                                                        <option  value="1">01</option>
                                                        <option  value="2">02</option>
                                                        <option  value="3">03</option>
                                                        <option  value="4">04</option>
                                                        <option  value="5">05</option>
                                                        <option value="6">06</option><option value="7">07</option>
                                                        <option value="8">08</option>
                                                        <option value="9">09</option><option value="10">10</option>
                                                        <option value="11">11</option><option value="12">12</option>
                                                        <option value="13">13</option><option value="14">14</option>
                                                        <option value="15">15</option><option value="16">16</option>
                                                        <option>17</option><option>18</option><option>19</option><option>20</option>
                                                        <option>21</option><option>22</option><option>23</option><option>24</option>
                                                        <option>25</option><option>26</option><option>27</option><option>28</option>
                                                        <option>29</option><option>30</option><option>31</option>
            										</select>
                                                    <select name="payment_month" id="p_deadline_month" class="form_select">
            											<option name="day">Mois</option>
                                                        <option>01</option><option>02</option><option>03</option><option>04</option>
                                                        <option>05</option><option>06</option><option>07</option><option>08</option>
                                                        <option>09</option><option>10</option><option>11</option><option>12</option>
            										</select>
                                                    <select name="payment_year" id="p_deadline_year" class="form_select">
            											<option name="day">Ann&eacute;e</option>
                                                        <option>2017</option><option>2018</option>
            										</select></td>
                                                    </tr>
            <tr><td>Autres commentaires(facultatif): </td><td><textarea type="text" name="doc_comment" 
                             id="d_comment" placeholder="Veuillez saisir votre commentaire..." class="form_textarea"></textarea></td></tr>
        	<tr><td><br><button class="log_bttn" value="send_p_request" > Envoyer </button></td></tr></table>
        </form>
        </div>
</div-->
<center><h4>Requ&ecirc;te de fichier / Document</h4></center>
<form action="paiement_en_ligne" method="post" name="p_form">
        	<table cols="2" cellpadding="0" cellspacing="0" width="90%" height="60%" style="margin:1rem;">
        	<div id="disp_error_pr" class="alert alert-danger" style="display:none;padding:0.5rem;text-align:center;width:96%;"></div>
            <div class='input-group' style="margin:1rem;">
            	 <span class='input-group-addon'>Nom du document         </span>
                 <input class='form-control input-sm' name='d_name' id='d_name' type='text' 
                 placeholder='Saisissez le Nom du document'>
            </div>
            <div class='input-group' style="margin:1rem;">
            	 <span class='input-group-addon'>Auteur / Maison d'&eacute;dition (facultatif)        </span>
                 <input type="text" name="d_author" placeholder='Saisissez le motif' 
            						 class='form-control input-sm' id="d_author" />
            </div>
            <div class='input-group' style="margin:1rem;"><span class='input-group-addon'>Autres commentaires (facultatif): </span>
            <textarea type="text" name="d_comment" 
                             id="d_comment" placeholder="Veuillez saisir votre commentaire..." class="form-control"></textarea></div>
            <tr><td><div class='input-group' >
            	 <span class='input-group-addon'>Caract&eacute;ristiques du fichier </span><select name="d_cat" id="d_cat" class='form-control select-sm' >
            											<option name="null" class="form-control">Selectionner la cat&eacute;gorie du document</option>
                                                        <option  value="roman">Musique</option>
                                                        <option  value="science">Science</option>
                                                        <option  value="education">Educatif</option>
                                                        <option  value="professional">Professionel</option>
                                                        <option  value="religion">Litterature g&eacute;nerale</option>
                                                        <option  value="religion">Religion</option></select></td>
            <td><select name="college_level" id="c_level" class="form-control" >
            											<option name="day" class="log_input">Selectionner la langue du document</option>
                                                        <option  value="arabic">Arabe</option>
                                                        <option  value="english">Anglais</option>
                                                        <option  value="german">Allemand</option>
                                                        <option  value="china">Chinois</option>
                                                        <option  value="spanish">Espagnol</option>
                                                        <option  value="italian">Italien</option></select>
                                                        </td>
            <td><select name="d_type" id="d_type" class="form-control" >
            											<option name="day" class="">
                                                        Selectionner le formatdu fichier / document</option>
                                                        <option  value="text_type">Fichier Texte (doc, pdf, etc..)</option>
                                                        <option  value="video_type">Fichier Video (mp4, flv, etc..)</option>
                                                        <option  value="audio_type">Fichier audio (mp3, mpeg, etc..)</option></select>
                                                        </td></div></tr>
            <tr><td><div class='input-group' >
            	 <span class='input-group-addon'>Date limite du paiement         </span>
                 <select name="p_day" id="p_day" class='form-control select-sm' >
            											<option value="-1" class="">Jour</option>
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
                     <center><button class="log_bttn" value="send_p_request" onclick="return paymentRequest(this.form,
                                   this.form.d_name,
                                   this.form.d_author,
                                   this.form.d_cat,
                                   this.form.p_day,
                                   this.form.p_month,
                                   this.form.p_year);" type="submit"> Envoyer </button></center>
                                   </form>
        </div>
</div>