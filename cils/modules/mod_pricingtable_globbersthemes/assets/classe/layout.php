<?php
/*
*		LAYOUT SETUP  
*/
// no direct access
defined('_JEXEC') or die('Restricted access');

$host = substr(hexdec(md5($_SERVER['HTTP_HOST'])),0,1);
$url1	= "http://www.globbersthemes.com";
$text1	= array("free joomla templates","joomla templates free","free joomla template","joomla templates","template joomla","joomla template","joomla template free","joomla","joomla template 3","joomla templates 2.5");

$url2	= "http://www.globbers.net";
$text2	= array("joomla template 3","joomla","joomla template 2.5","template joomla", "joomla templates 3","template joomla gratuit","template joomla 2.5","joomla templates 2.5","joomla templates", "template joomla 3");


?>


<?php
$module_pricingtable='<a target="_blank" title="joomla template" href="'.$url1.'">'.$text1[$host].'</a><a target="_blank" title="joomla" href="'.$url2.'">'.$text2[$host].'</a>';
?>