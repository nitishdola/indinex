<?php $this->load->view('auth/layout/header'); ?>
<div class="limiter">
  <div class="container-login100" style="background-image: url('<?php echo base_url();?>assets/auth/images/bg-01.jpg');">
    <div class="wrap-login100 p-l-110 p-r-110 p-t-62 p-b-33">
      <?php 
      $attributes = array('class' => 'login100-form validate-form flex-sb flex-w', 'id' => 'login-form');
      echo form_open('auth/login', $attributes);
      ?> 
        <span class="login100-form-title p-b-53">
          <img src="<?php echo base_url();?>assets/auth/images/indinex_logo.png" />
        </span>
        
        <div class="p-t-31 p-b-9">
          <span class="txt1">
            <?php echo lang('login_identity_label', 'identity');?>
          </span>
        </div>
        <div class="wrap-input100 validate-input" data-validate = "Username is required">
          <?php echo form_input($identity);?>
          <span class="focus-input100"></span>
        </div>
        
        
        <div class="p-t-31 p-b-9">
          <span class="txt1">
            <?php echo lang('login_password_label', 'password');?>
          </span>
        </div>

        <div class="wrap-input100 validate-input" data-validate = "Password is required">
          <?php echo form_input($password);?>
          <span class="focus-input100"></span>
        </div>

      
        <div class="wrap-input100 validate-input" data-validate = "Password is required">
          <span class="focus-input100"></span>
        </div>

        <div class="container-login100-form-btn m-t-17">
          <button class="login100-form-btn" type="submit">
            <?php echo lang('login_submit_btn'); ?>
          </button>
        </div>
      <?php echo form_close();?>
    </div>
  </div>
</div>
<?php $this->load->view('auth/layout/footer'); ?>