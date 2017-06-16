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
      <div class="col-xs-12 col-md-4 ads-area">
        <div class="row">
          <div class="col-xs-12 text-center">
            <h1>NEWS & UPDATES</h1>
          </div> <!-- end col -->
        </div> <!-- end row -->
        <div class="row">
          <div class="col-xs-12 text-center">
            <img src="<?php echo plugins_url('/wp-jam-session/admin/img/clixplit-ad.jpg'); ?>" />
          </div> <!-- end col -->
        </div> <!-- end row -->
        <div class="row">
          <div class="col-xs-12 text-center">
            <img src="<?php echo plugins_url('/wp-jam-session/admin/img/wonkasoft-ad.jpg'); ?>" />
          </div> <!-- end col -->
        </div> <!-- end row -->
        <div class="row">
          <div class="col-xs-12  text-center">
            <p>What's not out there? <br />
                What business product/service/tool/app <br />
                would you like someone to create?</p>
            <button class="btn jam-btn" data-toggle="modal" data-target="#idea-form">REQUEST</button>
            </div> <!-- end col -->
            <!-- Modal -->
              <div class="modal fade" id="idea-form" role="dialog">
                <div class="modal-dialog">
                <?php $first_num = rand(0,9); $second_num = rand(0,9); $js_validation = $first_num + $second_num; 
                $errName = "";
                $errEmail = "";
                $errHuman = "";
                $result = "";
                if (isset($_POST['submit'])) {
                  $name = sanitize_text_field($_POST['name']);
                  $email = sanitize_email($_POST['email']);
                  $message = sanitize_textarea_field($_POST['message']);
                  $human = intval($_POST['human']);
                  $from = 'WP JAM SESSION REQUEST FORM'; 
                  $to = 'support@wonkasoft.com'; 
                  $subject = 'Message from Jam Session request form';
                   
                  $body = "From: $name\n E-Mail: $email\n Message:\n $message";
                  if (!$_POST['name']) {
                    $errName = 'Please enter your name';
                  }
                  if (!$_POST['email'] || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                    $errEmail = 'Please enter a valid email address';
                  }
                  if ($human !== $js_validation) {
                    $errHuman = 'Your anti-spam is incorrect';
                  }
                  // If there are no errors, send the email
                  if (!$errName && !$errEmail && !$errMessage && !$errHuman) {
                    if (mail ($to, $subject, $body, $from)) {
                      $result='<div class="alert alert-success">Thank You! I will be in touch</div>';
                    } else {
                      $result='<div class="alert alert-danger">Sorry there was an error sending your message. Please try again later</div>';
                    }
                  }
                }
                ?>
                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header text-center">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Got an Idea?</h4>
                    </div>
                    <div class="modal-body">
                      <form class="form-horizontal" role="form" method="post">
  <div class="form-group">
    <div class="col-xs-12">
      <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="">
      <?php echo "<p class='text-danger'>$errName</p>";?>
    </div>
  </div>
  <div class="form-group">
    <div class="col-xs-12">
      <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="">
      <?php echo "<p class='text-danger'>$errEmail</p>";?>
    </div>
  </div>
  <div class="form-group">
    <div class="col-xs-12">
      <textarea class="form-control" rows="4" name="message" placeholder="Your Message"></textarea>
    </div>
  </div>
  <div class="form-group">
    <div class="col-xs-12">
      <input type="text" class="form-control" id="human" name="human" placeholder="<?php echo $first_num . ' + ' . $second_num . ' = ?'; ?>" value="">
      <?php echo "<p class='text-danger'>$errHuman</p>";?>
    </div>
  </div>
  <div class="form-group">
    <div class="col-xs-12">
      <input id="submit" name="submit" type="submit" value="Send" class="btn jam-btn">
    </div>
  </div>
  <div class="form-group">
    <div class="col-xs-12">
      <?php echo $result; ?>
    </div>
  </div>
</form>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn jam-btn" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                  
                </div>
              </div>

        </div> <!-- end row -->
        <div class="row">
          <div class="col-xs-12 text-center donate-btn">
            <button class="btn jam-btn">DONATE</button>
          </div> <!-- end col -->
        </div> <!-- end row -->
      </div> <!-- end col -->
    </div> <!-- end row -->
  </div> <!-- end container-fuild -->
</div> <!-- end settings-wrapper -->