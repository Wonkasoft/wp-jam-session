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
  database_api( 'build_values_list', 'getvalues',WP_JAM_KIT.security);  
  }

// Tigger a click event for to save settings
// ajax call for all form data to be stored
// in the options table
$('#save-settings').click( function(event) {
  event.preventDefault();
  var data_send = $('#settings-form').serializeArray();
  database_api('save_settings', data_send, WP_JAM_KIT.security);
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
  var $temp = $("<input>");
  $("body").append($temp);
  $temp.val($(element).val()).select();
  document.execCommand("copy");
  $temp.remove();
}

// This is for sending data to update in the database or pull data from the database.
  function database_api( action, data, security) {
     var postMessage = $('#message');
     var loading = $('#save-settings .glyphicon');
     loading.show();
     var data_to_send = { 
      action: action, 
      data: data,
      security: security
    };
    $.ajax({
      type: "POST",
      dataType: "json",
      url: ajaxurl,
      data: data_to_send,
      success: function(result) {
            $('[name="input-para"]').val('');
            if (action == 'remove_value_item') {
              postMessage.addClass('updated');
              postMessage.html('<p>The accepted value ' + data + ' has been removed.</p>');
              build_accepted_values(result.data);
              $('#message>p').delay(5000).slideUp(500);
              $('#message>p').queue( function() {
                $('#message').removeClass('updated').dequeue();
              });
              $('#created-url').val('');
            }
            if (action == 'save_settings') {
              if ((true === result.success) && (result.data !== '')) {
                postMessage.toggleClass('updated');
                postMessage.html('<p>' + WP_JAM_KIT.success + '</p>');
                $('#message>p').delay(5000).slideUp(500);
                $('#message>p').queue( function() {
                  $('#message').toggleClass('updated').dequeue();
                });
                $('#created-url').val('');
                 build_accepted_values(result.data);
              } else {
                postMessage.toggleClass('error');
                postMessage.html('<p>' + WP_JAM_KIT.failure + '</p>');
                $('#message>p').delay(5000).slideUp(500);
                $('#message>p').queue( function() {
                  $('#message').toggleClass('error').dequeue();
                });
              }
              }
              if (action == 'build_values_list') {
              if ((true === result.success) && (result.data !== '')) {
                build_accepted_values(result.data);
              } else {
                postMessage.toggleClass('error');
                postMessage.html('<p>' + WP_JAM_KIT.failure + '</p>');
                $('#message>p').delay(5000).slideUp(500);
                $('#message>p').queue( function() {
                  $('#message').toggleClass('error').dequeue();
                });
              }
              }
            loading.hide();
      },
     error: function(error) {
            postMessage.toggleClass('error');
            postMessage.html('<p>' + WP_JAM_KIT.failure + '</p>');
            $('#message>p').delay(5000).slideUp(500);
            $('#message>p').queue( function() {
              $('#message').toggleClass('error').dequeue();
            });
          loading.hide();
          }
    });
  }

// This is for parsing the accepted values list on the WP-Jam-Session settings page.
function build_accepted_values(values) {

// for refreshing all accepted values
$('div.value-containers').remove();

// This builds the list of accepted values
$.each(values, function (i, val) {
  $('#accepted-values').append('<div class="input-group value-containers" id="' + val + '"><li class="list-group-item">' + val + '</li><span class="input-group-addon glyphicon glyphicon-remove-circle btn-danger removal-btn"></span></div>');
});

$('#message').delay(2000).fadeOut();

$('.list-group-item').hover( function() {
  $(this).toggleClass('active');
});

$('.removal-btn').click( function () {
  var value_id = $(this).parent('.value-containers').attr('id');
  database_api('remove_value_item', value_id, WP_JAM_KIT.security);
});

$('li.list-group-item').click( function () {
  var current_id = $(this).parent('.value-containers').attr('id');
  var url_link = $('#url-link').val();
  var url_para = $('#url-para').val();
  $('#message').addClass('updated');
  $('#message').html('<p>Your link has been created below with accepted value ' + current_id + '.</p>');
  $('#created-url').val( url_link + '?' + url_para + '=' + current_id);

  $('#message>p').delay(5000).slideUp(500);
  $('#message>p').queue( function() {
    $('#message').removeClass('updated').dequeue();
  });
});

}
})( jQuery );