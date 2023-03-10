<?php 

/**
  * Function to create custom url
  * uses site_url() function
  *
  * @param string $url any slug
  *
  * @return string site_url
  * 
  */
if (!function_exists('url')) {

	function url($url='')
	{
		return site_url($url);
	}

}

/**
  * Function to get url of assets folder
  *
  * @param string $url any slug 
  *
  * @return string url
  * 
  */
if (!function_exists('assets_url')) {

	function assets_url($url='')
	{
		return base_url('assets/'.$url);
	}

}

/**
  * Function to get url of upload folder
  *
  * @param string $url any slug 
  *
  * @return string url
  * 
  */
if (!function_exists('urlUpload')) {

	function urlUpload($url='', $time = false)
	{
		return base_url('uploads/'.$url).($time ? '?'.time() : '');
	}

}

/**
  * Function for user profile url
  *
  * @param string $id - user id of the user
  *
  * @return string profile url
  * 
  */
if (!function_exists('userProfile')) {

	function userProfile($id)
	{
		$CI =& get_instance();

		$url = urlUpload('users/'.$id.'.png?'.time());

		if($id!='default')
			$url = urlUpload('users/'.$id.'.'.$CI->users_model->getRowById($id, 'img_type').'?'.time());

		return $url;
	}

}




/**
  * Function to check and get 'post' request
  *
  * @param string $key - key to check in 'post' request
  *
  * @return string value - uses codeigniter Input library 
  * 
  */
if (!function_exists('post')) {

	function post($key)
	{
		$CI =& get_instance();
		return !empty($CI->input->post($key, true)) ? $CI->input->post($key, true) : false;
	}

}

/**
  * Function to check and get 'get' request
  *
  * @param string $key - key to check in 'get' request
  *
  * @return string value - uses codeigniter Input library 
  * 
  */
if (!function_exists('get')) {

	function get($key)
	{
		$CI =& get_instance();
		return !empty($CI->input->get($key, true)) ? $CI->input->get($key, true) : false;
	}


}

/**
  * Die/Stops the request if its not a 'post' requetst type
  *
  * @return boolean
  * 
  */
if (!function_exists('postAllowed')) {

	function postAllowed()
	{
		$CI =& get_instance();
		if(count($CI->input->post()) <= 0)
			die('Invalid Request');

		return true;

	}


}


/**
  * Function to dump the passed data
  * Die & Dumps the whole data passed
  *
  * uses - var_dump & die together
  *
  * @param all $key - All Accepted - string,int,boolean,etc
  *
  * @return boolean
  * 
  */
if (!function_exists('dd')) {

	function dd($key)
	{
		die(var_dump($key));
		return true;
	}


}


/**
  * Function to check if the user is loggedIn
  *
  * @return boolean
  * 
  */
if (!function_exists('is_logged')) {

	function is_logged()
	{
		$CI =& get_instance();

		$login_token_match = false;

		$isLogged = !empty($CI->session->userdata('login')) &&  !empty($CI->session->userdata('logged')) ? (object) $CI->session->userdata('logged') : false;
		$_token = $isLogged && !empty($CI->session->userdata('login_token')) ? $CI->session->userdata('login_token') : false;

		if(!$isLogged){
			$isLogged = get_cookie('login') && !empty(get_cookie('logged')) ? json_decode(get_cookie('logged')): false;
			$_token = $isLogged && !empty(get_cookie('login_token')) ? get_cookie('login_token') : false;
		}

		if($isLogged){
			$user = $CI->users_model->getById( $CI->db->escape((int) $isLogged->id) );
			// verify login_token
			$login_token_match = (sha1($user->id.$user->password.$isLogged->time) == $_token);
		}

		return $isLogged && $login_token_match;
	}


}


/**
  * Function that returns the data of loggedIn user
  *
  * @param string $key Any key/Column name that exists in users table
  *
  * @return boolean
  * 
  */
