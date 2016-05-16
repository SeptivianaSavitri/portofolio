<?php
// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die;

require_once (JPATH_ADMINISTRATOR.'/components/com_k2/elements/base.php');

class JFormFieldJfextra extends K2Element{

    protected $type = 'Jfextra';

    public function getInput() {
		$mainframe = JFactory::getApplication();
        $db = JFactory::getDBO();
        
		$query = "SELECT * FROM #__k2_extra_fields ";
		$db->setQuery($query);
		$array_data = $db->loadAssocList();

		$new_field = '<select id="'.$this->id.'" name="'.$this->name.'">';
		$new_field .= '<option value="0" >None</option>';
		foreach ($array_data as $key => $value){
			if($this->value == $value['id']){
				$new_field .= '<option selected value="'.$value['id'].'" >'.$value['name'].'</option>';
			}else{
				$new_field .= '<option value="'.$value['id'].'" >'.$value['name'].'</option>';
			}
		}
		$new_field .= '</select>';
				
		return $new_field;
    }
}
?>