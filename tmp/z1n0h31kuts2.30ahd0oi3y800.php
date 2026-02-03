
<div class="main">
	<form method="post" action="<?= ($BASE) ?>/admins/auth" class="login">
		<h5>Login</h5>
		<?php if (isset($message)): ?>
		<p class="message"><?= ($message) ?></p>
		<?php endif; ?>
		<p>
			<label for="user_id"><small>User ID</small></label><br />
			<input id="user_id" name="user_id" type="text" <?= (isset($POST['user_id'])?('value="'.$POST['user_id'].'"'):'') ?> />
		</p>
		<p>
			<label for="password"><small>Password</small></label><br />
			<input id="password" name="password" type="password" />
		</p>
		<?php if (isset($message)): ?>
		<p>
			<label for="captcha"><small>CAPTCHA</small></label><br />
			<img src="<?= ($captcha) ?>" title="captcha" />
			<input id="captcha" name="captcha" type="text" />
		</p>
		<?php endif; ?>
		<p>
			<input type="submit" />
		</p>
	</form>
</div>