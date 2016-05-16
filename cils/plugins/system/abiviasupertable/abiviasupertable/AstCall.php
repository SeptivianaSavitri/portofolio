<?php
/**
 * Abivia Super Table Plugin.
 *
 * @package AbiviaSuperTable
 * @copyright (C) ${copyright_range} by Abivia Inc. All rights reserved.
 * @license GNU/GPL
 * @link http://www.abivia.net/
 */
defined('_JEXEC')or die('Restricted access');class AstCall{const DEBUG_ERROR=0;const DEBUG_BASIC=1;const DEBUG_VERBOSE=2
;const OPERATOR_SPECIAL='=';const STATE_INTAG=1;const STATE_SCAN=0;protected $_params;static $blockElements=array('div','body'
,'html','table','tbody','td','th','thead',);public $command;public $comment=false;public $context;public $dataset;public
$dictionary=array();public $highlightColumns=true;public $messages=array();public $nextOffset;public $size;public $offset
;public $pattern=array();public $rtl=false;public $trigger;public $valid=false;function __construct($trigger,$command,$params
=null){$this->trigger=$trigger;$this->command=$command;$this->_params=$params;}protected function _define(&$dictionary,$symbol
,$value){if($symbol=='rowheight'){if(!isset($dictionary['rowheight'])){$dictionary['rowheight']=array();}$index=self::_getWord
($value);if($index[0]=='*'){$dictionary['rowheight']['*']=$index[1];}else{$dictionary['rowheight'][(int)$index[0]]=$index
[1];}}else{$dictionary[$symbol]=$value;}}static protected function _getWord($args){if(($posn=strpos($args,' '))!==false){
$word=substr($args,0,$posn);$args=trim(substr($args,$posn));}else{$word=$args;$args='';}return array(strtolower($word),$args
,$word);}protected function _log($level,$message){$this->messages[]=array($level,$message);}protected function _parseArgs
($args){}protected function _parseBody($body){preg_match_all(AstHost::getRegex('bodyTags'),$body,$defMatches,PREG_OFFSET_CAPTURE
|PREG_SET_ORDER);$this->valid=true;foreach($defMatches as $key=>$match){$args=$match['args'][AstArticleBase::REGEX_DATA];
if(!strlen($args)){$this->valid=false;break;}$args=ltrim($args);$defMatches[$key]['args'][AstArticleBase::REGEX_DATA]=str_replace
(array("\t","\n","\r"),' ',$args);}if($this->valid){$body=$this->_parseDefs($this->dictionary,$body,$defMatches);if(isset
($this->dictionary['highlight'])&&strtolower($this->dictionary['highlight'][0])=='r'){$this->highlightColumns=false;}}return
$body;}protected function _parseDefs(&$dictionary,$body,&$defMatches,$from=null,$to=null){$kills=array();if($from===null
){$from=0;}if($to===null){$to=count($defMatches);}$inTag='';$inTagStart=0;for($key=$from;$key<$to;++$key){$match=$defMatches
[$key];$isComment=$match['comment'][AstArticleBase::REGEX_DATA]=='//';list($symbol,$args)=self::_getWord($match['args'][AstArticleBase
::REGEX_DATA]);if($symbol==$this->trigger){list($symbol,$args)=self::_getWord($args);}if(!AstArticle::isCommand($symbol))
{$this->_log(AstCall::DEBUG_BASIC,'Skipped unknown command: '.$symbol);continue;}if(substr($symbol,-1)=='/'){$inTag=substr
($symbol,0,-1);$inMatch=$match;$closeAt=-1;for($scan=$key+1;$scan<count($defMatches);++$scan){$closeMatch=&$defMatches[$scan
];$closeComment=$closeMatch['comment'][AstArticleBase::REGEX_DATA]=='//';list($closeTag,$closeArgs)=self::_getWord($closeMatch
['args'][AstArticleBase::REGEX_DATA]);if(!$closeComment&&$closeTag=='/'.$inTag){$closeAt=$scan;break;}}if($closeAt==-1){break
;}$subDictionary=array();$body=$this->_parseDefs($subDictionary,$body,$defMatches,$key+1,$closeAt);$kills[]=array($inMatch
[0][AstArticleBase::REGEX_OFFSET],$closeMatch[0][AstArticleBase::REGEX_OFFSET]+strlen($closeMatch[0][AstArticleBase::REGEX_DATA
])-$inMatch[0][AstArticleBase::REGEX_OFFSET]);if(!$isComment){$subDictionary['.args']=$args;if(!isset($subDictionary['text'
])){$textStart=$inMatch[0][AstArticleBase::REGEX_OFFSET]+strlen($inMatch[0][AstArticleBase::REGEX_DATA]);$textSize=$defMatches
[$closeAt][0][AstArticleBase::REGEX_OFFSET]-$textStart;if($textSize){$subDictionary['text']=substr($body,$textStart,$textSize
);}}$this->_define($dictionary,$inTag,$subDictionary);}$key=$closeAt;}elseif($symbol[0]=='/'){}else{if(!$isComment){$this
->_define($dictionary,$symbol,$args);}$kills[]=array($match[0][AstArticleBase::REGEX_OFFSET],strlen($match[0][AstArticleBase
::REGEX_DATA]));}}$kills=array_reverse($kills);$delta=0;foreach($kills as $kill){$body=substr_replace($body,'',$kill[0],$kill
[1]);$delta+=$kill[1];}if($delta&&$to>0){for($key=$to-1;$key<count($defMatches);++$key){foreach($defMatches[$key]as&$pattern
){$pattern[AstArticleBase::REGEX_OFFSET]-=$delta;}}}return $body;}protected function _parseStart($text){return $text;}protected
function _trimHtml($text){$text=preg_replace(array('#^(\s*?</?\s*[^>]*?/?>\s*?)+#i','#(\s*?</?\s*[^>]*?/?>\s*?)+$#i'),''
,$text);return $text;}static function dump($obj){$safe=htmlentities(print_r($obj,true));$safe=preg_replace('/\-\-+/','- -'
,$safe);return $safe;}function execute(){}function parse($patternMatch,$body){if($patternMatch){$this->comment=$patternMatch
['comment'][AstArticleBase::REGEX_DATA]=='//';if(isset($patternMatch['args'])){$this->_parseArgs($patternMatch['args'][AstArticleBase
::REGEX_DATA]);}$this->offset=$patternMatch[0][AstArticleBase::REGEX_OFFSET];$scan=$this->offset+strlen($patternMatch[0][
AstArticleBase::REGEX_DATA]);if($this->comment){return $this;}}else{$this->comment=false;}$body=$this->_parseStart($body)
;if($body===false){$this->valid=false;return false;}$body=$this->_parseBody($body);return $body;}}
