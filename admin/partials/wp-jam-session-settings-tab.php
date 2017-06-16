<?php
/*
*
* This is for displaying the settings tab for Jam Session.
*
*
*/
?>

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
                        <p>example: ?yourParameterHere= <span data-toggle="tooltip" data-placement="top" title="This would be where you would put your custom parameter." class="help-badge"><strong>?</strong></span></p>
                        <input type="text" class="form-control" id="url-para">
                      </div>
                      <div class="form-group">
                        <label for="input-para">Inputs for validation: </label>
                        <p>example: ?yourParameterHere=thisInputHere <span data-toggle="tooltip" data-placement="top" title="This would be where you would put the input for your parameter." class="help-badge"><strong>?</strong></span></p>
                        <input type="text" class="form-control" id="input-para">
                      </div>
                      <div class="form-group">
                        <label for="type-form">Type of Form: </label>
                        <p>example: Select form plugin <span data-toggle="tooltip" data-placement="top" title="Please select the type of form that you are using." class="help-badge"><strong>?</strong></span></p>
                        <select type="select" class="form-control" id="type-form">
                          <option>WooCommerce</option>
                          <option>Contact Forms 7</option>
                          <option>Ninja Forms</option>
                          <option>Gravity Forms</option>
                        </select>
                      </div>
                      </div> <!-- end first col -->
                      <div class="col-xs-4">
                      <div class="form-group">
                        <label for="field-id">Input Field ID: </label>
                        <p>example: Form Input ID to receive parameter input <span data-toggle="tooltip" data-placement="top" title="Place field ID that you want to place the parameters input into." class="help-badge"><strong>?</strong></span></p>
                        <input type="text" class="form-control" id="field-id">
                      </div>
                      <div class="form-group">
                        <label for="WC-id">If WC form ID: </label>
                        <p>example: Form ID to receive parameter input <span data-toggle="tooltip" data-placement="top" title="If using Woocommerce form then place form ID here." class="help-badge"><strong>?</strong></span></p>
                        <input type="text" class="form-control" id="WC-id">
                      </div>
                      <div class="form-group">
                        <label for="term-time">Session Termination Time: </label>
                        <p>example: Time in hours to terminate session <span data-toggle="tooltip" data-placement="top" title="Here you can set the time you allow for the users session." class="help-badge"><strong>?</strong></span></p>
                        <input type="text" class="col-xs-3 form-control" id="term-time">
                      </div>
                      </div> <!-- end second col -->
                      <div class="col-xs-12">
                      <button type="submit" class="btn jam-btn pull-right">SAVE</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div> <!-- end settings-tab -->