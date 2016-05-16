(function($) {
	$(window).load(function () {
		var d = $('#clock').text();
		if(d != '') {
			var austDay = new Date(d);
			$('#clock').countdown({until: austDay});
		}
	});
})(jQuery);