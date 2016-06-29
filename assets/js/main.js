jQuery(document).ready(function() {

	/**
	 * Animate each "Line" type progressbar
	 */
	jQuery.each(jQuery('.progressbar-line'), function(index, value) {
		var id = jQuery(this).attr('id');
		var value = jQuery(this).attr("data-value");
		var bar = new ProgressBar.Line('#' + id);
		bar.animate(value);
	});



	/**
	 * Animate each "Circle" type progressbar
	 */
	jQuery.each(jQuery('.progressbar-circle'), function(index, value) {
		var id = jQuery(this).attr('id');
		var value = jQuery(this).attr("data-value");
		var circle = new ProgressBar.Circle('#' + id);
		circle.animate(value);
	});



	/**
	 * Animate each "Semicircle" type progressbar
	 */
	jQuery.each(jQuery('.progressbar-semicircle'), function(index, value) {
		var id = jQuery(this).attr('id');
		var value = jQuery(this).attr("data-value");
		var semicircle = new ProgressBar.SemiCircle('#' + id);
		semicircle.animate(value);
	});




});