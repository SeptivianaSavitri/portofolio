<?php
/**
 * @package 	mod_bt_twitterfeeds - BT Twitterfeeds Module
 * @version		2.2
 * @created		Oct 2011

 * @author		BowThemes
 * @email		support@bowthems.com
 * @website		http://bowthemes.com
 * @support		Forum - http://bowthemes.com/forum/
 * @copyright	Copyright (C) 2012 Bowthemes. All rights reserved.
 * @license		http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 *
 */
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'));

$document	= JFactory::getDocument();

$customcss = '';
if($params->get('customcss')){
	$mainframe = JFactory::getApplication();
	$template = $mainframe->getTemplate();
	if(file_exists(JPATH_BASE.'/templates/'.$template.'/html/mod_bt_twitterfeeds/css/customize-twitter.css'))
	{
		$customcss =  JURI::root().'templates/'.$template.'/html/mod_bt_twitterfeeds/css/customize-twitter.css';
	}
	else{
		$customcss = JURI::root().'modules/mod_bt_twitterfeeds/tmpl/css/customize-twitter.css';
	}
	$document->addScript(JURI::root().'modules/mod_bt_twitterfeeds/tmpl/js/customize-twitter-1.1.min.js');
}
$document->addCustomTag('<meta name="twitter:widgets:csp" content="on">');
require JModuleHelper::getLayoutPath('mod_bt_twitterfeeds','default');
