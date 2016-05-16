<?php
/*------------------------------------------------------------------------
# mod_jfslideshow
# ------------------------------------------------------------------------
# author    Kreatif Multimedia GmbH
# copyright Copyright (C) 2013 kreatif-multimedia.com. All Rights Reserved.
# @license - http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
# Websites: http://www.joomfreak.com
# Technical Support:  Forum - http://www.joomfreak.com/forum.html
-------------------------------------------------------------------------*/
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
$maxSlide = 10;
require_once dirname(__FILE__).'/helper.php';

$moduletype = $params->get('moduletype', 1);

$slidetype = $params->get('slideoption_slidetype', 1);

if($moduletype){
	$layout = 'youtube';	
}else{
	if($slidetype){
		$layout = 'slideshow';
	}else{
		$layout = 'bgslideshow';
	}
}

require JModuleHelper::getLayoutPath('mod_jfslideshow', $layout);