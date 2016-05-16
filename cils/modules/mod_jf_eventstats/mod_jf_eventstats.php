<?php
/*------------------------------------------------------------------------
# mod_jf_eventstats - JF Facebook Event Statistics
# ------------------------------------------------------------------------
# COPYRIGHT: (C) 2014 JOOMFREAK.COM / KREATIF GMBH
# LICENSE: Creative Commons Attribution
# AUTHOR: JOOMFREAK.COM
# WEBSITE: http://www.joomfreak.com - http://www.kreatif-multimedia.com
# EMAIL: info@joomfreak.com
-------------------------------------------------------------------------*/

defined('_JEXEC') or die;

$eventID = $params->get('eventID', '');
$appID = $params->get('appID', '');
$appSecret = $params->get('appSecret', '');
$modulePretext = $params->get('modulePretext', '');

require_once __DIR__ . '/facebook-php-sdk-v4-4.0-dev/autoload.php';

use Facebook\FacebookRequest;
use Facebook\FacebookSession;
use Facebook\FacebookRedirectLoginHelper;

FacebookSession::setDefaultApplication( $appID, $appSecret);

// If you're making app-level requests:
$session = FacebookSession::newAppSession();

$request = new FacebookRequest(
		$session,
		'GET',
		'/'.$eventID.'?fields=description,attending_count,declined_count,maybe_count'
	);
$response = $request->execute();
$graphObject = $response->getGraphObject()->asArray();

?>

<div class="jfEventStats">
	<?php if($modulePretext) : ?>
	<p class="modulePretext"><?php echo $modulePretext; ?></p>
	<?php endif; ?>
	<div class="row">
		<div class="span3">
			<p><a href="https://www.facebook.com/events/<?php echo $eventID; ?>/"><i class="fa fa-facebook-official"></i><br> <strong>View event</strong><br> on facebook</a></p>
		</div>
		<div class="span3">
			<p><i class="fa fa-thumbs-up"></i><br> <strong><?php echo $graphObject['attending_count']; ?></strong><br> attending</p>
		</div>
		<div class="span3">
			<p><i class="fa fa-question-circle"></i><br> <strong><?php echo $graphObject['maybe_count']; ?></strong><br> maybe</p>
		</div>
		<div class="span3">
			<p><i class="fa fa-thumbs-down"></i><br> <strong><?php echo $graphObject['declined_count']; ?></strong><br> declined</p>
		</div>
	</div>
</div>

