<?php
$pageTitle = 'Settings';
require_once 'requires/header.php';
require_once 'requires/menu.php';
require_once 'requires/searchbar.php';
?>
<div class="my-3 my-md-5">
       <div class="container">
           <div class="row">
               <div class="col-lg-12">
                   <form action="/settings" method="post" enctype="multipart/form-data" class="card">
                       <div class="card-body">
                           <h3 class="card-title">Edit Profile</h3>

                          <? if (count($error) > 0): ?>
                              <? foreach ($error as $value): ?>
                                  <div style="color: red;"> <?= $value ?> </div>
                              <? endforeach; ?>
                          <? elseif ($succes === true): ?>
                                 <div style="color: green;">All settings have been successfully saved!</div>
                          <? endif; ?>


                           <div class="row">
                               <div class="col-md-12">
                                   <div class="form-group">
                                       <label class="form-label">Login</label>
                                       <input type="text" name="name" class="form-control" placeholder="Your login" value="<?= $profile['name'] ?>">
                                    </div>
                               </div>
                               <div class="col-md-12">
                                   <div class="form-group">
                                       <label class="form-label">e-mail</label>
                                       <input type="text" name="email" class="form-control" placeholder="Your e-mail" value="<?= $profile['email'] ?>">
                                    </div>
                               </div>
                               <div class="col-md-12">
                                   <div class="form-group">
                                       <label class="form-label">About</label>
                                       <input type="text" name="about" class="form-control" placeholder="Tell us about you" value="<?= $profile['about'] ?>">
                                    </div>
                               </div>
                               <div class="col-md-12">
                                   <div class="form-group">
                                       <label class="form-label">Avatar</label>
                                       <div class="custom-file">
                                           <input type="file" name="avatar" accept=".jpg" class="custom-file-input">
                          <label class="custom-file-label">Choose .jpg file</label>
                                        </div>
                                    </div>
                               </div>
                               <div class="col-md-12">
                                   <div class="form-group">
                                       <label class="form-label">New password</label>
                                       <input type="text" name="newPassword" class="form-control" placeholder="Enter new password or leave empty" value="">
                                    </div>
                               </div>
                               <div class="col-md-12">
                                   <div class="form-group">
                                       <label class="form-label">Enter your current password for save settings</label>
                                       <input type="text" name="currentPassword" class="form-control" placeholder="Enter current password" value="">
                                    </div>
                               </div>

                           </div>
                       </div>
                       <div class="card-footer text-left">
                           <button type="submit" class="btn btn-primary">Update Profile</button>
                       </div>
                   </form>
               </div>
           </div>
       </div>
   </div>
</div>

<?php
require_once 'requires/footer.php';
?>
