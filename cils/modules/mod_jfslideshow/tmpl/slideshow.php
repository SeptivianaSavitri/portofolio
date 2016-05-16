<?php
/*------------------------------------------------------------------------
# mod_jfslideshow
# ------------------------------------------------------------------------
# author    Kreatif Multimedia GmbH
# copyright Copyright (C) 2013 kreatif-multimedia.com. All Rights Reserved.
# @license - http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
# Websites: http://www.joomfreak.com
# Technical Support:  Forum - http://www.joomfreak.com/forum.html
-------------------------------------------------------------------------*/
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

$siteUrl = JURI::root();
$assetsPath = 'modules/mod_jfslideshow/assets/';

$document = JFactory::getDocument();

//$document->addScript($siteUrl.$assetsPath.'js/jquery.min.js');
//$document->addScriptDeclaration('jQuery.noConflict();');
$document->addScript($siteUrl.$assetsPath . 'skitter/js/skitter.min.jquery.js');
$document->addScript($siteUrl.$assetsPath . 'js/jquery.easing.min.js');
$document->addScript($siteUrl.$assetsPath . 'skitter/js/animate-colors-min.jquery.js');

$document->addStyleSheet($siteUrl.$assetsPath . "skitter/css/skitter.styles.css");
$document->addStyleSheet($siteUrl.$assetsPath.'css/slideshow.css');

$name = 'slideoption';

$slide_interval 	= $params->get($name .'_slide_interval', '3000');
$transition2		= $params->get($name .'_transition2', 'random');
$transition_speed	= $params->get($name .'_transition_speed', '1000');		
$performance		= $params->get($name .'_performance', '3');
$navigation			= $params->get($name .'_navigation', '1');
$slidecaption		= $params->get($name .'_slidecaption', '1');
$maxheight			= $params->get($name .'_maxheight', '300');
$maxheight = $maxheight == 'auto' ? '100%' : $maxheight.'px';

$arrow				= $params->get($name .'_arrow', '1');
$textresponsive		= $params->get($name .'_textresponsive', '0');
if($textresponsive){
	$document->addStyleSheet($siteUrl.$assetsPath.'css/responsivetext.css');
}


$css = "#mod_jfslideshow_wrapper{
	max-height: {$maxheight} !important;
}";
$document->addStyleDeclaration($css);

?>

