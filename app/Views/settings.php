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
                   <form action="" method="" class="card">
                       <div class="card-body">
                           <h3 class="card-title">Edit Profile</h3>
                           <div class="row">
                               <div class="col-md-12">
                                   <div class="form-group">
                                       <label class="form-label">Name</label>
                                       <input type="text" class="form-control" placeholder="Your name" value="">
                                    </div>
                               </div>
                               <div class="col-md-12">
                                   <div class="form-group">
                                       <label class="form-label">e-mail</label>
                                       <input type="text" class="form-control" placeholder="Your e-mail" value="">
                                    </div>
                               </div>
                               <div class="col-md-12">
                                   <div class="form-group">
                                       <label class="form-label">About</label>
                                       <input type="text" class="form-control" placeholder="Tell us about you" value="">
                                    </div>
                               </div>
                               <div class="col-md-12">
                                   <div class="form-group">
                                       <label class="form-label">Avatar</label>
                                       <div class="custom-file">
                                           <input type="file" class="custom-file-input" name="example-file-input-custom">
                          <label class="custom-file-label">Choose file</label>
                                        </div>
                                    </div>
                               </div>
                               <div class="col-md-12">
                                   <div class="form-group">
                                       <label class="form-label">New password</label>
                                       <input type="text" class="form-control" placeholder="Enter new password or leave empty" value="">
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
