<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<style>
	body{background-image: url('assets/img/study-skills-assessments.jpg');}
</style>
<div class="main">
	<!-- Sign up form -->
	<section class="signup">
		<div class="container">
			<div class="signup-content">
				<div class="signup-form">
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
					<h2 class="form-title">Sign up</h2>
					<?= form_open() ?>
						<div class="form-group">
							<label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
							<input type="text" name="username" id="username" placeholder="Your a username"/>
						</div>
						<div class="form-group">
							<label for="email"><i class="zmdi zmdi-email"></i></label>
							<input type="email" name="email" id="email" placeholder="Your Email"/>
						</div>
						<div class="form-group">
							<label for="pass"><i class="zmdi zmdi-lock"></i></label>
							<input type="password" name="password" id="password" placeholder="Password"/>
						</div>
						<div class="form-group">
							<label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
							<input type="password" name="password_confirm" id="password_confirm" placeholder="Repeat your password"/>
						</div>
						<div class="form-group">
							<input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
							<label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
						</div>
						<div class="form-group form-button">
							<input type="submit" name="signup" id="signup" class="form-submit" value="Register"/>
						</div>
					</form>
				</div>
				<div class="signup-image">
					<figure><img src="<?= base_url('assets/img/signup-image.jpg') ?>" alt="sing up image"></figure>
					<a href="<?= base_url('login') ?>" class="signup-image-link">I am already member</a>
				</div>
			</div>
		</div>
	</section>
</div>