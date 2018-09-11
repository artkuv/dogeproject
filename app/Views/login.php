<?php
$pageTitle = "Login";
require_once 'requires/header.php';
?>

<div class="page">
	<div class="page-single">
	<div class="container">
		<div class="row">
			<div class="col col-login mx-auto">
				<div class="text-center mb-6">
					<img src="/assets/brand/tabler.svg" class="h-6" alt="">
				</div>

				<form class="card" action="/login/enter" method="post">

	<div class="card-body p-6">
		<div class="card-title">Login to your account</div>

<? if(isset($error)): ?>
	<? if(count($error) > 0): ?>
		<? foreach ($error as $value): ?>
			<div class="error" style="color: red;"><?= $value ?></div>
		<? endforeach; ?>
	<? endif; ?>
<? endif; ?>

		<div class="form-group">
			<label class="form-label">Email address</label>
			<input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" value="<?= $email ?>">
		</div>
		<div class="form-group">
			<label class="form-label">
				Password
			</label>
			<input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
		</div>
		<div class="form-group">
			<label class="custom-control custom-checkbox">
				<input name="remember" type="checkbox" class="custom-control-input" />
				<span class="custom-control-label">Remember me</span>
			</label>
		</div>

		<div class="form-footer">
			<button type="submit" class="btn btn-primary btn-block">Sign in</button>
		</div>
	</div>
</form>

<div class="text-center text-muted">
	Don't have account yet? <a href="/registration">Sign up</a>
</div>
			</div>
		</div>
	</div>
</div>
</div>

</body>
</html>
