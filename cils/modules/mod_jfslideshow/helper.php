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
require_once (JPATH_SITE.DS.'components'.DS.'com_k2'.DS.'helpers'.DS.'route.php');
require_once (JPATH_SITE.DS.'components'.DS.'com_k2'.DS.'helpers'.DS.'utilities.php');

function jfLoadfont($fontname){
	
	if($fontname == 'none') return '';
	
	$doc = JFactory::getDocument();
	//$doc->addStyleSheet('http://fonts.googleapis.com/css?family=Open+Sans');
	
	//1
	static $opensans = 0;	
	if($fontname == "opensans"){ 
		if(!$opensans){ // not load yet
			$doc->addStyleSheet('http://fonts.googleapis.com/css?family=Open+Sans');
			$opensans = 1;
		}return "opensans";
	}
	//2
	static $overlock = 0;
	if($fontname == "overlock"){ 
		if(!$overlock){ // not load yet
			$doc->addStyleSheet('http://fonts.googleapis.com/css?family=Overlock');
			$overlock = 1;
		}return "overlock";
	}	
	//3
	static $poiretone = 0;
	if($fontname == "poiretone"){ 
		if(!$poiretone){ // not load yet
			$doc->addStyleSheet('http://fonts.googleapis.com/css?family=Poiret+One');
			$poiretone = 1;
		}return "poiretone";
	}
	//4
	static $flamenco = 0;
	if($fontname == "flamenco"){ 
		if(!$flamenco){ // not load yet
			$doc->addStyleSheet('http://fonts.googleapis.com/css?family=Flamenco');
			$flamenco = 1;
		}return "flamenco";
	}
	//5
	static $comfortaa = 0;
	if($fontname == "comfortaa"){ 
		if(!$comfortaa){ // not load yet
			$doc->addStyleSheet('http://fonts.googleapis.com/css?family=Comfortaa');
			$comfortaa = 1;
		}return "comfortaa";
	}
	//6
	static $concertone = 0;
	if($fontname == "concertone"){ 
		if(!$concertone){ // not load yet
			$doc->addStyleSheet('http://fonts.googleapis.com/css?family=Concert+One');
			$concertone = 1;
		}return "concertone";
	}
	//7
	static $anticslab = 0;
	if($fontname == "anticslab"){ 
		if(!$anticslab){ // not load yet
			$doc->addStyleSheet('http://fonts.googleapis.com/css?family=Antic+Slab');
			$anticslab = 1;
		}return "anticslab";
	}
	//8
	static $berkshireswash = 0;
	if($fontname == "berkshireswash"){ 
		if(!$berkshireswash){ // not load yet
			$doc->addStyleSheet('http://fonts.googleapis.com/css?family=Berkshire+Swash');
			$berkshireswash = 1;
		}return "berkshireswash";
	}
	//9
	static $eaglelake = 0;
	if($fontname == "eaglelake"){ 
		if(!$eaglelake){ // not load yet
			$doc->addStyleSheet('http://fonts.googleapis.com/css?family=Eagle+Lake');
			$eaglelake = 1;
		}return "eaglelake";
	}
	//10
	static $economica = 0;
	if($fontname == "economica"){ 
		if(!$economica){ // not load yet
			$doc->addStyleSheet('http://fonts.googleapis.com/css?family=Economica');
			$economica = 1;
		}return "economica";
	}
	//11
	static $ewert = 0;
	if($fontname == "ewert"){ 
		if(!$ewert){ // not load yet
			$doc->addStyleSheet('http://fonts.googleapis.com/css?family=Ewert');
			$ewert = 1;
		}return "ewert";
	}
	//12
	static $kaushanscript = 0;
	if($fontname == "kaushanscript"){ 
		if(!$kaushanscript){ // not load yet
			$doc->addStyleSheet('http://fonts.googleapis.com/css?family=Kaushan+Script');
			$kaushanscript = 1;
		}return "kaushanscript";
	}
	//13
	static $londrinasketch = 0;
	if($fontname == "londrinasketch"){ 
		if(!$londrinasketch){ // not load yet
			$doc->addStyleSheet('http://fonts.googleapis.com/css?family=Londrina+Sketch');
			$londrinasketch = 1;
		}return "londrinasketch";
	}
	//14
	static $kronaone = 0;
	if($fontname == "kronaone"){ 
		if(!$kronaone){ // not load yet
			$doc->addStyleSheet('http://fonts.googleapis.com/css?family=Krona+One');
			$kronaone = 1;
		}return "kronaone";
	}
	//15
	static $loversquarrel = 0;
	if($fontname == "loversquarrel"){ 
		if(!$loversquarrel){ // not load yet
			$doc->addStyleSheet('http://fonts.googleapis.com/css?family=Lovers+Quarrel');
			$loversquarrel = 1;
		}return "loversquarrel";
	}
	//16
	static $oswald = 0;
	if($fontname == "oswald"){ 
		if(!$oswald){ // not load yet
			$doc->addStyleSheet('http://fonts.googleapis.com/css?family=Oswald');
			$oswald = 1;
		}return "oswald";
	}
	//17
	static $rocksalt = 0;
	if($fontname == "rocksalt"){ 
		if(!$rocksalt){ // not load yet
			$doc->addStyleSheet('http://fonts.googleapis.com/css?family=Rock+Salt');
			$rocksalt = 1;
		}return "rocksalt";
	}
	//18
	static $syncopate = 0;
	if($fontname == "syncopate"){ 
		if(!$syncopate){ // not load yet
			$doc->addStyleSheet('http://fonts.googleapis.com/css?family=Syncopate');
			$syncopate = 1;
		}return "syncopate";
	}
	//19
	static $ubuntu = 0;
	if($fontname == "ubuntu"){ 
		if(!$ubuntu){ // not load yet
			$doc->addStyleSheet('http://fonts.googleapis.com/css?family=Ubuntu');
			$ubuntu = 1;
		}return "ubuntu";
	}
	//20
	static $russoone = 0;
	if($fontname == "russoone"){ 
		if(!$russoone){ // not load yet
			$doc->addStyleSheet('http://fonts.googleapis.com/css?family=Russo+One');
			$russoone = 1;
		}return "russoone";
	}
	//21
	static $amaticsc = 0;
	if($fontname == "amaticsc"){ 
		if(!$amaticsc){ // not load yet
			$doc->addStyleSheet('http://fonts.googleapis.com/css?family=Amatic+SC');
			$amaticsc = 1;
		}return "amaticsc";
	}
	//22
	static $yellowtail = 0;
	if($fontname == "yellowtail"){ 
		if(!$yellowtail){ // not load yet
			$doc->addStyleSheet('http://fonts.googleapis.com/css?family=Yellowtail');
			$yellowtail = 1;
		}return "yellowtail";
	}
	
	
}

