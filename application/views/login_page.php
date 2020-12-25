<?php
$this->load->view('header');
?>


<div class="d-flex flex-column justify-content-center" id="login-box">
	<div class="login-box-header">
		<h4 style="color:rgb(139,139,139);margin-bottom:0px;font-weight:400;font-size:27px;">Login</h4>
	</div>
	<form action="<?php echo base_url(); ?>index.php/user/login" method="POST" name="login_form">
		<?php
		if ($this->session->flashdata('error')) {
		?>
			<div class="alert alert-danger text-center" style="margin-top:20px;">
				<?php echo $this->session->flashdata('error'); ?>
			</div>
		<?php
		}
		?>
		<div class="login-box-content">
			<div class="fb-login box-shadow">
				<a class="d-flex flex-row align-items-center social-login-link" href="#"><i class="fa fa-facebook" style="margin-left:0px;padding-right:20px;padding-left:22px;width:56px;"></i>Login with Facebook</a>
			</div>
			<div class="gp-login box-shadow">
				<a class="d-flex flex-row align-items-center social-login-link" style="margin-bottom:10px;" href="#"><i class="fa fa-google" style="color:rgb(255,255,255);width:56px;"></i>Login with Google+</a>
			</div>
		</div>
		<div class="d-flex flex-row align-items-center login-box-seperator-container">
			<div class="login-box-seperator"></div>
			<div class="login-box-seperator-text">
				<p style="margin-bottom:0px;padding-left:10px;padding-right:10px;font-weight:400;color:rgb(201,201,201);">or</p>
			</div>
			<div class="login-box-seperator"></div>
		</div>
		<div class="email-login" style="background-color:#ffffff;">
			<input type="email" name="email" class="email-imput form-control" style="margin-top:10px;" required="" placeholder="Email">
			<input type="password" name="password" class="password-input form-control" style="margin-top:10px;" required="" placeholder="Password">
		</div>
		<div class="submit-row" style="margin-bottom:8px;padding-top:0px;">
			<button class="btn btn-primary btn-block box-shadow" id="submit-id-submit" type="submit">Login
			</button>
		</div>
	</form>

	<div id="login-box-footer" style="padding:10px 20px;padding-bottom:23px;padding-top:18px;">
		<p style="margin-bottom:0px;">Don't you have an account?
			<a id="register-link" href="<?php echo site_url('signup') ?>">Sign Up!</a>
		</p>
	</div>
</div>



<?php
$this->load->view('footer');
?>