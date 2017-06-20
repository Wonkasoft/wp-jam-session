(function( $ ) {
	'use strict';

	/**
	 * All of the code for your public-facing JavaScript source
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
// $( document ).ready(function() {
// 	function get_form_information_values() {
//       var pluginTitle = $('.setting-area');
// 	  $.ajax({
// 	    type: "POST",
// 	    dataType: "json",
// 	    url: ajaxurl,
// 	    data: { 
// 	     action: 'save_values',
//             sendvalues: 'get_form_data',
//             security: WP_JAM_KIT.security
// 	  },
// 	    success: function(result) {
//             if (true === result.success) {
// 	       build_accepted_values(result.data);
//             } else {
//               $('#message').remove();
//               pluginTitle.before('<div id="message" class="error"><p>' + WP_JAM_KIT.failure + '</p></div>');
//               $('#message').delay(2000).fadeToggle(2000);
//             }
//       },
//      error: function(error) {
//             $('#message').remove();
//             pluginTitle.before('<div id="message" class="error"><p>' + WP_JAM_KIT.failure + '</p></div>');
//             $('#message').delay(2000).fadeToggle(2000);
//           }
// 	  });
// 	}
// });

})( jQuery );
