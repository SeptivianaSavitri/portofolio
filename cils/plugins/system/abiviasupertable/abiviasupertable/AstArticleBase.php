<?php
/**
 * Abivia Super Table Plugin.
 *
 * @package AbiviaSuperTable
 * @copyright (C) ${copyright_range} by Abivia Inc. All rights reserved.
 * @license GNU/GPL
 * @link http://www.abivia.net/
 */
defined('_JEXEC')or die('Restricted access');abstract class AstArticleBase{const PHASE_DATA=0;const PHASE_HEADER=1;const
REGEX_DATA=0;const REGEX_OFFSET=1;protected $_activeIndex;protected $_activeEnabled;protected $_bodyColWidth;protected $_borders
;protected $_cellFilter;protected $_colCount=array();protected $_colNumber=array();protected $_colParity=array();protected
$_colWidth;protected $_colWidthPixels=array();static protected $_commandVerb=array('active'=>array('edition'=>'Free'),'blocklink'
=>array('data'=>true,'block'=>true,'cell'=>true,'edition'=>'Plus'),'blocktarget'=>array('data'=>true,'block'=>true,'cell'
=>true,'edition'=>'Plus'),'bodywidth'=>array('edition'=>'Free'),'borders'=>array('edition'=>'Free'),'cell'=>array('edition'
=>'Pro'),'cellfilter'=>array('edition'=>'Free'),'class'=>array('data'=>true,'edition'=>'Free'),'clear'=>array('edition'=>
'Free'),'cssfile'=>array('edition'=>'Free'),'data'=>array('edition'=>'Pro'),'database'=>array('edition'=>'Pro'),'delim'=>
array('edition'=>'Pro'),'desktop'=>array('edition'=>'Plus'),'driver'=>array('edition'=>'Pro'),'escape'=>array('edition'=>
'Pro'),'format'=>array('edition'=>'Pro'),'headcol'=>array('edition'=>'Free'),'headcols'=>array('edition'=>'Free'),'headrow'
=>array('edition'=>'Free'),'headrows'=>array('edition'=>'Free'),'highlight'=>array('edition'=>'Plus'),'host'=>array('edition'
=>'Pro'),'htmlfix'=>array('edition'=>'Free'),'id'=>array('edition'=>'Free'),'index'=>array('edition'=>'Pro'),'labels'=>array
('edition'=>'Pro'),'link'=>array('data'=>true,'edition'=>'Free'),'lookup'=>array('edition'=>'Pro'),'name'=>array('edition'
=>'Free'),'other'=>array('edition'=>'Pro'),'password'=>array('edition'=>'Pro'),'prefix'=>array('edition'=>'Pro'),'query'=>
array('edition'=>'Pro'),'quote'=>array('edition'=>'Pro'),'rowheight'=>array('edition'=>'Free'),'rtl'=>array('edition'=>'Free'
),'source'=>array('edition'=>'Pro'),'static'=>array('edition'=>'Pro'),'style'=>array('data'=>true,'edition'=>'Free'),'sublink'
=>array('data'=>true,'cell'=>true,'edition'=>'Plus'),'subtarget'=>array('data'=>true,'cell'=>true,'edition'=>'Plus'),'subtext'
=>array('data'=>true,'cell'=>true,'edition'=>'Free'),'target'=>array('data'=>true,'edition'=>'Free'),'tbody'=>array('edition'
=>'Pro'),'text'=>array('data'=>true,'cell'=>true,'edition'=>'Free'),'textlink'=>array('data'=>true,'cell'=>true,'edition'
=>'Plus'),'texttarget'=>array('data'=>true,'cell'=>true,'edition'=>'Plus'),'thead'=>array('edition'=>'Pro'),'user'=>array
('edition'=>'Pro'),'userid'=>array('edition'=>'Pro'),'width'=>array('edition'=>'Free'),'wrapper'=>array('edition'=>'Free'
),);static protected $_commandVerbKeys=array();protected $_debug;protected $_debugText='';protected $_desktopWidth=600;protected
$_headCols;protected $_hacks=array('ie7'=>false,'ie8'=>false,);protected $_headColWidth;protected $_headRows;protected $_htmlFix
=1;protected $_isHeaderCol;protected $_isHeaderRow;protected $_nest;protected $_params;protected $_parent;protected $_profile
=array();protected $_rowCount=array();protected $_rowNumber=array();protected $_rowParity=array();public $versionBase='${pkg.version}'
;protected $_warnLog=array();protected $_wrapper=1;function __construct($parent,$params){if(empty(self::$_commandVerbKeys
)){self::$_commandVerbKeys=array_keys(self::$_commandVerb);}$this->_params=$params;$this->_parent=$parent;}protected function
_appendStyle($style){$style=trim($style);if($style!==''&&substr($style,-1,1)!=';'){$style.=';';}return $style;}protected
function _blockAttributes($blockDictionary){return array('open'=>'','close'=>'');}protected function _blockMerge(&$blockDictionary
,$cell){if(is_array($cell->dictionary)){foreach($cell->dictionary as $command=>$value){if(self::isFlagSet(self::$_commandVerb
,array($command,'block'))){$blockDictionary[$command]=$value;}}}}protected function _buildStripTags($tags,$default=''){if
(is_bool($tags)){return $tags;}$tags=strtolower(trim($tags));if($tags==''){return $default;}if(is_bool($default)){$defaultList
=array();}else{$defaultList=preg_split('/><?/',$default,PREG_SPLIT_NO_EMPTY);}if($tags[0]=='='){$defaultList=preg_split('/ /'
,substr($tags,1),PREG_SPLIT_NO_EMPTY);}else{$elements=preg_split('/ /',$tags,PREG_SPLIT_NO_EMPTY);$deletes=array();foreach
($elements as $element){$mode=0;if($element[0]=='+'){$mode=1;}elseif($element[0]=='-'){$mode=-1;}if($mode){$element=substr
($element,1);}if($mode==1){$defaultList[]=$element;}elseif($mode==-1){$deletes[]=array_diff($defaultList,$elements);}}$defaultList
=array_unique(array_diff($defaultList,$deletes));}return '<'.implode('><',$defaultList).'>';}protected function _cellText
($cell,$item){if(isset($cell->dictionary[$item])){if(is_array($cell->dictionary[$item])){$text=$cell->dictionary[$item]['text'
];}else{$text=$cell->dictionary[$item];}}else{$text='&nbsp;';}if(isset($cell->dictionary['cellfilter'])){$cellFilter=$this
->_buildStripTags($this->booleanFilter($cell->dictionary['cellfilter']),$this->_cellFilter);}else{$cellFilter=$this->_cellFilter
;}if($cellFilter===true){$text=strip_tags($text);}elseif($cellFilter!==false){$text=strip_tags($text,$cellFilter);}return
$text;}protected function _columnLayout($colCount){$availWidth=$this->_hacks['ie7']? 98:100;$widthRounding=$this->_hacks
['ie7']||$this->_hacks['ie8']? 0:2;$fixedCols=array();$flexCols=array();foreach($this->_colWidth as $col=>&$wSpec){if($wSpec
[0]==''){$flexCols[]=$col+1;continue;}if($wSpec[1]==''){$wSpec[1]='%';$flexCols[]=$col+1;}elseif($wSpec[1]=='%'){$flexCols
[]=$col+1;}else{$fixedCols[]=$col+1;}}if(empty($fixedCols)){$allocated=0;$autoCols=array();foreach($this->_colWidth as $col
=>&$wSpec){if($wSpec[0]==''){$autoCols[]=$col;}else{$allocated+=$wSpec[0];}}$autoCount=count($autoCols);if($autoCount&&$allocated
>$availWidth-5*$autoCount){$this->log(sprintf(AstCompat::_('no_col_space'),$autoCount,$allocated));$evenShare=$allocated/
($colCount-$autoCount);}elseif($autoCount!=0){$evenShare=($availWidth-$allocated)/$autoCount;}foreach($autoCols as $col){
$this->_colWidth[$col]=array($evenShare,'%');$allocated+=$evenShare;}$scale=$availWidth/$allocated;$allocated=0;foreach($this
->_colWidth as $col=>&$wSpec){$wSpec[0]=round($scale*$wSpec[0],2);$allocated+=$wSpec[0];}if($allocated>$availWidth){$this
->_colWidth[$this->_headCols][0]-=$allocated-$availWidth;$allocated=$availWidth;}elseif($allocated<$availWidth){$this->_colWidth
[$this->_headCols][0]+=$availWidth-$allocated;$allocated=$availWidth;}}else{if($flexCols){$this->log(sprintf(AstCompat::_
('mixed_col_modes'),implode(', #',$fixedCols),implode(', #',$flexCols)));}}$workWidth=$this->_colWidth;$this->_colWidthPixels
=array();$availWidth=1.0*$this->_desktopWidth;$percentBase=$availWidth/100.0;foreach($workWidth as $col=>$work){if($work[
1]=='%'){$this->_colWidthPixels[$col]=round($work[0]*$percentBase);$availWidth-=$this->_colWidthPixels[$col];unset($workWidth
[$col]);}elseif($work[1]=='px'){$this->_colWidthPixels[$col]=round($work[0]);$availWidth-=$this->_colWidthPixels[$col];unset
($workWidth[$col]);}}if(count($workWidth)){$remainder=floor($availWidth/count($workWidth));foreach($workWidth as $col=>$work
){$this->_colWidthPixels[$col]=$remainder;$availWidth-=$this->_colWidthPixels[$col];}}$this->_colWidthPixels[$col]+=$availWidth
;foreach($this->_colWidth as $col=>&$wSpec){$wSpec=$wSpec[0].$wSpec[1];}}protected function _columnWidthMerge($colCount){
$dataCols=$colCount-$this->_headCols;$this->_colWidth=array_fill(0,$colCount,array('',''));if(count($this->_headColWidth)
==1){for($col=0;$col<$this->_headCols;++$col){$this->_colWidth[$col]=$this->_headColWidth[0];}}else{for($col=0;$col<$this
->_headCols;++$col){if(!isset($this->_headColWidth[$col])){break;}$this->_colWidth[$col]=$this->_headColWidth[$col];}}for
($col=0;$col<$dataCols;++$col){if(!isset($this->_bodyColWidth[$col])){break;}$this->_colWidth[$this->_headCols+$col]=$this
->_bodyColWidth[$col];}}protected function _cssList($list,$useAuto=true){if(!is_array($list)){$list=explode(' ',$list);}$result
=array();foreach($list as $wExpr){if(strtolower($wExpr)=='auto'){$result[]=array('','');}elseif(preg_match('/([0-9]+(?:\.[0-9]*)?)(.*)$/'
,$wExpr,$match)){$result[]=array((float)$match[1],$match[2]);}}return $result;}protected function _generate($ref){$html=''
;try{$this->_parent->addScriptFile($this->_parent->home.'js/supertable'.($ref->highlightColumns ? '':'row').'.js');if(isset
($ref->dictionary['cssfile'])){$cssFile=$ref->dictionary['cssfile'];}else{$cssFile='';switch($this->_params->get('cssMode'
,'none')){case 'custom':{$cssFile=$this->_params->get('customFile','');}break;case 'preset':{$cssFile=$this->_parent->home
.'css/'.$this->_params->get('presetFile','ahs').'/supertable.css';}break;}}if($cssFile!==''){$this->_parent->addCssFile($cssFile
);}$this->_borders=isset($ref->dictionary['borders'])&&self::isTrue($ref->dictionary['borders']);$this->_cellFilter='<a><b><br><em><img><span><strong>'
;if(isset($ref->dictionary['cellfilter'])){$cellFilter=self::booleanFilter($ref->dictionary['cellfilter']);$this->_cellFilter
=$this->_buildStripTags($cellFilter,$this->_cellFilter);}$this->_headRows=isset($ref->dictionary['headrows'])? (int)$ref->
dictionary['headrows']:0;$this->_headCols=0;$this->_headColWidth=array();if(isset($ref->dictionary['headcols'])){$args=explode
(' ',$ref->dictionary['headcols']);$this->_headCols=max((int)array_shift($args),0);if($this->_headCols){$this->_headColWidth
=$this->_cssList($args);}}$this->_htmlFix=isset($ref->dictionary['htmlfix'])? self::isTrue($ref->dictionary['htmlfix']):true
;if(isset($ref->dictionary['bodywidth'])){$this->_bodyColWidth=$this->_cssList($ref->dictionary['bodywidth']);}else{$this
->_bodyColWidth=array();}$this->_wrapper=isset($ref->dictionary['wrapper'])? self::isTrue($ref->dictionary['wrapper']):true
;$this->_activeEnabled=true;$this->_activeIndex=-1;if(isset($ref->dictionary['active'])){$active=$ref->dictionary['active'
];if(in_array($active,array('disable','disabled','off'))){$this->_activeEnabled=false;}else{$this->_activeIndex=(int)$active
;}}$this->_desktopWidth=isset($ref->dictionary['desktop'])? (int)$ref->dictionary['desktop']:600;$cols=count($ref->dataset
);if($cols){$this->_columnWidthMerge($cols);$this->_layoutScan($ref->dataset);$this->_columnLayout($cols);}$this->_nest=0
;if($this->_wrapper){$html.=$this->_tabIn().'<div class="wrapper">'.chr(10);}$html.=$this->_tabIn().'<div'.(isset($ref->dictionary
['id'])? ' id="'.$ref->dictionary['id'].'"':'');$html.=' class="supertable'.($ref->highlightColumns ? ' supertable-colmode'
:' supertable-rowmode').($this->_activeEnabled ? '':' supertable-inactive').($ref->rtl ? ' supertable-rtl':' supertable-ltr'
).(isset($ref->dictionary['class'])? ' '.$ref->dictionary['class']:'').'"';$html.=(isset($ref->dictionary['style'])? ' style="'
.$ref->dictionary['style'].'"':'');$html.=' data-desktop="'.$this->_desktopWidth.'"'.' data-cols="['.implode(',',$this->_colWidthPixels
).']"';$html.='>'.chr(10);if($this->_borders){$html.=$this->_tabIn().'<div class="supertable-border">'.chr(10);}if($ref->
highlightColumns){$html.=$this->_generateCols($ref);}else{$html.=$this->_generateRows($ref);}$html.='<div class="supertable-clear"> </div>'
.chr(10);if($this->_borders){$html.=$this->_tabOut().'</div>'.chr(10);}if($this->_wrapper){$html.=$this->_tabOut().'</div>'
.chr(10);}$html.=$this->_tabOut().'</div>'.chr(10);if(isset($ref->dictionary['clear'])&&$ref->dictionary['clear']){$html.=
'<div class="supertable-clear"> </div>'.chr(10);}$html=preg_replace('!\n\s+\n!',chr(10),$html);}catch(Exception $e){if($this
->_debug){$from=strlen(dirname(dirname(__FILE__)));$this->_debugText.=AstCompat::_('exception_lbl').$e->getMessage().($this
->_debug>2 ? ' '.substr($e->getFile(),$from).':'.$e->getLine():'').chr(10);}}return $html;}protected function _generateCols
($ref){$addResponsive=isset($ref->dictionary['desktop']);$html='';$cols=count($ref->dataset);if($cols){$colData=$ref->dataset
;if($ref->rtl){$colData=array_reverse($colData);}foreach($colData as $col=>$dataRows){if($ref->rtl){$col=$cols-$col-1;}$blockDictionary
=array();foreach($dataRows as $row=>$cell){$this->_blockMerge($blockDictionary,$cell);}$blockAttrs=$this->_blockAttributes
($blockDictionary);$html.=$this->_tabIn().$blockAttrs['open'].'<div class="supertable-col';if($col==0){$html.=' supertable-col-first'
;}if($col==$cols-1){$html.=' supertable-col-last';}if($this->_isHeaderCol[$col]){$html.=' supertable-col-rowhead supertable-col-head-'
.$this->_colNumber[$col];}else{$html.=' supertable-col-'.$this->_colParity[$col].' supertable-col-'.$this->_colNumber[$col
];if($this->_colNumber[$col]==$this->_activeIndex){$html.=' supertable-active';}}$html.='"';$style='';if($addResponsive){
$style.=$this->_appendStyle('min-width:'.$this->_colWidthPixels[$col].'px');}if($this->_colWidth[$col]!=''){$style.=$this
->_appendStyle('width:'.$this->_colWidth[$col]);}if($style){$html.=' style="'.$style.'"';}$html.='>'.chr(10);if($this->_borders
){$html.=$this->_tabIn().'<div class="supertable-col-border">'.chr(10);}$lastRow=count($dataRows)-1;foreach($dataRows as
$row=>$cell){$html.=$this->_tabIn().'<div';if(isset($cell->dictionary['id'])){$html.=' id="'.$cell->dictionary['id'].'"';
}$html.=' class="supertable-cell';if($row==0){$html.=' supertable-row-first';}if($row==$lastRow){$html.=' supertable-row-last'
;}if($this->_isHeaderRow[$row]){$html.=' supertable-row-head';$html.=' supertable-row-head-'.$this->_rowParity[$row];$html
.=' supertable-row-head-'.$this->_rowNumber[$row];}else{$html.=' supertable-row-'.$this->_rowParity[$row];$html.=' supertable-row-'
.$this->_rowNumber[$row];}if(isset($cell->dictionary['class'])){$cellClass=trim($cell->dictionary['class']);if($cellClass
!=''){$html.=' '.$cellClass;}}$html.='"';$cellStyle='';if(isset($cell->dictionary['style'])){$cellStyle.=$this->_appendStyle
($cell->dictionary['style']);}if(isset($ref->dictionary['rowheight'])){$setting='auto';$vals=&$ref->dictionary['rowheight'
];if(isset($vals[$row+1])){$setting=$vals[$row+1];}elseif(isset($vals['*'])){$setting=$vals['*'];}if($setting!='auto'){$cellStyle
.=$this->_appendStyle(' height:'.$setting);}}if(trim($cellStyle)!=''){$html.=' style="'.trim($cellStyle).'"';}$html.='>'.
chr(10);$html.=$this->_innerCell($cell,$blockAttrs);$html.=$this->_tabOut().'</div>'.chr(10);}if($this->_borders){$html.=
$this->_tabOut().'</div>'.chr(10);}$html.=$this->_tabOut().'</div>'.$blockAttrs['close'].chr(10);}}return $html;}abstract
protected function _generateRows($ref);protected function _innerCell($cell,$blockAttrs){foreach(array_keys($cell->dictionary
)as $command){if(isset(self::$_commandVerb[$command])){if(self::$_commandVerb[$command]['edition']!='Free'){$this->log(sprintf
(AstCompat::_('command_not_implemented'),$command,self::$_commandVerb[$command]['edition']),array('warnlog'=>$command));}
}else{$this->log(sprintf(AstCompat::_('command_not_valid'),$command),array('warnlog'=>$command));}}$html=$this->_tabIn().
'<div class="supertable-cell-inner">'.chr(10);if(isset($cell->dictionary['link'])){$linkPre='<a href="'.$cell->dictionary
['link'].'"';if(isset($cell->dictionary['target'])){$linkPre.=' target="'.$cell->dictionary['target'].'"';}$linkPre.='>';
$linkPost='</a>';}else{$linkPre='';$linkPost='';}$html.=$this->_tab().'<div class="supertable-cell-text">'.$linkPre.$this
->_cellText($cell,'text').$linkPost.'</div>'.chr(10);if(isset($cell->dictionary['subtext'])){$html.=$this->_tab().'<div class="supertable-cell-subtext">'
.$linkPre.$this->_cellText($cell,'subtext').$linkPost.'</div>'.chr(10);}$html.=$this->_tabOut().'</div>'.chr(10);return $html
;}protected function _layoutScan($colData){$this->_isHeaderCol=array();if($this->_headRows){$this->_isHeaderRow=array_fill
(0,$this->_headRows,true);}else{$this->_isHeaderRow=array();}foreach($colData as $col=>$dataRows){$this->_isHeaderCol[$col
]=$col<$this->_headCols;foreach($dataRows as $row=>$cell){if(!isset($this->_isHeaderRow[$row])){$this->_isHeaderRow[$row]
=false;}if(!is_array($cell->dictionary)){continue;}foreach($cell->dictionary as $command=>$value){switch($command){case 'headcol'
:{$this->_isHeaderCol[$col]=true;}break;case 'headrow':{$this->_isHeaderRow[$row]=true;}break;case 'width':{$list=$this->
_cssList($value);if(isset($list[0])){$this->_colWidth[$col]=$list[0];}}break;}}}}$this->_colNumber=array();$this->_colParity
=array();$this->_colCount=array(0,0);$parity=array(0,0);foreach($this->_isHeaderCol as $col=>$isHeader){if($isHeader){$this
->_colNumber[$col]=++$this->_colCount[self::PHASE_HEADER];$this->_colParity[$col]=++$parity[self::PHASE_HEADER]&1 ? 'odd'
:'even';$parity[self::PHASE_DATA]=0;}else{$this->_colNumber[$col]=++$this->_colCount[self::PHASE_DATA];$this->_colParity[
$col]=++$parity[self::PHASE_DATA]&1 ? 'odd':'even';$parity[self::PHASE_HEADER]=0;}}$this->_rowNumber=array();$this->_rowParity
=array();$this->_rowCount=array(0,0);$parity=array(0,0);foreach($this->_isHeaderRow as $row=>$isHeader){if($isHeader){$this
->_rowNumber[$row]=++$this->_rowCount[self::PHASE_HEADER];$this->_rowParity[$row]=++$parity[self::PHASE_HEADER]&1 ? 'odd'
:'even';$parity[self::PHASE_DATA]=0;}else{$this->_rowNumber[$row]=++$this->_rowCount[self::PHASE_DATA];$this->_rowParity[
$row]=++$parity[self::PHASE_DATA]&1 ? 'odd':'even';$parity[self::PHASE_HEADER]=0;}}}protected function _messageFilter($ref
){$level=$this->_parent->getDebugLevel();foreach($ref->messages as $msg){if($msg[0]==AstCall::DEBUG_ERROR){$this->log('Error: '
.$msg[1]);}elseif($msg[0]<=$level){$this->log($msg[1]);}}}protected function _tab(){return str_repeat('  ',$this->_nest);
}protected function _tabIn(){$tab=$this->_tab();$this->_nest++;return $tab;}protected function _tabOut(){if(--$this->_nest
<0){$this->_nest=0;}return $this->_tab();}static function booleanFilter($value){if(in_array(strtolower(trim($value)),array
('1','y','yes','on','t','true'))){return true;}if(in_array(strtolower(trim($value)),array('0','n','no','off','f','false')
)){return false;}return $value;}static function getDataCommands(){$dataCommands=array();foreach(self::$_commandVerb as $command
=>$info){if(isset($info['data'])&&$info['data']){$dataCommands[$command]=$info;}}return $dataCommands;}function getDebugText
(){return $this->_debugText;}function getPatternRefs($trigger,$text){$commandRegex=AstHost::getRegex('patternRef',$trigger
);$endRegex=AstHost::getRegex('patternRefEnd',$trigger);preg_match_all($commandRegex,$text,$patternMatches,PREG_SET_ORDER
|PREG_OFFSET_CAPTURE);$refs=array();if(empty($patternMatches)){return $refs;}$endLimit=strlen($text);$patternMatches=array_reverse
($patternMatches);foreach($patternMatches as $posn=>&$patternMatch){if(!preg_match($endRegex,$text,$endMatch,PREG_OFFSET_CAPTURE
,$patternMatch[0][1])){$endLimit=$patternMatches[$posn];continue;}if($endMatch[0][self::REGEX_OFFSET]>$endLimit){$endLimit
=$patternMatches[$posn];continue;}$bodyStart=$patternMatch[0][self::REGEX_OFFSET]+strlen($patternMatch[0][self::REGEX_DATA
]);$body=substr($text,$bodyStart,$endMatch[0][self::REGEX_OFFSET]-$bodyStart);$ref=null;if(!isset($patternMatch['command'
])){$this->log(AstCompat::_('table_type_missing'));$command='table';}else{$command=strtolower($patternMatch['command'][self
::REGEX_DATA]);}$astClass='AstCall'.ucfirst($command);@include_once($astClass.'.php');if(class_exists($astClass)){$ref=new
$astClass($trigger,$command,$this->_params);$ref->parse($patternMatch,$body);$ref->offset=$patternMatch[0][self::REGEX_OFFSET
];$ref->size=$endMatch[0][self::REGEX_OFFSET]+strlen($endMatch[0][self::REGEX_DATA])-$ref->offset;}elseif(!isset(self::$_commandVerb
[$command])){$this->log(sprintf(AstCompat::_('table_type_bad'),$command));$ref=null;}if($ref){$this->_messageFilter($ref)
;if(!$ref->valid){$endLimit=$patternMatches[$posn];continue;}}else{$endLimit=$patternMatches[$posn];continue;}$refs[]=$ref
;}return $refs;}static function isCommand($token){$token=explode('.',$token);$symbol=$token[0];if(substr($symbol,-1)=='/'
){$symbol=substr($symbol,0,-1);}return isset(self::$_commandVerb[$symbol])? self::$_commandVerb[$symbol]:false;}static function
isFlagSet($nestArray,$keys){if(!is_array($keys)){$keys=(array) $keys;}$lookIn=$nestArray;while(!empty($keys)){$key=array_shift
($keys);if(isset($lookIn[$key])){if(empty($keys)){return $lookIn[$key];}$lookIn=$lookIn[$key];}else{return false;}}return
false;}static function isTrue($value){return in_array(strtolower(trim($value)),array('1','y','yes','on','t','true'));}function
log($message,$options=array()){if(isset($options['warnlog'])&&$options['warnlog']!==null){if(isset($this->_warnLog[$options
['warnlog']])){return;}$this->_warnLog[$options['warnlog']]=true;}$this->_parent->messages[]=$message;}function process($triggers
,$text){$markIn=chr(10).'<!-- '.$this->_parent->name.' '.$this->_parent->version.' support: http://www.abivia.net -->'.chr
(10);$markOut='<!-- '.$this->_parent->name.' end -->'.chr(10);$this->_profile[-1]=array('start'=>microtime(true));$this->
_debugText='';$result=new stdClass();$result->injected=false;$refs=$this->getPatternRefs($triggers['article'],$text);$this
->_profile[-1]['exec']=microtime(true);if($this->_debug>=2){$this->_debugText.=count($refs).' supertable references found.'
.chr(10);}$result->astData=$refs;foreach($refs as $key=>$ref){$this->_profile[$key]=array('start'=>microtime(true));$offset
=$ref->offset;if($this->_debug){$this->_debugText.='Ref at offset '.$offset.chr(10);}$size=$ref->size;if($this->_debug>=AstCall
::DEBUG_VERBOSE){$this->_debugText.=AstCall::dump($ref);}if($ref->valid){$ref->execute();}$this->_profile[$key]['exec']=microtime
(true);if($ref->valid){$html=$this->_generate($ref);$result->injected=true;$this->_profile[$key]['gen']=microtime(true);$startPoint
=$offset;$endPoint=$offset+$size;if($this->_htmlFix){$preTags=AbiviaHtml::htmlExtractTags(substr($text,0,$startPoint));$postTags
=AbiviaHtml::htmlExtractTags(substr($text,$endPoint));list($startPoint,$preRepair)=AbiviaHtml::htmlRepair($preTags,false,
$text,$startPoint);list($endPoint,$postRepair)=AbiviaHtml::htmlRepair($postTags,true,$text,$endPoint);$html=$preRepair.$markIn
.$html.$markOut.$postRepair;$size=$endPoint-$startPoint;}else{$html=$markIn.$html.$markOut;}}else{$this->_profile[$key]['gen'
]=microtime(true);$html=$markIn.'<!-- call not valid, see debug info -->'.$markOut;}$this->_messageFilter($ref);if($this->
_debug){$this->_debugText.='Unwrap:'.' offset '.$ref->offset.'=>'.$startPoint.' size:'.$ref->size.'=>'.$size.chr(10);}$text
=substr_replace($text,$html,$startPoint,$size);}$this->_profile[-1]['gen']=microtime(true);if($this->_debug){foreach($this
->_profile as $key=>$timing){$this->_debugText.=($key==-1 ? 'all  ':'ref '.$key).' exec '.sprintf('%.5f',$timing['exec']-
$timing['start']).' gen '.sprintf('%.5f',$timing['gen']-$timing['exec']).' tot '.sprintf('%.5f',$timing['gen']-$timing['start'
]).chr(10);}}$result->debugText=$this->_debugText ? '<!-- supertable debug output'.chr(10).preg_replace(array('/\-\-+/',AstHost
::getRegex('passwordMask')),array('-',AstHost::getRegex('passwordMask')),$this->_debugText).chr(10).'end supertable debug output -->'
.chr(10):'';$result->text=$text;return $result;}function setDebug($level){$this->_debug=$level;}function setHack($hack,$value
){$this->_hacks[$hack]=$value;}}
