<?php
/**
 * @package 	mod_bt_twitterfeeds - BT Twitterfeeds Module
 * @version		2.1
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

$embledCode = $params->get('embed_code');
$widgetSetting = 'data-dnt="true" ';
if($params->get('tweet-limit')){
	$widgetSetting .= 'data-tweet-limit="'.$params->get('tweet-limit').'" ';
}
if($params->get('width')){
	$widgetSetting .= 'width="'.$params->get('width').'" ';
}
if($params->get('height')){
	$widgetSetting .= 'height="'.$params->get('height').'" ';
}
if($params->get('theme')){
	$widgetSetting .= 'data-theme="'.$params->get('theme').'" ';
}
if($params->get('link-color')){
	$widgetSetting .= 'data-link-color="'.$params->get('link-color').'" ';
}
if($params->get('border-color')){
	$widgetSetting .= 'data-border-color="'.$params->get('border-color').'" ';
}
$dataChrome = array();
if($params->get('noheader')){
	$dataChrome[] = 'noheader';
}
if($params->get('nofooter')){
	$dataChrome[] = 'nofooter';
}
if($params->get('noborder')){
	$dataChrome[] = 'noborder';
}
if($params->get('noscrollbar')){
	$dataChrome[] = 'noscrollbar';
}
if($params->get('transparent')){
	$dataChrome[] = 'transparent';
}
if(count($dataChrome)){
	$widgetSetting .= 'data-chrome="'.implode(' ',$dataChrome).'" ';
}
$identity = 'class="twitter-timeline" ';
?>

<div  class="bt-twitter<?php echo $moduleclass_sfx ?>" >
<?php echo str_replace(array($identity,'s-cript'), array($identity.$widgetSetting,'script'), $embledCode) ?>
</div>
<?php if($customcss){ ?>
<script type="text/javascript">CustomizeTwitterWidget({"url": "<?php echo $customcss ?>"})</script>
<?php } ?>