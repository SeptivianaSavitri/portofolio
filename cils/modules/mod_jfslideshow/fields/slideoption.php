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
JHTML::_('behavior.calendar');
class JFormFieldSlideoption extends JFormField
{	
	public $type = 'Slideoption';
	public $_maxslide = 10;

	function getInput()
	{
		return $this->fetchElement($this->element['name'], $this->value, $this->element, $this->name);
	}

	function fetchElement($name, $value, &$node, $control_name)
	{
		
		$data = $this->form->getValue('params');
		$moduleParams = new JRegistry($data);
		
		// slideshow global
		$slidetype 			= $moduleParams->get($name .'_slidetype', '1'); // 0: bg, 1:skitter responsive
		$slide_interval 	= $moduleParams->get($name .'_slide_interval', '3000');
		$transition			= $moduleParams->get($name .'_transition', '1');		
		$transition2		= $moduleParams->get($name .'_transition2', 'random');		
		$transition_speed	= $moduleParams->get($name .'_transition_speed', '1000');		
		$performance		= $moduleParams->get($name .'_performance', '3');
		$navigation			= $moduleParams->get($name .'_navigation', '1');
		$arrow				= $moduleParams->get($name .'_arrow', '1');
		$slidecaption		= $moduleParams->get($name .'_slidecaption', '1');
		$maxheight			= $moduleParams->get($name .'_maxheight', '300');
		$textResponsive		= $moduleParams->get($name .'_textresponsive', '0');
		$fontPreview		= "onchange=fontpreview(this); class='fontpre'";
		
		// performance option
		//0-Normal, 1-Hybrid speed/quality, 2-Optimizes image quality, 3-Optimizes transition speed
		$performance_options = array(
		  JHTML::_('select.option', '0', JText::_('Normal') ),
		  JHTML::_('select.option', '1', JText::_('Hybrid speed/quality') ),
		  JHTML::_('select.option', '2', JText::_('Optimizes image quality') ),
		  JHTML::_('select.option', '3', JText::_('Optimizes transition speed') )
		);
		
		// arrow style option		
		$arrow_options = array(
		  JHTML::_('select.option', '1', JText::_('Style 1') ),
		  JHTML::_('select.option', '2', JText::_('Style 2') ),
		  JHTML::_('select.option', '3', JText::_('Style 3') ),
		  JHTML::_('select.option', '4', JText::_('Style 4') ),
		  JHTML::_('select.option', '5', JText::_('Style 5') ),
		  JHTML::_('select.option', '6', JText::_('Style 6') ),
		  JHTML::_('select.option', '7', JText::_('Style 7') )		  
		);
		
		// transition option
		// 0-None, 1-Fade, 2-Slide Top, 3-Slide Right, 4-Slide Bottom, 5-Slide Left, 6-Carousel Right, 7-Carousel Left
		$transition_options = array(
			JHTML::_('select.option', '0', JText::_('None') ),
			JHTML::_('select.option', '8', JText::_('Random') ),
			JHTML::_('select.option', '1', JText::_('Fade') ),
			JHTML::_('select.option', '2', JText::_('Slide Top') ),
			JHTML::_('select.option', '3', JText::_('Slide Right') ),
			JHTML::_('select.option', '4', JText::_('Slide Bottom') ),
			JHTML::_('select.option', '5', JText::_('Slide Left') ),
			JHTML::_('select.option', '6', JText::_('Carousel Right') ),
			JHTML::_('select.option', '7', JText::_('Carousel Left') )
		);
		
		$transition2_options = array(		
			JHTML::_('select.option', 'cube', JText::_('cube') ),
			JHTML::_('select.option', 'block', JText::_('block') ),
			JHTML::_('select.option', 'cubeStop', JText::_('cubeStop') ),
			JHTML::_('select.option', 'cubeHide', JText::_('cubeHide') ),
			JHTML::_('select.option', 'cubeShow', JText::_('cubeShow') ),
			JHTML::_('select.option', 'cubeSize', JText::_('cubeSize') ),
			JHTML::_('select.option', 'cubeJelly', JText::_('cubeJelly') ),
			JHTML::_('select.option', 'horizontal', JText::_('horizontal') ),
			JHTML::_('select.option', 'showBars', JText::_('showBars') ),
			JHTML::_('select.option', 'tube', JText::_('tube') ),
			JHTML::_('select.option', 'blind', JText::_('blind') ),
			JHTML::_('select.option', 'blindHeight', JText::_('blindHeight') ),
			JHTML::_('select.option', 'blindWidth', JText::_('blindWidth') ),
			JHTML::_('select.option', 'directionTop', JText::_('directionTop') ),
			JHTML::_('select.option', 'directionBottom', JText::_('directionBottom') ),
			JHTML::_('select.option', 'directionRight', JText::_('directionRight') ),
			JHTML::_('select.option', 'directionLeft', JText::_('directionLeft') ),
			JHTML::_('select.option', 'upBars', JText::_('upBars') ),
			JHTML::_('select.option', 'downBars', JText::_('downBars') ),
			JHTML::_('select.option', 'hideBars', JText::_('hideBars') ),
			JHTML::_('select.option', 'swapBars', JText::_('swapBars') ),
			JHTML::_('select.option', 'swapBarsBack', JText::_('swapBarsBack') ),
			JHTML::_('select.option', 'random', JText::_('random') ),
			JHTML::_('select.option', 'randomSmart', JText::_('randomSmart') )
		);
		
		$yesnoOptions =	array(
			JHTML::_('select.option', '0', JText::_('No') ),
			JHTML::_('select.option', '1', JText::_('Yes') )
			);
			
		$slideOptions =	array(
			JHTML::_('select.option', '0', JText::_('Background Supersized') ),
			JHTML::_('select.option', '1', JText::_('Responsive') )
			);
			
		$fontOptions =	array(
			JHTML::_('select.option', 'none', 'Default' ),
			JHTML::_('select.option', 'opensans', 'Open Sans' ),
			JHTML::_('select.option', 'overlock', 'Overlock' ),
			JHTML::_('select.option', 'poiretone', 'Poiret One' ),
			JHTML::_('select.option', 'flamenco', 'Flamenco' ),
			JHTML::_('select.option', 'comfortaa', 'Comfortaa' ),
			JHTML::_('select.option', 'concertone', 'Concert One' ),			
			JHTML::_('select.option', 'anticslab', 'Antic Slab' ),
			JHTML::_('select.option', 'berkshireswash', 'Berkshire Swash' ),
			JHTML::_('select.option', 'eaglelake', 'Eagle+Lake' ),
			JHTML::_('select.option', 'economica', 'Economica' ),
			JHTML::_('select.option', 'ewert', 'Ewert' ),
			JHTML::_('select.option', 'kaushanscript', 'Kaushan Script' ),
			JHTML::_('select.option', 'londrinasketch', 'Londrina Sketch' ),
			JHTML::_('select.option', 'kronaone', 'Krona One' ),
			JHTML::_('select.option', 'loversquarrel', 'Lovers Quarrel' ),
			JHTML::_('select.option', 'oswald', 'Oswald' ),
			JHTML::_('select.option', 'rocksalt', 'Rock Salt' ),
			JHTML::_('select.option', 'syncopate', 'Syncopate' ),
			JHTML::_('select.option', 'russoone', 'Russo One' ),
			JHTML::_('select.option', 'ubuntu', 'Ubuntu' ),
			JHTML::_('select.option', 'amaticsc', 'Amatic+SC' ),
			JHTML::_('select.option', 'yellowtail', 'Yellowtail' )
			);
		
		$url = JUri::root();
		
		$assetsPath = 'modules/mod_jfslideshow/assets/';
		$moorainbowPath = $assetsPath.'moorainbow/';
		
		
		$doc = JFactory::getDocument();
		$doc->addStyleSheet('http://fonts.googleapis.com/css?family=Open+Sans');
		$doc->addStyleSheet('http://fonts.googleapis.com/css?family=Overlock');
		$doc->addStyleSheet('http://fonts.googleapis.com/css?family=Poiret+One');
		$doc->addStyleSheet('http://fonts.googleapis.com/css?family=Flamenco');
		$doc->addStyleSheet('http://fonts.googleapis.com/css?family=Comfortaa');
		$doc->addStyleSheet('http://fonts.googleapis.com/css?family=Concert+One');
		$doc->addStyleSheet('http://fonts.googleapis.com/css?family=Antic+Slab');
		$doc->addStyleSheet('http://fonts.googleapis.com/css?family=Berkshire+Swash');
		$doc->addStyleSheet('http://fonts.googleapis.com/css?family=Eagle+Lake');
		$doc->addStyleSheet('http://fonts.googleapis.com/css?family=Economica');
		$doc->addStyleSheet('http://fonts.googleapis.com/css?family=Ewert');
		$doc->addStyleSheet('http://fonts.googleapis.com/css?family=Kaushan+Script');
		$doc->addStyleSheet('http://fonts.googleapis.com/css?family=Londrina+Sketch');
		$doc->addStyleSheet('http://fonts.googleapis.com/css?family=Krona+One');
		$doc->addStyleSheet('http://fonts.googleapis.com/css?family=Lovers+Quarrel');
		$doc->addStyleSheet('http://fonts.googleapis.com/css?family=Rock+Salt');
		$doc->addStyleSheet('http://fonts.googleapis.com/css?family=Syncopate');
		$doc->addStyleSheet('http://fonts.googleapis.com/css?family=Ubuntu');
		$doc->addStyleSheet('http://fonts.googleapis.com/css?family=Oswald');
		$doc->addStyleSheet('http://fonts.googleapis.com/css?family=Russo+One');
		$doc->addStyleSheet('http://fonts.googleapis.com/css?family=Amatic+SC');
		$doc->addStyleSheet('http://fonts.googleapis.com/css?family=Yellowtail');
		
		
		ob_start();
        $img 	= $url . $moorainbowPath . "images/rainbow.png";
        $imgx 	= $url . $moorainbowPath . "images/";
        // make sure we add js and css one time [static $embedded]
        static $embedded;
        if(!$embedded)
        {
        	//$doc->addScript($url.$assetsPath.'js/jquery.min.js');
			$doc->addScript($url.$assetsPath.'js/admin.js');
			$doc->addScript($url.$moorainbowPath.'mooRainbow.js');
            $doc->addStyleSheet($url.$moorainbowPath.'mooRainbow.css');
            $doc->addStyleSheet($url.$assetsPath.'css/admin.css');
            $embedded=true;
		
        ?>
		<script>
		window.addEvent('domready',function(){
			//return;
	        jQuery('.rainbowbtn').each(function(){
			var item = jQuery(this).prev();
			
	        item.color = new MooRainbow(this.id, {
	                    id: this.id,						
						onChange: function(color) {
							jQuery(item).val(color.hex);							
						},						
						onComplete: function(color) {
							jQuery(item).val(color.hex);							
						},
	                    imgPath: '<?php echo $imgx;?>'
	                });
	
	                });
	         });
            </script>
        <?php      
        }
        ?>
        <hr id="slideshowoption">
        <p>		
			<label for="jformparams<?php echo $name;?>_slidetype" class="jflabel hasTip" title="<?php echo JText::_('JFSS_SLIDETYPE');?>">
				Slide Type
			</label>
			<?php
			echo JHTML::_('select.genericlist', $slideOptions, 'jform[params]['.$name.'_slidetype]', null, 'value', 'text', $slidetype);
			?>
		</p> 
        <p>		
			<label for="jformparams<?php echo $name;?>_navigation" class="jflabel hasTip" title="<?php echo JText::_('JFSS_ARROWNAVIGATION');?>">
				Arrow Navigation
			</label>
			<?php
			echo JHTML::_('select.genericlist', $yesnoOptions, 'jform[params]['.$name.'_navigation]', null, 'value', 'text', $navigation);
			?>			
		</p>
		<p>		
			<label for="jformparams<?php echo $name;?>_arrow" class="jflabel hasTip" title="<?php echo JText::_('JFSS_ARROWSTYLE');?>">
				Arrow Style
			</label>
			<?php
			echo JHTML::_('select.genericlist', $arrow_options, 'jform[params]['.$name.'_arrow]', null, 'value', 'text', $arrow);
			?>
			<img src="<?php echo $url.$assetsPath;?>img/arrows/next<?php echo $arrow;?>.png" width="20px" align="absmiddle" style="margin-top:-15px;">
			<input type="hidden" id="assetsPath" name="assetsPath" value="<?php echo $url.$assetsPath;?>">
		</p>
		<p>		
			<label for="jformparams<?php echo $name;?>_textresponsive" class="jflabel hasTip" title="<?php echo JText::_('JFSS_TEXTRESPONSIVE');?>">
				Text Responsive
			</label>
			<?php
			echo JHTML::_('select.genericlist', $yesnoOptions, 'jform[params]['.$name.'_textresponsive]', null, 'value', 'text', $textResponsive);
			?>			
		</p>
		<p>		
			<label for="jformparams<?php echo $name;?>_slide_interval" class="jflabel hasTip" title="<?php echo JText::_('JFSS_TRANSITIONDELAY');?>">
				Slide interval
			</label>
			<input type="text" class="text_area" value="<?php echo $slide_interval;?>" id="params<?php echo $name;?>_slide_interval" name="jform[params][<?php echo $name;?>_slide_interval]">			
		</p>
		<div id="bgssoption">			
			<p>
				<label for="jformparams<?php echo $name;?>_transition" class="jflabel hasTip" title="<?php echo JText::_('JFSS_TRANSITION');?>">
					Transition
				</label>
				<?php
				echo JHTML::_('select.genericlist', $transition_options, 'jform[params]['.$name.'_transition]', null, 'value', 'text', $transition);
				?>		
			</p>
			<p>
				<label for="jformparams<?php echo $name;?>_transition_speed" class="jflabel hasTip" title="<?php echo JText::_('JFSS_TRANSITIOSPEED');?>">
					Transition speed
				</label>
				<input type="text" class="text_area" value="<?php echo $transition_speed;?>" id="params<?php echo $name;?>_transition_speed" name="jform[params][<?php echo $name;?>_transition_speed]">			
			</p>
			<p>
				<label for="jformparams<?php echo $name;?>_performance" class="jflabel hasTip" title="<?php echo JText::_('JFSS_PERFORMANCE');?>">
					Performance
				</label>
				<?php
				echo JHTML::_('select.genericlist', $performance_options, 'jform[params]['.$name.'_performance]', null, 'value', 'text', $performance);
				?>
			</p>
			<p>		
				<label for="jformparams<?php echo $name;?>_slidecaption" class="jflabel hasTip" title="<?php echo JText::_('JFSS_SCAPTIONS');?>">
					Slide captions
				</label>
				<?php
				echo JHTML::_('select.genericlist', $yesnoOptions, 'jform[params]['.$name.'_slidecaption]', null, 'value', 'text', $slidecaption);
				?>			
			</p>
		</div>
		<div id="ssoption">
			<p>
				<label for="jformparams<?php echo $name;?>_transition" class="jflabel hasTip" title="<?php echo JText::_('JFSS_TRANSITION');?>">
					Transition
				</label>
				<?php
				
				echo JHTML::_('select.genericlist', $transition2_options, 'jform[params]['.$name.'_transition2]', null, 'value', 'text', $transition2);
				?>
			</p>
			<p>
				<label for="jformparams<?php echo $name;?>_maxheight" class="jflabel hasTip" title="<?php echo JText::_('JFSS_SMHEIGHT');?>">
					Slide max height
				</label>
				<input type="text" class="text_area" value="<?php echo $maxheight;?>" id="params<?php echo $name;?>_maxheight" name="jform[params][<?php echo $name;?>_maxheight]">			
			</p>
		</div>
		<?php
		// slide config
		for ($i = 1; $i <= $this->_maxslide; $i++){
			// slogan
			$image1				= $moduleParams->get($name .'_image'.$i, ''); 
			$slogan1			= $moduleParams->get($name .'_slogan'.$i, ''); 
			$font1				= $moduleParams->get($name .'_font'.$i, 'none'); 
			$color1				= $moduleParams->get($name .'_color'.$i, ''); 
			$size1				= $moduleParams->get($name .'_size'.$i, '18'); 
			$sloganshadow1		= $moduleParams->get($name .'_sloganshadow'.$i, '1'); 
			$link1				= $moduleParams->get($name .'_link'.$i, '0'); 
			$linkurl1			= $moduleParams->get($name .'_linkurl'.$i, '');
			
			// description
			$des1				= $moduleParams->get($name .'_des'.$i, ''); 
			$desfont1			= $moduleParams->get($name .'_desfont'.$i, 'none'); 
			$descsize1			= $moduleParams->get($name .'_descsize'.$i, 12); 
			$descolor1			= $moduleParams->get($name .'_descolor'.$i, '');
			$desbgcolor1		= $moduleParams->get($name .'_desbgcolor'.$i, '');
			$deswidth1			= $moduleParams->get($name .'_deswidth'.$i, '300');
			$desradius1			= $moduleParams->get($name .'_desradius'.$i, '0'); 
			$desshadow1			= $moduleParams->get($name .'_desshadow'.$i, '0'); 
			
			
			// link in description
			$linkbg1			= $moduleParams->get($name .'_linkbg'.$i, '0'); 
			$linkbgcolor1		= $moduleParams->get($name .'_linkbgcolor'.$i, ''); 
			$linkcolorhover1	= $moduleParams->get($name .'_linkcolorhover'.$i, ''); 
			$linkcolornormal1	= $moduleParams->get($name .'_linkcolornormal'.$i, ''); 
			
		?>		
		<p><a href="#" class="slideConfigTitle"><b>Slide #<?php echo $i;?></b></a></p>
		<div id="slideconfig_<?php echo $i;?>" class="slideconfig">
			<p class="subitem">
				<label for="jformparams<?php echo $name;?>_image<?php echo $i;?>" class="jflabel hasTip" title="<?php echo JText::_('JFSS_BGIURL');?>">
					Background image url
				</label>			
				<input type="text" class="text_area" style="width:200px;" value="<?php echo $image1;?>" id="params<?php echo $name;?>_image<?php echo $i;?>" name="jform[params][<?php echo $name;?>_image<?php echo $i;?>]">			
			</p>
			<p class="subitem">
				<label for="jformparams<?php echo $name;?>_slogan<?php echo $i;?>" class="jflabel hasTip" title="<?php echo JText::_('JFSS_ST');?>">
					Slogan Text
				</label>			
				<input type="text" class="text_area" style="width:200px;" value="<?php echo $slogan1;?>" id="params<?php echo $name;?>_slogan<?php echo $i;?>" name="jform[params][<?php echo $name;?>_slogan<?php echo $i;?>]">
			</p>
			<p class="subitem">
				<label for="jformparams<?php echo $name;?>_font<?php echo $i;?>" class="jflabel hasTip" title="<?php echo JText::_('JFSS_FF');?>">
					Font family
				</label>			
				<?php
				echo JHTML::_('select.genericlist', $fontOptions, 'jform[params]['.$name.'_font'.$i.']', $fontPreview, 'value', 'text', $font1);
				?>
				<span style="position:absolute; margin-left:10px;">Font Preview</span>
			</p>
			<p class="subitem jffonsize">
				<label for="jformparams<?php echo $name;?>_size<?php echo $i;?>" class="jflabel hasTip" title="<?php echo JText::_('JFSS_FS');?>">
					Font Size
				</label>			
				<?php echo JHTML::_('select.integerlist', 18, 64, 1, 'jform[params]['.$name.'_size'.$i.']', 'class="inputbox"', $size1); ?>			
			</p>
			<p class="subitem">
				<label for="jformparams<?php echo $name;?>_color<?php echo $i;?><?php echo $i;?>" class="jflabel hasTip" title="<?php echo JText::_('JFSS_SC');?>">
					Slogan color
				</label>			
				<input
				    name="jform[params][<?php echo $name;?>_color<?php echo $i;?>]" type="text"
				    class="inputbox" id="<?php echo  $name.'_color'.$i; ?>"
				    value="<?php echo $color1;?>" size="10" />
				<img
				    src="<?php echo $img;?>" id="img<?php echo $name.'_color'.$i; ?>" alt="Click to open colorpicker"
				    class="rainbowbtn" width="16" height="16" />
			</p>
			<p class="subitem">
				<label for="jformparams<?php echo $name;?>_sloganshadow<?php echo $i;?>" class="jflabel hasTip" title="<?php echo JText::_('JFSS_SSH');?>">
					Slogan Shadow
				</label>			
				<?php
				echo JHTML::_('select.genericlist', $yesnoOptions, 'jform[params]['.$name.'_sloganshadow'.$i.']', null, 'value', 'text', $sloganshadow1);
				?>
			</p>
			<p class="subitem">
				<label for="jformparams<?php echo $name;?>_link<?php echo $i;?>" class="jflabel hasTip" title="<?php echo JText::_('JFSS_STL');?>">
					Slogan text linked
				</label>			
				<?php echo JHTML::_('select.genericlist', $yesnoOptions, 'jform[params]['.$name.'_link'.$i.']', null, 'value', 'text', $link1);?>
			</p>	
			<p class="subitem">
				<label for="jformparams<?php echo $name;?>_linkurl<?php echo $i;?>" class="jflabel hasTip" title="<?php echo JText::_('JFSS_SU');?>">
					Slogan url
				</label>			
				<input type="text" class="text_area" style="width:150px;" value="<?php echo $linkurl1;?>" id="params<?php echo $name;?>_linkurl<?php echo $i;?>" name="jform[params][<?php echo $name;?>_linkurl<?php echo $i;?>]">			
			</p>
			<p class="subitem">
				<label for="jformparams<?php echo $name;?>_des<?php echo $i;?>" class="jflabel hasTip" title="<?php echo JText::_('JFSS_DT');?>">
					Description text					
				</label>			
				<textarea class="text_area" rows="5" cols="30" id="params<?php echo $name;?>_des<?php echo $i;?>"  name="jform[params][<?php echo $name;?>_des<?php echo $i;?>]"><?php echo $des1;?></textarea>			
			</p>
			<p class="subitem">
				<label for="jformparams<?php echo $name;?>_desfont<?php echo $i;?>" class="jflabel hasTip" title="<?php echo JText::_('JFSS_FF');?>">
					Description Font family
				</label>			
				<?php
				echo JHTML::_('select.genericlist', $fontOptions, 'jform[params]['.$name.'_desfont'.$i.']', $fontPreview, 'value', 'text', $desfont1);
				?>
				<span style="position:absolute; margin-left:10px;">Font Preview</span>
			</p>
			<p class="subitem jffonsize">
				<label for="jformparams<?php echo $name;?>_descsize<?php echo $i;?>" class="jflabel hasTip" title="<?php echo JText::_('JFSS_DFS');?>">
					Description Font Size
				</label>			
				<?php echo JHTML::_('select.integerlist', 12, 48, 1, 'jform[params]['.$name.'_descsize'.$i.']', 'class="inputbox"', $descsize1); ?>			
			</p>
			<p class="subitem">
				<label for="jformparams<?php echo $name;?>_descolor<?php echo $i;?><?php echo $i;?>" class="jflabel hasTip" title="<?php echo JText::_('JFSS_DSC');?>">
					Description color
				</label>			
				<input
				    name="jform[params][<?php echo $name;?>_descolor<?php echo $i;?>]" type="text"
				    class="inputbox" id="<?php echo  $name.'_descolor'.$i; ?>"
				    value="<?php echo $descolor1;?>" size="10" />
				<img
				    src="<?php echo $img;?>" id="img<?php echo $name.'_descolor'.$i; ?>" alt="Click to open colorpicker"
				    class="rainbowbtn" width="16" height="16" />
			</p>
			<p class="subitem">
				<label for="jformparams<?php echo $name;?>_desbgcolor<?php echo $i;?><?php echo $i;?>" class="jflabel hasTip" title="<?php echo JText::_('JFSS_DBC');?>">
					Description background color
				</label>			
				<input
				    name="jform[params][<?php echo $name;?>_desbgcolor<?php echo $i;?>]" type="text"
				    class="inputbox" id="<?php echo  $name.'_desbgcolor'.$i; ?>"
				    value="<?php echo $desbgcolor1;?>" size="10" />
				<img
				    src="<?php echo $img;?>" id="img<?php echo $name.'_desbgcolor'.$i; ?>" alt="Click to open colorpicker"
				    class="rainbowbtn" width="16" height="16" />
			</p>		
			<p class="subitem">
				<label for="jformparams<?php echo $name;?>_deswidth<?php echo $i;?>" class="jflabel hasTip" title="<?php echo JText::_('JFSS_DBW');?>">
					Description text block width
				</label>			
				<input
				    name="jform[params][<?php echo $name;?>_deswidth<?php echo $i;?>]" type="text"
				    class="inputbox" id="<?php echo  $name.'_deswidth'.$i; ?>"
				    value="<?php echo $deswidth1;?>" />
				
			</p>
			<p class="subitem">
				<label for="jformparams<?php echo $name;?>_desradius<?php echo $i;?>" class="jflabel hasTip" title="<?php echo JText::_('JFSS_DBR');?>">
					 	Description text border radius
				</label>			
				<input
				    name="jform[params][<?php echo $name;?>_desradius<?php echo $i;?>]" type="text"
				    class="inputbox" id="<?php echo  $name.'_desradius'.$i; ?>"
				    value="<?php echo $desradius1;?>" />			
			</p>
			<p class="subitem">
				<label for="jformparams<?php echo $name;?>_desshadow<?php echo $i;?>" class="jflabel hasTip" title="<?php echo JText::_('JFSS_DBS');?>">
				Description text box shadow	
				</label>			
				<?php
				echo JHTML::_('select.genericlist', $yesnoOptions, 'jform[params]['.$name.'_desshadow'.$i.']', null, 'value', 'text', $desshadow1);
				?>
			</p>
			
					
			<p class="subitem">
				<label for="jformparams<?php echo $name;?>_linkbg<?php echo $i;?>" class="jflabel hasTip" title="<?php echo JText::_('JFSS_BOL');?>">
					Background of Link
				</label>			
				<?php echo JHTML::_('select.genericlist', $yesnoOptions, 'jform[params]['.$name.'_linkbg'.$i.']', null, 'value', 'text', $linkbg1);?>
			</p>
			<p class="subitem">
				<label for="jformparams<?php echo $name;?>_linkbgcolor<?php echo $i;?>" class="jflabel hasTip" title="<?php echo JText::_('JFSS_BOLC');?>">
					Background color of Link
				</label>			
				<input
				    name="jform[params][<?php echo $name;?>_linkbgcolor<?php echo $i;?>]" type="text"
				    class="inputbox" id="<?php echo  $name.'_linkbgcolor'.$i; ?>"
				    value="<?php echo $linkbgcolor1;?>" size="10" />
				<img
				    src="<?php echo $img;?>" id="img<?php echo $name.'_linkbgcolor'.$i; ?>" alt="Click to open colorpicker"
				    class="rainbowbtn" width="16" height="16" />
			</p>
			<p class="subitem">
				<label for="jformparams<?php echo $name;?>_desbgcolor<?php echo $i;?>" class="jflabel hasTip" title="<?php echo JText::_('JFSS_COLN');?>">
					Color of Link normal
				</label>			
				<input
				    name="jform[params][<?php echo $name;?>_linkcolornormal<?php echo $i;?>]" type="text"
				    class="inputbox" id="<?php echo  $name.'_linkcolornormal'.$i; ?>"
				    value="<?php echo $linkcolornormal1;?>" size="10" />
				<img
				    src="<?php echo $img;?>" id="img<?php echo $name.'_linkcolornormal'.$i; ?>" alt="Click to open colorpicker"
				    class="rainbowbtn" width="16" height="16" />
			</p>		
	
			<p class="subitem">
				<label for="jformparams<?php echo $name;?>_linkcolorhover<?php echo $i;?><?php echo $i;?>" class="jflabel hasTip" title="<?php echo JText::_('JFSS_COLH');?>">
					Color of Link hover
				</label>			
				<input
				    name="jform[params][<?php echo $name;?>_linkcolorhover<?php echo $i;?>]" type="text"
				    class="inputbox" id="<?php echo  $name.'_linkcolorhover'.$i; ?>"
				    value="<?php echo $linkcolorhover1;?>" size="10" />
				<img
				    src="<?php echo $img;?>" id="img<?php echo $name.'_linkcolorhover'.$i; ?>" alt="Click to open colorpicker"
				    class="rainbowbtn" width="16" height="16" />
			</p>
		</div>
        <?php        
		}

        $content=ob_get_contents();

        ob_end_clean();
        return $content;
	}
}
