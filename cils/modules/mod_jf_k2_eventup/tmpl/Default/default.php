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


$document = JFactory::getDocument();
$modulePath = JURI::base() . 'modules/mod_jf_k2_eventup/tmpl/Default/';

//Adding JS Files
//$document->addScript($modulePath.'js/js.js');

//Adding CSS Files
$document->addStyleSheet($modulePath.'css/default.css');
?>

<div id="k2ModuleBox<?php echo $module->id; ?>" class="k2ItemsBlockEvent<?php if($params->get('moduleclass_sfx')) echo ' '.$params->get('moduleclass_sfx'); ?>">

	<?php if($params->get('description_module')): ?>
	<p class="description_module"><?php echo $params->get('description_module'); ?></p>
	<?php endif; ?>

	<?php if(count($items)): ?>
	<ul id="jfk2tabs">
	<?php foreach ($items as $keys => $item_group):
	?>
		<li>
			<a href="#tabjfk2<?php echo $keys;?>">
				<strong><?php echo $item_group[0]->categoryname;?></strong>
				<?php if($item_group[0]->categorydescription) echo $item_group[0]->categorydescription; ?>
			</a>
		</li>
	<?php endforeach;?>
	<div class="clr"></div>
	</ul>
	<div id="jfk2content" >
	<?php foreach ($items as $keys => $item_group):	?>

		<div id="tabjfk2<?php echo $keys;?>" class="groupjfk2">
			<?php foreach ($item_group as $key=>$item):	?>
			<div class="jfk2-fixed <?php if($key==0) echo ' firstItem'; ?>">
				<div class="item-left-jfk2">
					<div class="groupjfk2-warper ">
						<a class="moduleItemTitle" href="<?php echo $item->link; ?>"><?php echo $item->title; ?></a>
						<div class="accordion">
							<div class="button-show"></div>
							<div class="moduleItemIntrotext">
								<?php if(isset($item->image)): ?>
								<a class="moduleItemImage" href="<?php echo $item->link; ?>" title="<?php echo JText::_('K2_CONTINUE_READING'); ?> &quot;<?php echo K2HelperUtilities::cleanHtml($item->title); ?>&quot;">
								<img src="<?php echo $item->image; ?>" alt="<?php echo K2HelperUtilities::cleanHtml($item->title); ?>"/>
								</a>
								<?php endif; ?>
								<div class="clr"></div>
								<?php echo $item->introtext; ?>
							</div>
						</div>
						<div class="clr"></div>
					</div>
				</div>
				<div class="item-right-jfk2">
					<div class="groupjfk2-warper">
					<?php if(count($item->extra_fields)): ?>
						<div class="moduleItemExtraFields">
							<?php foreach ($item->extra_fields as $extraField): ?>
								<?php if($extraField->id == $params->get('extra_field_showing')): ?>
									<span class="moduleItemExtraFieldsValue"><?php echo $extraField->value; ?></span>
								<?php endif; ?>
							<?php endforeach; ?>
						</div>
					<?php endif; ?>
					</div>
				</div>
				<div class="clr"></div>
			</div>
			<?php endforeach; ?>
		</div>
	<?php endforeach;?>
	</div>	  
  <?php endif; ?>
  
  <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <script type="text/javascript">
	jQuery(function($){
      	$(document).ready(function() {
			$("#jfk2content div.groupjfk2").hide(); // Initially hide all content
			$("#jfk2tabs li:first").attr("id","current"); // Activate first tab
			$("#jfk2content div.groupjfk2:first").fadeIn(); // Show first tab content
			$('#jfk2tabs li a').click(function(e) {
				e.preventDefault();
				if ($(this).attr("id") == "current"){ //detection for current tab
				 return       
				}
				else{             
				$("#jfk2content div.groupjfk2").hide(); //Hide all content
				$("#jfk2tabs li").attr("id",""); //Reset id's
				$(this).parent().attr("id","current"); // Activate this
				$( $(this).attr('href')).fadeIn(); // Show content for current tab
				}
			});
		});
		$( ".accordion" ).accordion({
			collapsible: true,
			active:100,
			heightStyle: "content"
		});
     });

    </script>
</div>
