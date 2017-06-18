<?php
/**
 * Provide a markup area for the settings form for the plugin
 *
 * This file is used to markup the settings form aspects of the plugin.
 *
 * @link       https://wonkasoft.com
 * @since      1.0.0
 *
 * @package    Wp_Jam_Session
 * @subpackage Wp_Jam_Session/admin/partials
 */
?>

<div id="settings-tab" class="tab-pane fade in active">
  <div class="row">
    <div class="col-xs-2">
      <img class="img-responsive block-center jam-logo" src="<?php echo plugins_url('/wp-jam-session/admin/img/jam-session-logo.png'); ?>" />
    </div>
    <div class="col-xs-8">
      <h1>JAM SESSION</h1>
      <h4>Welcome to Jam Session!<br />
        With Jam Session you can setup links with customized parameters that will automatically place the customized parameters into a form for the user.</h4>
      </div>
    </div> <!-- end row -->
    <div class="row">
      <div class="col-xs-12 form-area">
        <form id="settings-form" action="<?php echo plugin_dir_url( __FILE__ ) . 'wp-jam-session-settings-ajax.php'; ?>">
          <div class="col-xs-5">
            <div class="form-group">
              <label for="url-para">Add URL Parameter: </label>
              <p>example: ?yourParameterHere= <span data-toggle="tooltip" data-placement="top" title="This would be where you would put your custom parameter." class="help-badge"><strong>?</strong></span></p>
              <input type="text" name="url-para" class="form-control" id="url-para" value="<?php echo get_option('wp-jam-session-url-para') ?>" maxlength="15">
            </div>
            <div class="form-group">
              <label for="type-form">Type of Form: </label>
              <p>example: Select form plugin <span data-toggle="tooltip" data-placement="top" title="Please select the type of form that you are using." class="help-badge"><strong>?</strong></span></p>
              <select type="select" name="type-form" class="form-control" id="type-form">
              <?php  
                $selected_option = get_option('wp-jam-session-type-form');
                switch ($selected_option) {
                  case 'WooCommerce': ?>
                    <option value="" disabled>Select your option</option>
                    <option value="WooCommerce" selected>WooCommerce</option>
                    <option value="Contact Forms 7">Contact Forms 7</option>
                    <option value="Ninja Forms">Ninja Forms</option>
                    <option value="Gravity Forms">Gravity Forms</option>
                    <?php
                    break;

                    case 'Contact Forms 7': ?>
                    <option value="" disabled>Select your option</option>
                    <option value="WooCommerce">WooCommerce</option>
                    <option value="Contact Forms 7" selected>Contact Forms 7</option>
                    <option value="Ninja Forms">Ninja Forms</option>
                    <option value="Gravity Forms">Gravity Forms</option>
                    <?php
                    break;

                    case 'Ninja Forms': ?>
                    <option value="" disabled>Select your option</option>
                    <option value="WooCommerce">WooCommerce</option>
                    <option value="Contact Forms 7">Contact Forms 7</option>
                    <option value="Ninja Forms" selected>Ninja Forms</option>
                    <option value="Gravity Forms">Gravity Forms</option>
                    <?php
                    break;

                    case 'Gravity Forms': ?>
                    <option value="" disabled>Select your option</option>
                    <option value="WooCommerce">WooCommerce</option>
                    <option value="Contact Forms 7">Contact Forms 7</option>
                    <option value="Ninja Forms">Ninja Forms</option>
                    <option value="Gravity Forms" selected>Gravity Forms</option>
                    <?php
                    break;
                  
                  default: ?>
                  <option value="" disabled selected>Select your option</option>
                  <option value="WooCommerce">WooCommerce</option>
                  <option value="Contact Forms 7">Contact Forms 7</option>
                  <option value="Ninja Forms">Ninja Forms</option>
                  <option value="Gravity Forms">Gravity Forms</option>
                  <?php
                    break;
                }
              ?>
              </select>
            </div>
            <div class="form-group">
              <label for="field-id">Input Field ID: </label>
              <p>example: Form Input ID to receive parameter input <span data-toggle="tooltip" data-placement="top" title="Place field ID that you want to place the parameters input into." class="help-badge"><strong>?</strong></span></p>
              <input type="text" name="field-id" class="form-control" id="field-id" value="<?php echo get_option('wp-jam-session-field-id') ?>" maxlength="25">
            </div>
            <div class="form-group">
              <label for="created-url">Here is your new URL with parameters: </label>
              <p>You can quickly copy this by clicking the clipboard button. <span data-toggle="tooltip" data-placement="top" title="You can quickly copy this link by clicking the button to the right of the url." class="help-badge"><strong>?</strong></span></p>
              <div class="input-group">
              <input type="hidden" name="url-link" class="form-control" id="url-link" value="<?php echo get_site_url(); ?>">
              <input name="created-url" id="created-url" class="form-control" value="" disabled><div class="input-group-btn copy-btn-div"><button id="copy-btn-id" class="btn btn-info" type="button"><i class="glyphicon glyphicon-copy copy-btn pull-right"></i></button>
              </div> <!-- end button wrap -->
              </div> <!-- end input-group -->
            </div> <!-- end form-group -->
          </div> <!-- end first col -->
          <div class="col-xs-5">
            <div class="form-group">
              <label for="input-para">Inputs for validation: </label>
              <p>example: ?yourParameterHere=thisInputHere <span data-toggle="tooltip" data-placement="top" title="This would be where you would put the input for your parameter." class="help-badge"><strong>?</strong></span></p>
              <input type="text" name="input-para" class="form-control" id="input-para" value="" maxlength="80">
            </div>
            <div class="form-group">
              <label for="WC-id">If WooCommerce then form ID: </label>
              <p>example: Form ID to receive parameter input <span data-toggle="tooltip" data-placement="top" title="If using Woocommerce form then place form ID here." class="help-badge"><strong>?</strong></span></p>
              <input type="text" name="WC-id" class="form-control" id="WC-id" value="<?php echo get_option('wp-jam-session-WC-id') ?>" maxlength="10">
            </div>
            <div class="form-group">
              <label for="term-time">Session Termination Time: </label>
              <p>example: Time in hours to terminate session <span data-toggle="tooltip" data-placement="top" title="Here you can set the time you allow for the users session." class="help-badge"><strong>?</strong></span></p>
              <input type="text" name="term-time" class="form-control" id="term-time" value="<?php echo get_option('wp-jam-session-term-time') ?>" maxlength="2">
            </div>
          </div> <!-- end second col -->
          <div class="col-xs-2">
          <?php 
          /**
          *
          * This is for displaying the accepted values list on the settings tab.
          *
          *
          * @since    1.0.0
          */
          include plugin_dir_path( __FILE__ ) . 'wp-jam-session-accepted-values.php'; 
          ?>

          </div>
          <div class="col-xs-12">
            <button type="submit" id="save-settings" class="btn jam-btn pull-right">SAVE</button>
          </div>
        </form>
        </div>
      </div>
    </div> <!-- end settings-tab -->