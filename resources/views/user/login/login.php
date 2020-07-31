<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<style>
	body{background-image: url('assets/img/study-skills-assessments.jpg');}
</style>
<script src="https://apis.google.com/js/platform.js" async defer></script>
<div class="main">
	<section class="sign-in">
		<div class="container">
			<div class="signin-content">
				<div class="signin-image">
					<figure><img src="<?= base_url('assets/img/signin-image.jpg') ?>" alt="sing up image"></figure>
					<a href="<?= base_url('register') ?>" class="signup-image-link">Create an account</a>
				</div>

				<div class="signin-form">
				<?php if (validation_errors()) : ?>
					<div class="col-md-12">
						<div class="alert" role="alert" style="color:red;">
							<?= validation_errors() ?>
						</div>
					</div>
				<?php endif; ?>
				<?php if (isset($error)) : ?>
					<div class="col-md-12">
						<div class="alert" role="alert" style="color:red;">
							<?= $error ?>
						</div>
					</div>
				<?php endif; ?>
					<h2 class="form-title">Sign in</h2>
					<?= form_open() ?>
						<div class="form-group">
							<label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
							<input type="text" name="username" id="username" placeholder="Your Email"/>
						</div>
						<div class="form-group">
							<label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
							<input type="password" name="password" id="password" placeholder="Password"/>
						</div>
						<div class="form-group">
							<input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
							<label for="remember-me" class="label-agree-term"><span><span></span></span>Remember me</label>
							<a href="<?php echo base_url();?>User/forgot_password">Forgot password?</a>
						</div>
						<div class="form-group form-button">
							<input type="submit" name="signin" id="signin" class="form-submit" value="Login"/>
						</div>
					</form>
					<div class="social-login">
						<!-- <span class="social-label">Or login with</span> -->
						<ul class="socials">
							<!-- <li><a href="#"><i class="display-flex-center zmdi zmdi-facebook"></i></a></li>
							<li><a href="#"><i class="display-flex-center zmdi zmdi-twitter"></i></a></li> -->
							<li class="g-signin2" data-onsuccess="onSignIn" onclick="ClickLogin()"><a><i class="display-flex-center zmdi zmdi-google"></i></a></li>
							<!-- div class="g-signin2" data-onsuccess="onSignIn"></div>  -->
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
<script>
	var clicked=false;//Global Variable
	function ClickLogin()
	{
		clicked=true;
	}
      function onSignIn(googleUser) {
		  if(clicked){
				// Useful data for your client-side scripts:
				var profile = googleUser.getBasicProfile();
				console.log("ID: " + profile.getId()); // Don't send this directly to your server!
				var name = profile.getName();
				var email = profile.getEmail();
				console.log('Full Name: ' + profile.getName());
				console.log('Given Name: ' + profile.getGivenName());
				console.log('Family Name: ' + profile.getFamilyName());
				console.log("Image URL: " + profile.getImageUrl());
				console.log("Email: " + profile.getEmail());

				// The ID token you need to pass to your backend:
				var id_token = googleUser.getAuthResponse().id_token;
				console.log("ID Token: " + id_token);
				$.ajax({
					url: BASE_URL + '/User/googlelogin',
					data: {
						name: name,
						email: email,
					},
					error: function(e) {
						console.log(e);
					},
					dataType: 'json',
					success: function(data) {
						console.log(data);
						if(data['t_id'] == null || data['t_id'] == '')
						{
							document.location.href = BASE_URL + 'User/marks';
						}
						else{
							document.location.href = BASE_URL + 'Tablemanagement/loadtable?t_id=' + data['t_id'];
						}
					},
					type: 'POST'
				});
			}
      }
    </script>