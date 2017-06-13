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
              <li><a data-toggle="tab" href="#faq-tab">FAQ</a></li>
            </ul> <!-- end nav-tabs -->
            <div class="tab-content">
            <?php include plugin_dir_path( __FILE__ ) . 'wp-jam-session-settings-tab.php'; ?>
            <?php include plugin_dir_path( __FILE__ ) . 'wp-jam-session-faq-tab.php'; ?>
              
            </div> <!-- end tab-content -->
        </div> <!-- end col setting-area -->
       </div> <!-- end row -->
      </div> <!-- end col -->
      <div class="col-xs-12 col-md-4 text-center ads-area">
        <div class="row">
          <div class="col-xs-12">
            <h1>NEWS & UPDATES</h1>
          </div> <!-- end col -->
        </div> <!-- end row -->
        <div class="row">
          <div class="col-xs-12">
            <img src="<?php echo plugins_url('/wp-jam-session/admin/img/clixplit-ad.jpg'); ?>" />
          </div> <!-- end col -->
        </div> <!-- end row -->
        <div class="row">
          <div class="col-xs-12">
            <img src="<?php echo plugins_url('/wp-jam-session/admin/img/wonkasoft-ad.jpg'); ?>" />
          </div> <!-- end col -->
        </div> <!-- end row -->
        <div class="row">
          <div class="col-xs-12">
            <p>What's not out there? <br />
                What business product/service/tool/app <br />
                would you like someone to create?</p>
            <button class="btn btn-primary" data-toggle="modal" data-target="#idea-form">REQUEST</button>

            <!-- Modal -->
              <div class="modal fade" id="idea-form" role="dialog">
                <div class="modal-dialog">
                
                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Got an Idea?</h4>
                    </div>
                    <div class="modal-body">
                      <p>Some text in the modal.</p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                  
                </div>
              </div>
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