<?php

class DBConnector
{
	var $hostName;
	var $userName;
	var $password;
	var $dbname;
    function __construct()
	{
		$this->hostName = host;
		$this->userName = server_username;
		$this->password = server_pass;
		$this->dbname = db_name;
	}
	
	function getHostName()
	{
		return $this->hostName;
	}
	
	function getUserName()
	{
		return $this->userName;
	}
	
	function getPassword()
	{
		return $this->password;
	}
	
	function getDbName()
	{
		return $this->dbname;
	}
	/***************************************************************************
	/ Function: etablie la connexion a la base de donnees
	/***************************************************************************/
	function makeTheConnection()
	{
		$connect = mysqli_connect(host, server_username, server_pass, db_name);
		return $connect;
	}
	//function used to secure threats from user input
	public function test_input($data) {
		  $data = trim($data);
		  $data = stripslashes($data);
		  $data = htmlspecialchars($data);
		  if(strpos($data, "'") !== false)
				$data = str_replace("'", "\'", $data);
		  return $data;
		}
	/***************************************************************************
	/ Function: retourne les suggestions a partir du mot ou lettre entre 
	/ qu'elle prend en parametre.
	/***************************************************************************/
	public function get_suggestions($key_to_search)
	{
		$connected = $this->makeTheConnection();
		$output = array(); $i =0; $out = "<div class='drop_down_text'>";  //$file_indexes = array(); 
		if(strlen($key_to_search) > 1)
			$my_query = "SELECT DISTINCT * FROM dwd_all_file_info WHERE dwd_afi_file_keywords LIKE '%".$this->test_input($key_to_search)."%' LIMIT 5";
		else
			$my_query = "SELECT DISTINCT * FROM dwd_all_file_info WHERE dwd_afi_file_keywords LIKE '".$this->test_input($key_to_search)."%' LIMIT 5";
		$my_result = mysqli_query($connected, $my_query)or die(mysqli_error($connected));;
		if(mysqli_num_rows($my_result) >0){
				while($result_line = mysqli_fetch_array($my_result)){
					$output [$i]= $result_line['dwd_afi_file_keywords'];
					$i++;
				}
		}
		else{
			$out = "";	
			return $out;
		}
		$keywords = array(); $countt = 0;
		for($j = 0; $j<$i; $j++)
		{
			$str = ''.$output[$j].''; $t = ' Here we goooooooo ';
			$keywords = explode(',',$str); //$arr = array();
			if(sizeof($keywords) > 3) $c = 3; else $c = sizeof($keywords);
			for($s = 0; $s < $c; $s++){
				
				if (preg_match("#".$key_to_search."#i", $keywords[$s]))
				{
						$link= str_replace(" ", "-",$keywords[$s]); 
						$out .= '<a href="index.php?k='.$link.'">'.$keywords[$s].'</a><br>';
						//$arr[$countt] = $keywords[$s];
						$countt++;
				}
			}
			if($countt > 3){
				$s = sizeof($keywords); $j = $i;}
		}
		
		$out .= '</div>';
	return $out;
	}
	/***************************************************************************
	/ Function: retourne le resultat des recherches a partir d'un mot cle
	/ qu'elle prend en parametre.
	/***************************************************************************/
	public function get_search_result($what_is_searched)
	{
		$connect = $this->makeTheConnection();
		$design_class = ''; $type_du_fichier = '';
		$output_result = array(); $i =0; $out_result = "<div class='wordwrap'><br>";
		$my_query = "SELECT DISTINCT * FROM dwd_all_file_info WHERE dwd_afi_file_keywords LIKE '%".$this->test_input($what_is_searched)."%' LIMIT 5";
		$my_result = mysqli_query($connect, $my_query) or die(mysqli_error($connect));
		$doc_ext = array("pdf", "docx", "xlsx", "ppt", "pptx", "txt", "", "", "");
		$img_ext = array("png", "jpeg", "tiff", "gif", "jpg", "bmp", "jfif", "svg", "bpg");
		$aud_ext = array("mp3", "wav", "wma", "aiff", "m3u", "webm", "3ga", "rec", "mp4a");
		$vid_ext = array("mp4", "avi", "flv", "gif", "gifv", "wmv", "rmvb", "3gp", "mpeg");
		$soft_ext = array("exe", "apk", "prg", "msi", "paf", "osx", "run", "out", "app");
		if(mysqli_num_rows($my_result) >0 ){
				while($result_line = mysqli_fetch_array($my_result)){
					$output [$i]= $result_line['dwd_afi_file_keywords'];
					if(in_array($result_line['dwd_afi_file_type'], $doc_ext)){
						$page = 'doc';$design_class = 'glyphicon glyphicon-book';
						$type_du_fichier = 'Fichier texte';}
					else if(in_array($result_line['dwd_afi_file_type'], $img_ext)) {
						$page = 'img';$design_class = 'glyphicon glyphicon-picture';
						$type_du_fichier = 'Image';}
					else if(in_array($result_line['dwd_afi_file_type'], $vid_ext)) {
						$page = 'vid';$design_class = 'glyphicon glyphicon-film';
						$type_du_fichier = 'Video';}
					else if(in_array($result_line['dwd_afi_file_type'], $soft_ext)) {
						$page = 'soft';$design_class = 'glyphicon glyphicon-floppy-save';
						$type_du_fichier = 'Logiciel ou fichier executable';}
					else if(in_array($result_line['dwd_afi_file_type'], $aud_ext)) {
						$page = 'aud';$design_class = 'glyphicon glyphicon-volume-up';
						$type_du_fichier = 'Audio';}
					else $page = "";
					$out_result .= "<p class='wordwrap'><span class='".$design_class.
					"' aria-hidden='true' style='font-size:1vw;color:#676565;'> </span><a href='".
					$page."/index.php?f=".urlencode($result_line['dwd_afi_id'])."' style='text-decoration:none; color:#676565;'><b>".
									$result_line['dwd_afi_file_name'].
									"</b><br>Type de fichier: ".$type_du_fichier ." ( Extension: ".$result_line['dwd_afi_file_type'].
									" )<br />Cles de recherche:".$result_line['dwd_afi_file_keywords']."</a><hr></p>";
					$i++;
				}
			$out_result .= "</div>";
		}
		else
			$out_result = "";
		return $out_result;

	}
	/***************************************************************************
	/ Function: retourne le resultat des recherches selon le type et a partir d'un mot cle
	/ qu'elle prend comme premier parametre et le type de document comme deuxieume parametre.
	/***************************************************************************/
	public function get_result_by_type($user_input, $file_type)
	{
		$connect = $this->makeTheConnection();
		$design_class = ''; $type_du_fichier = '';
		$output_result = array(); $i =0; $out_result = "<div class='wordwrap'><br>";
		if($file_type == 'doc'){
			$ext = array("pdf", "docx", "xlsx", "ppt", "pptx", "txt", "", "", ""); $design_class = 'glyphicon glyphicon-book';
			$type_du_fichier = 'Fichier texte';}
		else if($file_type == 'img'){
			$ext = array("png", "jpeg", "tiff", "gif", "jpg", "bmp", "jfif", "svg", "bpg");$design_class = 'glyphicon glyphicon-picture';
			$type_du_fichier = 'Image';}
		else if($file_type == 'aud'){
			$ext = array("mp3", "wav", "wma", "aiff", "m3u", "webm", "3ga", "rec", "mp4a");
			$design_class = 'glyphicon glyphicon-volume-up';$type_du_fichier = 'Audio';}
		else if($file_type == 'soft'){
			$ext = array("exe", "apk", "prg", "msi", "paf", "osx", "run", "out", "app");$design_class = 'glyphicon glyphicon-floppy-save';
			$type_du_fichier = 'Logiciel ou fichier executable';}
		else if($file_type == 'vid'){
			$ext = array("mp4", "avi", "flv", "gif", "gifv", "wmv", "rmvb", "3gp", "mpeg");$design_class = 'glyphicon glyphicon-film';
			$type_du_fichier = 'Video';}
		
		$my_query = "SELECT DISTINCT * FROM dwd_all_file_info WHERE dwd_afi_file_type IN('"
		.$ext[0]."','".$ext[1]."','".$ext[2]."','".$ext[3]."','".$ext[4]."','"
		.$ext[5]."','".$ext[6]."','".$ext[7]."','".$ext[8]."') AND dwd_afi_file_keywords LIKE '%"
		.$this->test_input($user_input)."%'";
		$my_result = mysqli_query($connect, $my_query) or die(mysqli_error($connect));
		if(mysqli_num_rows($my_result) >0 ){
				while($result_line = mysqli_fetch_array($my_result)){
					$output [$i]= $result_line['dwd_afi_file_keywords'];
					$out_result .= "<p class='wordwrap'>".
					"<span class='".$design_class."' aria-hidden='true' style='font-size:1vw;color:#676565;'> </span><a href='".
					$file_type."/index.php?f=".urlencode($result_line['dwd_afi_id'])."' style='text-decoration:none; color:#676565;'><b>".
					$result_line['dwd_afi_file_name'].
									"</b><br>Type de fichier: ".$type_du_fichier ." ( Extension: ".$result_line['dwd_afi_file_type'].
									" )<br />Cles de recherche:".$result_line['dwd_afi_file_keywords']."</a><hr></p>";
					$i++;
				}
			
		}
		else
			$out_result = "";
		return $out_result;

	}
	/***************************************************************************
	/ Function: ouvre le dictionnaire et renvoie la definition du mot
	/ qu'elle prend en parametre.
	/***************************************************************************/
	public function define_the_key($key, $path)
	{
		$my_dico = $path."/dictionnaire_academie_francaise_5eme_edition.txt";
		$dico = fopen($my_dico,"r") or die("Unable to open the dictionnary for reading!");
		$dico_content = fread($dico,filesize($my_dico));
		fclose($dico);
		 $definition = ""; $str = "\n".mb_strtoupper($key).".";$str0 = "\n".mb_strtoupper($key).","; $str1 = mb_strtoupper($key);  $defs = array(); $next_line = "\n";
		if(preg_match("#".$str."#", $dico_content) || preg_match("#".$str0."#", $dico_content))
		//if(substr_count($dico_content, $str)>1)
		{
			//$tx = substr($dico_content, strpos($dico_content, $str), strlen($dico_content));
			if(preg_match("#".$str0."#", $dico_content)) $str = $str0; 
			$tx = strstr($dico_content, $str);
			$definition = substr($tx, 0, strpos($tx, "•"));
			$definition = str_replace($str, $str1.":", $definition);
			$definition = preg_replace("#s. f.#", "nom feminin.", $definition);
			$definition = preg_replace("#s. m.#", "nom masculin.", $definition);
			$definition = preg_replace("#s.m.#", "nom masculin.", $definition);
			//$definition = preg_replace("#v.#", "verbe.", $definition);
			$definition = preg_replace("#\r|\n#", " ", $definition);
			if(str_word_count($definition) > 70){
				$definition = substr($definition, 0, 180);
				$definition .= "...";
				return $definition;
				//$defs = explode("\n", $definition);
			}
			//if(isset($defs[0]))
				//return $defs[0];
			else
				return $definition; 
		}	
		
		
		else return $definition;
	}
	/***************************************************************************
	/ Function: supprime les mots qui existent plus de deux fois dans une chaine de characteres
	/ qu'elle prend en parametre.
	/***************************************************************************/
	public function rmv_existanc_more_than_twice($word, $str_to_check)
	{
			if(substr_count($str_to_check, $word)>1)
				$str_to_check = str_replace($word, "", $str_to_check);
			$str_to_check .= $word;
			return $str_to_check;
	}
	/***************************************************************************
	/ Function: renvoi le nom du document a partir de son id
	/ qu'elle prend en parametre.
	/***************************************************************************/
	public function get_file_name($file_id){
		$connect = $this->makeTheConnection();
		$my_query = "SELECT * FROM dwd_all_file_info WHERE dwd_afi_id =".$file_id;
		$my_result = mysqli_query($connect, $my_query) or die(mysqli_error($connect));;
		if(mysqli_num_rows($my_result) == 1 ){
			while($result_line = mysqli_fetch_array($my_result))
				return $result_line['dwd_afi_file_name'];
		}
		else return "";
	}
	/***************************************************************************
	/ Function: renvoi les cles de recherche d'un doc a partir de son id
	/ qu'elle prend en parametre.
	/***************************************************************************/
	public function get_file_keys($file_id){
		$connect = $this->makeTheConnection();
		$my_query = "SELECT * FROM dwd_all_file_info WHERE dwd_afi_id =".$file_id;
		$my_result = mysqli_query($connect, $my_query) or die(mysqli_error($connect));
		if(mysqli_num_rows($my_result) == 1 ){
			while($result_line = mysqli_fetch_array($my_result))
				return $result_line['dwd_afi_file_keywords'];
		}
		else return "";
	}
	/***************************************************************************
	/ Function: renvoi le nom de l'utilisateur.
	/***************************************************************************/
	public function get_doc_id($doc_name){
			$connect = $this->makeTheConnection();
			$my_query = "SELECT dwd_afi_id FROM dwd_all_file_info WHERE dwd_afi_file_name =".$doc_name;
			$my_result = mysqli_query($connect, $my_query) or die(mysqli_error($connect));
			if(mysqli_num_rows($my_result) >= 1 ){
				while($result_line = mysqli_fetch_array($my_result))
					return $result_line['dwd_afi_id'];
			}	
	}
	/***************************************************************************
	/ Function: renvoi le nom de l'utilisateur.
	/***************************************************************************/
	public function get_user_fname($user_id){
			$connect = $this->makeTheConnection();
			$my_query = "SELECT dwd_user_firstName FROM dwd_utilisateurs WHERE ID =".$user_id;
			$my_result = mysqli_query($connect, $my_query) or die(mysqli_error($connect));
			if(mysqli_num_rows($my_result) >= 1 ){
				while($result_line = mysqli_fetch_array($my_result))
					return $result_line['dwd_user_firstName'];
			}	
	}
	/***************************************************************************
	/ Function: genere les mots de passe pour utilisateurs demandant a s'inscrire.
	/***************************************************************************/
		public function get_passpord($length = 10, $add_dashes = false, $available_sets = 'luds')
	{
		$sets = array();
		if(strpos($available_sets, 'l') !== false)
			$sets[] = 'abcdefghjkmnpqrstuvwxyz';
		if(strpos($available_sets, 'u') !== false)
			$sets[] = 'ABCDEFGHJKMNPQRSTUVWXYZ';
		if(strpos($available_sets, 'd') !== false)
			$sets[] = '23456789';
		if(strpos($available_sets, 's') !== false)
			$sets[] = '!@#$%&*?';
		$all = '';
		$password = '';
		foreach($sets as $set)
		{
			$password .= $set[array_rand(str_split($set))];
			$all .= $set;
		}
		$all = str_split($all);
		for($i = 0; $i < $length - count($sets); $i++)
			$password .= $all[array_rand($all)];
		$password = str_shuffle($password);
		if(!$add_dashes)
			return $password;
		$dash_len = floor(sqrt($length));
		$dash_str = '';
		while(strlen($password) > $dash_len)
		{
			$dash_str .= substr($password, 0, $dash_len) . '-';
			$password = substr($password, $dash_len);
		}
		$dash_str .= $password;
		return $dash_str;
	}
	/******************************************************************************************************************
	/ Function: envoie le mot de passe a l'utililsateur par sms si la demande d'inscription a ete validee par l'admin.
	/******************************************************************************************************************/
	public function send_pass_to_user($carrier, $user_id)
	{
		$connect = $this->makeTheConnection(); $phone_number = "4704552811"; $pass = "kany_fils12316LCP";
		//$my_query = "SELECT dwd_user_phone_number and  FROM dwd_utilisateurs WHERE ID =".$user_id;
		//$my_result = mysqli_query($connect, $my_query) or die(mysqli_error($connect));
		//if(mysqli_num_rows($my_result) >= 1 ){
				//while($result_line = mysqli_fetch_array($my_result))
				//$phone_number = $result_line['dwd_user_phone_number'];
				//$pass = hash('sha512', $result_line['dwd_user_password']. $user_browser);
				$message = wordwrap("Bonjour ".$this->get_user_fname($user_id)."!<br>
				Votre mot de passe ".nom_du_site." est: ".$pass."
				Vous pouvez maintenant vous connecter en utilisant votre numero de telephone et mot de passe.
				Merci d'avoir choisi nos services!");
  				$to = $phone_number. '@' . $carrier;
  				$result = @mail( $to, '', $message );
				return true;
			//}
		//else
			//return false;	
		
	}

public function get_s_suggestions($key_to_search)
	{
		$connected = $this->makeTheConnection();
		$output = array(); $i =0; $out = "<div class='drop_down_text'>";  //$file_indexes = array(); 
		if(strlen($key_to_search) > 1)
			$my_query = "SELECT DISTINCT * FROM dwd_all_file_info WHERE dwd_afi_file_keywords LIKE '%".$this->test_input($key_to_search)."%'";
		else
			$my_query = "SELECT DISTINCT * FROM dwd_all_file_info WHERE dwd_afi_file_keywords LIKE '".$this->test_input($key_to_search)."%'";
		$my_result = mysqli_query($connected, $my_query)or die(mysqli_error($connected));
		if(mysqli_num_rows($my_result) >0 ){
				while($result_line = mysqli_fetch_array($my_result)){
					$output [$i]= $result_line['dwd_afi_file_name'];
					$i++;
				}
		}
		
		return $output;
		
	}
}
?>