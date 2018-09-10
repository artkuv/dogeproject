<?php
$pageTitle = $getProfile['name'] . ' profile';

require_once 'requires/header.php';
require_once 'requires/menu.php';
require_once 'requires/searchbar.php';
?>

			<div class="my-3 my-md-5">
				<div class="container">
					<div class="row">
						<div class="col-lg-4">
							<div class="card card-profile">
								<div class="card-header" style="background-image: url(/demo/photos/eberhard-grossgasteiger-311213-500.jpg);"></div>
								<div class="card-body text-center">
									<img class="card-profile-img" src="<?= $getProfile['avatar'] ?>">

									<h3 class="mb-3"><?= ucfirst($getProfile['name']) ?></h3>

									<p class="mb-4">
										<?= ucfirst($getProfile['about']) ?>
									</p>
								<? if($_SESSION['id'] !== $getProfile['id']): ?>
									<button class="btn btn-outline-primary btn-sm">
										<span class="fa fa-twitter"></span> Follow
									</button>
								<? else: ?>
									It's me :)
								<? endif; ?>
								</div>
							</div>
						</div>
						<div class="col-lg-8">
							<div class="card">

								<? if($_SESSION['id'] === $getProfile['id']): ?>

								<div class="card-header">
									<form action="/profile/<?= $_SESSION['name'] ?>" method="post">
									<div class="input-group">
										<input type="text" name="message" class="form-control" placeholder="Message">
										<div class="input-group-append">
											<button type="submit" class="btn btn-secondary">
												<b>Send</b>
											</button>
										</div>
									</div>
									</form>
								</div>

							<? endif; ?>

								<ul class="list-group card-list-group">



<? foreach ($tweets as $tweet): ?>
	
									<li class="list-group-item py-5">
										<div class="media">
											<div class="media-object avatar avatar-md mr-4" style="background-image: url(<?= $tweet['avatar'] ?>)"></div>
											<div class="media-body">
												<div class="media-heading">
													<small class="float-right text-muted"><?= date('H:i:s d/m',$tweet['date_created']) ?></small>
													<h5><?= $tweet['name'] ?></h5>
												</div>
												<div>
													<?= $tweet['content'] ?>
												</div>
											</div>
										</div>
									</li>
	
<? endforeach; ?>


									
								</ul>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

<?php
require_once 'requires/footer.php';
?>
