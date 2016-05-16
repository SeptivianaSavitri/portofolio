<?php
/**
<version>1.0.0</version>
<author>Kreatif GmbH</author>
<authorEmail>info@joomfreak.com</authorEmail>
<authorUrl>http://www.joomfreak.com</authorUrl>
<copyright>Kreatif GmbH</copyright>
<license>Attribution 2.5 Generic (CC BY 2.5)</license>
 */

// no direct access
defined('_JEXEC') or die;

require_once (JPATH_SITE.DS.'components'.DS.'com_k2'.DS.'helpers'.DS.'route.php');
require_once (JPATH_SITE.DS.'components'.DS.'com_k2'.DS.'helpers'.DS.'utilities.php');

class modJfK2EventUpHelper
{
	public function getItems(&$params, $format = 'html') {	
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

		// get categories
		$categories = self::getCategoryTree($cid);
		$sql = @implode(',', $categories);
		$query .= " AND i.catid IN ({$sql})";
		// end get categories

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
			return $rows;
		}
    }
    
	public function getCategoryTree($categories, $associations = false)
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


}
