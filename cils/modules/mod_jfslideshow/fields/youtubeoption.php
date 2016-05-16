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
class JFormFieldYoutubeoption extends JFormField
{	
	var	$_name = 'Youtubeoption';

	function getInput()
	{
		return $this->fetchElement($this->element['name'], $this->value, $this->element, $this->name);
	}

	function fetchElement($name, $value, &$node, $control_name)
	{
		
		$data = $this->form->getValue('params');
		$moduleParams = new JRegistry($data);

		$videoid 	= $moduleParams->get($name .'_id', '');
		$start 		= $moduleParams->get($name .'_start', '0');
		$mute		= $moduleParams->get($name .'_mute', '1');
		$repeat		= $moduleParams->get($name .'_repeat', '1');
		
		$yesnoOptions =	array(
			JHTML::_('select.option', '0', JText::_('No') ),
			JHTML::_('select.option', '1', JText::_('Yes') )
			);
		
		ob_start();
		?>
		<hr id="youtubeoption">
		<p>
		<label for="params<?php echo $name;?>_id" class="jflabel hasTip" title="<?php echo JText::_('JFSS_YVID');?>">
		YouTube video ID			
		</label>		
		<input type="text" class="text_area" value="<?php echo $videoid;?>" id="params<?php echo $name;?>_id" name="jform[params][<?php echo $name;?>_id]">
		<em>E.g.: 6hS2OMe4lXM</em>
		</p>
		<p>
		<label for="params<?php echo $name;?>_start" class="jflabel hasTip" title="<?php echo JText::_('JFSS_YSPS');?>">
		Starting position in seconds	
		</label>
		<input type="text" class="text_area" value="<?php echo $start;?>" id="params<?php echo $name;?>_start" name="jform[params][<?php echo $name;?>_start]">
		</p>
		<p>
		<label for="params<?php echo $name;?>_repeat" class="jflabel hasTip" title="<?php echo JText::_('JFSS_YVR');?>">
		Repeat	
		</label>
		<?php
			echo JHTML::_('select.genericlist', $yesnoOptions, 'jform[params]['.$name.'_repeat]', null, 'value', 'text', $repeat);
		?>
		</p>
		<p>
		<label for="params<?php echo $name;?>_mute" class="jflabel hasTip" title="<?php echo JText::_('JFSS_YMUT');?>">
		Mute sound	
		</label>
		<?php
			echo JHTML::_('select.genericlist', $yesnoOptions, 'jform[params]['.$name.'_mute]', null, 'value', 'text', $mute);
		?>
		</p>
		<?php		        
        $content=ob_get_contents();
        ob_end_clean();
        return $content;
	}
}
