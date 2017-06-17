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

	 	// Get accepted values on load
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

	 			$('[name="input-para"]').val('');
	 			result = JSON.parse(result);
	 			build_accepted_values(result);
      	}
	 		});
	 	});
	 });
	 
	 function build_accepted_values(values) {

	 	// for refreshing all accepted values
	 	$('.list-group-item').remove();

	 	// This builds the list of accepted values
		$.each(values, function (i, val) {
    	$('#accepted-values').append('<li class="list-group-item" id="' + val + '">' + val + '<span class="badge value-badge">x</span></li>');
    });

		$('.list-group-item').hover( function() {
	 		$(this).toggleClass('active');
	 	});

	 	$('.value-badge').click( function () {
	 		var html_text = $(this).parent('li').attr('id');
	 		remove_accepted_value(html_text);
	 	});

	 }

	 function remove_accepted_value(value) {
	 	$.ajax({
	 			type: "POST",
	 			dataType: "text",
	 			url: $('#settings-form').attr('action'),
	 			data: {'remove-value': value },
	 			success: function(result) {
	 			document.close();
	 			result = JSON.parse(result);
	 			build_accepted_values(result);
      				}
	 		});
	 }

})( jQuery );