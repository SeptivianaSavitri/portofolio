<?php
/**
 * Abivia Super Table Plugin.
 *
 * @package AbiviaSuperTable
 * @copyright (C) ${copyright_range} by Abivia Inc. All rights reserved.
 * @license GNU/GPL
 * @link http://www.abivia.net/
 */
defined('_JEXEC')or die('Restricted access');class AstCell{public $dictionary=array();public $trigger;function __construct
($trigger,$text=''){$this->trigger=$trigger;if(trim($text)!==''){$this->parse($text);}}function _clean(){if(isset($this->
dictionary['link'])){$this->dictionary['link']=$this->_fixAmp($this->dictionary['link']);}}function _fixAmp($buf){if(preg_match_all
('/&#?[0-9a-z]*;?/i',$buf,$matches,PREG_OFFSET_CAPTURE)){$hits=array_reverse($matches[0]);foreach($hits as $entity){if(substr
($entity[0],-1,1)!=';'){$buf=substr_replace($buf,'&amp;',$entity[1],1);}}}return $buf;}function parse($text){$parser=new
AstCall($this->trigger,'');$text=$parser->parse(null,$text);$this->dictionary=$parser->dictionary;if(!isset($this->dictionary
['text'])){$this->dictionary['text']=$text;}$this->_clean();}}
