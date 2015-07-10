<?php

class swtorss_shortcodes extends e_shortcode
{
	public function __construct()
	{
		// Nothing Here
	}	
	function sc_swtorss_code_exe()
	{
		//$pref = e107::getConfig();
		//$tp = e107::getParser();
		//$pref = e107::pref('theme', 'branding', 'sitename');
		$pref_server = e107::pref('swtorss', 'server');
		$pref_url = e107::pref('swtorss', 'url');
		$pref_cfn = e107::pref('swtorss', 'cache_file_name');
		$pref_ctl = e107::pref('swtorss', 'cache_time_life');
		
		$serverName = $pref_server;
		$url = $pref_url;
		$cache_file_name = $pref_cfn;
		$cache_time_life = $pref_ctl;
		
		//$cache_file_path = "cache";
		//$cache_file = ''.$cache_file_path.'/'.$cache_file_name.'';
		
		include_once('simple_html_dom.php');
		
		$data = new simple_html_dom();
		
		if(!(file_exists($cache_file)) || time() - filemtime($cache_file) >= $cache_time_life )
		{
			$data->load_file($url);
			$data->save($cache_file_name);
		}
		else
		{
			$data->load_file($cache_file_name);
		}
		
		$serverElm = $data->find("div[data-name=$serverName]", 0);
		
		$server["name"] = $serverElm->find("div.name",0)->innertext;
		$server["status"] = $serverElm->getAttribute('data-status');
		$server["type"] = $serverElm->getAttribute('data-type');
		$server["timezone"] = $serverElm->getAttribute('data-timezone');
		
		switch($serverElm->getAttribute('data-population'))
		{
    		case '1':
        		$server["population"] = 'Light';
        		break;
    		case '2':
        		$server["population"] = 'Standard';
        		break;
    		case '3':
        		$server["population"] = 'Heavy';
        		break;
    		case '4':
        		$server["population"] = 'Very Heavy';
        		break;
    		case '5':
        		$server["population"] = 'Full';
        		break;
		}
		
		$text .= '
		<div id="swtor-serverStatus-widget">
    		<div class="container">
        		<div class="name">'.$server["name"].' '.$server["type"].', '.$server["timezone"].'</div>
        		<div class="status '.$server["status"].'"><strong>Status:</strong> '.$server["status"].'</div>
				<div class="population"><strong>Population:</strong> '.$server["population"].'</div>
    		</div>
		</div>
		TESTING
		'.$serverName.', '.$url.', '.$cache_file_name.', '.$cache_time_life.'
		';	
		return $text;
	}
}
?>