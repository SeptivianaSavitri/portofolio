<?php
/**
 * Pricing table! Joomla Module 3.x 2.x
 * 
 */

class modPricingtable_GlobbersThemesHelper
{   

    public static function getContent( $params )
    {
        return 'No content';
    }	
	
	public static function getData( $params)
	{
			
		$Pricingtable_GlobbersThemesOptionsParams = array();
		$Pricingtable_GlobbersThemesOptionsParams['preText'] = $params->get( 'preText' );
		$Pricingtable_GlobbersThemesOptionsParams['titleitem1'] = $params->get( 'titleitem1' );
		$Pricingtable_GlobbersThemesOptionsParams['titlepricingitem1'] = $params->get( 'titlepricingitem1' );
		$Pricingtable_GlobbersThemesOptionsParams['option1item1'] = $params->get( 'option1item1' );
		$Pricingtable_GlobbersThemesOptionsParams['option1pricingitem1'] = $params->get( 'option1pricingitem1' );
		$Pricingtable_GlobbersThemesOptionsParams['option2item1'] = $params->get( 'option2item1' );
		$Pricingtable_GlobbersThemesOptionsParams['option2pricingitem1'] = $params->get( 'option2pricingitem1' );
		$Pricingtable_GlobbersThemesOptionsParams['option3item1'] = $params->get( 'option3item1' );
		$Pricingtable_GlobbersThemesOptionsParams['option3pricingitem1'] = $params->get( 'option3pricingitem1' );
		$Pricingtable_GlobbersThemesOptionsParams['option4item1'] = $params->get( 'option4item1' );
		$Pricingtable_GlobbersThemesOptionsParams['option4pricingitem1'] = $params->get( 'option4pricingitem1' );
		$Pricingtable_GlobbersThemesOptionsParams['option5item1'] = $params->get( 'option5item1' );
		$Pricingtable_GlobbersThemesOptionsParams['option5pricingitem1'] = $params->get( 'option5pricingitem1' );
		$Pricingtable_GlobbersThemesOptionsParams['option6pricingitem1'] = $params->get( 'option6pricingitem1' );
		$Pricingtable_GlobbersThemesOptionsParams['buttonitem1'] = $params->get( 'buttonitem1' );
		$Pricingtable_GlobbersThemesOptionsParams['buttonpricingitem1'] = $params->get( 'buttonpricingitem1' );
		$Pricingtable_GlobbersThemesOptionsParams['titleitem2'] = $params->get( 'titleitem2' );
		$Pricingtable_GlobbersThemesOptionsParams['titlepricingitem2'] = $params->get( 'titlepricingitem2' );
		$Pricingtable_GlobbersThemesOptionsParams['option1item2'] = $params->get( 'option1item2' );
		$Pricingtable_GlobbersThemesOptionsParams['option1pricingitem2'] = $params->get( 'option1pricingitem2' );
		$Pricingtable_GlobbersThemesOptionsParams['option2item2'] = $params->get( 'option2item2' );
		$Pricingtable_GlobbersThemesOptionsParams['option2pricingitem2'] = $params->get( 'option2pricingitem2' );
		$Pricingtable_GlobbersThemesOptionsParams['option3item2'] = $params->get( 'option3item2' );
		$Pricingtable_GlobbersThemesOptionsParams['option3pricingitem2'] = $params->get( 'option3pricingitem2' );
		$Pricingtable_GlobbersThemesOptionsParams['option4item2'] = $params->get( 'option4item2' );
		$Pricingtable_GlobbersThemesOptionsParams['option4pricingitem2'] = $params->get( 'option4pricingitem2' );
		$Pricingtable_GlobbersThemesOptionsParams['option5item2'] = $params->get( 'option5item2' );
		$Pricingtable_GlobbersThemesOptionsParams['option5pricingitem2'] = $params->get( 'option5pricingitem2' );
		$Pricingtable_GlobbersThemesOptionsParams['option6pricingitem2'] = $params->get( 'option6pricingitem2' );
		$Pricingtable_GlobbersThemesOptionsParams['buttonitem2'] = $params->get( 'buttonitem2' );
		$Pricingtable_GlobbersThemesOptionsParams['buttonpricingitem2'] = $params->get( 'buttonpricingitem2' );
		$Pricingtable_GlobbersThemesOptionsParams['titleitem3'] = $params->get( 'titleitem3' );
		$Pricingtable_GlobbersThemesOptionsParams['titlepricingitem3'] = $params->get( 'titlepricingitem3' );
		$Pricingtable_GlobbersThemesOptionsParams['option1item3'] = $params->get( 'option1item3' );
		$Pricingtable_GlobbersThemesOptionsParams['option1pricingitem3'] = $params->get( 'option1pricingitem3' );
		$Pricingtable_GlobbersThemesOptionsParams['option2item3'] = $params->get( 'option2item3' );
		$Pricingtable_GlobbersThemesOptionsParams['option2pricingitem3'] = $params->get( 'option2pricingitem3' );
		$Pricingtable_GlobbersThemesOptionsParams['option3item3'] = $params->get( 'option3item3' );
		$Pricingtable_GlobbersThemesOptionsParams['option3pricingitem3'] = $params->get( 'option3pricingitem3' );
		$Pricingtable_GlobbersThemesOptionsParams['option4item3'] = $params->get( 'option4item3' );
		$Pricingtable_GlobbersThemesOptionsParams['option4pricingitem3'] = $params->get( 'option4pricingitem3' );
		$Pricingtable_GlobbersThemesOptionsParams['option5item3'] = $params->get( 'option5item3' );
		$Pricingtable_GlobbersThemesOptionsParams['option5pricingitem3'] = $params->get( 'option5pricingitem3' );
		$Pricingtable_GlobbersThemesOptionsParams['option6pricingitem3'] = $params->get( 'option6pricingitem3' );
		$Pricingtable_GlobbersThemesOptionsParams['buttonitem3'] = $params->get( 'buttonitem3' );
		$Pricingtable_GlobbersThemesOptionsParams['buttonpricingitem3'] = $params->get( 'buttonpricingitem3' );		
		$Pricingtable_GlobbersThemesOptionsParams['titleitem4'] = $params->get( 'titleitem4' );
		$Pricingtable_GlobbersThemesOptionsParams['titlepricingitem4'] = $params->get( 'titlepricingitem4' );
		$Pricingtable_GlobbersThemesOptionsParams['option1item4'] = $params->get( 'option1item4' );
		$Pricingtable_GlobbersThemesOptionsParams['option1pricingitem4'] = $params->get( 'option1pricingitem4' );
		$Pricingtable_GlobbersThemesOptionsParams['option2item4'] = $params->get( 'option2item4' );
		$Pricingtable_GlobbersThemesOptionsParams['option2pricingitem4'] = $params->get( 'option2pricingitem4' );
		$Pricingtable_GlobbersThemesOptionsParams['option3item4'] = $params->get( 'option3item4' );
		$Pricingtable_GlobbersThemesOptionsParams['option3pricingitem4'] = $params->get( 'option3pricingitem4' );
		$Pricingtable_GlobbersThemesOptionsParams['option4item4'] = $params->get( 'option4item4' );
		$Pricingtable_GlobbersThemesOptionsParams['option4pricingitem4'] = $params->get( 'option4pricingitem4' );
		$Pricingtable_GlobbersThemesOptionsParams['option5item4'] = $params->get( 'option5item4' );
		$Pricingtable_GlobbersThemesOptionsParams['option5pricingitem4'] = $params->get( 'option5pricingitem4' );
		$Pricingtable_GlobbersThemesOptionsParams['option6pricingitem4'] = $params->get( 'option6pricingitem4' );
		$Pricingtable_GlobbersThemesOptionsParams['buttonitem4'] = $params->get( 'buttonitem4' );
		$Pricingtable_GlobbersThemesOptionsParams['buttonpricingitem4'] = $params->get( 'buttonpricingitem4' );
		$Pricingtable_GlobbersThemesOptionsParams['buttonurlitem1'] = $params->get( 'buttonurlitem1' );
		$Pricingtable_GlobbersThemesOptionsParams['buttonurlitem2'] = $params->get( 'buttonurlitem2' );
		$Pricingtable_GlobbersThemesOptionsParams['buttonurlitem3'] = $params->get( 'buttonurlitem3' );
		$Pricingtable_GlobbersThemesOptionsParams['buttonurlitem3'] = $params->get( 'buttonurlitem4' );
		
		$Pricingtable_GlobbersThemesOptionsParams['colorbutton'] = $params->get( 'colorbutton' );
		
		return $Pricingtable_GlobbersThemesOptionsParams;
	}
}


?>