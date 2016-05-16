<?php
/**
<version>1.0.0</version>
<author>Kreatif GmbH</author>
<authorEmail>info@joomfreak.com</authorEmail>
<authorUrl>http://www.joomfreak.com</authorUrl>
<copyright>Kreatif GmbH</copyright>
<license>Attribution 2.5 Generic (CC BY 2.5)</license>
 */

// no direct access
defined('_JEXEC') or die ;

if (K2_JVERSION != '15')
{
    $language = JFactory::getLanguage();
    $language->load('mod_k2.j16', JPATH_ADMINISTRATOR, null, true);
}

require_once (dirname(__FILE__).DS.'helper.php');

$moduleclass_sfx = $params->get('moduleclass_sfx', '');
$getTemplate = 'Default';

$items = modJfK2EventUpHelper::getItems($params);

if (count($items))
{
    require (JModuleHelper::getLayoutPath('mod_jf_k2_eventup', $getTemplate.DS.'default'));
}

