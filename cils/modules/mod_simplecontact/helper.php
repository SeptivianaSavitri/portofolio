<?php
/*------------------------------------------------------------------------
# mod_simplecontact - Simple Contact
# ------------------------------------------------------------------------
# author    Vsmart Extensions
# copyright Copyright (C) 2010 www.vsmart-extensions.com. All Rights Reserved.
# @license - http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
# Websites: http://www.vsmart-extensions.com
# Technical Support:  Forum - http://www.vsmart-extensions.com
-------------------------------------------------------------------------*/
defined('_JEXEC') or die;
class ModSimpleContactHelper
{
	function sendEmail($params)
	{		
		$app = JFactory::getApplication();
		
		if ($_POST['check'] != JSession::getFormToken()) {
			if ($_POST['check'] == 'post') {
				$ErrorMsg  = 'Please check all fields of contact form.<br />';
				$app->enqueueMessage($ErrorMsg,'error');
			}
			return false;
		}
		$email   = $params->get('email');
		$subject = $params->get('subject');
		$success = $params->get('success');
		$error   = $params->get('error');
		$name    		= JRequest::getVar('name', null, 'POST');
	    $submit_email   = JRequest::getVar('email', null, 'POST');
	    $message    	= JRequest::getVar('text', '', 'POST');
		$fromEmail = $app->getCfg('mailfrom');
	    $fromName  = $app->getCfg('fromname');
	    $fromArray = array($fromEmail, $fromName);
	    $body = 'There is message from:'."\n";
	    $body .= "Email: $submit_email" . "\n";
	    $body .= "Name: $name" . "\n";
	    $body .= "Message: " . "\n";
	    $body .= $message . "\n\n";
	    
	    $Mailer =& JFactory::getMailer();
	    $Mailer->setSender($fromArray);
	    $Mailer->addReplyTo($fromArray);
	    $Mailer->addRecipient($email);
	    $Mailer->setSubject($subject);
	    $Mailer->setBody($body);
	    if ($Mailer->Send() !== true) {
	    	return $error;
	    }
	    else {
	    	return $success;
	    }
	}
} 
?>