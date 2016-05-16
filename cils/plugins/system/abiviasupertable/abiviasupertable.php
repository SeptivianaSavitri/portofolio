<?php
/**
 * Abivia Super Table Plugin.
 *
 * @package AbiviaSuperTable
 * @copyright (C) ${copyright_range} by Abivia Inc. All rights reserved.
 * @license GNU/GPL
 * @link http://www.abivia.net/
 */
defined('_JEXEC')or die('Restricted access');jimport('joomla.plugin.plugin');$astLib=dirname(__FILE__).'/abiviasupertable/'
;if(!class_exists('AbiviaHtml')){require_once $astLib.'AbiviaHtml.php';}require_once $astLib.'AstCompat.php';require_once
$astLib.'AstHost.php';require_once $astLib.'AstXml.php';require_once $astLib.'AstArticle.php';require_once $astLib.'AstCall.php'
;require_once $astLib.'AstCallTable.php';class plgSystemAbiviasupertable extends JPlugin{public $article=null;protected $_debug
;protected $_debugInOutput=true;protected $_debugText='';protected $_doc=null;protected $_loopLevel=0;protected $_loopStack
=array();protected $_params;protected $_postRender=false;protected $_scriptList=array();protected $_scriptOrder=array();static
protected $_styleGen=array();protected $_styleList=array();public $home;public $messages=array();public $name='';public
$version='';function __construct(&$subject,$params){parent::__construct($subject,$params);$this->_getParams();AstCompat::
setup($this->_params);}protected function _core($text){$this->_debugText='';$this->_scriptList=array();$this->_scriptOrder
=array();$this->messages=array();$this->_getInfo();$this->_getParams();$text=AstCompat::editorExtract($text);$triggers=$this
->getTriggers();$article=new AstArticle($this,$this->_params);$article->setDebug($this->_debug);if(isset($_SERVER['HTTP_USER_AGENT'
])){$article->setHack('ie7',preg_match('/MSIE 7\./',$_SERVER['HTTP_USER_AGENT']));$article->setHack('ie8',preg_match('/MSIE 8\./'
,$_SERVER['HTTP_USER_AGENT']));}$result=$article->process($triggers,$text);$result->text=AstCompat::editorInject($result->
text);if($result->injected){AstCompat::inject($this,$this->_params);if($this->_doc){array_multisort($this->_scriptOrder,$this
->_scriptList);foreach($this->_scriptList as $jsFile){$this->_doc->addScript($jsFile);}}}if(!empty($this->messages)){$messageMode
=$this->_params->get('messages',1);if($messageMode==2&&$this->_doc==null){$messageMode=1;}switch($messageMode){case 1:{$this
->_debugText.=chr(10).'<!-- ==== '.$this->name.' '.$this->version.' Messages ==='.chr(10).preg_replace('/\-\-+/','-',implode
(chr(10),$this->messages)).chr(10).'-->'.chr(10);}break;case 2:{$result->text.='<p>'.preg_replace('/\-\-+/','-',implode('</p><p>'
,$this->messages)).'</p>';}break;}}$this->_debugText.=$result->debugText;return $result;}static protected function _dump(
$obj){return htmlentities(print_r($obj,true));}protected function _getInfo(){$xmlParse=new AstXml();$xmlParse->wrap=false
;$doc=$xmlParse->process(dirname(__FILE__).'/abiviasupertable.xml');$this->name='Abivia SuperTable';$this->version='version unknown'
;if($doc){$xpath=new DOMXpath($doc);$entries=$xpath->query('//*/name');$node=$entries->item(0);if($node instanceof DOMElement
){$this->name=AstXml::extractXml($node);}$entries=$xpath->query('//*/version');$node=$entries->item(0);if($node instanceof
DOMElement){$this->version=AstXml::extractXml($node);}}}protected function _getParams(){$ver=new JVersion();if($ver->RELEASE
=='1.5'){$this->home='plugins/system/abiviasupertable/';$plugin=JPluginHelper::getPlugin('system','abiviasupertable');$this
->_params=new JParameter($plugin->params);}else{$this->home='plugins/system/abiviasupertable/abiviasupertable/';$this->_params
=$this->params;}$this->_debug=$this->_params->get('debug',false);}function addCssFile($cssFile){if(trim($cssFile)==''){return
;}$sig=md5(realpath($cssFile));if(!isset(self::$_styleGen[$sig])){if($this->_doc){$this->_doc->addStyleSheet($cssFile);}else
{$this->_styleList[]=$cssFile;}self::$_styleGen[$sig]=true;}}function addScriptFile($jsFile,$order=9){if(trim($jsFile)==''
){return;}$this->_scriptList[]=$jsFile;$this->_scriptOrder[]=$order;}function getDebugLevel(){return $this->_debug;}function
getDebugText(){return $this->_debugText;}function getTriggers(){$triggers=array('article'=>$this->_params->get('triggerWord'
),);return $triggers;}function onAfterRender(){$this->_doc=null;$app=JFactory::getApplication();if($app->isAdmin()){return
;}$resolved=$this->_core(JResponse::getBody());$css='';if(!empty($this->_styleList)||!empty($this->_scriptList)){array_multisort
($this->_scriptOrder,$this->_scriptList);foreach($this->_scriptList as $jsFile){$css.='<script src="'.$jsFile.'" type="text/javascript"></script>'
.chr(10);}foreach($this->_styleList as $sheet){$css.='<link rel="stylesheet" href="'.$sheet.'" type="text/css" />'.chr(10
);}}if($this->_debugInOutput){$resolved->text=str_replace('</head>',$css.$this->_debugText.'</head>',$resolved->text);}JResponse
::setBody($resolved->text);}function onContentPrepare($context,&$row=null,&$params=null,$page=0){if(!$row){return;}$this->
_doc=JFactory::getDocument();$this->article=$row;$resolved=$this->_core($row->text);$row->astData=$resolved->astData;$row
->text=($this->_debugInOutput ? $this->_debugText:'').$resolved->text;}function onPrepareContent(&$article,&$params,$limitstart
=0){$this->_doc=JFactory::getDocument();$this->article=$article;$resolved=$this->_core($article->text);$article->astData=
$resolved->astData;$article->text=($this->_debugInOutput ? $this->_debugText:'').$resolved->text;}function setDebug($level
,$inOutput=null){$this->_debug=$level;if($inOutput!==null){$this->_debugInOutput=$inOutput;}}}