if (!function_exists('logged')) {

	function logged($key = false)
	{
		$CI =& get_instance();

		if(!is_logged())
			return false;

		$logged = !empty($CI->session->userdata('login')) ? $CI->users_model->getById($CI->session->userdata('logged')['id']) : false;

		if(!$logged){
			$logged = $CI->users_model->getById( json_decode(get_cookie('logged'))->id );
		}

		return (!$key)?$logged:$logged->{$key};

	}


}

/**
  * Returns Path of view
  *
  * @param string $path - path/file info
  *
  * @return boolean
  * 
  */
if (!function_exists('viewPath')) {

	function viewPath($path)
	{
		return VIEWPATH.'/'.$path.'.php';
	}


}

/**
  * Returns Path of view
  *
  * @param string $date any format
  *
  * @return string date format Y-m-d that most mysql db supports
  * 
  */
if (!function_exists('DateFomatDb')) {

	function DateFomatDb($date)
	{
		return date( 'Y-m-d', strtotime($date));
	}


}

/**
  * Currency formating
  *
  * @param int/float/string $amount
  *
  * @return string $amount formated amount with currency symbol
  * 
  */
if (!function_exists('currency')) {

	function currency($amount)
	{
		return '$ '. $amount;
	}


}

/**
  * Find & returns the vlaue if exists in db
  *
  * @param string $key key which is used to check in db - Refrence: settings table - key column
  *
  * @return string/boolean $value if exists value else false
  * 
  */
if (!function_exists('setting')) {

	function setting($key = '')
	{
		$CI =& get_instance();
		return !empty($value = $CI->settings_model->getValueByKey($key)) ? $value : false;
	}


}


/**
  * Generates teh html for breadcrumb - Supports AdminLte
  *
  * @param array $args Array of values
  * 
  */
if (!function_exists('breadcrumb')) {

	function breadcrumb($args = '')
	{
		$html = '<ol class="breadcrumb">';
		$i = 0;
		foreach ($args as $key => $value) {
			if(count($args) < $i)
				$html .= '<li><a href="'.url($key).'">'.$value.'</a></li>';
			else
				$html .= '<li class="active">'.$value.'</li>';
			$i++;
		}
		    
		    
		$html .= '</ol>';
		echo $html;
	}


}


/**
  * Finds and return the ipaddres of client user
  *
  * @param array $ipaddress IpAddress
  * 
  */
if (!function_exists('ip_address')) {

	function ip_address() {
	    $ipaddress = '';
	    if (isset($_SERVER['HTTP_CLIENT_IP']))
	        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
	    else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
	        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
	    else if(isset($_SERVER['HTTP_X_FORWARDED']))
	        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
	    else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
	        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
	    else if(isset($_SERVER['HTTP_FORWARDED']))
	        $ipaddress = $_SERVER['HTTP_FORWARDED'];
	    else if(isset($_SERVER['REMOTE_ADDR']))
	        $ipaddress = $_SERVER['REMOTE_ADDR'];
	    else
	        $ipaddress = 'UNKNOWN';
	    return $ipaddress;
	}

}

/**
  * Provides the shortcodes which are available in any email template
  *
  * @return array $data Array of shortcodes
  * 
  */
if (!function_exists('getEmailShortCodes')) {

	function getEmailShortCodes() {

		$data = [
			'site_url' => site_url(),
			'company_name' => setting('company_name'),
		];

		return $data;
	}

}




/**
  * Redirects with error if user doesnt have the permission to passed key/module
  *
  * @param string $code Code permissions
  * 
  * @return boolean true/false
  * 
  */
if (!function_exists('ifPermissions')) {

	function ifPermissions($code = '') {

		$CI =& get_instance();

		if ( hasPermissions($code) ) {
			return true;
		}

		;

		redirect('errors/permission_denied');
		die;

		return false;
	}

}

/**
  * Check and return boolean if user have the permission to passed key or not
  *
  * @param string $code Code permissions
  * 
  * @return boolean true/false
  * 
  */
if (!function_exists('hasPermissions')) {

	function hasPermissions($code = '') {

		$CI =& get_instance();

		// if ( !empty( $CI->role_permissions_model->getByWhere([ 'role' => logged('role'), 'permission' => $code ]) ) ) {

		// 	return true;
			
		// }

		return true;
		// $CI =& get_instance();

		// if ( !empty( $CI->role_permissions_model->getByWhere([ 'role' => logged('role'), 'permission' => $code ]) ) ) {

		// 	return true;
			
		// }

		// return false;

	}

}

