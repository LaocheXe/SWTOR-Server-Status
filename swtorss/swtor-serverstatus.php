<?php

require_once('../../class2.php');
require_once(HEADERF);


$tp = e107::getParser();
$pref_server = e107::pref('swtorss', 'server');
$pref_url = e107::pref('swtorss', 'url');
$pref_cfn = e107::pref('swtorss', 'cache_file_name');
$pref_ctl = e107::pref('swtorss', 'cache_time_life');

/*		
$serverName = $pref_server;
$url = $pref_url;
$cache_file_name = $pref_cfn;
$cache_time_life = $pref_ctl;
*/

//SERVER-SET-UP-CONFIG
$serverName = "prophecy of the five"; //server name in lower case (spaces are ok)
$url = "http://www.swtor.com/server-status"; //we hit the server status page located here to get our server info
$cache_file_name = "server-status-cache.html"; //cache the server status page to this file name. It is saved in the same folder as this file
$cache_time_life = '300';//seconds to cache file

include_once('cache/simple_html_dom.php');

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
		//return $text;
		
e107::getRender()->tablerender("Test Page", $text);
require_once(FOOTERF);
exit;

?>