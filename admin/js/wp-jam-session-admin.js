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
  if ($('#accepted-values').length > 0) {
  get_accepted_values();  
  }

  function get_accepted_values() {
      var postMessage = $('#message');
	  $.ajax({
	    type: "POST",
	    dataType: "json",
	    url: ajaxurl,
	    data: { 
	     action: 'save_values',
            sendvalues: 'send',
            security: WP_JAM_KIT.security
	  },
	    success: function(result) {
            if (true === result.success) {
	       build_accepted_values(result.data);
            } else {
             postMessage.addClass('error');
             postMessage.html('<p>' + WP_JAM_KIT.failure + '</p>');
             $('#message').slideDown('slow');
           }
      },
     error: function(error) {
           postMessage.addClass('error');
           postMessage.html('<p>' + WP_JAM_KIT.failure + '</p>');
           $('#message').slideDown('slow');
         }
	  });
	}


// Tigger a click event for to save settings
// ajax call for all form data to be stored
// in the options table
$('#save-settings').click( function(event) {
  event.preventDefault();
  var postMessage = $('#message');
  var data_send = $('#settings-form').serializeArray();
  data_send.push({name: 'action', value: 'save_values'},{name: 'security', value: WP_JAM_KIT.security});
  data_send = $.param(data_send);
  $.ajax({
    type: "POST",
    dataType: "json",
    url: ajaxurl,
    data: data_send,
    success: function(result) {
      if (true === result.success) {
        $('[name="input-para"]').val('');
        postMessage.addClass('updated').html('<p>' + WP_JAM_KIT.success + '</p>');
        $('#message').slideDown(2000);
        build_accepted_values(result.data);
      }
    },
    error: function(error) {
      postMessage.addClass('error').html('<p>' + WP_JAM_KIT.failure + '</p>');
      $('#message').slideDown(2000);
    }
  });
});
$('#copy-btn-id').click( function () {
  copy_to_clipboard('#created-url');
});
$('.copy-btn-div').click( function () {
  copy_to_clipboard('#created-url');
});
});

// For created url copy to clipboard
function copy_to_clipboard(element) {
  console.log(element);
  var $temp = $("<input>");
  $("body").append($temp);
  $temp.val($(element).val()).select();
  document.execCommand("copy");
  $temp.remove();
}

function build_accepted_values(values) {

// for refreshing all accepted values
$('div.value-containers').remove();

// This builds the list of accepted values
$.each(values, function (i, val) {
  $('#accepted-values').append('<div class="input-group value-containers" id="' + val + '"><li class="list-group-item">' + val + '</li><span class="input-group-addon glyphicon glyphicon-remove-circle btn-danger removal-btn"></span></div>');
});

$('.list-group-item').hover( function() {
  $(this).toggleClass('active');
});

$('.removal-btn').click( function () {
  var value_id = $(this).parent('.value-containers').attr('id');
  accepted_value('remove-value', value_id);
});

$('li.list-group-item').click( function () {
  var current_id = $(this).parent('.value-containers').attr('id');
  accepted_value('current-value', current_id);
});

}

// ajax call for deleting accepted values and calling current accepted value.
function accepted_value(purpose, value) {
  var pass_info = purpose + '=' + value + '&action=save_values&security=' + WP_JAM_KIT.security;
  var postMessage = $('#message');
  $.ajax({
    type: "POST",
    dataType: "json",
    url: ajaxurl,
    data: pass_info,
    success: function(result) {
      if (purpose == 'remove-value') {
       postMessage.addClass('updated');
       $('#message').slideDown('slow');
       postMessage.html('<p>The accepted value ' + value + ' has been removed.</p>');
       build_accepted_values(result.data);
       $('#created-url').val('');
     }
      if (purpose == 'current-value') {
        $('#created-url').val(result.data);
      }
    },
    error: function(error) {
      console.log(error);
      postMessage.html('<p>' + WP_JAM_KIT.failure + '</p>');
      $('#message').slideDown(2000);
    }
  });
}

})( jQuery );