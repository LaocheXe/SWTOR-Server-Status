<?php

// Generated e107 Plugin Admin Area 

require_once('../../class2.php');
if (!getperms('P')) 
{
	header('location:'.e_BASE.'index.php');
	exit;
}


class swtorss_adminArea extends e_admin_dispatcher
{

	protected $modes = array(	
	
		'main'	=> array(
			'controller' 	=> 'swtorss_ui',
			'path' 			=> null,
			'ui' 			=> 'swtorss_form_ui',
			'uipath' 		=> null
		),
		

	);	
	
	
	protected $adminMenu = array(
		
		'main/front'		=> array('caption'=> LAN_SWTORSS_FRONT, 'perm' => 'P'),
		'main/prefs' 		=> array('caption'=> LAN_PREFS, 'perm' => 'P'),	
		'main/info'			=> array('caption'=> LAN_SWTORSS_INFO_NAME, 'perm' => 'P')
		// 'main/custom'		=> array('caption'=> 'Custom Page', 'perm' => 'P')
	);

	protected $adminMenuAliases = array(
		'main/edit'	=> 'main/list'				
	);	
	
	protected $menuTitle = 'swtorss';
}
				
class swtorss_ui extends e_admin_ui
{
			
		protected $pluginTitle		= 'SWTOR Server Status';
		protected $pluginName		= 'swtorss';
	//	protected $eventName		= 'swtorss-'; // remove comment to enable event triggers in admin. 		
		protected $table			= '';
		protected $pid				= '';
		protected $perPage			= 10; 
		protected $batchDelete		= true;
	//	protected $batchCopy		= true;		
	//	protected $sortField		= 'somefield_order';
	//	protected $orderStep		= 10;
	//	protected $tabs				= array('Tabl 1','Tab 2'); // Use 'tab'=>0  OR 'tab'=>1 in the $fields below to enable. 
		
	//	protected $listQry      	= "SELECT * FROM `#tableName` WHERE field != '' "; // Example Custom Query. LEFT JOINS allowed. Should be without any Order or Limit.
	
	//	protected $listOrder		= ' DESC';
	
		protected $fields 		= NULL;		
		
		protected $fieldpref = array();
		


		public function frontPage()
		{
			$ns = e107::getRender();
			$text = '<center><img src="images/icon_32.png" width="32" height="32"></center>
			<br /><br />
			<table>
			<tr>
			<th><font size="+1"><u>'.LAN_EXE_INFO_SSU.'</u></font></th>
			</tr>
			<tbody>
			<tr>
			<td align="right">'.LAN_EXE_INFO_SSU01.'</td>
			<td> </td>
			<td align="left">{SWTORSS_EXE}</td>
			</tr>
			<tr>
			<td align="right">'.LAN_EXE_INFO_SSU02.'</td>
			<td> </td>
			<td align="left">{SWTORSS_CENTER_EXE}</td>
			</tr>
			<tr>
			<td align="right">'.LAN_EXE_INFO_SSU03.'</td>
			<td> </td>
			<td align="left">{SWTORSS_ARROW_EXE}</td>
			</tr>
			</tbody>
			</table>
			<br /><br />
			<table align="center">
			<tfoot>
			</tfoot>
			</table>
			';
			$ns->tablerender($text);	
			
		}
		
	//	protected $preftabs        = array('General', 'Other' );
		protected $prefs = array(
			'server'		=> array('title'=> LAN_SWTOR_SS_SNAME, 'tab'=>0, 'type'=>'text', 'data' => 'str', 'help'=>LAN_SWTOR_SS_HELP_SNAME),
			'url'		=> array('title'=> LAN_SWTOR_SS_URL, 'tab'=>0, 'type'=>'text', 'data' => 'str', 'help'=>LAN_SWTOR_SS_HELP_URL),
			'cache_file_name'		=> array('title'=> LAN_SWTOR_SS_CFN, 'tab'=>0, 'type'=>'text', 'data' => 'str', 'help'=>LAN_SWTOR_SS_HELP_CFN),
			'cache_time_life'		=> array('title'=> LAN_SWTOR_SS_CTL, 'tab'=>0, 'type'=>'number', 'data' => 'str', 'help'=>LAN_SWTOR_SS_HELP_CTL),
		); 

	
		public function init()
		{
			// Set drop-down values (if any). 
		}

		
		// ------- Customize Create --------
		
