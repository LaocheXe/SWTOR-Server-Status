<?php


if (defined('e107_INIT')) { exit; }
require_once('../../class2.php');

//require_once('../../e107_config.php');

//$conn = mysql_connect($mySQLserver, $mySQLuser, $mySQLpassword, $mySQLdefaultdb);
//if($conn->connect_error)
//{
//	die('Connection Failed: ' . $conn->connect_error);
//}

/**
 * @author Dan Kraus
 * @link http://github.com/dankraus/Star-Wars-The-Old-Republic-Server-Status-Widget
   @email dskraus@gmail.com
 * @copyright Creative Common Attribution-NonCommercial 3.0: http://creativecommons.org/licenses/by-nc/3.0/
   Use as you wish non-commercially, but link back to the github repo please at: http://github.com/dankraus/Star-Wars-The-Old-Republic-Server-Status-Widget for credit.
   If you are interested in using it commercially, contact me
 */
 
$tp = e107::getParser();
$pref_server = e107::pref('swtorss', 'server');
$pref_url = e107::pref('swtorss', 'url');
$pref_cfn = e107::pref('swtorss', 'cache_file_name');
$pref_ctl = e107::pref('swtorss', 'cache_time_life');
//$sql = "SELECT e107_name, e107_value FROM dg_core WHERE e107_name = plugin_swtorss";

//$plugin_pref		=> array();


$serverName = $pref_server;
$url = $pref_url;
$cache_file_name = $pref_cfn;
$cache_time_life = $pref_ctl;

/*
//SERVER-SET-UP-CONFIG
$serverName = "prophecy of the five"; //server name in lower case (spaces are ok)
$url = "http://www.swtor.com/server-status"; //we hit the server status page located here to get our server info
$cache_file_name = "server-status-cache.html"; //cache the server status page to this file name. It is saved in the same folder as this file
$cache_time_life = '300';//seconds to cache file
*/


include_once('simple_html_dom.php');

/* full path is important because you can use this somewhere else */
$fullpathlocalfile = e_PLUGIN."swtorss/cache/".$cache_file_name;
$local_testing = FALSE;
/* THIS IS ONLY VERSION FOR LOCAL FILE - TESTING PURPOSE */
if (file_exists($fullpathlocalfile) AND $local_testing)   {
  $data = file_get_html($fullpathlocalfile);
  if(!$data)  {  	     //todo insert e107 error handling
    print_a("Couldn't read local file with path".$fullpathlocalfile); 
    die;
   }
}
{
/* THIS IS DIRECT ACCESS TO SERVER - there could be problem with cross domains rules,  maybe... */
/* no saving file yet to solve frequency*/
 $data = file_get_html($pref_url);
  if(!$data)  {  	     //todo insert e107 error handling
    print_a(LAN_SWTOR_SS_READERROR. $pref_url); 
    die;
  }  
}
 
     /*
//Check to see if cache file exists. if it doesn't exist or we've exceed the cache life length, get fresh data from the source
//else, load it from the cached file
if( !(file_exists($cache_file_name)) || time() - filemtime($cache_file_name) >= $cache_time_life ) {
    $data->load_file($url);
   // $data->save($cache_file_name);
}
else{
    $data->load_file($cache_file_name);
}   */

//Grab the div for this server on server status page.
$serverElm = $data->find("div[data-name=$serverName]", 0);

$server["name"] = $serverElm->find("div.name",0)->innertext; //name of server
$server["status"] = $serverElm->getAttribute('data-status'); //status - UP/DOWN
$server["type"] = $serverElm->getAttribute('data-type');  //type - PVP, PVE etc
$server["timezone"] = $serverElm->getAttribute('data-timezone'); //timezone - east, west
switch($serverElm->getAttribute('data-population')){ //1,2,3,4,5
    case '1':
        //$server["population"] = 'Light';
		$server["population"] = LAN_SWTOR_SS_PLIGHT;
        break;
    case '2':
        //$server["population"] = 'Standard';
		$server["population"] = LAN_SWTOR_SS_PSTANDARD;
        break;
    case '3':
        //$server["population"] = 'Heavy';
		$server["population"] = LAN_SWTOR_SS_PHEAVY;
        break;
    case '4':
        //$server["population"] = 'Very Heavy';
		$server["population"] = LAN_SWTOR_SS_PVHEAVY;
        break;
    case '5':
        //$server["population"] = 'Full';
		$server["population"] = LAN_SWTOR_SS_PFULL;
        break;
    
}

?>
<div id="swtor-serverStatus-widget">
    <div class="container">
        <div class="name"><?php echo $server["name"] .' ('.$server["type"].', '.$server["timezone"].')';?></div>
        <div class="status <?php echo $server["status"];?>"><strong>Status:</strong> <?php echo $server["status"];?></div>
	<div class="population"><strong>Population:</strong> <?php echo $server["population"];?></div>
    </div>
</div>
