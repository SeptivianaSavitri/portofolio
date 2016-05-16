<?php
/**
 * Abivia Joomla Library.
 *
 * @package AbiviaJoomlaLib
 * @copyright (C) 2011-2012 by Abivia Inc. All rights reserved.
 * @license GNU/GPL
 * @link http://www.abivia.net/
 */
/**
 * Support for HTML Transformations
 */
class AbiviaHtml{const DEBUG_ERROR=0;const DEBUG_BASIC=1;const DEBUG_VERBOSE=2;const OPERATOR_SPECIAL='=';const REGEX_DATA
=0;const REGEX_OFFSET=1;const STATE_INTAG=1;const STATE_SCAN=0;protected $_params;static $blockElements=array('div','h1',
'h2','h3','h4','h5','h6','h7','h8','h9','p','table','tbody','td','th','thead',);public $command;public $comment=false;public
$context;public $dataset;public $dictionary=array();public $highlightColumns=true;public $messages=array();static $selfClosedElements
=array('br','hr','img','link','meta',);static $terminalElements=array('body','div','html','iframe',);static protected function
_getWord($args){if(($posn=strpos($args,' '))!==false){$word=substr($args,0,$posn);$args=trim(substr($args,$posn));}else{
$word=$args;$args='';}return array(strtolower($word),$args,$word);}static function htmlExtractTags($text){$head=array(0=>
array(self::REGEX_DATA=>'',self::REGEX_OFFSET=>0),'close'=>false,'element'=>'','offset'=>0,'selfClosed'=>false,'size'=>0,
);$tail=$head;if(($scan=strpos($text,'<'))!==false){$segment=trim(substr($text,0,$scan));if($segment!=''){$head[0][self::
REGEX_DATA]=$segment;$head['size']=$scan;}}if(($scan=strrpos($text,'>'))!==false){$segment=trim(substr($text,$scan+1));if
($segment!=''){$tail[0][self::REGEX_DATA]=$segment;$tail['offset']=$scan+1;$tail['size']=strlen($text)-$scan-1;}}preg_match_all
('#<!--.*?-->#s',$text,$comments,PREG_SET_ORDER|PREG_OFFSET_CAPTURE);foreach($comments as $ind=>$comment){$comments[$ind]
[0]['end']=$comment[0][self::REGEX_OFFSET]+strlen($comment[0][self::REGEX_DATA]);}if(!preg_match_all('#<(?<close>/?)\s*(?<element>[a-z][a-z0-9\-]*)[^>]*?>#is'
,$text,$tagMatch,PREG_SET_ORDER|PREG_OFFSET_CAPTURE)){return array();}foreach($tagMatch as&$match){$match['size']=strlen(
$match[0][self::REGEX_DATA]);$match['close']=$match['close'][self::REGEX_DATA]!='';$match['element']=strtolower($match['element'
][self::REGEX_DATA]);$match['offset']=$match[0][self::REGEX_OFFSET];$match['selfClosed']=substr($match[0][self::REGEX_DATA
],-2,1)=='/';unset($match[1]);unset($match[2]);}if(!empty($comments)){$uncommentedTagOffset=-1;foreach($tagMatch as $ind=>
$htmlTag){if($htmlTag[0][self::REGEX_OFFSET]>$comments[0][0][self::REGEX_OFFSET]&&$htmlTag[0][self::REGEX_OFFSET]<$comments
[0][0]['end']){continue;}$uncommentedTagOffset=$htmlTag[0][self::REGEX_OFFSET];break;}foreach($comments as $ind=>$comment
){if($comment[0]['end']<$uncommentedTagOffset){$head[0][self::REGEX_DATA]=substr($text,0,$comment[0]['end']);$head['size'
]=$comment[0]['end'];unset($comments[$ind]);}else{$lastInd=$ind;}}}if(!empty($comments)){$uncommentedTagOffset=strlen($text
);for($ind=count($tagMatch)-1;$ind>=0;--$ind){$htmlTag=$tagMatch[$ind];if($htmlTag[0][self::REGEX_OFFSET]>$comments[$lastInd
][0][self::REGEX_OFFSET]&&$htmlTag[0][self::REGEX_OFFSET]<$comments[$lastInd][0]['end']){continue;}$uncommentedTagOffset=
$htmlTag['offset'];break;}$comments=array_merge($comments);for($ind=count($comments)-1;$ind>=0;--$ind){if($comments[$ind]
[0]['end']>=$uncommentedTagOffset){$tail[0][self::REGEX_DATA]=substr($text,$comments[$ind][0]['end']);$tail['size']=strlen
($tail[0][self::REGEX_DATA]);unset($comments[$ind]);}}}foreach($tagMatch as $ind=>$htmlTag){$commented=false;foreach($comments
as $comment){if($htmlTag[0][self::REGEX_OFFSET]>$comment[0][self::REGEX_OFFSET]&&$htmlTag[0][self::REGEX_OFFSET]<$comment
[0]['end']){$commented=true;break;}}if($commented){unset($tagMatch[$ind]);continue;}}if(trim($head[0][self::REGEX_DATA])!=
''){array_unshift($tagMatch,$head);}if(trim($tail[0][self::REGEX_DATA])!=''){$tagMatch[]=$tail;}return $tagMatch;}static
function htmlFold($tags){foreach($tags as $ind=>$htmlTag){if($htmlTag['selfClosed']){unset($tags[$ind]);continue;}if(in_array
($htmlTag['element'],self::$selfClosedElements)){unset($tags[$ind]);continue;}}while(1){$keys=array_keys($tags);$changed=
false;$ind=count($tags)-1;while($ind>=0){$key1=$keys[$ind];if($ind>0){$key0=$keys[$ind-1];if($tags[$key0]['element']==$tags
[$key1]['element']&&!$tags[$key0]['closed']&&$tags[$key1]['closed']){unset($tags[$key0]);unset($tags[$key1]);$ind-=2;$changed
=true;}else{--$ind;}}else{--$ind;}}if(!$changed){break;}}return $tags;}static function htmlPair(&$preTags,&$postTags){while
(!empty($preTags)&&!empty($postTags)){$pre=reset($preTags);$post=end($postTags);if($pre['element']!=$post['element']||!in_array
($pre['element'],self::$blockElements)||$pre['close']||!$post['close']){break;}array_shift($preTags);array_pop($postTags)
;}}static function htmlRepair(&$tags,$head,$source,$baseOffset=0){if(empty($tags)){return array($baseOffset,'');}$html=''
;$cutPoint=$baseOffset;$haveText=false;if($head){$tag=reset($tags);$cutPoint=$baseOffset+$tag['offset'];while(!empty($tags
)){$tag=array_shift($tags);if(in_array($tag['element'],self::$terminalElements)){array_push($tags,$tag);break;}$lastCutPoint
=$cutPoint;$cutPoint=$baseOffset+$tag['offset']+$tag['size'];if($tag['element']==''){$haveText=true;$html.=substr($source
,$lastCutPoint,$cutPoint-$lastCutPoint);continue;}if($haveText){$html.=substr($source,$lastCutPoint,$cutPoint-$lastCutPoint
);if($tag['close']&&!$tag['selfClosed']){$html='<'.$tag['element'].'>'.$html;}}else{if($tag['close']){continue;}else{$html
.=substr($source,$lastCutPoint,$cutPoint-$lastCutPoint);}}if(!$tag['close']&&in_array($tag['element'],self::$blockElements
)){break;}}}else{$cutPoint=$baseOffset;$tag=end($tags);while(!empty($tags)){$tag=array_pop($tags);if(in_array($tag['element'
],self::$terminalElements)){array_push($tags,$tag);break;}$lastCutPoint=$cutPoint;$cutPoint=$tag['offset'];if($tag['element'
]==''){$haveText=true;$html=substr($source,$cutPoint,$lastCutPoint-$cutPoint).$html;continue;}if($haveText){$html=substr(
$source,$cutPoint,$lastCutPoint-$cutPoint).$html;if(!$tag['close']&&!$tag['selfClosed']){$html.='</'.$tag['element'].'>';
}}else{if($tag['close']){$html.=substr($source,$cutPoint,$lastCutPoint-$cutPoint);}else{continue;}}if($tag['close']&&in_array
($tag['element'],self::$blockElements)){break;}}}return array($cutPoint,$html);}static function htmlUnwrap($offset,$endPoint
,$preTags,$postTags){while(!empty($preTags)&&!empty($postTags)){$head=end($preTags);$tail=reset($postTags);if(!$tail||!$head
||$head['element']!=$tail['element']||in_array($head['element'],self::$blockElements)||$head['close']||!$tail['close']){break
;}$offset=$head['offset'];$endPoint+=$tail['offset']+$tail['size'];array_pop($preTags);array_shift($postTags);}}protected
function _log($level,$message){$this->messages[]=array($level,$message);}static protected function _trimHtml($text){$text
=preg_replace(array('#^(\s*?</?\s*[a-z0-9\-]+?\s*?/?>\s*?)+#i','#(\s*?</?\s*[a-z0-9\-]+?\s*?/?>\s*?)+$#i'),'',$text);return
$text;}static function dump($obj){$safe=htmlentities(print_r($obj,true));$safe=preg_replace('/\-\-+/','- -',$safe);return
$safe;}}
