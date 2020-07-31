<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container">
	<div class="row">
    <div class="container">
        <form class="form-horizontal" method="post" id="form" action="<?php echo base_url();?>User/forgot">
			<fieldset>
	          <legend>Reset password</legend>
			
				<div class="control-group">
                    <span for="email"><b>Email</b></span>
					<input class="form-control" type="text" name="email" />
				</div><br>
                <button type="submit" class="btn btn_default">Send me email.</button><br>
                <?php if( isset($error)): ?>
					<div class="alert alert-error">
						<?php echo($error) ?>
					</div>
				<?php endif; ?>
			</fieldset>
		</form>
    </div>
	</div><!-- .row -->
</div><!-- .container -->