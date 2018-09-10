<?php
$pageTitle = 'Feed';
require_once 'requires/header.php';
require_once 'requires/menu.php';
require_once 'requires/searchbar.php';
?>

			<div class="my-3 my-md-5">
				<div class="container">
					<div class="row">
						<div class="offset-lg-3 col-lg-6">
							<div class="card">
								

								<ul class="list-group card-list-group">
									<? foreach ($tweets as $tweet): ?>
									<li class="list-group-item py-5">
										<div class="media">
											<div class="media-object avatar avatar-md mr-4" style="background-image: url(<?= $tweet['avatar'] ?>)"></div>
											<div class="media-body">
												<div class="media-heading">
													<small class="float-right text-muted"><?= date('H:i d/m', $tweet['date_created']) ?></small>
													<h5><a href="/profile/<?= $tweet['name'] ?>"><?= $tweet['name'] ?></a></h5>
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
