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

  if ($('#accepted-values').length > 0) {
// Get accepted values on load
get_accepted_values();	
}

function get_accepted_values() {
  $.ajax({
    type: "POST",
    dataType: "text",
    url: $('#settings-form').attr('action'),
    data: {'sendvalues':'sent'},
    success: function(result) {
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

      $('[name="input-para"]').val('');
      result = JSON.parse(result);
      build_accepted_values(result);
    }
  });
});
$('#copy-btn-id').click( function () {
  copy_to_clipboard('#created-url');
});
$('#created-url').click( function () {
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

function accepted_value(purpose, value) {
  var pass_info = purpose + '=' + value;
  $.ajax({
    type: "POST",
    dataType: "text",
    url: $('#settings-form').attr('action'),
    data: pass_info,
    success: function(result) {
      console.log(result);
      if (purpose == 'remove-value') {
        result = JSON.parse(result);
        build_accepted_values(result);
        $('#created-url').val('');
      }
      if (purpose == 'current-value') {
        $('#created-url').val(result);
      }
    }
  });
}

})( jQuery );