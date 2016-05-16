<?php
/**
 * @version		$Id: items.php 1670 2012-10-02 13:18:24Z lefteris.kavadas $
 * @package		K2
 * @author		JoomlaWorks http://www.joomlaworks.net
 * @copyright	Copyright (c) 2006 - 2012 JoomlaWorks Ltd. All rights reserved.
 * @license		GNU/GPL license: http://www.gnu.org/copyleft/gpl.html
 */

// no direct access
defined('_JEXEC') or die ;

jimport('joomla.application.component.model');

JTable::addIncludePath(JPATH_COMPONENT.DS.'tables');

class K2ModelItemsMultiimages extends K2Model
{

    function remove()
    {
	
        jimport('joomla.filesystem.file');
        jimport('joomla.filesystem.folder');
        $mainframe = JFactory::getApplication();
        $params = JComponentHelper::getParams('com_k2');
        $itemModel = K2Model::getInstance('Item', 'K2Model');
        $db = JFactory::getDBO();
        $cid = JRequest::getVar('cid');
        $row = JTable::getInstance('K2Item', 'Table');
        JPluginHelper::importPlugin('finder');
        $dispatcher = JDispatcher::getInstance();
        foreach ($cid as $id)
        {
            $row->load($id);
            $row->id = (int)$row->id;
		
            //Delete images
			$filecount = 1;
            while(
				JFile::exists(JPATH_SITE.DS.'media'.DS.'k2'.DS.'items'.DS.'src'.DS.md5("Image".$row->id)."_".$filecount.".jpg") || 
				JFile::exists(JPATH_SITE.DS.'media'.DS.'k2'.DS.'items'.DS.'src'.DS.md5("Image".$row->id).".jpg")
			) {
				if($filecount == 1) {
					if (JFile::exists(JPATH_ROOT.DS.'media'.DS.'k2'.DS.'items'.DS.'src'.DS.md5("Image".$row->id).'.jpg'))
					{
						JFile::delete(JPATH_ROOT.DS.'media'.DS.'k2'.DS.'items'.DS.'src'.DS.md5("Image".$row->id).'.jpg');
					}
					
					if (JFile::exists(JPATH_ROOT.DS.'media'.DS.'k2'.DS.'items'.DS.'cache'.DS.md5("Image".$row->id).'_XS.jpg'))
					{
						JFile::delete(JPATH_ROOT.DS.'media'.DS.'k2'.DS.'items'.DS.'cache'.DS.md5("Image".$row->id).'_XS.jpg');
					}
					
					if (JFile::exists(JPATH_ROOT.DS.'media'.DS.'k2'.DS.'items'.DS.'cache'.DS.md5("Image".$row->id).'_S.jpg'))
					{
						JFile::delete(JPATH_ROOT.DS.'media'.DS.'k2'.DS.'items'.DS.'cache'.DS.md5("Image".$row->id).'_S.jpg');
					}
					
					if (JFile::exists(JPATH_ROOT.DS.'media'.DS.'k2'.DS.'items'.DS.'cache'.DS.md5("Image".$row->id).'_M.jpg'))
					{
						JFile::delete(JPATH_ROOT.DS.'media'.DS.'k2'.DS.'items'.DS.'cache'.DS.md5("Image".$row->id).'_M.jpg');
					}
					
					if (JFile::exists(JPATH_ROOT.DS.'media'.DS.'k2'.DS.'items'.DS.'cache'.DS.md5("Image".$row->id).'_L.jpg'))
					{
						JFile::delete(JPATH_ROOT.DS.'media'.DS.'k2'.DS.'items'.DS.'cache'.DS.md5("Image".$row->id).'_L.jpg');
					}
					
					if (JFile::exists(JPATH_ROOT.DS.'media'.DS.'k2'.DS.'items'.DS.'cache'.DS.md5("Image".$row->id).'_XL.jpg'))
					{
						JFile::delete(JPATH_ROOT.DS.'media'.DS.'k2'.DS.'items'.DS.'cache'.DS.md5("Image".$row->id).'_XL.jpg');
					}
					
					if (JFile::exists(JPATH_ROOT.DS.'media'.DS.'k2'.DS.'items'.DS.'cache'.DS.md5("Image".$row->id).'_Generic.jpg'))
					{
						JFile::delete(JPATH_ROOT.DS.'media'.DS.'k2'.DS.'items'.DS.'cache'.DS.md5("Image".$row->id).'_Generic.jpg');
					}
				}
				else {
					if (JFile::exists(JPATH_ROOT.DS.'media'.DS.'k2'.DS.'items'.DS.'src'.DS.md5("Image".$row->id)."_".$filecount.'.jpg'))
					{
						JFile::delete(JPATH_ROOT.DS.'media'.DS.'k2'.DS.'items'.DS.'src'.DS.md5("Image".$row->id)."_".$filecount.'.jpg');
					}
					
					if (JFile::exists(JPATH_ROOT.DS.'media'.DS.'k2'.DS.'items'.DS.'cache'.DS.md5("Image".$row->id)."_".$filecount.'_XS.jpg'))
					{
						JFile::delete(JPATH_ROOT.DS.'media'.DS.'k2'.DS.'items'.DS.'cache'.DS.md5("Image".$row->id)."_".$filecount.'_XS.jpg');
					}
					
					if (JFile::exists(JPATH_ROOT.DS.'media'.DS.'k2'.DS.'items'.DS.'cache'.DS.md5("Image".$row->id)."_".$filecount.'_S.jpg'))
					{
						JFile::delete(JPATH_ROOT.DS.'media'.DS.'k2'.DS.'items'.DS.'cache'.DS.md5("Image".$row->id)."_".$filecount.'_S.jpg');
					}
					
					if (JFile::exists(JPATH_ROOT.DS.'media'.DS.'k2'.DS.'items'.DS.'cache'.DS.md5("Image".$row->id)."_".$filecount.'_M.jpg'))
					{
						JFile::delete(JPATH_ROOT.DS.'media'.DS.'k2'.DS.'items'.DS.'cache'.DS.md5("Image".$row->id)."_".$filecount.'_M.jpg');
					}
					
					if (JFile::exists(JPATH_ROOT.DS.'media'.DS.'k2'.DS.'items'.DS.'cache'.DS.md5("Image".$row->id)."_".$filecount.'_L.jpg'))
					{
						JFile::delete(JPATH_ROOT.DS.'media'.DS.'k2'.DS.'items'.DS.'cache'.DS.md5("Image".$row->id)."_".$filecount.'_L.jpg');
					}
					
					if (JFile::exists(JPATH_ROOT.DS.'media'.DS.'k2'.DS.'items'.DS.'cache'.DS.md5("Image".$row->id)."_".$filecount.'_XL.jpg'))
					{
						JFile::delete(JPATH_ROOT.DS.'media'.DS.'k2'.DS.'items'.DS.'cache'.DS.md5("Image".$row->id)."_".$filecount.'_XL.jpg');
					}
					
					if (JFile::exists(JPATH_ROOT.DS.'media'.DS.'k2'.DS.'items'.DS.'cache'.DS.md5("Image".$row->id)."_".$filecount.'_Generic.jpg'))
					{
						JFile::delete(JPATH_ROOT.DS.'media'.DS.'k2'.DS.'items'.DS.'cache'.DS.md5("Image".$row->id)."_".$filecount.'_Generic.jpg');
					}					
				}
				
				$filecount++;
			}

            //Delete gallery
            if (JFolder::exists(JPATH_ROOT.DS.'media'.DS.'k2'.DS.'galleries'.DS.$row->id))
                JFolder::delete(JPATH_ROOT.DS.'media'.DS.'k2'.DS.'galleries'.DS.$row->id);

            //Delete video
            preg_match_all("#^{(.*?)}(.*?){#", $row->video, $matches, PREG_PATTERN_ORDER);
            $videotype = $matches[1][0];
            $videofile = $matches[2][0];

            $videoExtensions = array('flv', 'mp4', 'ogv', 'webm', 'f4v', 'm4v', '3gp', '3g2', 'mov', 'mpeg', 'mpg', 'avi', 'wmv', 'divx', 'swf');
            $audioExtensions = array('mp3', 'aac', 'mp4', 'ogg', 'wma');

            if (in_array($videotype, $videoExtensions) || in_array($videotype, $audioExtensions))
            {

                if (JFile::exists(JPATH_ROOT.DS.'media'.DS.'k2'.DS.'videos'.DS.$videofile.'.'.$videotype))
                    JFile::delete(JPATH_ROOT.DS.'media'.DS.'k2'.DS.'videos'.DS.$videofile.'.'.$videotype);

                if (JFile::exists(JPATH_ROOT.DS.'media'.DS.'k2'.DS.'audio'.DS.$videofile.'.'.$videotype))
                    JFile::delete(JPATH_ROOT.DS.'media'.DS.'k2'.DS.'audio'.DS.$videofile.'.'.$videotype);
            }

            //Delete attachments
            $path = $params->get('attachmentsFolder', NULL);
            if (is_null($path))
                $savepath = JPATH_ROOT.DS.'media'.DS.'k2'.DS.'attachments';
            else
                $savepath = $path;

            $attachments = $itemModel->getAttachments($row->id);

            foreach ($attachments as $attachment)
            {
                if (JFile::exists($savepath.DS.$attachment->filename))
                    JFile::delete($savepath.DS.$attachment->filename);
            }

            $query = "DELETE FROM #__k2_attachments WHERE itemID={$row->id}";
            $db->setQuery($query);
            $db->query();

            //Delete tags
            $query = "DELETE FROM #__k2_tags_xref WHERE itemID={$row->id}";
            $db->setQuery($query);
            $db->query();

            //Delete comments
            $query = "DELETE FROM #__k2_comments WHERE itemID={$row->id}";
            $db->setQuery($query);
            $db->query();

            $row->delete($id);

            $dispatcher->trigger('onFinderAfterDelete', array('com_k2.item', $row));
        }
        $cache = JFactory::getCache('com_k2');
        $cache->clean();
        $mainframe->redirect('index.php?option=com_k2&view=items', JText::_('K2_DELETE_COMPLETED'));
    }
	
