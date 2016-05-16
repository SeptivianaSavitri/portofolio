jQuery.noConflict();
jQuery('document').ready(function() {
	
	//jQuery('.deleteme').parents('.controls').parents('.control-group').remove();
	jQuery('.deleteme').remove();
	var moduletype = jQuery("#jform_params_moduletype").val();	
		
	showHideYoutubeOption(moduletype);
	showHideFontResponsive();
	
	

	jQuery("#jform_params_moduletype").change(function() {
			moduletype = jQuery("#jform_params_moduletype").val();
			
			showHideYoutubeOption(moduletype);
		});
		
	jQuery("#jformparamsslideoption_textresponsive").change(function() {
			
			showHideFontResponsive();
		});
		
	jQuery("#jformparamsslideoption_slidetype").change(function() {
		
			showHideSlideOption();						
		});
	
	jQuery('.slideConfigTitle').click(function(event){
		event.preventDefault();
		
		if(jQuery(this).hasClass('Opened')){ 
			jQuery(this).removeClass('Opened');
			jQuery(this).parents('p:first').next().slideUp('fast');
		}else{
			jQuery('.slideConfigTitle').removeClass('Opened');
			jQuery('.slideconfig').slideUp('fast');
			
			jQuery(this).addClass('Opened');
			jQuery(this).parents('p:first').next().slideDown('fast');
		}		
	});
	jQuery('.fontpre').each(function(){
		var font = jQuery(this).val();
		jQuery(this).next().next().addClass(font);
	});
	
	jQuery("#jformparamsslideoption_arrow").change(function() {			
			var img = 'next'+jQuery(this).val()+'.png';			
			jQuery(this).next().next().attr('src', jQuery('#assetsPath').val()+'img/arrows/'+img);			
		});
	jQuery('.subitem input').attr('aria-invalid', 'false');
});

function showHideYoutubeOption(show){
	if(show == 1){
		jQuery('#youtubeoption').parents('.control-group:first').show();
		jQuery('#slideshowoption').parents('.control-group:first').hide();
	}else{
		jQuery('#youtubeoption').parents('.control-group:first').hide();
		jQuery('#slideshowoption').parents('.control-group:first').show();
		showHideSlideOption();
	}	
}

function showHideSlideOption(){
	var slidetype = jQuery("#jformparamsslideoption_slidetype").val();
	if(slidetype == 0){ // supersized		
		jQuery('#bgssoption').show();
		jQuery('#ssoption').hide();
	}else{ // responsive
		jQuery('#bgssoption').hide();
		jQuery('#ssoption').show();
	}
}
function fontpreview(obj){
	var font = jQuery(obj).val();
	//reset class
	jQuery(obj).next().next().attr('class', '');
	if(font != 'none'){
		jQuery(obj).next().next().addClass(font);
	}
}
function showHideFontResponsive(){
	
	var type = jQuery("#jformparamsslideoption_textresponsive").val();
	if(type == 0){
		jQuery('.jffonsize').show();
	}else{
		jQuery('.jffonsize').hide();
	}
}