function rand_string( $length ) {
	$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";	
	$str = '';
	$size = strlen( $chars );
	for( $i = 0; $i < $length; $i++ ) {
		$str .= $chars[ rand( 0, $size - 1 ) ];
	}

	return $str;
}

function getK2Items(&$params, $format = 'html') {	
		jimport('joomla.filesystem.file');
		$mainframe = JFactory::getApplication();
		
		$cid = $params->get('category_id', NULL);
		$componentParams = JComponentHelper::getParams('com_k2');
		$limitstart = JRequest::getInt('limitstart');

		$user = JFactory::getUser();
		$aid = $user->get('aid');
		$db = JFactory::getDBO();

		$jnow = JFactory::getDate();
		$now =  K2_JVERSION == '15'?$jnow->toMySQL():$jnow->toSql();
		$nullDate = $db->getNullDate();

		$query = "SELECT i.*,";

		$query .= "c.name AS categoryname, c.description AS categorydescription, c.id AS categoryid, c.alias AS categoryalias, c.params AS categoryparams";

		$query .= " FROM #__k2_items as i RIGHT JOIN #__k2_categories c ON c.id = i.catid";

		if (K2_JVERSION != '15')
		{
			$query .= " WHERE i.published = 1 AND i.access IN(".implode(',', $user->getAuthorisedViewLevels()).") AND i.trash = 0 AND c.published = 1 AND c.access IN(".implode(',', $user->getAuthorisedViewLevels()).")  AND c.trash = 0";
		}
		else
		{
			$query .= " WHERE i.published = 1 AND i.access <= {$aid} AND i.trash = 0 AND c.published = 1 AND c.access <= {$aid} AND c.trash = 0";
		}

		$query .= " AND ( i.publish_up = ".$db->Quote($nullDate)." OR i.publish_up <= ".$db->Quote($now)." )";
		$query .= " AND ( i.publish_down = ".$db->Quote($nullDate)." OR i.publish_down >= ".$db->Quote($now)." )";

		$categories = getCategoryTree($cid);
		if($categories) {
			$sql = @implode(',', $categories);
			$query .= " AND i.catid IN ({$sql})";
		} else {
			$query .= " AND i.catid={$cid} ";
		}

		if (K2_JVERSION != '15')
		{
			if ($mainframe->getLanguageFilter())
			{
				$languageTag = JFactory::getLanguage()->getTag();
				$query .= " AND c.language IN (".$db->Quote($languageTag).", ".$db->Quote('*').") AND i.language IN (".$db->Quote($languageTag).", ".$db->Quote('*').")";
			}
		}

		$orderby = 'i.id asc';
		$query .= " ORDER BY ".$orderby;
		$db->setQuery($query, 0);

		$items = $db->loadObjectList();
		
		$model = K2Model::getInstance('Item', 'K2Model');

		if (count($items))
		{
			foreach ($items as $item)
			{
				//Clean title
				$item->title = JFilterOutput::ampReplace($item->title);

				//Images item begin

					$date = JFactory::getDate($item->modified);
					$timestamp = '?t='.$date->toUnix();

					if (JFile::exists(JPATH_SITE.DS.'media'.DS.'k2'.DS.'items'.DS.'cache'.DS.md5("Image".$item->id).'_XS.jpg'))
					{
						$item->imageXSmall = JURI::base(true).'/media/k2/items/cache/'.md5("Image".$item->id).'_XS.jpg';
						if ($componentParams->get('imageTimestamp'))
						{
							$item->imageXSmall .= $timestamp;
						}
					}

					if (JFile::exists(JPATH_SITE.DS.'media'.DS.'k2'.DS.'items'.DS.'cache'.DS.md5("Image".$item->id).'_S.jpg'))
					{
						$item->imageSmall = JURI::base(true).'/media/k2/items/cache/'.md5("Image".$item->id).'_S.jpg';
						if ($componentParams->get('imageTimestamp'))
						{
							$item->imageSmall .= $timestamp;
						}
					}

					if (JFile::exists(JPATH_SITE.DS.'media'.DS.'k2'.DS.'items'.DS.'cache'.DS.md5("Image".$item->id).'_M.jpg'))
					{
						$item->imageMedium = JURI::base(true).'/media/k2/items/cache/'.md5("Image".$item->id).'_M.jpg';
						if ($componentParams->get('imageTimestamp'))
						{
							$item->imageMedium .= $timestamp;
						}
					}

					if (JFile::exists(JPATH_SITE.DS.'media'.DS.'k2'.DS.'items'.DS.'cache'.DS.md5("Image".$item->id).'_L.jpg'))
					{
						$item->imageLarge = JURI::base(true).'/media/k2/items/cache/'.md5("Image".$item->id).'_L.jpg';
						if ($componentParams->get('imageTimestamp'))
						{
							$item->imageLarge .= $timestamp;
						}
					}

					if (JFile::exists(JPATH_SITE.DS.'media'.DS.'k2'.DS.'items'.DS.'cache'.DS.md5("Image".$item->id).'_XL.jpg'))
					{
						$item->imageXLarge = JURI::base(true).'/media/k2/items/cache/'.md5("Image".$item->id).'_XL.jpg';
						if ($componentParams->get('imageTimestamp'))
						{
							$item->imageXLarge .= $timestamp;
						}
					}

					if (JFile::exists(JPATH_SITE.DS.'media'.DS.'k2'.DS.'items'.DS.'cache'.DS.md5("Image".$item->id).'_Generic.jpg'))
					{
						$item->imageGeneric = JURI::base(true).'/media/k2/items/cache/'.md5("Image".$item->id).'_Generic.jpg';
						if ($componentParams->get('imageTimestamp'))
						{
							$item->imageGeneric .= $timestamp;
						}
					}

					$image = 'imageSmall';
					if (isset($item->$image))
						$item->image = $item->$image;

				// image end

				//Read more link
				$item->link = urldecode(JRoute::_(K2HelperRoute::getItemRoute($item->id.':'.urlencode($item->alias), $item->catid.':'.urlencode($item->categoryalias))));

				//Category link
				$item->categoryLink = urldecode(JRoute::_(K2HelperRoute::getCategoryRoute($item->catid.':'.urlencode($item->categoryalias))));

				//Import plugins
				$dispatcher = JDispatcher::getInstance();
				JPluginHelper::importPlugin('content');

				// Introtext
				$item->text = '';
				//$item->text .= $item->introtext;
				$item->text .= K2HelperUtilities::wordLimit($item->introtext, '150');

                // Restore the intotext variable after plugins execution
                $item->introtext = $item->text;

				//Clean the plugin tags
				$item->introtext = preg_replace("#{(.*?)}(.*?){/(.*?)}#s", '', $item->introtext);

				// extra fields
				$item->extra_fields = $model->getItemExtraFields($item->extra_fields, $item);
				
				foreach ($item->extra_fields as $key => $extraField)
				{
					if ($extraField->type == 'textarea' || $extraField->type == 'textfield')
					{
						$tmp = new JObject();
						$tmp->text = $extraField->value;
						$extraField->value = $tmp->text;
					}
				}

				$rows[$item->catid][] = $item;
			}
			return $items;
		}
    }
	
