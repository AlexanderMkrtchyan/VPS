<?php
/**
 * Template Name: Forgot Password
 *
 * @package WordPress
 * @subpackage qs
 * @since quigleyshore
 */
get_header();
?>
<form id="form-password-reset" action="" method="post">
  <?php wp_nonce_field( 'ajax-resetpassword-nonce', 'security' ); ?>
  <div class="text-align-center margin-bottom-32">
     <h3 class="h3">Reset Your Password</h3>
  </div>
  <div class="row">
     <div class="col-12 col-md-4">
        <div class="form-group">
           <label for="auth-password-reset-email">Email</label>
           <div class="form-input-wrapper">
              <input type="email" class="form-input" id="auth-password-reset-email" name="email" placeholder="eg. name@domain.com">
           </div>
        </div>
        <button type="submit" class="btn-solid btn-primary btn-block">
        Submit</button>
        <p class="form__error margin-top-16">
         
        </p>
     </div>
     <div class="col-12 col-md-4"></div>
  </div>
</form>


<script>
     jQuery(form).on('submit', function (event) {
    event.preventDefault(event)
    const email = $(`#auth-password-reset-email`).val()
    const security = $(`#security`).val()
    const action = 'authResetPassword'
    var has_error = false;

    if (email.length <= 0) {
     // TODO
      has_error = true;
    }

    if (security.length <= 0) {
      // TODO
      has_error = true;
    }

    if (has_error == true) {
      // TODO
      return false
    }

    jQuery.ajax({
      type: 'POST',
      dataType: 'json',
      url: ajax.ajaxurl,
      data: {  action, email, security },
      success: function (data) {
        if (data.status) {
           // TODO
        }
        if (!data.status) {
            // TODO
        }
      }
    })

    return false;
  })
</script>

<?php
    
get_footer();