/**
  * Redirects with error if user doesnt have the permission to passed key/module
  *
  * @param string $code Code permissions
  * 
  * @return boolean true/false
  * 
  */
if (!function_exists('notAllowedDemo')) {

	function notAllowedDemo($url = '') {

		$CI =& get_instance();

		$CI->session->set_flashdata('alert-type', 'danger');
		$CI->session->set_flashdata('alert', 'This action is disabled in <strong>Demo</strong> !');

		redirect($url);

		return false;
	}

}

/**
  * Hides Some Characters in Email. Basically Used in Forget Password System
  *
  * @param string $email Email 
  * 
  * @return string
  * 
  */
if (!function_exists('obfuscate_email')) {

	function obfuscate_email($email) {

		$em   = explode("@",$email);
	    $name = implode(array_slice($em, 0, count($em)-1), '@');
	    $len  = floor(strlen($name)/2);

	    return substr($name,0, $len) . str_repeat('*', $len) . "@" . end($em);  
	
	}

}


/**
  * return language code
  *
  * @return string
  * 
  */
  if (!function_exists('getUserlang')) {

	function getUserlang() {

	    return !empty( get_cookie('current_lang', true) ) ? get_cookie('current_lang', true) : setting('default_lang');
	
	}

}


/**
  * return language code
  *
  * @return string
  * 
  */
  if (!function_exists('setUserlang')) {

	function setUserlang($code) {

	    return set_cookie('current_lang', $code, 86400*30);
		// set_cookie())
	
	}

}


