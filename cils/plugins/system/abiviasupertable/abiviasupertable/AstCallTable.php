<?php
/**
 * Abivia Super Table Plugin.
 *
 * @package AbiviaSuperTable
 * @copyright (C) ${copyright_range} by Abivia Inc. All rights reserved.
 * @license GNU/GPL
 * @link http://www.abivia.net/
 */
defined('_JEXEC')or die('Restricted access');require_once('AstCall.php');require_once('AstCell.php');require_once('AstXml.php'
);class AstCallTable extends AstCall{protected $_doc;public $transpose=false;protected function _define(&$dictionary,$symbol
,$value){return parent::_define($dictionary,$symbol,$value);}protected function _parseArgs($args){$args=trim($args);$refs
=explode(' ',$args);foreach($refs as $tid){if($tid==''){continue;}if($tid=='transpose'){$this->transpose=true;}if($tid=='rtl'
){$this->rtl=true;}}}protected function _parseStart($text){if(!preg_match('#<table.*</table>#si',$text,$tableMatch,PREG_OFFSET_CAPTURE
)){$this->_log(AstCall::DEBUG_ERROR,'Table not found.');$this->valid=false;return false;}$text=substr_replace($text,'',$tableMatch
[0][AstArticleBase::REGEX_OFFSET],strlen($tableMatch[0][AstArticleBase::REGEX_DATA]));$xmlParse=new AstXml();$this->_doc=
$xmlParse->processString($tableMatch[0][AstArticleBase::REGEX_DATA]);if(!$this->_doc){foreach($xmlParse->getErrorText()as
$message){$this->_log(0,$message);}$this->valid=false;return false;}return $text;}function execute(){$xpath=new DOMXpath
($this->_doc);$entries=$xpath->query('//*/tr');$this->dataset=array();for($ind=0;$ind<$entries->length;++$ind){$row=$entries
->item($ind)->childNodes;for($col=-1,$item=0;$item<$row->length;++$item){$node=$row->item($item);if(!$node instanceof DOMElement
){continue;}++$col;$cellInfo=new AstCell($this->trigger,AstXml::extractXml($node));if($this->transpose){if(!isset($this->
dataset[$ind])){$this->dataset[$ind]=array();}$this->dataset[$ind][$col]=$cellInfo;}else{if(!isset($this->dataset[$col]))
{$this->dataset[$col]=array();}$this->dataset[$col][$ind]=$cellInfo;}}}}}
