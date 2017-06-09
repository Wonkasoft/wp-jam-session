<?php
/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://wonkasoft.com
 * @since      1.0.0
 *
 * @package    Wp_Jam_Session
 * @subpackage Wp_Jam_Session/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<div id="settings-wrapper">
  <div class="container-fuild">
    <div class="row">
      <div class="col-xs-12 col-md-8">
       <div class="row">
        <div class="col-xs-12 setting-area">
            <ul class="nav nav-tabs">
              <li class="active"><a data-toggle="tab" href="#settings-tab">Settings</a></li>
            </ul> <!-- end nav-tabs -->
            <div class="tab-content">
              <div id="settings-tab" class="tab-pane fade in active">
                <div class="row">
                  <div class="col-xs-2">
                    <img class="img-responsive block-center jam-logo" src="<?php echo plugins_url('/wp-jam-session/admin/img/Jam-session-Logo.png'); ?>" />
                  </div>
                  <div class="col-xs-8">
                    <h1>JAM SESSION</h1>
                    <h4>Welcome to Jam Session!<br />
                          With Jam Session you can setup links with customized parameters that will automatically place the customized parameters into a form for the user.</h4>
                  </div>
                </div> <!-- end row -->
                <div class="row">
                  <div class="col-xs-12 form-area">
                    <form id="settings-form">
                    <div class="col-xs-4">
                      <div class="form-group">
                        <label for="url-para">URL Parameter: </label>
                        <p>example: ?yourParameterHere= <span class="help-badge"><strong>?</strong></span></p>
                        <input type="text" class="form-control" id="url-para">
                      </div>
                      <div class="form-group">
                        <label for="input-para">Inputs for validation: </label>
                        <p>example: ?yourParameterHere=thisInputHere <span class="help-badge"><strong>?</strong></span></p>
                        <input type="text" class="form-control" id="input-para">
                      </div>
                      <div class="form-group">
                        <label for="type-form">Type of Form: </label>
                        <p>example: Select form plugin <span class="help-badge"><strong>?</strong></span></p>
                        <select type="select" class="form-control" id="type-form">
                          <option>WooCommerce</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="field-id">Input Field ID: </label>
                        <p>example: Form Input ID to receive parameter input <span class="help-badge"><strong>?</strong></span></p>
                        <input type="text" class="form-control" id="field-id">
                      </div>
                      <div class="form-group">
                        <label for="WC-id">If WC form ID: </label>
                        <p>example: Form ID to receive parameter input <span class="help-badge"><strong>?</strong></span></p>
                        <input type="text" class="form-control" id="WC-id">
                      </div>
                      <div class="form-group">
                        <label for="term-time">Session Termination Time: </label>
                        <p>example: Time in hours to terminate session <span class="help-badge"><strong>?</strong></span></p>
                        <input type="text" class="col-xs-3 form-control" id="term-time">
                      </div>
                      </div>
                      <div class="col-xs-12">
                      <button type="submit" class="btn btn-primary pull-right">SAVE</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div> <!-- end settings-tab -->
            </div> <!-- end tab-content -->
        </div> <!-- end col setting-area -->
       </div> <!-- end row -->
      </div> <!-- end col -->
      <div class="col-xs-12 col-md-4 text-center ads-area">
        <div class="row">
          <div class="col-xs-12">
            <h1>Coming Projects</h1>
          </div> <!-- end col -->
        </div> <!-- end row -->
        <div class="row">
          <div class="col-xs-12">
            <img src="http://via.placeholder.com/300x250" />
          </div> <!-- end col -->
        </div> <!-- end row -->
        <div class="row">
          <div class="col-xs-12">
            <img src="http://via.placeholder.com/300x250" />
          </div> <!-- end col -->
        </div> <!-- end row -->
        <div class="row">
          <div class="col-xs-12">
            <p>What's not out there? <br />
                What business product/service/tool/app <br />
                would you like someone to create?</p>
            <button class="btn btn-primary">REQUEST</button>
          </div> <!-- end col -->
        </div> <!-- end row -->
        <div class="row">
          <div class="col-xs-12 donate-btn">
            <button class="btn btn-primary">DONATE</button>
          </div> <!-- end col -->
        </div> <!-- end row -->
      </div> <!-- end col -->
    </div> <!-- end row -->
  </div> <!-- end container-fuild -->
</div> <!-- end settings-wrapper -->