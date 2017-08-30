<div id="home_search">
		<div class="form_area">
      <center><b><h2>Demande de paiement en ligne</h2></b></center>
      <table cols="2" class="reg_info" cellpadding="0" cellspacing="10" width="90%" height="60%" style="margin:auto;"><tr><td>
      <div class="instruct"><div class="wordwrap">&rArr; Veuillez copier le lien de la page de paiement sur internet, puis coller le dans le box indiqu&eacute;... <br>&rArr; Veuillez donner le motif ou la raison du paiement (exemple: frais d&acute;inscription, frais de d&acute;achat d&acute;une marchandise).<br></div></div></td></tr></table>
        <form action="submit_payment_request" method="post">
        	<table cols="2" cellpadding="0" cellspacing="10" width="90%" height="60%" style="margin:auto;">
        	<tr><td>Nom de l'universit&eacute;: </td><td><input type='text' placeholder='Saisissez le lien' name='college_name' 
            id="c_name"  class="form_input"/></td></tr>
            <tr><td>Site web de l'universit&eacute;(si vous le connaissez): </td><td><input type="text" name="college_website" placeholder='Saisissez le motif' class="form_input" id="c_website" /></td></tr>
            <tr><td>Niveau d'&eacute;tudes universitaire: </td><td><select name="college_level" id="c_level" class="form_select" >
            											<option name="day" class="log_input">Selectionner le niveau universitaire</option>
                                                        <option  value="level 1">Cycle Licence niveau 1</option>
                                                        <option  value="level 2">Cycle Licence niveau 2</option>
                                                        <option  value="level 3">Cycle Licence niveau 3</option>
                                                        <option  value="graduate">Ent&eacute;e Cycle Master</option>
                                                        <option  value="phd">Entr&eacute;e Cycle Doctorat</option></td></tr>
            <tr><td>Fili&egrave;re choisie: </td><td><select name="college_level" id="c_level" class="form_select" >
            											<option name="day" class="log_input">Selectionner la fili&egrave;re</option>
                                                        <option  value="agronomie">Agronomie</option>
                                                        <option  value="arts">Arts</option>
                                                        <option  value="Bio">Biologie</option>
                                                        <option  value="construction mec">Construction m&eacute;canique</option>
                                                        <option  value="chimie">Chimie</option>
                                                        <option  value="communication">Communication</option>
                                                        <option  value="criminologie">Criminologie</option>
                                                        <option  value="info">Informatique</option></td></tr>
            <tr><td>Semestre / P&eacute;riode de d&eacutebut de cours: </td><td><select name="college_level" id="c_level" class="form_select" >
            											<option name="day" class="log_input">Selectionner le semestre</option>
                                                        <option  value="fall">Automne(Aout - Decembre)</option>
                                                        <option  value="summer">&Eacute;t&eacute;(Juin - Ao&ucirc;t)</option>
                                                        <option  value="spring">Hiver(Janvier - Mai)</option></td></tr>                        
            <tr><td>Date limite d&acute;inscription:</td><td><select name="d_day" id="deadline_day" class="form_select" >
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
            <tr><td>Autres commentaires(facultatif): </td><td><textarea type="text" name="payment_comment" 
                             id="p_comment" placeholder="Veuillez saisir votre commentaire..." class="form_textarea"></textarea></td></tr>
        	<tr><td><br><button class="log_bttn" value="send_p_request" > Envoyer </button></td></tr></table>
        </form>
        </div>
</div>