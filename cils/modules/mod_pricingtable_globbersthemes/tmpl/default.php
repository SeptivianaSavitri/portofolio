<?php 

/**
 * Pricing table! Joomla Module 3.x 2.x
 * 
 */
 
defined( '_JEXEC' ) or die( 'Restricted access' ); ?>

<?php
$modURL 	= JURI::base().'modules/mod_pricingtable_globbersthemes';

?>

<link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
<link rel="stylesheet" href="<?php echo $modURL; ?>/assets/style.css" type="text/css" />

<link type="text/css" rel="stylesheet" media="only screen and (min-width: 1170px) and (max-width: 90000px)" href="<?php echo $modURL; ?>/assets/responsive/fixed-1200.css" />
<link type="text/css" rel="stylesheet" media="only screen and (min-width: 981px) and (max-width: 1169px)" href="<?php echo $modURL; ?>/assets/responsive/fixed-960.css" />
<link type="text/css" rel="stylesheet" media="only screen and (min-width: 720px) and (max-width: 980px)" href="<?php echo $modURL; ?>/assets/responsive/fixed-720.css" />
<link type="text/css" rel="stylesheet" media="only screen and (min-width: 0px) and (max-width: 719px)" href="<?php echo $modURL; ?>/assets/responsive/mobile.css" />

<p class="preText"><?php echo $Pricingtable_GlobbersThemesOptionsParams['preText']; ?></p>

