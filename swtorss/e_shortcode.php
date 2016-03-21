<?php

class swtorss_shortcodes extends e_shortcode
{	
	public function __construct()
	{
		// Nothing Here
	}

	function sc_swtorss_exe()
	{
		$pref_server = e107::pref('swtorss', 'server');
		$pref_url = e107::pref('swtorss', 'url');
		$pref_cfn = e107::pref('swtorss', 'cache_file_name');
		$pref_ctl = e107::pref('swtorss', 'cache_time_life');
		
		$serverName = $pref_server;
		$url = $pref_url;
		$cache_file_name = $pref_cfn;
		$cache_time_life = $pref_ctl;
		
		include_once('simple_html_dom.php');
		
		$fullpathlocalfile = e_PLUGIN."swtorss/cache/".$cache_file_name;
		
		if (file_exists($fullpathlocalfile))
		{
  			$data = file_get_html($fullpathlocalfile);
  			if(!$data)
			{  	     //todo insert e107 error handling
    			print_a(LAN_SWTOR_SS_READERROR.$fullpathlocalfile); 
    			die;
   			}
		}
		{
 		$data = file_get_html($pref_url);
  		if(!$data)
		{  	     //todo insert e107 error handling
    		print_a(LAN_SWTOR_SS_READERROR. $pref_url); 
    		die;
  		}  
		}
		
		$serverElm = $data->find("div[data-name=$serverName]", 0);
		
		$server["name"] = $serverElm->find("div.name",0)->innertext;
		$server["status"] = $serverElm->getAttribute('data-status');
		$server["type"] = $serverElm->getAttribute('data-type');
		$server["timezone"] = $serverElm->getAttribute('data-timezone');
		
		switch($serverElm->getAttribute('data-population'))
		{
    		case '1':
				$server["population"] = LAN_SWTOR_SS_PLIGHT;
        		break;
    		case '2':
				$server["population"] = LAN_SWTOR_SS_PSTANDARD;
       		    break;
    		case '3':
				$server["population"] = LAN_SWTOR_SS_PHEAVY;
        		break;
    		case '4':
				$server["population"] = LAN_SWTOR_SS_PVHEAVY;
        		break;
    		case '5':
				$server["population"] = LAN_SWTOR_SS_PFULL;
        		break;
		}
		
		$text .= '<div id="swtor-serverStatus-widget">
    		<div class="container-swtorss">
        		<div class="name-swtorss">'.$server["name"].' '.$server["type"].', '.$server["timezone"].'</div>
        		<div class="status-swtorss '.$server["status"].'"><strong>Status:</strong> '.$server["status"].'</div>
				<div class="population-swtorss"><strong>Population:</strong> '.$server["population"].'</div>
    		</div>
		</div>';	
		return $text;
	}
	
	function sc_swtorss_center_exe()
	{
		$pref_server = e107::pref('swtorss', 'server');
		$pref_url = e107::pref('swtorss', 'url');
		$pref_cfn = e107::pref('swtorss', 'cache_file_name');
		$pref_ctl = e107::pref('swtorss', 'cache_time_life');
		
		$serverName = $pref_server;
		$url = $pref_url;
		$cache_file_name = $pref_cfn;
		$cache_time_life = $pref_ctl;
		
		include_once('simple_html_dom.php');
		
		$fullpathlocalfile = e_PLUGIN."swtorss/cache/".$cache_file_name;
		
		if (file_exists($fullpathlocalfile))
		{
  			$data = file_get_html($fullpathlocalfile);
  			if(!$data)
			{  	     //todo insert e107 error handling
    			print_a(LAN_SWTOR_SS_READERROR.$fullpathlocalfile); 
    			die;
   			}
		}
		{
 		$data = file_get_html($pref_url);
  		if(!$data)
		{  	     //todo insert e107 error handling
    		print_a(LAN_SWTOR_SS_READERROR. $pref_url); 
    		die;
  		}  
		}

		$serverElm = $data->find("div[data-name=$serverName]", 0);
		
		$server["name"] = $serverElm->find("div.name",0)->innertext;
		$server["status"] = $serverElm->getAttribute('data-status');
		$server["type"] = $serverElm->getAttribute('data-type');
		$server["timezone"] = $serverElm->getAttribute('data-timezone');
		
		switch($serverElm->getAttribute('data-population'))
		{
    		case '1':
				$server["population"] = LAN_SWTOR_SS_PLIGHT;
        		break;
    		case '2':
				$server["population"] = LAN_SWTOR_SS_PSTANDARD;
       		    break;
    		case '3':
				$server["population"] = LAN_SWTOR_SS_PHEAVY;
        		break;
    		case '4':
				$server["population"] = LAN_SWTOR_SS_PVHEAVY;
        		break;
    		case '5':
				$server["population"] = LAN_SWTOR_SS_PFULL;
        		break;
		}
		
		$text .= '<center>
		<div id="swtor-serverStatus-widget">
    		<div class="container-swtorss">
        		<div class="name-swtorss">'.$server["name"].' '.$server["type"].', '.$server["timezone"].'</div>
        		<div class="status-swtorss '.$server["status"].'"><strong>Status:</strong> '.$server["status"].'</div>
				<div class="population-swtorss"><strong>Population:</strong> '.$server["population"].'</div>
    		</div>
		</div>
		</center>';	
		return $text;
	}
	
	function sc_swtorss_arrow_exe()
	{
		$pref_server = e107::pref('swtorss', 'server');
		$pref_url = e107::pref('swtorss', 'url');
		$pref_cfn = e107::pref('swtorss', 'cache_file_name');
		$pref_ctl = e107::pref('swtorss', 'cache_time_life');
		
		$serverName = $pref_server;
		$url = $pref_url;
		$cache_file_name = $pref_cfn;
		$cache_time_life = $pref_ctl;
		
		include_once('simple_html_dom.php');
		
		$fullpathlocalfile = e_PLUGIN."swtorss/cache/".$cache_file_name;
		
		if (file_exists($fullpathlocalfile))
		{
  			$data = file_get_html($fullpathlocalfile);
  			if(!$data)
			{  	     //todo insert e107 error handling
    			print_a(LAN_SWTOR_SS_READERROR.$fullpathlocalfile); 
    			die;
   			}
		}
		{
 		$data = file_get_html($pref_url);
  		if(!$data)
		{  	     //todo insert e107 error handling
    		print_a(LAN_SWTOR_SS_READERROR. $pref_url); 
    		die;
  		}  
		}

		$serverElm = $data->find("div[data-name=$serverName]", 0);
		
		$server["name"] = $serverElm->find("div.name",0)->innertext;
		$server["status"] = $serverElm->getAttribute('data-status');
		$server["type"] = $serverElm->getAttribute('data-type');
		$server["timezone"] = $serverElm->getAttribute('data-timezone');
		
		switch($serverElm->getAttribute('data-population'))
		{
    		case '1':
				$server["population"] = LAN_SWTOR_SS_PLIGHT;
        		break;
    		case '2':
				$server["population"] = LAN_SWTOR_SS_PSTANDARD;
       		    break;
    		case '3':
				$server["population"] = LAN_SWTOR_SS_PHEAVY;
        		break;
    		case '4':
				$server["population"] = LAN_SWTOR_SS_PVHEAVY;
        		break;
    		case '5':
				$server["population"] = LAN_SWTOR_SS_PFULL;
        		break;
		}
		
		$text .= '
		<div id="swtor-ss-w-arw">
        		<div class="astatus '.$server["status"].'"><strong>Status:</strong> '.$server["status"].'</div>
		</div>';	
		return $text;
	}	
}
?>