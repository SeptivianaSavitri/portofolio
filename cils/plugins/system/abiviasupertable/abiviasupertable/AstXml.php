<?php
/**
 * Abivia Super Table Plugin.
 *
 * @package AbiviaSuperTable
 * @copyright (C) ${copyright_range} by Abivia Inc. All rights reserved.
 * @license GNU/GPL
 * @link http://www.abivia.net/
 */
defined('_JEXEC')or die('Restricted access');class AstXml{static protected $_htmlEntities=array('AElig'=>'<!ENTITY AElig "&#198;">'
,'Aacute'=>'<!ENTITY Aacute "&#193;">','Acirc'=>'<!ENTITY Acirc "&#194;">','Agrave'=>'<!ENTITY Agrave "&#192;">','Alpha'=>
'<!ENTITY Alpha "&#913;">','Aring'=>'<!ENTITY Aring "&#197;">','Atilde'=>'<!ENTITY Atilde "&#195;">','Auml'=>'<!ENTITY Auml "&#196;">'
,'Beta'=>'<!ENTITY Beta "&#914;">','Ccedil'=>'<!ENTITY Ccedil "&#199;">','Chi'=>'<!ENTITY Chi "&#935;">','Dagger'=>'<!ENTITY Dagger "&#8225;">'
,'Delta'=>'<!ENTITY Delta "&#916;">','ETH'=>'<!ENTITY ETH "&#208;">','Eacute'=>'<!ENTITY Eacute "&#201;">','Ecirc'=>'<!ENTITY Ecirc "&#202;">'
,'Egrave'=>'<!ENTITY Egrave "&#200;">','Epsilon'=>'<!ENTITY Epsilon "&#917;">','Eta'=>'<!ENTITY Eta "&#919;">','Euml'=>'<!ENTITY Euml "&#203;">'
,'Gamma'=>'<!ENTITY Gamma "&#915;">','Iacute'=>'<!ENTITY Iacute "&#205;">','Icirc'=>'<!ENTITY Icirc "&#206;">','Igrave'=>
'<!ENTITY Igrave "&#204;">','Iota'=>'<!ENTITY Iota "&#921;">','Iuml'=>'<!ENTITY Iuml "&#207;">','Kappa'=>'<!ENTITY Kappa "&#922;">'
,'Lambda'=>'<!ENTITY Lambda "&#923;">','Mu'=>'<!ENTITY Mu "&#924;">','Ntilde'=>'<!ENTITY Ntilde "&#209;">','Nu'=>'<!ENTITY Nu "&#925;">'
,'OElig'=>'<!ENTITY OElig "&#338;">','Oacute'=>'<!ENTITY Oacute "&#211;">','Ocirc'=>'<!ENTITY Ocirc "&#212;">','Ograve'=>
'<!ENTITY Ograve "&#210;">','Omega'=>'<!ENTITY Omega "&#937;">','Omicron'=>'<!ENTITY Omicron "&#927;">','Oslash'=>'<!ENTITY Oslash "&#216;">'
,'Otilde'=>'<!ENTITY Otilde "&#213;">','Ouml'=>'<!ENTITY Ouml "&#214;">','Phi'=>'<!ENTITY Phi "&#934;">','Pi'=>'<!ENTITY Pi "&#928;">'
,'Prime'=>'<!ENTITY Prime "&#8243;">','Psi'=>'<!ENTITY Psi "&#936;">','Rho'=>'<!ENTITY Rho "&#929;">','Scaron'=>'<!ENTITY Scaron "&#352;">'
,'Sigma'=>'<!ENTITY Sigma "&#931;">','THORN'=>'<!ENTITY THORN "&#222;">','Tau'=>'<!ENTITY Tau "&#932;">','Theta'=>'<!ENTITY Theta "&#920;">'
,'Uacute'=>'<!ENTITY Uacute "&#218;">','Ucirc'=>'<!ENTITY Ucirc "&#219;">','Ugrave'=>'<!ENTITY Ugrave "&#217;">','Upsilon'
=>'<!ENTITY Upsilon "&#933;">','Uuml'=>'<!ENTITY Uuml "&#220;">','Xi'=>'<!ENTITY Xi "&#926;">','Yacute'=>'<!ENTITY Yacute "&#221;">'
,'Yuml'=>'<!ENTITY Yuml "&#376;">','Zeta'=>'<!ENTITY Zeta "&#918;">','aacute'=>'<!ENTITY aacute "&#225;">','acirc'=>'<!ENTITY acirc "&#226;">'
,'acute'=>'<!ENTITY acute "&#180;">','aelig'=>'<!ENTITY aelig "&#230;">','agrave'=>'<!ENTITY agrave "&#224;">','alefsym'=>
'<!ENTITY alefsym "&#8501;">','alpha'=>'<!ENTITY alpha "&#945;">','amp'=>'<!ENTITY amp "&#38;">','and'=>'<!ENTITY and "&#8743;">'
,'ang'=>'<!ENTITY ang "&#8736;">','aring'=>'<!ENTITY aring "&#229;">','asymp'=>'<!ENTITY asymp "&#8776;">','atilde'=>'<!ENTITY atilde "&#227;">'
,'auml'=>'<!ENTITY auml "&#228;">','bdquo'=>'<!ENTITY bdquo "&#8222;">','beta'=>'<!ENTITY beta "&#946;">','brvbar'=>'<!ENTITY brvbar "&#166;">'
,'bull'=>'<!ENTITY bull "&#8226;">','cap'=>'<!ENTITY cap "&#8745;">','ccedil'=>'<!ENTITY ccedil "&#231;">','cedil'=>'<!ENTITY cedil "&#184;">'
,'cent'=>'<!ENTITY cent "&#162;">','chi'=>'<!ENTITY chi "&#967;">','circ'=>'<!ENTITY circ "&#710;">','clubs'=>'<!ENTITY clubs "&#9827;">'
,'cong'=>'<!ENTITY cong "&#8773;">','copy'=>'<!ENTITY copy "&#169;">','crarr'=>'<!ENTITY crarr "&#8629;">','cup'=>'<!ENTITY cup "&#8746;">'
,'curren'=>'<!ENTITY curren "&#164;">','dArr'=>'<!ENTITY dArr "&#8659;">','dagger'=>'<!ENTITY dagger "&#8224;">','darr'=>
'<!ENTITY darr "&#8595;">','deg'=>'<!ENTITY deg "&#176;">','delta'=>'<!ENTITY delta "&#948;">','diams'=>'<!ENTITY diams "&#9830;">'
,'divide'=>'<!ENTITY divide "&#247;">','eacute'=>'<!ENTITY eacute "&#233;">','ecirc'=>'<!ENTITY ecirc "&#234;">','egrave'
=>'<!ENTITY egrave "&#232;">','empty'=>'<!ENTITY empty "&#8709;">','emsp'=>'<!ENTITY emsp "&#8195;">','ensp'=>'<!ENTITY ensp "&#8194;">'
,'epsilon'=>'<!ENTITY epsilon "&#949;">','equiv'=>'<!ENTITY equiv "&#8801;">','eta'=>'<!ENTITY eta "&#951;">','eth'=>'<!ENTITY eth "&#240;">'
,'euml'=>'<!ENTITY euml "&#235;">','euro'=>'<!ENTITY euro "&#8364;">','exist'=>'<!ENTITY exist "&#8707;">','fnof'=>'<!ENTITY fnof "&#402;">'
,'forall'=>'<!ENTITY forall "&#8704;">','frac12'=>'<!ENTITY frac12 "&#189;">','frac14'=>'<!ENTITY frac14 "&#188;">','frac34'
=>'<!ENTITY frac34 "&#190;">','frasl'=>'<!ENTITY frasl "&#8260;">','gamma'=>'<!ENTITY gamma "&#947;">','ge'=>'<!ENTITY ge "&#8805;">'
,'gt'=>'<!ENTITY gt "&#62;">','hArr'=>'<!ENTITY hArr "&#8660;">','harr'=>'<!ENTITY harr "&#8596;">','hearts'=>'<!ENTITY hearts "&#9829;">'
,'hellip'=>'<!ENTITY hellip "&#8230;">','iacute'=>'<!ENTITY iacute "&#237;">','icirc'=>'<!ENTITY icirc "&#238;">','iexcl'
=>'<!ENTITY iexcl "&#161;">','igrave'=>'<!ENTITY igrave "&#236;">','image'=>'<!ENTITY image "&#8465;">','infin'=>'<!ENTITY infin "&#8734;">'
,'int'=>'<!ENTITY int "&#8747;">','iota'=>'<!ENTITY iota "&#953;">','iquest'=>'<!ENTITY iquest "&#191;">','isin'=>'<!ENTITY isin "&#8712;">'
,'iuml'=>'<!ENTITY iuml "&#239;">','kappa'=>'<!ENTITY kappa "&#954;">','lArr'=>'<!ENTITY lArr "&#8656;">','lambda'=>'<!ENTITY lambda "&#955;">'
,'lang'=>'<!ENTITY lang "&#9001;">','laquo'=>'<!ENTITY laquo "&#171;">','larr'=>'<!ENTITY larr "&#8592;">','lceil'=>'<!ENTITY lceil "&#8968;">'
,'ldquo'=>'<!ENTITY ldquo "&#8220;">','le'=>'<!ENTITY le "&#8804;">','lfloor'=>'<!ENTITY lfloor "&#8970;">','lowast'=>'<!ENTITY lowast "&#8727;">'
,'loz'=>'<!ENTITY loz "&#9674;">','lrm'=>'<!ENTITY lrm "&#8206;">','lsaquo'=>'<!ENTITY lsaquo "&#8249;">','lsquo'=>'<!ENTITY lsquo "&#8216;">'
,'lt'=>'<!ENTITY lt "&#60;">','macr'=>'<!ENTITY macr "&#175;">','mdash'=>'<!ENTITY mdash "&#8212;">','micro'=>'<!ENTITY micro "&#181;">'
,'middot'=>'<!ENTITY middot "&#183;">','minus'=>'<!ENTITY minus "&#8722;">','mu'=>'<!ENTITY mu "&#956;">','nabla'=>'<!ENTITY nabla "&#8711;">'
,'nbsp'=>'<!ENTITY nbsp "&#160;">','ndash'=>'<!ENTITY ndash "&#8211;">','ne'=>'<!ENTITY ne "&#8800;">','ni'=>'<!ENTITY ni "&#8715;">'
,'not'=>'<!ENTITY not "&#172;">','notin'=>'<!ENTITY notin "&#8713;">','nsub'=>'<!ENTITY nsub "&#8836;">','ntilde'=>'<!ENTITY ntilde "&#241;">'
,'nu'=>'<!ENTITY nu "&#957;">','oacute'=>'<!ENTITY oacute "&#243;">','ocirc'=>'<!ENTITY ocirc "&#244;">','oelig'=>'<!ENTITY oelig "&#339;">'
,'ograve'=>'<!ENTITY ograve "&#242;">','oline'=>'<!ENTITY oline "&#8254;">','omega'=>'<!ENTITY omega "&#969;">','omicron'
=>'<!ENTITY omicron "&#959;">','oplus'=>'<!ENTITY oplus "&#8853;">','or'=>'<!ENTITY or "&#8744;">','ordf'=>'<!ENTITY ordf "&#170;">'
,'ordm'=>'<!ENTITY ordm "&#186;">','oslash'=>'<!ENTITY oslash "&#248;">','otilde'=>'<!ENTITY otilde "&#245;">','otimes'=>
'<!ENTITY otimes "&#8855;">','ouml'=>'<!ENTITY ouml "&#246;">','para'=>'<!ENTITY para "&#182;">','part'=>'<!ENTITY part "&#8706;">'
,'permil'=>'<!ENTITY permil "&#8240;">','perp'=>'<!ENTITY perp "&#8869;">','phi'=>'<!ENTITY phi "&#966;">','pi'=>'<!ENTITY pi "&#960;">'
,'piv'=>'<!ENTITY piv "&#982;">','plusmn'=>'<!ENTITY plusmn "&#177;">','pound'=>'<!ENTITY pound "&#163;">','prime'=>'<!ENTITY prime "&#8242;">'
,'prod'=>'<!ENTITY prod "&#8719;">','prop'=>'<!ENTITY prop "&#8733;">','psi'=>'<!ENTITY psi "&#968;">','quot'=>'<!ENTITY quot "&#34;">'
,'rArr'=>'<!ENTITY rArr "&#8658;">','radic'=>'<!ENTITY radic "&#8730;">','rang'=>'<!ENTITY rang "&#9002;">','raquo'=>'<!ENTITY raquo "&#187;">'
,'rarr'=>'<!ENTITY rarr "&#8594;">','rceil'=>'<!ENTITY rceil "&#8969;">','rdquo'=>'<!ENTITY rdquo "&#8221;">','real'=>'<!ENTITY real "&#8476;">'
,'reg'=>'<!ENTITY reg "&#174;">','rfloor'=>'<!ENTITY rfloor "&#8971;">','rho'=>'<!ENTITY rho "&#961;">','rlm'=>'<!ENTITY rlm "&#8207;">'
,'rsaquo'=>'<!ENTITY rsaquo "&#8250;">','rsquo'=>'<!ENTITY rsquo "&#8217;">','sbquo'=>'<!ENTITY sbquo "&#8218;">','scaron'
=>'<!ENTITY scaron "&#353;">','sdot'=>'<!ENTITY sdot "&#8901;">','sect'=>'<!ENTITY sect "&#167;">','shy'=>'<!ENTITY shy "&#173;">'
,'sigma'=>'<!ENTITY sigma "&#963;">','sigmaf'=>'<!ENTITY sigmaf "&#962;">','sim'=>'<!ENTITY sim "&#8764;">','spades'=>'<!ENTITY spades "&#9824;">'
,'sub'=>'<!ENTITY sub "&#8834;">','sube'=>'<!ENTITY sube "&#8838;">','sum'=>'<!ENTITY sum "&#8721;">','sup'=>'<!ENTITY sup "&#8835;">'
,'sup1'=>'<!ENTITY sup1 "&#185;">','sup2'=>'<!ENTITY sup2 "&#178;">','sup3'=>'<!ENTITY sup3 "&#179;">','supe'=>'<!ENTITY supe "&#8839;">'
,'szlig'=>'<!ENTITY szlig "&#223;">','tau'=>'<!ENTITY tau "&#964;">','there4'=>'<!ENTITY there4 "&#8756;">','theta'=>'<!ENTITY theta "&#952;">'
,'thetasym'=>'<!ENTITY thetasym "&#977;">','thinsp'=>'<!ENTITY thinsp "&#8201;">','thorn'=>'<!ENTITY thorn "&#254;">','tilde'
=>'<!ENTITY tilde "&#732;">','times'=>'<!ENTITY times "&#215;">','trade'=>'<!ENTITY trade "&#8482;">','uArr'=>'<!ENTITY uArr "&#8657;">'
,'uacute'=>'<!ENTITY uacute "&#250;">','uarr'=>'<!ENTITY uarr "&#8593;">','ucirc'=>'<!ENTITY ucirc "&#251;">','ugrave'=>'<!ENTITY ugrave "&#249;">'
,'uml'=>'<!ENTITY uml "&#168;">','upsih'=>'<!ENTITY upsih "&#978;">','upsilon'=>'<!ENTITY upsilon "&#965;">','uuml'=>'<!ENTITY uuml "&#252;">'
,'weierp'=>'<!ENTITY weierp "&#8472;">','xi'=>'<!ENTITY xi "&#958;">','yacute'=>'<!ENTITY yacute "&#253;">','yen'=>'<!ENTITY yen "&#165;">'
,'yuml'=>'<!ENTITY yuml "&#255;">','zeta'=>'<!ENTITY zeta "&#950;">','zwj'=>'<!ENTITY zwj "&#8205;">','zwnj'=>'<!ENTITY zwnj "&#8204;">'
,);protected $_parseErrors=array();public $wrap=true;protected function _getErrors($buf){$this->_parseErrors=libxml_get_errors
();libxml_clear_errors();$lines=explode(chr(10),$buf);foreach($this->_parseErrors as&$error){$error->linedata=array();for
($ind=-1;$ind<=1;++$ind){$line=$error->line+$ind;if(isset($lines[$line])){$error->linedata[$line]=$lines[$line];}}}}static
protected function _xmlUnwrap($buf,$root='root'){$posn=strpos($buf,'<'.$root);$posn=strpos($buf,'>',$posn);$buf=substr($buf
,$posn+1);$posn=strrpos($buf,'</'.$root);$buf=substr($buf,0,$posn-strlen($buf));return $buf;}protected function _xmlWrap(
$buf,$full=true){$buf=preg_replace('!<\s*br\s*>!','<br/>',$buf);if(preg_match_all('/&#?[0-9a-z]*;?/i',$buf,$matches,PREG_OFFSET_CAPTURE
)){$hits=array_reverse($matches[0]);foreach($hits as $entity){if(substr($entity[0],-1,1)!=';'){$buf=substr_replace($buf,'&amp;'
,$entity[1],1);}}}if(!$this->wrap){return $buf;}$hdr='';if($full){$hdr.='<?xml version="1.0"?>'.chr(10).'<!DOCTYPE root'.
'[ '.implode('',self::$_htmlEntities).' ]'.'>'.chr(10);}$hdr.='<root xmlns:jt="http://www/example.org/foo">'.chr(10);return
$hdr.$buf.chr(10).'</root>';}static function extractXml($node){if($node->childNodes->length){$doc=new DOMDocument;$doc->
loadXML('<root></root>');for($ind=0;$ind<$node->childNodes->length;++$ind){$newNode=$doc->importNode($node->childNodes->item
($ind),true);$doc->documentElement->appendChild($newNode);}$xml=self::_xmlUnwrap($doc->saveXML());}else{$xml=$node->nodeValue
;}return $xml;}public function getErrors(){return $this->_parseErrors;}public function getErrorText(){$xmlMessages=array(
);foreach($this->_parseErrors as $xmlError){$xmlMessages[]='Code '.$xmlError->code.': '.$xmlError->message;}return $xmlMessages
;}function process($src){$buf=file_get_contents($src);return $this->processString($buf);}function processString($buf){$buf
=$this->_xmlWrap($buf);$doc=new DOMDocument();$oldErrors=libxml_use_internal_errors(true);if(!$doc->loadXML($buf)){$this->
_getErrors($buf);libxml_use_internal_errors($oldErrors);return false;}$this->_parseErrors=array();libxml_use_internal_errors
($oldErrors);return $doc;}}
