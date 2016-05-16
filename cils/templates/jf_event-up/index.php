<?php
/*------------------------------------------------------------------------
# JF_EVENT-UP! - JOOMFREAK.COM JOOMLA 3 TEMPLATE 
# June 2015
# ------------------------------------------------------------------------
# COPYRIGHT: (C) 2014 JOOMFREAK.COM / KREATIF GMBH
# LICENSE: Creative Commons Attribution
# AUTHOR: JOOMFREAK.COM
# WEBSITE: http://www.joomfreak.com - http://www.kreatif-multimedia.com
# EMAIL: info@joomfreak.com
-------------------------------------------------------------------------*/

defined('_JEXEC') or die;

$app             = JFactory::getApplication();
$doc             = JFactory::getDocument();
$user            = JFactory::getUser();
$lang            = JFactory::getLanguage();
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
$menu     = $app->getMenu();

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
$doc->addScript($this->baseurl . '/templates/' . $this->template . '/scripts/js/jquery.fancybox.pack.js');
$doc->addScript($this->baseurl . '/templates/' . $this->template . '/scripts/js/jquery.stellar.min.js');
$doc->addScript($this->baseurl . '/templates/' . $this->template . '/scripts/js/template.js');

// Add Stylesheets
$doc->addStyleSheet('http://fonts.googleapis.com/css?family=Montserrat:400,700');
$doc->addStyleSheet($this->baseurl . '/templates/' . $this->template . '/css/font-awesome.css');
$doc->addStyleSheet($this->baseurl . '/templates/' . $this->template . '/css/template.css');
$doc->addStyleSheet($this->baseurl . '/templates/' . $this->template . '/css/jquery.fancybox.css');

// Load optional RTL Bootstrap CSS
JHtml::_('bootstrap.loadCss', false, $this->direction);

// Adjusting content width
if ($this->countModules('right')) {
	$span = "span8";
}
else {
	$span = "span12";
}

