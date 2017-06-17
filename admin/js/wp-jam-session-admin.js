(function( $ ) {
	'use strict';

	/**
	 * All of the code for your admin-facing JavaScript source
	 * should reside in this file.
	 *
	 * Note: It has been assumed you will write jQuery code here, so the
	 * $ function reference has been prepared for usage within the scope
	 * of this function.
	 *
	 * This enables you to define handlers, for when the DOM is ready:
	 *
	 * $(function() {
	 *
	 * });
	 *
	 * When the window is loaded:
	 *
	 * $( window ).load(function() {
	 *
	 * });
	 *
	 * ...and/or other possibilities.
	 *
	 * Ideally, it is not considered best practise to attach more than a
	 * single DOM-ready or window-load handler for a particular page.
	 * Although scripts in the WordPress core, Plugins and Themes may be
	 * practising this, we should strive to set a better example in our own work.
	 */

	 $( document ).ready(function() {
	 	$('[data-toggle="tooltip"]').tooltip();

	 	get_accepted_values();

	 	function get_accepted_values() {
	 		$.ajax({
	 			type: "POST",
	 			dataType: "text",
	 			url: $('#settings-form').attr('action'),
	 			data: {'sendvalues':'sent'},
	 			success: function(result) {
	 			document.close();
	 			result = JSON.parse(result);
	 			build_accepted_values(result);
      	}
	 		});
	 	}


	 	// Tigger a click event for to save settings
	 	// ajax call for all form data to be stored
	 	// in the options table
	 	$('#save-settings').click( function(event) {
	 		event.preventDefault();
	 		$.ajax({
	 			type: "POST",
	 			dataType: "text",
	 			url: $('#settings-form').attr('action'),
	 			data: $('#settings-form').serialize(),
	 			success: function(result) {
	 			document.close();
	 			result = JSON.parse(result);
	 			build_accepted_values(result);
      	}
	 		});

	 		$(this).val()='';
	 	});
	 });
	 
	 function build_accepted_values(values) {
// 	 	for (var i = 0; i < values.length; i++) {
// 		$('#accepted-values').append('<li class="list-group-item">' + values[i] + '</li>');
// }
		$.each(values, function (i, val) {
       $('#accepted-values').append('<li class="list-group-item" id="'+ val +'">' + val + '<span class="badge">x</span></li>');
       $('.list-group-item').hover(function() {
	 				$(this).toggleClass('active');
	 			});
    });

	 }

})( jQuery );