    function copy()
    {

        $mainframe = JFactory::getApplication();
        jimport('joomla.filesystem.file');
        $params = JComponentHelper::getParams('com_k2');
        $itemModel = K2Model::getInstance('Item', 'K2Model');
        $db = JFactory::getDBO();
        $cid = JRequest::getVar('cid');
        JArrayHelper::toInteger($cid);
        $row = JTable::getInstance('K2Item', 'Table');

        $nullDate = $db->getNullDate();

        foreach ($cid as $id)
        {

            //Load source item
            $item = JTable::getInstance('K2Item', 'Table');
            $item->load($id);
            $item->id = (int)$item->id;
	
			$filecount = 1;
            while(
				JFile::exists(JPATH_SITE.DS.'media'.DS.'k2'.DS.'items'.DS.'src'.DS.md5("Image".$item->id)."_".$filecount.".jpg") || 
				(JFile::exists(JPATH_SITE.DS.'media'.DS.'k2'.DS.'items'.DS.'src'.DS.md5("Image".$item->id).".jpg") && $filecount == 1)
			) {
				if($filecount == 1) {
					$sourceImage = JPATH_ROOT.DS.'media'.DS.'k2'.DS.'items'.DS.'src'.DS.md5("Image".$item->id).'.jpg';
					$sourceImageXS = JPATH_ROOT.DS.'media'.DS.'k2'.DS.'items'.DS.'cache'.DS.md5("Image".$item->id).'_XS.jpg';
					$sourceImageS = JPATH_ROOT.DS.'media'.DS.'k2'.DS.'items'.DS.'cache'.DS.md5("Image".$item->id).'_S.jpg';
					$sourceImageM = JPATH_ROOT.DS.'media'.DS.'k2'.DS.'items'.DS.'cache'.DS.md5("Image".$item->id).'_M.jpg';
					$sourceImageL = JPATH_ROOT.DS.'media'.DS.'k2'.DS.'items'.DS.'cache'.DS.md5("Image".$item->id).'_L.jpg';
					$sourceImageXL = JPATH_ROOT.DS.'media'.DS.'k2'.DS.'items'.DS.'cache'.DS.md5("Image".$item->id).'_XL.jpg';
					$sourceImageGeneric = JPATH_ROOT.DS.'media'.DS.'k2'.DS.'items'.DS.'cache'.DS.md5("Image".$item->id).'_Generic.jpg';
				}
				else {
					${"sourceImage".$filecount} = JPATH_ROOT.DS.'media'.DS.'k2'.DS.'items'.DS.'src'.DS.md5("Image".$item->id)."_".$filecount.'.jpg';
					${"sourceImage".$filecount."XS"} = JPATH_ROOT.DS.'media'.DS.'k2'.DS.'items'.DS.'cache'.DS.md5("Image".$item->id)."_".$filecount.'_XS.jpg';
					${"sourceImage".$filecount."S"} = JPATH_ROOT.DS.'media'.DS.'k2'.DS.'items'.DS.'cache'.DS.md5("Image".$item->id)."_".$filecount.'_S.jpg';
					${"sourceImage".$filecount."M"} = JPATH_ROOT.DS.'media'.DS.'k2'.DS.'items'.DS.'cache'.DS.md5("Image".$item->id)."_".$filecount.'_M.jpg';
					${"sourceImage".$filecount."L"} = JPATH_ROOT.DS.'media'.DS.'k2'.DS.'items'.DS.'cache'.DS.md5("Image".$item->id)."_".$filecount.'_L.jpg';
					${"sourceImage".$filecount."XL"} = JPATH_ROOT.DS.'media'.DS.'k2'.DS.'items'.DS.'cache'.DS.md5("Image".$item->id)."_".$filecount.'_XL.jpg';
					${"sourceImage".$filecount."Generic"} = JPATH_ROOT.DS.'media'.DS.'k2'.DS.'items'.DS.'cache'.DS.md5("Image".$item->id)."_".$filecount.'_Generic.jpg';
				}
				
				$filecount++;

			}
			$tmpID = $item->id;

            //Source gallery
            $sourceGallery = JPATH_ROOT.DS.'media'.DS.'k2'.DS.'galleries'.DS.$item->id;
            $sourceGalleryTag = $item->gallery;

            //Source video
            preg_match_all("#^{(.*?)}(.*?){#", $item->video, $matches, PREG_PATTERN_ORDER);
            $videotype = $matches[1][0];
            $videofile = $matches[2][0];

            if ($videotype == 'flv' || $videotype == 'swf' || $videotype == 'wmv' || $videotype == 'mov' || $videotype == 'mp4' || $videotype == '3gp' || $videotype == 'divx')
            {
                if (JFile::exists(JPATH_ROOT.DS.'media'.DS.'k2'.DS.'videos'.DS.$videofile.'.'.$videotype))
                {
                    $sourceVideo = $videofile.'.'.$videotype;
                    //$row->video='{'.$videotype.'}'.$row->id.'{/'.$videotype.'}';
                }
            }

            //Source tags
            $query = "SELECT * FROM #__k2_tags_xref WHERE itemID={$item->id}";
            $db->setQuery($query);
            $sourceTags = $db->loadObjectList();

            //Source Attachments
            $sourceAttachments = $itemModel->getAttachments($item->id);

            //Save target item
            $row = JTable::getInstance('K2Item', 'Table');
            $row = $item;
            $row->id = NULL;
            $row->title = JText::_('K2_COPY_OF').' '.$item->title;
            $row->hits = 0;
            $row->published = 0;
            $datenow = JFactory::getDate();
            $row->created = K2_JVERSION == '15' ? $datenow->toMySQL() : $datenow->toSql();
            $row->modified = $nullDate;
            $row->store();

            //Target images

			$filecount = 1;
            while(
				JFile::exists(JPATH_SITE.DS.'media'.DS.'k2'.DS.'items'.DS.'src'.DS.md5("Image".$tmpID)."_".$filecount.".jpg") || 
				(JFile::exists(JPATH_SITE.DS.'media'.DS.'k2'.DS.'items'.DS.'src'.DS.md5("Image".$tmpID).".jpg") && $filecount == 1)
			) {	
				if($filecount == 1) {		
					if (JFile::exists($sourceImage))
						JFile::copy($sourceImage, JPATH_ROOT.DS.'media'.DS.'k2'.DS.'items'.DS.'src'.DS.md5("Image".$row->id).'.jpg');
					if (JFile::exists($sourceImageXS))
						JFile::copy($sourceImageXS, JPATH_ROOT.DS.'media'.DS.'k2'.DS.'items'.DS.'cache'.DS.md5("Image".$row->id).'_XS.jpg');
					if (JFile::exists($sourceImageS))
						JFile::copy($sourceImageS, JPATH_ROOT.DS.'media'.DS.'k2'.DS.'items'.DS.'cache'.DS.md5("Image".$row->id).'_S.jpg');
					if (JFile::exists($sourceImageM))
						JFile::copy($sourceImageM, JPATH_ROOT.DS.'media'.DS.'k2'.DS.'items'.DS.'cache'.DS.md5("Image".$row->id).'_M.jpg');
					if (JFile::exists($sourceImageL))
						JFile::copy($sourceImageL, JPATH_ROOT.DS.'media'.DS.'k2'.DS.'items'.DS.'cache'.DS.md5("Image".$row->id).'_L.jpg');
					if (JFile::exists($sourceImageXL))
						JFile::copy($sourceImageXL, JPATH_ROOT.DS.'media'.DS.'k2'.DS.'items'.DS.'cache'.DS.md5("Image".$row->id).'_XL.jpg');
					if (JFile::exists($sourceImageGeneric))
						JFile::copy($sourceImageGeneric, JPATH_ROOT.DS.'media'.DS.'k2'.DS.'items'.DS.'cache'.DS.md5("Image".$row->id).'_Generic.jpg');
				}
				else {
					if (JFile::exists(${"sourceImage".$filecount}))
						JFile::copy(${"sourceImage".$filecount}, JPATH_ROOT.DS.'media'.DS.'k2'.DS.'items'.DS.'src'.DS.md5("Image".$row->id)."_".$filecount.'.jpg');
					if (JFile::exists(${"sourceImage".$filecount."XS"}))
						JFile::copy(${"sourceImage".$filecount."XS"}, JPATH_ROOT.DS.'media'.DS.'k2'.DS.'items'.DS.'cache'.DS.md5("Image".$row->id)."_".$filecount.'_XS.jpg');
					if (JFile::exists(${"sourceImage".$filecount."S"}))
						JFile::copy(${"sourceImage".$filecount."S"}, JPATH_ROOT.DS.'media'.DS.'k2'.DS.'items'.DS.'cache'.DS.md5("Image".$row->id)."_".$filecount.'_S.jpg');
					if (JFile::exists(${"sourceImage".$filecount."M"}))
						JFile::copy(${"sourceImage".$filecount."M"}, JPATH_ROOT.DS.'media'.DS.'k2'.DS.'items'.DS.'cache'.DS.md5("Image".$row->id)."_".$filecount.'_M.jpg');
					if (JFile::exists(${"sourceImage".$filecount."L"}))
						JFile::copy(${"sourceImage".$filecount."L"}, JPATH_ROOT.DS.'media'.DS.'k2'.DS.'items'.DS.'cache'.DS.md5("Image".$row->id)."_".$filecount.'_L.jpg');
					if (JFile::exists(${"sourceImage".$filecount."XL"}))
						JFile::copy(${"sourceImage".$filecount."XL"}, JPATH_ROOT.DS.'media'.DS.'k2'.DS.'items'.DS.'cache'.DS.md5("Image".$row->id)."_".$filecount.'_XL.jpg');
					if (JFile::exists(${"sourceImage".$filecount."Generic"}))
						JFile::copy(${"sourceImage".$filecount."Generic"}, JPATH_ROOT.DS.'media'.DS.'k2'.DS.'items'.DS.'cache'.DS.md5("Image".$row->id)."_".$filecount.'_Generic.jpg');
				}
				
				$filecount++;
				
			}

            //Target gallery
            if ($sourceGalleryTag)
            {
                $row->gallery = '{gallery}'.$row->id.'{/gallery}';
                if (JFolder::exists($sourceGallery))
                    JFolder::copy($sourceGallery, JPATH_ROOT.DS.'media'.DS.'k2'.DS.'galleries'.DS.$row->id);
            }

            //Target video
            if (isset($sourceVideo) && JFile::exists(JPATH_ROOT.DS.'media'.DS.'k2'.DS.'videos'.DS.$sourceVideo))
            {
                JFile::copy(JPATH_ROOT.DS.'media'.DS.'k2'.DS.'videos'.DS.$sourceVideo, JPATH_ROOT.DS.'media'.DS.'k2'.DS.'videos'.DS.$row->id.'.'.$videotype);
                $row->video = '{'.$videotype.'}'.$row->id.'{/'.$videotype.'}';
            }

            //Target attachments
            $path = $params->get('attachmentsFolder', NULL);
            if (is_null($path))
                $savepath = JPATH_ROOT.DS.'media'.DS.'k2'.DS.'attachments';
            else
                $savepath = $path;

            foreach ($sourceAttachments as $attachment)
            {
                if (JFile::exists($savepath.DS.$attachment->filename))
                {
                    JFile::copy($savepath.DS.$attachment->filename, $savepath.DS.$row->id.'_'.$attachment->filename);
                    $attachmentRow = JTable::getInstance('K2Attachment', 'Table');
                    $attachmentRow->itemID = $row->id;
                    $attachmentRow->title = $attachment->title;
                    $attachmentRow->titleAttribute = $attachment->titleAttribute;
                    $attachmentRow->filename = $row->id.'_'.$attachment->filename;
                    $attachmentRow->hits = 0;
                    $attachmentRow->store();
                }
            }

            //Target tags
            foreach ($sourceTags as $tag)
            {
                $query = "INSERT INTO #__k2_tags_xref (`id`, `tagID`, `itemID`) VALUES (NULL, {intval($tag->tagID)}, {intval($row->id)})";
                $db->setQuery($query);
                $db->query();
            }

            $row->store();
        }

        $mainframe->redirect('index.php?option=com_k2&view=items', JText::_('K2_COPY_COMPLETED'));
    }
	
}
