<?php
/**
 * Abivia Super Table Plugin.
 *
 * @package AbiviaSuperTable
 * @copyright (C) ${copyright_range} by Abivia Inc. All rights reserved.
 * @license GNU/GPL
 * @link http://www.abivia.net/
 */
defined('_JEXEC')or die('Restricted access');class AstHost{static function getRegex($name,$arg1=''){switch($name){case 'bodyTags'
:{$regex='#{\s*(?P<comment>//)?\s*(?P<args>.*?)}#is';}break;case 'passwordMask':{$regex='/\{\s*password.*?\}/i';}break;case
'passwordMasked':{$regex='{password *****}';}break;case 'patternRef':{$regex='#{\s*(?P<comment>//)?\s*(?P<trigger>'.$arg1
.')'.'/?(\s+(?P<command>[a-z][a-z0-9]*)(?:\s+(?P<args>.*?))?)?}#is';}break;case 'patternRefEnd':{$regex='#{\s*/\s*'.$arg1
.'(\s+(?P<args>.*?))?}#is';}break;}return $regex;}static function getUserId(){$user=JFactory::getUser();return $user->get
('id');}}
