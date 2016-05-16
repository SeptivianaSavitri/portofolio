<?php
/*------------------------------------------------------------------------
# JF_EVENT-UP! - JOOMFREAK.COM JOOMLA 3 TEMPLATE 
# June 2015
# ------------------------------------------------------------------------
# COPYRIGHT: (C) 2014 JOOMFREAK.COM / KREATIF MULTIMEDIA GMBH
# LICENSE: Creative Commons Attribution
# AUTHOR: JOOMFREAK.COM
# WEBSITE: http://www.joomfreak.com - http://www.kreatif-multimedia.com
# EMAIL: info@joomfreak.com
-------------------------------------------------------------------------*/

defined('_JEXEC') or die;

$app             = JFactory::getApplication();
$doc             = JFactory::getDocument();
$user            = JFactory::getUser();
$this->language  = $doc->language;
$this->direction = $doc->direction;

// Getting params from template
$params = $app->getTemplate(true)->params;

// Detecting Active Variables
$option   = $app->input->getCmd('option', '');
$view     = $app->input->getCmd('view', '');
$layout   = $app->input->getCmd('layout', '');
$task     = $app->input->getCmd('task', '');
$itemid   = $app->input->getCmd('Itemid', '');
$sitename = $app->get('sitename');

if($task == "edit" || $layout == "form" )
{
	$fullWidth = 1;
}
else
{
	$fullWidth = 0;
}

// Add JavaScript Frameworks
JHtml::_('bootstrap.framework');

// Logo file or site title param
if ($params->get('logoFile'))
{
	$logo = '<img src="' . JUri::root() . $params->get('logoFile') . '" alt="' . $sitename . '" />';
}
elseif ($params->get('sitetitle'))
{
	$logo = '<span class="site-title" title="' . $sitename . '">' . htmlspecialchars($params->get('sitetitle')) . '</span>';
}
else
{
	$logo = '<span class="site-title" title="' . $sitename . '">' . $sitename . '</span>';
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title><?php echo $this->title; ?> <?php echo htmlspecialchars($this->error->getMessage(), ENT_QUOTES, 'UTF-8'); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/css/error.css" type="text/css" />
	<?php if ($app->get('debug_lang', '0') == '1' || $app->get('debug', '0') == '1') : ?>
		<link rel="stylesheet" href="<?php echo $this->baseurl; ?>/media/cms/css/debug.css" type="text/css" />
	<?php endif; ?>
	<?php // If Right-to-Left ?>
	<?php if ($this->direction == 'rtl') : ?>
		<link rel="stylesheet" href="<?php echo $this->baseurl; ?>/media/jui/css/bootstrap-rtl.css" type="text/css" />
	<?php endif; ?>
	<link href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script type="text/javascript">
	(function($) {
		$(window).resize(function(){
			$('.errorpage-top, .errorpage-bottom').css('height', $(window).height()/2);
		});
		$(document).ready(function() {
			$('.errorpage-top, .errorpage-bottom').css('height', $(window).height()/2);
		});
	})(jQuery);
	</script>
	<!--[if lt IE 9]>
		<script src="<?php echo $this->baseurl; ?>/media/jui/js/html5.js"></script>
	<![endif]-->
</head>

<body class="site <?php echo $option
	. ' view-' . $view
	. ($layout ? ' layout-' . $layout : ' no-layout')
	. ($task ? ' task-' . $task : ' no-task')
	. ($itemid ? ' itemid-' . $itemid : '')
	. ($params->get('fluidContainer') ? ' fluid' : '');
?>">

	<div class="errorpage">
		<div class="errorpage-top">
			<div class="container">
				<a class="brand" href="<?php echo $this->baseurl; ?>/">
					<?php echo $logo; ?>
					<?php if ($params->get('sitedescription')) : ?>
						<?php echo '<div class="site-description">' . htmlspecialchars($params->get('sitedescription')) . '</div>'; ?>
					<?php endif; ?>
				</a>
				
				<div class="error">
					<span class="message"><?php echo JText::_('TPL_JF_EVENT-UP_PAGE_NOT_FOUND'); ?></span>
				</div>
			</div>
		</div>
		<div class="errorpage-bottom">
			<div class="container">
				<div class="warning">
					<h3>Whooops ... :-/ </h3>
					<p><?php echo JText::_('TPL_JF_EVENT-UP_PAGE_NOT_FOUND_WARNING'); ?></p>
					<a class="back-home" href="<?php echo $this->baseurl; ?>/"><?php echo JText::_('TPL_JF_EVENT-UP_HOME_BUTTON'); ?></a>
				</div>
			</div>
		</div>
	</div>
	<?php echo $doc->getBuffer('modules', 'debug', array('style' => 'none')); ?>
</body>
</html>
