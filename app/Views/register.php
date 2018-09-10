<?php
$pageTitle = "Registration";
require_once 'requires/header.php';
?>

<div class="page">
	<div class="page-single">
	<div class="container">
		<div class="row">
			<div class="col col-login mx-auto">
				<div class="text-center mb-6">
					<img src="./assets/brand/tabler.svg" class="h-6" alt="">
				</div>

				<form class="card" action="registration/save" method="post">
	<div class="card-body p-6">
		<div class="card-title">Create new account</div>
<? if(isset($error)): ?>
	<? if(count($error) > 0): ?>
		<? foreach ($error as $value): ?>
			<div class="error" style="color: red;"><?= $value ?></div>
		<? endforeach; ?>
	<? endif; ?>
<? endif; ?>
		<div class="form-group">
			<label class="form-label">Name</label>
			<input name="name" type="text" class="form-control" placeholder="Enter name">
		</div>
		<div class="form-group">
			<label class="form-label">Email address</label>
			<input name="email" type="email" class="form-control" placeholder="Enter email">
		</div>
		<div class="form-group">
			<label class="form-label">Password</label>
			<input name="password" type="password" class="form-control" placeholder="Password">
		</div>
		<div class="form-group">
			<label class="custom-control custom-checkbox">
				<input name="checkbox" type="checkbox" class="custom-control-input" required />
				<span class="custom-control-label">Agree the <a href="terms.html">terms and policy</a></span>
			</label>
		</div>

		<div class="form-footer">
			<button type="submit" class="btn btn-primary btn-block">Create new account</button>
		</div>
	</div>
</form>

<div class="text-center text-muted">
	Already have account? <a href="/login">Sign in</a>
</div>
			</div>
		</div>
	</div>
</div>
</div>

</body>
</html>
