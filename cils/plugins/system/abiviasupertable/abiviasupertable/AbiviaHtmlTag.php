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
 * Used to track page elements in HTML transformations.
 */
class AbiviaHtmlTag{const REGEX_DATA=0;const REGEX_OFFSET=1;public $close=false;public $element='';public $offset;public
$selfClose=false;public $size;public $text;static function&factory($element='',$offset=0,$size=0,$close=false){$tag=new
AbiviaHtmlTag;$tag->element=$element;$tag->offset=$offset;$tag->size=$size;$tag->close=$close;return $tag;}static function
&factoryRegex($match){$tag=new AbiviaHtmlTag;$tag->text=$match[0][self::REGEX_DATA];$tag->element=strtolower($match['element'
][self::REGEX_DATA]);$tag->offset=$match[0][self::REGEX_OFFSET];$tag->size=strlen($tag->text);$tag->close=$match['close']
[self::REGEX_DATA]!='';$tag->selfClosed=substr($match[0][self::REGEX_DATA],-2,1)=='/';return $tag;}static function isClose
($tag){if($tag instanceof AbiviaHtmlTag){return $tag->close;}return $tag['close'][self::REGEX_DATA]!='';}static function
isSelfClose($tag){if($tag instanceof AbiviaHtmlTag){return $tag->selfClosed;}return substr($tag[0][self::REGEX_DATA],-2,1
)=='/';}}