function getCategoryTree($categories, $associations = false)
    {
        $mainframe = JFactory::getApplication();
        $db = JFactory::getDBO();
        $user = JFactory::getUser();
        $aid = (int)$user->get('aid');
		$catid = $categories;
        if (!is_array($categories))
        {
            $categories = (array)$categories;
        }
        JArrayHelper::toInteger($categories);
        $categories = array_unique($categories);
        sort($categories);
        $key = implode('|', $categories);
        $clientID = $mainframe->getClientId();
        static $K2CategoryTreeInstances = array();
        if (isset($K2CategoryTreeInstances[$clientID]) && array_key_exists($key, $K2CategoryTreeInstances[$clientID]))
        {
            return $K2CategoryTreeInstances[$clientID][$key];
        }
        $array = $categories;
            $query = "SELECT id
						FROM #__k2_categories
						WHERE parent IN (".implode(',', $array).")
						AND id NOT IN (".implode(',', $array).") ";
						
            if ($mainframe->isSite())
            {
                $query .= "
								AND published=1
								AND trash=0";
                if (K2_JVERSION != '15')
                {
                    $query .= " AND access IN(".implode(',', $user->getAuthorisedViewLevels()).")";
                    if ($mainframe->getLanguageFilter())
                    {
                        $query .= " AND language IN(".$db->Quote(JFactory::getLanguage()->getTag()).", ".$db->Quote('*').")";
                    }
                }
                else
                {
                    $query .= " AND access<={$aid}";
                }
            }
            $db->setQuery($query);
            $array = K2_JVERSION == '30' ? $db->loadColumn() : $db->loadResultArray();
            $categories = array_merge($categories, $array);
			
		
        JArrayHelper::toInteger($categories);
        $categories = array_unique($categories);
        $K2CategoryTreeInstances[$clientID][$key] = $categories;
		
		$keys = array_search($catid,$categories);
		unset($categories[$keys]);

        return $categories;
    }