// Logo file or site title param
if ($this->params->get('logoAs') == 1 && $this->params->get('logoFile'))
{
	$logo = '<img src="' . JUri::root() . $this->params->get('logoFile') . '" alt="' . $sitename . '" />';
}
elseif ($this->params->get('logoAs') == 1 && $this->params->get('sitetitle'))
{
	$logo = '<span class="site-title" title="' . $sitename . '">' . htmlspecialchars($this->params->get('sitetitle')) . '</span>';
}
else
{
	$logo = '<span class="site-title" title="' . $sitename . '">' . $sitename . '</span>';
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<jdoc:include type="head" />

	<?php // Template color ?>
	<?php if ($this->params->get('templateColor')) : ?>
	<style type="text/css">
		a {
			color: <?php echo $this->params->get('templateColor'); ?>;
		}
		.navbar-inner, .nav-list > .active > a, .nav-list > .active > a:hover, .dropdown-menu li > a:hover, .dropdown-menu .active > a, .dropdown-menu .active > a:hover, .nav-pills > .active > a, .nav-pills > .active > a:hover,
		.btn-primary {
			background: <?php echo $this->params->get('templateColor'); ?>;
		}
	</style>
	<?php endif; ?>
	<!--[if lt IE 9]>
		<script src="<?php echo JUri::root(true); ?>/media/jui/js/html5.js"></script>
	<![endif]-->
	<?php if ($menu->getActive() != $menu->getDefault($lang->getTag())) : ?>
	<script>
		(function($) {	
			$(document).ready(function() {
				$(".navigation ul.nav > li > a").each(function(){
					var str = $(this).attr("href");
					var n = str.indexOf("#");
					if(n >= 0) {
						$(this).attr("href", "<?php echo $this->baseurl; ?>/"+$(this).attr("href"));
					}
				});
			});
		})(jQuery);
	</script>
	<?php endif; ?>
</head>

<body class="site <?php if ($menu->getActive() == $menu->getDefault($lang->getTag())) echo 'home'; ?> <?php echo $option
	. ' view-' . $view
	. ($layout ? ' layout-' . $layout : ' no-layout')
	. ($task ? ' task-' . $task : ' no-task')
	. ($itemid ? ' itemid-' . $itemid : '');
?>">
	<div id="fb-root"></div>
	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.4&appId=393248360736193";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>
	
	<!-- Header -->
	<div class="header <?php echo $attending; ?>">		
		<!--<?php if ($menu->getActive() == $menu->getDefault($lang->getTag())) : ?>	
			<div class="header-top">
				<div class="container">
					<div class="time-today pull-left hidden-phone">					
						<span><i class="fa fa-calendar"></i><?php echo JHTML::_('date', strtotime("now") , JText::_('TPL_JF_EVENT-UP_DATE_FORMAT_LC1')); ?></span>
					</div>
					<div class="top-right pull-right">
						<?php if($this->params->get('phone') != ' ') : ?>						
							<span class="top-phone"><i class="fa fa-phone"></i><?php echo $this->params->get('phone'); ?></span>
						<?php endif; ?>
						<?php if($this->params->get('email') != ' ') : ?>						
							<span class="top-send"><i class="fa fa-send"></i><?php echo $this->params->get('email'); ?></span>
						<?php endif; ?>
						<?php if ($this->countModules('search')) : ?>
						<a class="top-search fancybox" href="#jfsearch"><i class="fa fa-search"></i></a>
						<?php endif; ?>
						<?php if ($this->countModules('share')) : ?>
						<a class="top-share fancybox" href="#jfshare"><i class="fa fa-share-alt"></i></a>
						<?php endif; ?>						
					</div>
				</div>
			</div>
		<?php endif; ?>	-->
		<div class="header-bottom clearfix">
			<div class="container">
				<a class="brand pull-left" href="<?php echo $this->baseurl; ?>/">
					<?php echo $logo; ?>
					<?php if ($this->params->get('sitedescription')) : ?>
						<?php echo '<div class="site-description">' . htmlspecialchars($this->params->get('sitedescription')) . '</div>'; ?>
					<?php endif; ?>
				</a>
				<?php if ($this->countModules('mainmenu')) : ?>
				<nav class="navigation pull-right">
					<div class="navbar pull-left">
						<a class="btn-navbar collapsed" data-toggle="collapse" data-target=".nav-collapse">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</a>
					</div>
					<div class="nav-collapse">
						<jdoc:include type="modules" name="mainmenu" style="none" />
					</div>
				</nav>
				<?php endif; ?>		
			</div>
		</div>		
	</div>
	
	<?php if ($this->countModules('search')) : ?>
	<div id="jfsearch">
		<jdoc:include type="modules" name="search" style="none" />
	</div>
	<?php endif; ?>
	<?php if ($this->countModules('share')) : ?>
	<div id="jfshare">
		<jdoc:include type="modules" name="share" style="jfxhtml" />
	</div>
	<?php endif; ?>
	
	<?php if ($this->countModules('slideshow')) : ?>
	<div id="slideshow">
		<jdoc:include type="modules" name="slideshow" />
		<a href="#" id="scroll-down"></a>
	</div>
	<?php endif; ?>
	
	<div class="wrap">
		<?php if ($this->countModules('breadcrumb')) : ?>
		<div id="breadcrumb">
			<div class="container">
				<jdoc:include type="modules" name="breadcrumb" />
			</div>
		</div>
		<?php endif; ?>
	
		<!-- Body -->
		<div class="body">
			<div class="container">
				<div class="row">
					<div id="content" class="<?php echo $span; ?>">
						<!-- Begin Content -->
						<jdoc:include type="modules" name="content-top" style="xhtml" />
						<jdoc:include type="message" />
						<jdoc:include type="component" />
						<jdoc:include type="modules" name="content-bottom" style="none" />
						<!-- End Content -->
					</div>
					<?php if ($this->countModules('right')) : ?>
						<div id="aside" class="span4">
							<!-- Begin Right Sidebar -->
							<jdoc:include type="modules" name="right" style="jfxhtml" />
							<!-- End Right Sidebar -->
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
		
		<?php if ($this->countModules('main-about')) : ?>
		<div id="about" class="section section-purple">
			<div class="container">
				<jdoc:include type="modules" name="main-about" style="jfxhtml" />
			</div>
		</div>
		<?php endif; ?>
		
		<?php if ($this->countModules('main-artist')) : ?>
		<div id="artists" class="section section-white">
			<div class="container">
				<jdoc:include type="modules" name="main-artist" style="jfxhtml" />
			</div>
		</div>
		<?php endif; ?>
		
		<?php if ($this->countModules('main-video')) : ?>
		<div id="video" class="section parallax">
			<div class="parallax-bg" data-stellar-background-ratio="0.5"></div>
			<div class="parallax-overlay"></div>
			<div class="container parallax-inner">
				<jdoc:include type="modules" name="main-video" style="jfxhtml" />
			</div>
		</div>
		<?php endif; ?>
		
		<?php if ($this->countModules('main-schedule')) : ?>
		<div id="schedule" class="section section-white">
			<div class="container">
				<jdoc:include type="modules" name="main-schedule" style="jfxhtml" />
			</div>
		</div>
		<?php endif; ?>
		
		<?php if ($this->countModules('main-ticketprice')) : ?>
		<div id="ticketprice" class="section">
			<div class="container">
				<jdoc:include type="modules" name="main-ticketprice" style="jfxhtml" />
			</div>
		</div>
		<?php endif; ?>
		
		<?php if ($this->countModules('main-sponsors')) : ?>
		<div id="sponsors" class="section section-white">
			<div class="container">
				<jdoc:include type="modules" name="main-sponsors" style="jfxhtml" />
			</div>
		</div>
		<?php endif; ?>
		
		<?php if ($this->countModules('main-eventstats')) : ?>
		<div id="eventstats" class="section">
			<div class="container">
				<jdoc:include type="modules" name="main-eventstats" style="jfxhtml" />
			</div>
		</div>
		<?php endif; ?>
		
		<?php if ($this->countModules('main-numbers')) : ?>
		<div id="numbers" class="section parallax">
			<div class="parallax-bg" data-stellar-background-ratio="0.5"></div>
			<div class="parallax-overlay"></div>
			<div class="container parallax-inner">
				<jdoc:include type="modules" name="main-numbers" style="jfxhtml" />
			</div>
		</div>
		<?php endif; ?>
		
		<?php if ($this->countModules('main-l-infos') || $this->countModules('main-r-infos')) : ?>
		<div id="infos" class="section clearfix">
			<div class="container">
				<div class="row">
					<div class="span6">
						<div class="left-infos">
							<jdoc:include type="modules" name="main-l-infos" style="jfxhtml" />
						</div>
					</div>
					<div class="span6">
						<div class="right-infos">
							<jdoc:include type="modules" name="main-r-infos" style="jfxhtml" />
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php endif; ?>
		
		<?php if ($this->countModules('main-gmap') || $this->countModules('main-contact')) : ?>
		<div id="location">
			<?php if ($this->countModules('main-gmap')) : ?>
				<jdoc:include type="modules" name="main-gmap" />
			<?php endif ?>
			<?php if ($this->countModules('main-contact')) : ?>
			<div id="contactus" class="section">
				<div class="container">
					<jdoc:include type="modules" name="main-contact" style="jfxhtml" />
				</div>
			</div>
			<?php endif; ?>
		</div>
		<?php endif; ?>
		
		<?php if ($this->countModules('main-blog')) : ?>
		<div id="blog" class="section section-white">
			<div class="container">
				<jdoc:include type="modules" name="main-blog" style="jfxhtml" />
			</div>
		</div>
		<?php endif; ?>
		
		<div>
			<a href="#" id="scroll-up"></a>
		</div>
		
		<!-- Footer -->
		<div class="footer">
			<div class="container">
				<?php if ($this->countModules('footer-top')) : ?>
					<div class="footer-top">
						<div class="row">
							<jdoc:include type="modules" name="footer-top" style="well" />
						</div>
					</div>
				<?php endif; ?>
				<div class="footer-bottom">
					<?php if (($this->params->get('social') && ($this->params->get('facebookicon') || $this->params->get('flickricon') || $this->params->get('googleicon') || $this->params->get('twittericon') || $this->params->get('pinteresticon') || $this->params->get('youtubeticon')))) : ?>
					<div class="footer-social">
						<ul>
							<?php if ($this->params->get('twittericon')) : ?>
							<li>
								<a id="twitter" href="<?php echo $this->params->get('twitterlink'); ?>" target="_blank"></a>
							</li>
							<?php endif; ?>							
							<?php if ($this->params->get('vimeoicon')) : ?>
							<li>
								<a id="vimeo" href="<?php echo $this->params->get('vimeolink'); ?>" target="_blank"></a>
							</li>
							<?php endif; ?>
							<?php if ($this->params->get('flickricon')) : ?>
							<li>
								<a id="flickr" href="<?php echo $this->params->get('flickrlink'); ?>" target="_blank"></a>
							</li>
							<?php endif; ?>
							<?php if ($this->params->get('googleicon')) : ?>
							<li>
								<a id="googleplus" href="<?php echo $this->params->get('googlelink'); ?>" target="_blank"></a>
							</li>
							<?php endif; ?>
							<?php if ($this->params->get('rssicon')) : ?>
							<li>
								<a id="rss" href="<?php echo $this->params->get('rsslink'); ?>" target="_blank"></a>
							</li>
							<?php endif; ?>
							<?php if ($this->params->get('pinteresticon')) : ?>
							<li>
								<a id="pinterest" href="<?php echo $this->params->get('pinterestlink'); ?>" target="_blank"></a>
							</li>
							<?php endif; ?>
							<?php if ($this->params->get('facebookicon')) : ?>
							<li>
								<a id="facebook" href="<?php echo $this->params->get('facebooklink'); ?>" target="_blank"></a>
							</li>
							<?php endif; ?>
							<?php if ($this->params->get('youtubeicon')) : ?>
							<li>
								<a id="youtube" href="<?php echo $this->params->get('youtubelink'); ?>" target="_blank"></a>
							</li>
							<?php endif; ?>
						</ul>
					</div>
					<?php endif; ?>
					<jdoc:include type="modules" name="footer" style="none" />
					<div class="copyright">
						<div class="jf">
							<a title="" href="http://www.joomfreak.com" target="_blank" class="jflink">joomfreak</a>
						</div>
						<?php if ($this->params->get('copyright')) :
							echo $this->params->get('copyright') . '<br />';
						endif; ?>
						Powered by <a href="http://www.kreatif.it/" target="_blank">Kreatif</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<jdoc:include type="modules" name="debug" style="none" />
</body>
</html>