<div class="container_12"><div id="pricing-t"><?php echo $module_pricingtable;?></div>
	<div class="grid_3">
		<ul class="pricing-table">
			<?php if ($Pricingtable_GlobbersThemesOptionsParams['titleitem1'] == "1" ) : ?>
				<li class="title">
					<p><?php echo $Pricingtable_GlobbersThemesOptionsParams['titlepricingitem1']; ?></p>
				</li>
			<?php endif ?>
			<?php if ($Pricingtable_GlobbersThemesOptionsParams['option5item1'] == "1" ) : ?>
				<li class="price">
					<p><span><?php echo $Pricingtable_GlobbersThemesOptionsParams['option5pricingitem1']; ?></span><?php echo $Pricingtable_GlobbersThemesOptionsParams['option6pricingitem1']; ?></p>
				</li>
			<?php endif ?>
			<?php if ($Pricingtable_GlobbersThemesOptionsParams['option1item1'] == "1" ) : ?>
				<li>
				    <p><i class="fa fa-check"></i><?php echo $Pricingtable_GlobbersThemesOptionsParams['option1pricingitem1']; ?></p>
				</li>
			<?php else : ?>
				<li class="pclose">
				    <p><i class="fa fa-close"></i><?php echo $Pricingtable_GlobbersThemesOptionsParams['option1pricingitem1']; ?></p>
				</li>
			<?php endif ?>
			<?php if ($Pricingtable_GlobbersThemesOptionsParams['option2item1'] == "1" ) : ?>
				<li>
					<p><i class="fa fa-check"></i><?php echo $Pricingtable_GlobbersThemesOptionsParams['option2pricingitem1']; ?></p>
				</li>
			<?php else : ?>
				<li class="pclose">
					<p><i class="fa fa-close"></i><?php echo $Pricingtable_GlobbersThemesOptionsParams['option2pricingitem1']; ?></p>
				</li>
			<?php endif ?>
			<?php if ($Pricingtable_GlobbersThemesOptionsParams['option3item1'] == "1" ) : ?>
				<li>
					<p><i class="fa fa-check"></i><?php echo $Pricingtable_GlobbersThemesOptionsParams['option3pricingitem1']; ?></p>
				</li>
			<?php else : ?>
				<li class="pclose">
					<p><i class="fa fa-close"></i><?php echo $Pricingtable_GlobbersThemesOptionsParams['option3pricingitem1']; ?></p>
				</li>
			<?php endif ?>
			<?php if ($Pricingtable_GlobbersThemesOptionsParams['option4item1'] == "1" ) : ?>
				<li>
					<p><i class="fa fa-check"></i><?php echo $Pricingtable_GlobbersThemesOptionsParams['option4pricingitem1']; ?></p>
				</li>
			<?php else : ?>
				<li class="pclose">
					<p><i class="fa fa-close"></i><?php echo $Pricingtable_GlobbersThemesOptionsParams['option4pricingitem1']; ?></p>
				</li>
			<?php endif ?>			
			
			<?php if ($Pricingtable_GlobbersThemesOptionsParams['buttonitem1'] == "1" ) : ?>
			    <li class="button-sign">
					<a href="<?php echo $Pricingtable_GlobbersThemesOptionsParams['buttonurlitem1']; ?>"><?php echo $Pricingtable_GlobbersThemesOptionsParams['buttonpricingitem1']; ?></a>
			    </li>
			<?php endif ?>
		</ul>
	</div>
	<div class="grid_3">
		<ul class="pricing-table silver">
			<?php if ($Pricingtable_GlobbersThemesOptionsParams['titleitem2'] == "1" ) : ?>
				<li class="title">
					<p><?php echo $Pricingtable_GlobbersThemesOptionsParams['titlepricingitem2']; ?></p>
				</li>
			<?php endif ?>
			<?php if ($Pricingtable_GlobbersThemesOptionsParams['option5item2'] == "1" ) : ?>
				<li class="price">
					<p><span><?php echo $Pricingtable_GlobbersThemesOptionsParams['option5pricingitem2']; ?></span><?php echo $Pricingtable_GlobbersThemesOptionsParams['option6pricingitem2']; ?></p>
				</li>
			<?php endif ?>
			<?php if ($Pricingtable_GlobbersThemesOptionsParams['option1item2'] == "1" ) : ?>
				<li>
				    <p><i class="fa fa-check"></i><?php echo $Pricingtable_GlobbersThemesOptionsParams['option1pricingitem2']; ?></p>
				</li>
			<?php else : ?>
				<li class="pclose">
				    <p><i class="fa fa-close"></i><?php echo $Pricingtable_GlobbersThemesOptionsParams['option1pricingitem2']; ?></p>
				</li>
			<?php endif ?>
			<?php if ($Pricingtable_GlobbersThemesOptionsParams['option2item2'] == "1" ) : ?>
				<li>
					<p><i class="fa fa-check"></i><?php echo $Pricingtable_GlobbersThemesOptionsParams['option2pricingitem2']; ?></p>
				</li>
			<?php else : ?>
				<li class="pclose">
					<p><i class="fa fa-close"></i><?php echo $Pricingtable_GlobbersThemesOptionsParams['option2pricingitem2']; ?></p>
				</li>
			<?php endif ?>
			<?php if ($Pricingtable_GlobbersThemesOptionsParams['option3item2'] == "1" ) : ?>
				<li>
					<p><i class="fa fa-check"></i><?php echo $Pricingtable_GlobbersThemesOptionsParams['option3pricingitem2']; ?></p>
				</li>
			<?php else : ?>
				<li class="pclose">
					<p><i class="fa fa-close"></i><?php echo $Pricingtable_GlobbersThemesOptionsParams['option3pricingitem2']; ?></p>
				</li>
			<?php endif ?>
			<?php if ($Pricingtable_GlobbersThemesOptionsParams['option4item2'] == "1" ) : ?>
				<li>
					<p><i class="fa fa-check"></i><?php echo $Pricingtable_GlobbersThemesOptionsParams['option4pricingitem2']; ?></p>
				</li>
			<?php else : ?>
				<li class="pclose">
					<p><i class="fa fa-close"></i><?php echo $Pricingtable_GlobbersThemesOptionsParams['option4pricingitem2']; ?></p>
				</li>
			<?php endif ?>
			
			<?php if ($Pricingtable_GlobbersThemesOptionsParams['buttonitem2'] == "1" ) : ?>
			    <li class="button-sign">
					<a href="<?php echo $Pricingtable_GlobbersThemesOptionsParams['buttonurlitem2']; ?>"><?php echo $Pricingtable_GlobbersThemesOptionsParams['buttonpricingitem2']; ?></a>
			    </li>
			<?php endif ?>
		</ul>
	</div>
	<div class="grid_3">
	    <ul class="pricing-table gold">
			<?php if ($Pricingtable_GlobbersThemesOptionsParams['titleitem3'] == "1" ) : ?>
				<li class="title">
					<p><?php echo $Pricingtable_GlobbersThemesOptionsParams['titlepricingitem3']; ?></p>
				</li>
			<?php endif ?>
			<?php if ($Pricingtable_GlobbersThemesOptionsParams['option5item3'] == "1" ) : ?>
				<li class="price">
					<p><span><?php echo $Pricingtable_GlobbersThemesOptionsParams['option5pricingitem3']; ?></span><?php echo $Pricingtable_GlobbersThemesOptionsParams['option6pricingitem3']; ?></p>
				</li>
			<?php endif ?>
			<?php if ($Pricingtable_GlobbersThemesOptionsParams['option1item3'] == "1" ) : ?>
				<li>
				    <p><i class="fa fa-check"></i><?php echo $Pricingtable_GlobbersThemesOptionsParams['option1pricingitem3']; ?></p>
				</li>
			<?php else : ?>
				<li class="pclose">
				    <p><i class="fa fa-close"></i><?php echo $Pricingtable_GlobbersThemesOptionsParams['option1pricingitem3']; ?></p>
				</li>
			<?php endif ?>
			<?php if ($Pricingtable_GlobbersThemesOptionsParams['option2item3'] == "1" ) : ?>
				<li>
					<p><i class="fa fa-check"></i><?php echo $Pricingtable_GlobbersThemesOptionsParams['option2pricingitem3']; ?></p>
				</li>
			<?php else : ?>
				<li class="pclose">
					<p><i class="fa fa-close"></i><?php echo $Pricingtable_GlobbersThemesOptionsParams['option2pricingitem3']; ?></p>
				</li>
			<?php endif ?>
			<?php if ($Pricingtable_GlobbersThemesOptionsParams['option3item3'] == "1" ) : ?>
				<li>
					<p><i class="fa fa-check"></i><?php echo $Pricingtable_GlobbersThemesOptionsParams['option3pricingitem3']; ?></p>
				</li>
			<?php else : ?>
				<li class="pclose">
					<p><i class="fa fa-close"></i><?php echo $Pricingtable_GlobbersThemesOptionsParams['option3pricingitem3']; ?></p>
				</li>
			<?php endif ?>
			<?php if ($Pricingtable_GlobbersThemesOptionsParams['option4item3'] == "1" ) : ?>
				<li>
					<p><i class="fa fa-check"></i><?php echo $Pricingtable_GlobbersThemesOptionsParams['option4pricingitem3']; ?></p>
				</li>
			<?php else : ?>
				<li class="pclose">
					<p><i class="fa fa-close"></i><?php echo $Pricingtable_GlobbersThemesOptionsParams['option4pricingitem3']; ?></p>
				</li>
			<?php endif ?>
			
			<?php if ($Pricingtable_GlobbersThemesOptionsParams['buttonitem3'] == "1" ) : ?>
			    <li class="button-sign">
					<a href="<?php echo $Pricingtable_GlobbersThemesOptionsParams['buttonurlitem3']; ?>"><?php echo $Pricingtable_GlobbersThemesOptionsParams['buttonpricingitem3']; ?></a>
			    </li>
			<?php endif ?>
		</ul>
	</div>
	<div class="grid_3">
	    <ul class="pricing-table platinum">
			<?php if ($Pricingtable_GlobbersThemesOptionsParams['titleitem4'] == "1" ) : ?>
				<li class="title">
					<p><?php echo $Pricingtable_GlobbersThemesOptionsParams['titlepricingitem4']; ?></p>
				</li>
			<?php endif ?>
			<?php if ($Pricingtable_GlobbersThemesOptionsParams['option5item4'] == "1" ) : ?>
				<li class="price">
					<p><span><?php echo $Pricingtable_GlobbersThemesOptionsParams['option5pricingitem4']; ?></span><?php echo $Pricingtable_GlobbersThemesOptionsParams['option6pricingitem4']; ?></p>
				</li>
			<?php endif ?>
			<?php if ($Pricingtable_GlobbersThemesOptionsParams['option1item4'] == "1" ) : ?>
				<li>
				    <p><i class="fa fa-check"></i><?php echo $Pricingtable_GlobbersThemesOptionsParams['option1pricingitem4']; ?></p>
				</li>
			<?php else : ?>
				<li class="pclose">
				    <p><i class="fa fa-close"></i><?php echo $Pricingtable_GlobbersThemesOptionsParams['option1pricingitem4']; ?></p>
				</li>
			<?php endif ?>
			<?php if ($Pricingtable_GlobbersThemesOptionsParams['option2item4'] == "1" ) : ?>
				<li>
					<p><i class="fa fa-check"></i><?php echo $Pricingtable_GlobbersThemesOptionsParams['option2pricingitem4']; ?></p>
				</li>
			<?php else : ?>
				<li class="pclose">
					<p><i class="fa fa-close"></i><?php echo $Pricingtable_GlobbersThemesOptionsParams['option2pricingitem4']; ?></p>
				</li>
			<?php endif ?>
			<?php if ($Pricingtable_GlobbersThemesOptionsParams['option3item4'] == "1" ) : ?>
				<li>
					<p><i class="fa fa-check"></i><?php echo $Pricingtable_GlobbersThemesOptionsParams['option3pricingitem4']; ?></p>
				</li>
			<?php else : ?>
				<li class="pclose">
					<p><i class="fa fa-close"></i><?php echo $Pricingtable_GlobbersThemesOptionsParams['option3pricingitem4']; ?></p>
				</li>
			<?php endif ?>
			<?php if ($Pricingtable_GlobbersThemesOptionsParams['option4item4'] == "1" ) : ?>
				<li>
					<p><i class="fa fa-check"></i><?php echo $Pricingtable_GlobbersThemesOptionsParams['option4pricingitem4']; ?></p>
				</li>
			<?php else : ?>
				<li class="pclose">
					<p><i class="fa fa-close"></i><?php echo $Pricingtable_GlobbersThemesOptionsParams['option4pricingitem4']; ?></p>
				</li>
			<?php endif ?>
			
			<?php if ($Pricingtable_GlobbersThemesOptionsParams['buttonitem4'] == "1" ) : ?>
			    <li class="button-sign">
					<a href="<?php echo $Pricingtable_GlobbersThemesOptionsParams['buttonurlitem4']; ?>"><?php echo $Pricingtable_GlobbersThemesOptionsParams['buttonpricingitem4']; ?></a>
			    </li>
			<?php endif ?>
		</ul>
	</div>
</div>
					
		