<div style="clear: both;"></div>
<div id="mod_jfslideshow_wrapper">
	<div id="mod_jfslideshow" class="box_skitter mod_jfslideshow">
	    <ul>
	        <?php        
	        $checkImageSize = 0;
	        
	        for ($i = 1; $i <= $maxSlide; $i++){            
	            // slogan
				$image				= '';
				$slogan				= '';
				$font				= '';		
				$size				= '';
				$color				= '';
				$sloganshadow		= '';
				$link				= '';
				$linkurl			= '';
				$des				= '';
				$desfont			= '';
				$descolor			= '';
				$desbgcolor			= '';
				$deswidth			= '';
				$desradius			= '';
				$desshadow			= '';
				$linkbg				= '';
				$linkbgcolor		= '';
				$linkcolorhover		= '';
				$linkcolornormal	= '';
				
				$image				= $params->get($name .'_image'.$i, ''); 
				$slogan				= $params->get($name .'_slogan'.$i, '');
				if($slogan){
					$font				= jfLoadfont( $params->get($name .'_font'.$i, 'none') );		
				}
				$size				= $params->get($name .'_size'.$i, '18');
				$color				= $params->get($name .'_color'.$i, '18'); 
				$sloganshadow		= $params->get($name .'_sloganshadow'.$i, '1'); 
				$link				= $params->get($name .'_link'.$i, '0'); 
				$linkurl			= $params->get($name .'_linkurl'.$i, '');
				
				// description
				$des				= $params->get($name .'_des'.$i, ''); 
				if($des){
					$desfont			= jfLoadfont( $params->get($name .'_desfont'.$i, 'none') ); 
				}
				$descsize			= $params->get($name .'_descsize'.$i, '12');
				$descolor			= $params->get($name .'_descolor'.$i, '');
				$desbgcolor			= $params->get($name .'_desbgcolor'.$i, '');
				$deswidth			= $params->get($name .'_deswidth'.$i, '300');
				$desradius			= $params->get($name .'_desradius'.$i, '0'); 
				$desshadow			= $params->get($name .'_desshadow'.$i, '0'); 
				
				
				// link in description
				$linkbg				= $params->get($name .'_linkbg'.$i, '0'); 
				$linkbgcolor		= $params->get($name .'_linkbgcolor'.$i, ''); 
				$linkcolorhover		= $params->get($name .'_linkcolorhover'.$i, ''); 
				$linkcolornormal	= $params->get($name .'_linkcolornormal'.$i, ''); 
				
				if($image == '' && $slogan == '' && $des == '') continue;
				
				if($image == ''){ 
					$image = $siteUrl . $assetsPath . 'img/blank.jpg';
					$jfwidth = '1400';
					$jfheight = '562';
				}else{
					if(!$checkImageSize){
						$checkImageSize = 1;
						@list($jfwidth, $jfheight, $type, $attr) = getimagesize($image);						
					}
				}
				
				$img = '<a href="#'.$transition2.'"><img class="'.$transition2.'" src="' . $image . '" /></a>';
				
				if($slogan != ''){
					
					$sloganshadow = $sloganshadow ? 'text-shadow' : ''; 
					if($color != '') $color = "color:$color;";
					if($link && $linkurl != ''){
						$link = true;				
					}
					
					$title = '<h2 style="font-size:'.$size.'px; line-height:'.$size.'px; '.$color.'" class="'.$font .' ' . $sloganshadow .' slideSloganText">';
					if($link) $title .= "<a href='$linkurl' style='$color'>";
					$title .= JText::_($slogan, true);
					if($link) $title .= "</a>";
					$title .= "</h2>";
				}else{
					$title = '';
				}
				
				if($des != ''){			
												
					if($descolor != '') $descolor = "color:$descolor;";
					if($desbgcolor != '') {
						$desbgcolor = "background-color:$desbgcolor;";
						$desshadow = $desshadow ? 'box-shadow' : ''; 
					}else{
						$desshadow = ''; 
					}
					if($deswidth == '') {
						$deswidth = 300;
					}
					$deswidth = "width:".$deswidth."px;";
					
					if($desradius != '') $desradius = "-moz-border-radius: ".$desradius."px; border-radius: ".$desradius."px;";
					
					$randomCssClass = rand_string(9);
					$styleHtml = "";
					$styleHtml .= ".$randomCssClass a:link, .$randomCssClass a:visited{";
					if($linkbg) $styleHtml .= "background-color:$linkbgcolor;";
					if($linkcolornormal) $styleHtml .= "color:$linkcolornormal !important";
					$styleHtml .= "}";
					$styleHtml .= ".$randomCssClass a:hover{";
					if($linkcolorhover) $styleHtml .= "color:$linkcolorhover !important";
					$styleHtml .= "}";
					
					$styleHtml .= ".$randomCssClass{ $descolor $desbgcolor $deswidth $desradius font-size:{$descsize}px; line-height:".($descsize+3)."px}";
					
					$document->addStyleDeclaration($styleHtml);
					$description = '';
					$description = "<div class='slidedescription $desfont $desshadow $randomCssClass'>";
					$description .= $des;
					$description .= "</div>";
				}else{
					$description = ' ';			
				}
		
						
				$image 			= JText::_($image, true);			
				//$description	= JText::_($description, true);
	            
	            ?>
	            <li>
	                <?php echo $img; ?>
	                <div class="label_text">
	                    <div class="label_skitter_container">
	                    	<?php echo $title;?>
	                        <?php echo $description; ?>
	                    </div>
	                </div>
	            </li>
	            <?php
	        }
	        ?>
	    </ul>
	</div>
	
	<a href="#" class="jfprev_button prevsldide<?php echo $arrow;?>">prev</a>
	<a href="#" class="jfnext_button nextslide<?php echo $arrow;?>">next</a>
	<div class="jflabel_skitter"></div>
	<div style="clear: both;"></div>
</div>
<div style="clear: both;"></div>
<script type="text/javascript">	
	var structure = '' +
		'<div class="container_skitter">' +
		'<div class="image">' +
		'<a target="_blank" href=""><img class="image_main" alt=""/></a>' +		
		'</div>' +		
		'</div>' +
		'';
	jQuery('#mod_jfslideshow').css({'height':<?php echo $jfheight;?>, 'width':<?php echo $jfwidth;?>});
	jQuery('#mod_jfslideshow').skitter({
		
		animation: '<?php echo $transition2;?>',		
		numbers: false,		
		structure: structure,
		velocity: 1.3,
		interval: <?php echo $slide_interval ? $slide_interval : 2000;?>,
		navigation: <?php echo $navigation;?>,
		auto_play: 1,
		responsive: true
	 });
</script>