function supported_languages()
{

	$supported_languages = json_decode('{
		"en":{
			"name":"English",
			"nativeName":"english"
		},
		"es":{
			"name":"Spanish",
			"nativeName":"espa??ol"
		},
		"hi":{
			"name":"Hindi",
			"nativeName":"??????????????????"
		}
	}');
	

	$all_languages = json_decode('{
		"ab":{
			"name":"Abkhaz",
			"nativeName":"??????????"
		},
		"aa":{
			"name":"Afar",
			"nativeName":"Afaraf"
		},
		"af":{
			"name":"Afrikaans",
			"nativeName":"Afrikaans"
		},
		"ak":{
			"name":"Akan",
			"nativeName":"Akan"
		},
		"sq":{
			"name":"Albanian",
			"nativeName":"Shqip"
		},
		"am":{
			"name":"Amharic",
			"nativeName":"????????????"
		},
		"ar":{
			"name":"Arabic",
			"nativeName":"??????????????"
		},
		"an":{
			"name":"Aragonese",
			"nativeName":"Aragon??s"
		},
		"hy":{
			"name":"Armenian",
			"nativeName":"??????????????"
		},
		"as":{
			"name":"Assamese",
			"nativeName":"?????????????????????"
		},
		"av":{
			"name":"Avaric",
			"nativeName":"???????? ????????, ???????????????? ????????"
		},
		"ae":{
			"name":"Avestan",
			"nativeName":"avesta"
		},
		"ay":{
			"name":"Aymara",
			"nativeName":"aymar aru"
		},
		"az":{
			"name":"Azerbaijani",
			"nativeName":"az??rbaycan dili"
		},
		"bm":{
			"name":"Bambara",
			"nativeName":"bamanankan"
		},
		"ba":{
			"name":"Bashkir",
			"nativeName":"?????????????? ????????"
		},
		"eu":{
			"name":"Basque",
			"nativeName":"euskara, euskera"
		},
		"be":{
			"name":"Belarusian",
			"nativeName":"????????????????????"
		},
		"bn":{
			"name":"Bengali",
			"nativeName":"???????????????"
		},
		"bh":{
			"name":"Bihari",
			"nativeName":"?????????????????????"
		},
		"bi":{
			"name":"Bislama",
			"nativeName":"Bislama"
		},
		"bs":{
			"name":"Bosnian",
			"nativeName":"bosanski jezik"
		},
		"br":{
			"name":"Breton",
			"nativeName":"brezhoneg"
		},
		"bg":{
			"name":"Bulgarian",
			"nativeName":"?????????????????? ????????"
		},
		"my":{
			"name":"Burmese",
			"nativeName":"???????????????"
		},
		"ca":{
			"name":"Catalan; Valencian",
			"nativeName":"Catal??"
		},
		"ch":{
			"name":"Chamorro",
			"nativeName":"Chamoru"
		},
		"ce":{
			"name":"Chechen",
			"nativeName":"?????????????? ????????"
		},
		"ny":{
			"name":"Chichewa; Chewa; Nyanja",
			"nativeName":"chiChe??a, chinyanja"
		},
		"zh":{
			"name":"Chinese",
			"nativeName":"?????? (Zh??ngw??n), ??????, ??????"
		},
		"cv":{
			"name":"Chuvash",
			"nativeName":"?????????? ??????????"
		},
		"kw":{
			"name":"Cornish",
			"nativeName":"Kernewek"
		},
		"co":{
			"name":"Corsican",
			"nativeName":"corsu, lingua corsa"
		},
		"cr":{
			"name":"Cree",
			"nativeName":"?????????????????????"
		},
		"hr":{
			"name":"Croatian",
			"nativeName":"hrvatski"
		},
		"cs":{
			"name":"Czech",
			"nativeName":"??esky, ??e??tina"
		},
		"da":{
			"name":"Danish",
			"nativeName":"dansk"
		},
		"dv":{
			"name":"Divehi; Dhivehi; Maldivian;",
			"nativeName":"????????????"
		},
		"nl":{
			"name":"Dutch",
			"nativeName":"Nederlands, Vlaams"
		},
		"en":{
			"name":"English",
			"nativeName":"English"
		},
		"eo":{
			"name":"Esperanto",
			"nativeName":"Esperanto"
		},
		"et":{
			"name":"Estonian",
			"nativeName":"eesti, eesti keel"
		},
		"ee":{
			"name":"Ewe",
			"nativeName":"E??egbe"
		},
		"fo":{
			"name":"Faroese",
			"nativeName":"f??royskt"
		},
		"fj":{
			"name":"Fijian",
			"nativeName":"vosa Vakaviti"
		},
		"fi":{
			"name":"Finnish",
			"nativeName":"suomi, suomen kieli"
		},
		"fr":{
			"name":"French",
			"nativeName":"fran??ais, langue fran??aise"
		},
		"ff":{
			"name":"Fula; Fulah; Pulaar; Pular",
			"nativeName":"Fulfulde, Pulaar, Pular"
		},
		"gl":{
			"name":"Galician",
			"nativeName":"Galego"
		},
		"ka":{
			"name":"Georgian",
			"nativeName":"?????????????????????"
		},
		"de":{
			"name":"German",
			"nativeName":"Deutsch"
		},
		"el":{
			"name":"Greek, Modern",
			"nativeName":"????????????????"
		},
		"gn":{
			"name":"Guaran??",
			"nativeName":"Ava??e???"
		},
		"gu":{
			"name":"Gujarati",
			"nativeName":"?????????????????????"
		},
		"ht":{
			"name":"Haitian; Haitian Creole",
			"nativeName":"Krey??l ayisyen"
		},
		"ha":{
			"name":"Hausa",
			"nativeName":"Hausa, ????????????"
		},
		"he":{
			"name":"Hebrew (modern)",
			"nativeName":"??????????"
		},
		"hz":{
			"name":"Herero",
			"nativeName":"Otjiherero"
		},
		"hi":{
			"name":"Hindi",
			"nativeName":"??????????????????, ???????????????"
		},
		"ho":{
			"name":"Hiri Motu",
			"nativeName":"Hiri Motu"
		},
		"hu":{
			"name":"Hungarian",
			"nativeName":"Magyar"
		},
		"ia":{
			"name":"Interlingua",
			"nativeName":"Interlingua"
		},
		"id":{
			"name":"Indonesian",
			"nativeName":"Bahasa Indonesia"
		},
		"ie":{
			"name":"Interlingue",
			"nativeName":"Originally called Occidental; then Interlingue after WWII"
		},
		"ga":{
			"name":"Irish",
			"nativeName":"Gaeilge"
		},
		"ig":{
			"name":"Igbo",
			"nativeName":"As???s??? Igbo"
		},
		"ik":{
			"name":"Inupiaq",
			"nativeName":"I??upiaq, I??upiatun"
		},
		"io":{
			"name":"Ido",
			"nativeName":"Ido"
		},
		"is":{
			"name":"Icelandic",
			"nativeName":"??slenska"
		},
		"it":{
			"name":"Italian",
			"nativeName":"Italiano"
		},
		"iu":{
			"name":"Inuktitut",
			"nativeName":"??????????????????"
		},
		"ja":{
			"name":"Japanese",
			"nativeName":"????????? (??????????????????????????????)"
		},
		"jv":{
			"name":"Javanese",
			"nativeName":"basa Jawa"
		},
		"kl":{
			"name":"Kalaallisut, Greenlandic",
			"nativeName":"kalaallisut, kalaallit oqaasii"
		},
		"kn":{
			"name":"Kannada",
			"nativeName":"???????????????"
		},
		"kr":{
			"name":"Kanuri",
			"nativeName":"Kanuri"
		},
		"ks":{
			"name":"Kashmiri",
			"nativeName":"?????????????????????, ???????????????"
		},
		"kk":{
			"name":"Kazakh",
			"nativeName":"?????????? ????????"
		},
		"km":{
			"name":"Khmer",
			"nativeName":"???????????????????????????"
		},
		"ki":{
			"name":"Kikuyu, Gikuyu",
			"nativeName":"G??k??y??"
		},
		"rw":{
			"name":"Kinyarwanda",
			"nativeName":"Ikinyarwanda"
		},
		"ky":{
			"name":"Kirghiz, Kyrgyz",
			"nativeName":"???????????? ????????"
		},
		"kv":{
			"name":"Komi",
			"nativeName":"???????? ??????"
		},
		"kg":{
			"name":"Kongo",
			"nativeName":"KiKongo"
		},
		"ko":{
			"name":"Korean",
			"nativeName":"????????? (?????????), ????????? (?????????)"
		},
		"ku":{
			"name":"Kurdish",
			"nativeName":"Kurd??, ?????????????"
		},
		"kj":{
			"name":"Kwanyama, Kuanyama",
			"nativeName":"Kuanyama"
		},
		"la":{
			"name":"Latin",
			"nativeName":"latine, lingua latina"
		},
		"lb":{
			"name":"Luxembourgish, Letzeburgesch",
			"nativeName":"L??tzebuergesch"
		},
		"lg":{
			"name":"Luganda",
			"nativeName":"Luganda"
		},
		"li":{
			"name":"Limburgish, Limburgan, Limburger",
			"nativeName":"Limburgs"
		},
		"ln":{
			"name":"Lingala",
			"nativeName":"Ling??la"
		},
		"lo":{
			"name":"Lao",
			"nativeName":"?????????????????????"
		},
		"lt":{
			"name":"Lithuanian",
			"nativeName":"lietuvi?? kalba"
		},
		"lu":{
			"name":"Luba-Katanga",
			"nativeName":""
		},
		"lv":{
			"name":"Latvian",
			"nativeName":"latvie??u valoda"
		},
		"gv":{
			"name":"Manx",
			"nativeName":"Gaelg, Gailck"
		},
		"mk":{
			"name":"Macedonian",
			"nativeName":"???????????????????? ??????????"
		},
		"mg":{
			"name":"Malagasy",
			"nativeName":"Malagasy fiteny"
		},
		"ms":{
			"name":"Malay",
			"nativeName":"bahasa Melayu, ???????? ?????????????"
		},
		"ml":{
			"name":"Malayalam",
			"nativeName":"??????????????????"
		},
		"mt":{
			"name":"Maltese",
			"nativeName":"Malti"
		},
		"mi":{
			"name":"M??ori",
			"nativeName":"te reo M??ori"
		},
		"mr":{
			"name":"Marathi (Mar?????h??)",
			"nativeName":"???????????????"
		},
		"mh":{
			"name":"Marshallese",
			"nativeName":"Kajin M??aje??"
		},
		"mn":{
			"name":"Mongolian",
			"nativeName":"????????????"
		},
		"na":{
			"name":"Nauru",
			"nativeName":"Ekakair?? Naoero"
		},
		"nv":{
			"name":"Navajo, Navaho",
			"nativeName":"Din?? bizaad, Din??k??eh????"
		},
		"nb":{
			"name":"Norwegian Bokm??l",
			"nativeName":"Norsk bokm??l"
		},
		"nd":{
			"name":"North Ndebele",
			"nativeName":"isiNdebele"
		},
		"ne":{
			"name":"Nepali",
			"nativeName":"??????????????????"
		},
		"ng":{
			"name":"Ndonga",
			"nativeName":"Owambo"
		},
		"nn":{
			"name":"Norwegian Nynorsk",
			"nativeName":"Norsk nynorsk"
		},
		"no":{
			"name":"Norwegian",
			"nativeName":"Norsk"
		},
		"ii":{
			"name":"Nuosu",
			"nativeName":"????????? Nuosuhxop"
		},
		"nr":{
			"name":"South Ndebele",
			"nativeName":"isiNdebele"
		},
		"oc":{
			"name":"Occitan",
			"nativeName":"Occitan"
		},
		"oj":{
			"name":"Ojibwe, Ojibwa",
			"nativeName":"????????????????????????"
		},
		"cu":{
			"name":"Old Church Slavonic, Church Slavic, Church Slavonic, Old Bulgarian, Old Slavonic",
			"nativeName":"?????????? ????????????????????"
		},
		"om":{
			"name":"Oromo",
			"nativeName":"Afaan Oromoo"
		},
		"or":{
			"name":"Oriya",
			"nativeName":"???????????????"
		},
		"os":{
			"name":"Ossetian, Ossetic",
			"nativeName":"???????? ??????????"
		},
		"pa":{
			"name":"Panjabi, Punjabi",
			"nativeName":"??????????????????, ???????????????"
		},
		"pi":{
			"name":"P??li",
			"nativeName":"????????????"
		},
		"fa":{
			"name":"Persian",
			"nativeName":"??????????"
		},
		"pl":{
			"name":"Polish",
			"nativeName":"polski"
		},
		"ps":{
			"name":"Pashto, Pushto",
			"nativeName":"????????"
		},
		"pt":{
			"name":"Portuguese",
			"nativeName":"Portugu??s"
		},
		"qu":{
			"name":"Quechua",
			"nativeName":"Runa Simi, Kichwa"
		},
		"rm":{
			"name":"Romansh",
			"nativeName":"rumantsch grischun"
		},
		"rn":{
			"name":"Kirundi",
			"nativeName":"kiRundi"
		},
		"ro":{
			"name":"Romanian, Moldavian, Moldovan",
			"nativeName":"rom??n??"
		},
		"ru":{
			"name":"Russian",
			"nativeName":"?????????????? ????????"
		},
		"sa":{
			"name":"Sanskrit (Sa???sk???ta)",
			"nativeName":"???????????????????????????"
		},
		"sc":{
			"name":"Sardinian",
			"nativeName":"sardu"
		},
		"sd":{
			"name":"Sindhi",
			"nativeName":"??????????????????, ?????????? ?????????????"
		},
		"se":{
			"name":"Northern Sami",
			"nativeName":"Davvis??megiella"
		},
		"sm":{
			"name":"Samoan",
			"nativeName":"gagana faa Samoa"
		},
		"sg":{
			"name":"Sango",
			"nativeName":"y??ng?? t?? s??ng??"
		},
		"sr":{
			"name":"Serbian",
			"nativeName":"???????????? ??????????"
		},
		"gd":{
			"name":"Scottish Gaelic; Gaelic",
			"nativeName":"G??idhlig"
		},
		"sn":{
			"name":"Shona",
			"nativeName":"chiShona"
		},
		"si":{
			"name":"Sinhala, Sinhalese",
			"nativeName":"???????????????"
		},
		"sk":{
			"name":"Slovak",
			"nativeName":"sloven??ina"
		},
		"sl":{
			"name":"Slovene",
			"nativeName":"sloven????ina"
		},
		"so":{
			"name":"Somali",
			"nativeName":"Soomaaliga, af Soomaali"
		},
		"st":{
			"name":"Southern Sotho",
			"nativeName":"Sesotho"
		},
		"es":{
			"name":"Spanish; Castilian",
			"nativeName":"espa??ol, castellano"
		},
		"su":{
			"name":"Sundanese",
			"nativeName":"Basa Sunda"
		},
		"sw":{
			"name":"Swahili",
			"nativeName":"Kiswahili"
		},
		"ss":{
			"name":"Swati",
			"nativeName":"SiSwati"
		},
		"sv":{
			"name":"Swedish",
			"nativeName":"svenska"
		},
		"ta":{
			"name":"Tamil",
			"nativeName":"???????????????"
		},
		"te":{
			"name":"Telugu",
			"nativeName":"??????????????????"
		},
		"tg":{
			"name":"Tajik",
			"nativeName":"????????????, to??ik??, ???????????????"
		},
		"th":{
			"name":"Thai",
			"nativeName":"?????????"
		},
		"ti":{
			"name":"Tigrinya",
			"nativeName":"????????????"
		},
		"bo":{
			"name":"Tibetan Standard, Tibetan, Central",
			"nativeName":"?????????????????????"
		},
		"tk":{
			"name":"Turkmen",
			"nativeName":"T??rkmen, ??????????????"
		},
		"tl":{
			"name":"Tagalog",
			"nativeName":"Wikang Tagalog, ??????????????? ??????????????????"
		},
		"tn":{
			"name":"Tswana",
			"nativeName":"Setswana"
		},
		"to":{
			"name":"Tonga (Tonga Islands)",
			"nativeName":"faka Tonga"
		},
		"tr":{
			"name":"Turkish",
			"nativeName":"T??rk??e"
		},
		"ts":{
			"name":"Tsonga",
			"nativeName":"Xitsonga"
		},
		"tt":{
			"name":"Tatar",
			"nativeName":"??????????????, tatar??a, ?????????????????"
		},
		"tw":{
			"name":"Twi",
			"nativeName":"Twi"
		},
		"ty":{
			"name":"Tahitian",
			"nativeName":"Reo Tahiti"
		},
		"ug":{
			"name":"Uighur, Uyghur",
			"nativeName":"Uy??urq??, ???????????????????"
		},
		"uk":{
			"name":"Ukrainian",
			"nativeName":"????????????????????"
		},
		"ur":{
			"name":"Urdu",
			"nativeName":"????????"
		},
		"uz":{
			"name":"Uzbek",
			"nativeName":"zbek, ??????????, ???????????????"
		},
		"ve":{
			"name":"Venda",
			"nativeName":"Tshiven???a"
		},
		"vi":{
			"name":"Vietnamese",
			"nativeName":"Ti???ng Vi???t"
		},
		"vo":{
			"name":"Volap??k",
			"nativeName":"Volap??k"
		},
		"wa":{
			"name":"Walloon",
			"nativeName":"Walon"
		},
		"cy":{
			"name":"Welsh",
			"nativeName":"Cymraeg"
		},
		"wo":{
			"name":"Wolof",
			"nativeName":"Wollof"
		},
		"fy":{
			"name":"Western Frisian",
			"nativeName":"Frysk"
		},
		"xh":{
			"name":"Xhosa",
			"nativeName":"isiXhosa"
		},
		"yi":{
			"name":"Yiddish",
			"nativeName":"????????????"
		},
		"yo":{
			"name":"Yoruba",
			"nativeName":"Yor??b??"
		},
		"za":{
			"name":"Zhuang, Chuang",
			"nativeName":"Sa?? cue????, Saw cuengh"
		}
	}');

	return $supported_languages;

	//    die(var_dump($list));
}


// lang_codes();