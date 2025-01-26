<style media="screen">
#login {
  width: 350px
}

input.error {
  box-shadow: 0 0 3px #d92800 !important;
  border: 1px solid #d92800 !important;
}
</style>

<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer></script>
<script src="<?php bloginfo('template_url');?>/js/jquery-3.7.1.min.js">
</script>
<script src="<?php bloginfo('template_url');?>/scripts/jquery.validate.min.js">
</script>

<div>
  <div id="form_recaptcha" class="required"></div>
</div><br />

<script type="text/javascript">
$(document).ready(function() {
  $("#loginform").validate({
    rules: {
      log: "required",
      pwd: "required",
    },
    messages: {
      log: "",
      pwd: "",
    }
  });
});
var onloadCallback = function() {
  grecaptcha.render('form_recaptcha', {
    'sitekey': '<?= RECAPTCHA_SITEKEY ?>'
  });
};
</script>