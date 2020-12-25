<?php
$this->load->view('header');
?>


<div class="d-flex flex-column justify-content-center" id="login-box">
	<div class="login-box-header">
		<h4 style="color:rgb(139,139,139);margin-bottom:0px;font-weight:400;font-size:27px;">Login</h4>
	</div>
	<form action="<?php echo base_url(); ?>index.php/user/registration" method="POST" name="registration_form">

		<div class="email-login" style="background-color:#ffffff;">
			<input type="text" name="fname" class=" form-control" style="margin-top:10px;" required="" placeholder="First Name">
			<input type="text" name="lname" class=" form-control" style="margin-top:10px;" required="" placeholder="Last Name">

			<input type="email" name="email" class="email-imput form-control" style="margin-top:10px;" required="" placeholder="Email">
			<input type="password" name="password" class="password-input form-control" style="margin-top:10px;" required="" placeholder="Password">
		</div>
		<div class="submit-row" style="margin-bottom:8px;padding-top:0px;">
		<input type="submit" name="save" value="Sign up" class="btn btn-primary btn-block box-shadow"/>
			
		</div>
	</form>


	<div id="login-box-footer" style="padding:10px 20px;padding-bottom:23px;padding-top:18px;">
		<p style="margin-bottom:0px;">Already Registered
			<a id="register-link" href="<?php echo site_url(); ?>">Log In!</a>
		</p>
	</div>
</div>



<?php
$this->load->view('footer');
?>