		public function beforeCreate($new_data)
		{
			return $new_data;
		}
	
		public function afterCreate($new_data, $old_data, $id)
		{
			// do something
		}

		public function onCreateError($new_data, $old_data)
		{
			// do something		
		}		
		
		
		// ------- Customize Update --------
		
		public function beforeUpdate($new_data, $old_data, $id)
		{
			return $new_data;
		}

		public function afterUpdate($new_data, $old_data, $id)
		{
			// do something	
		}
		
		public function onUpdateError($new_data, $old_data, $id)
		{
			// do something		
		}		
		
		public function infoPage()
		{	
			$ns = e107::getRender();
			$text = '<center><img src="images/icon_32.png" width="32" height="32"></center>
			<br /><br />
			<table>
			<tr>
			<th><font size="+1"><u>'.LAN_EXE_INFO_AIN.'</u></font></th>
			</tr>
			<tbody>
			<tr>
			<td align="right"><b>'.LAN_EXE_INFO_01.'</td>
			<td> </td>
			<td align="left"><i> <a href="mailto:forbiddenchaos@gmail.com" target="_blank">LaocheXe</a></i></b></td>
			</tr>
			<tr>
			<td align="right"><b>'.LAN_EXE_INFO_02.'</td>
			<td> </td>
			<td align="left"><i> <a href="http://defiantz.org" target="_blank">'.LAN_EXE_INFO_SITENAME.'</a></i></b></td>
			</tr>
			<tr>
			<td align="right"><b>'.LAN_EXE_INFO_03.'</td>
			<td> </td>
			<td align="left"><i> <a href="mailto:forbiddenchaos@gmail.com" target="_blank">forbiddenchaos@gmail.com</a></i></b></td>
			</tr>
			</tbody>
			</table>
			<br /><br />
			<table>
			<tr>
			<th><font size="+1"><u>'.LAN_EXE_INFO_PIN.'</u></font></th>
			</tr>
			<tr>
			<td align="right"><b>'.LAN_SWTOR_SS_SNAME.'</b>:</td>
			<td> </td>
			<td align="left">'.LAN_SWTORSS_INFO_SNAME.'</td>
			</tr>
			<tr>
			<td align="right"><b>'.LAN_SWTOR_SS_URL.'</b>:</td>
			<td> </td>
			<td align="left">'.LAN_SWTORSS_INFO_CURL.''.LAN_SWTOR_SS_SSSURL.'</td>
			</tr>
			<tr>
			<td align="right"><b>'.LAN_SWTOR_SS_CFN.'</b>:</td>
			<td> </td>
			<td align="left">'.LAN_SWTORSS_INFO_CFN.'</td>
			</tr>
			<tr>
			<td align="right"><b>'.LAN_SWTOR_SS_CTL.'</b>:</td>
			<td> </td>
			<td align="left">'.LAN_SWTORSS_INFO_CTL.'</td>
			</tr>
			</table>
			<br /><br />
			<table>
			<tr>
			<th><font size="+1"><u>'.LAN_SWTORSS_SLIST.'</u></font></th>
			</tr>
			<tr>
			<td align="right"><b>'.LAN_SWTORSS_USLIST.'</b>:</td>
			<td> </td>
			<td align="left">'.LAN_SWTOR_SS_US_BASTION.'</td>
			</tr>
			<tr>
			<td align="right"><b>'.LAN_SWTORSS_USLIST.'</b>:</td>
			<td> </td>
			<td align="left">'.LAN_SWTOR_SS_US_BEGEREN.'</td>
			</tr>
			<tr>
			<td align="right"><b>'.LAN_SWTORSS_USLIST.'</b>:</td>
			<td> </td>
			<td align="left">'.LAN_SWTOR_SS_US_HARBINGER.'</td>
			</tr>
			<tr>
			<td align="right"><b>'.LAN_SWTORSS_USLIST.'</b>:</td>
			<td> </td>
			<td align="left">'.LAN_SWTOR_SS_US_SHADOWLANDS.'</td>
			</tr>
			<tr>
			<td align="right"><b>'.LAN_SWTORSS_USLIST.'</b>:</td>
			<td> </td>
			<td align="left">'.LAN_SWTOR_SS_US_JUNGMA.'</td>
			</tr>
			<tr>
			<td align="right"><b>'.LAN_SWTORSS_USLIST.'</b>:</td>
			<td> </td>
			<td align="left">'.LAN_SWTOR_SS_US_EBONHAWK.'</td>
			</tr>
			<tr>
			<td align="right"><b>'.LAN_SWTORSS_USLIST.'</b>:</td>
			<td> </td>
			<td align="left">'.LAN_SWTOR_SS_US_PROPHECY.'</td>
			</tr>
			<tr>
			<td align="right"><b>'.LAN_SWTORSS_USLIST.'</b>:</td>
			<td> </td>
			<td align="left">'.LAN_SWTOR_SS_US_JEDICOVENANT.'</td>
			</tr>
			<tr>
			<td align="right"><b>'.LAN_SWTORSS_EULIST.'</b>:</td>
			<td> </td>
			<td align="left">'.LAN_SWTOR_SS_EU_T3M4.'</td>
			</tr>
			<tr>
			<td align="right"><b>'.LAN_SWTORSS_EULIST.'</b>:</td>
			<td> </td>
			<td align="left">'.LAN_SWTOR_SS_EU_DARTH.'</td>
			</tr>
			<tr>
			<td align="right"><b>'.LAN_SWTORSS_EULIST.'</b>:</td>
			<td> </td>
			<td align="left">'.LAN_SWTOR_SS_EU_TOMB.'</td>
			</tr>
			<tr>
			<td align="right"><b>'.LAN_SWTORSS_EULIST.'</b>:</td>
			<td> </td>
			<td align="left">'.LAN_SWTOR_SS_EU_SWORD.'</td>
			</tr>
			<tr>
			<td align="right"><b>'.LAN_SWTORSS_EULIST.'</b>:</td>
			<td> </td>
			<td align="left">'.LAN_SWTOR_SS_EU_PROGENITOR.'</td>
			</tr>
			<tr>
			<td align="right"><b>'.LAN_SWTORSS_EULIST.'</b>:</td>
			<td> </td>
			<td align="left">'.LAN_SWTOR_SS_EU_VANJERVALIS.'</td>
			</tr>
			<tr>
			<td align="right"><b>'.LAN_SWTORSS_EULIST.'</b>:</td>
			<td> </td>
			<td align="left">'.LAN_SWTOR_SS_EU_BATTLE.'</td>
			</tr>
			<tr>
			<td align="right"><b>'.LAN_SWTORSS_EULIST.'</b>:</td>
			<td> </td>
			<td align="left">'.LAN_SWTOR_SS_EU_MANTLE.'</td>
			</tr>
			<tr>
			<td align="right"><b>'.LAN_SWTORSS_EULIST.'</b>:</td>
			<td> </td>
			<td align="left">'.LAN_SWTOR_SS_EU_RED.'</td>
			</tr>
			</table>
			<br />
			<table>
			<tr>
			<th><font size="+1"><u>'.LAN_CRD_CREDITS.'</u></font></th>
			</tr>
			<tr>
			<td align="right"><b>'.LAN_CRD_JIMAKO.'</b></td>
			<td> </td>
			<td align="left">'.LAN_CRD_JIMAKO_INFO.'</td>
			<td> </td>
			</tr>
			<tr>
			<td align="right"><b>'.LAN_CRD_DANKRAUS.'</b></td>
			<td> </td>
			<td align="left">'.LAN_CRD_DANKRAUS_INFO.'</td>
			<td> </td>
			</tr>
			<table>
			</table>
			<br /><br />
			<table align="center">
			<tfoot>
			<tr>
			<td align="center"><b>'.LAN_DONATE_MSG.'</b></td>
			</tr>
			<tr>
			<td align="center"><form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
			<input type="hidden" name="cmd" value="_s-xclick">
			<input type="hidden" name="encrypted" value="-----BEGIN PKCS7-----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-----END PKCS7-----
">
			<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donate_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
			<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
			</form>
			</td>
			</tr>
			</tfoot>
			</table>
			';
			$ns->tablerender($text);	
			
		}	
	/*	
		// optional - a custom page.  
		public function customPage()
		{
			$text = 'Hello World!';
			return $text;
			
		}
	*/
			
}
				


class swtorss_form_ui extends e_admin_form_ui
{

}		
		
		
new swtorss_adminArea();

require_once(e_ADMIN."auth.php");
e107::getAdminUI()->runPage();

require_once(e_ADMIN."footer.php");
exit;

?>