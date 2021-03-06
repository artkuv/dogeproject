<div class="header py-4">
    <div class="container">
        <div class="d-flex">
            <a class="header-brand" href="/profile/<?= $profile['name'] ?>">
                <span class="fa fa-twitter"></span>
                <img src="#" class="header-brand-img" alt="MyTwitter">
            </a>
            <div class="d-flex order-lg-2 ml-auto">
                
                <div class="dropdown">
                    <a href="#" class="nav-link pr-0 leading-none" data-toggle="dropdown">
                        <span class="avatar" style="background-image: url(<?= $profile['avatar'] ?>)"></span>
                        <span class="ml-2 d-none d-lg-block">
                            <span class="text-default"><?= $profile['name'] ?></span>
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                        <a class="dropdown-item" href="/profile/<?= $profile['name'] ?>">
                            <i class="dropdown-icon fe fe-user"></i> Profile
                        </a>
                        <a class="dropdown-item" href="/settings">
                            <i class="dropdown-icon fe fe-settings"></i> Settings
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="/signout">
                            <i class="dropdown-icon fe fe-log-out"></i> Sign out
                        </a>
                    </div>
                </div>
            </div>

            <a href="#" class="header-toggler d-lg-none ml-3 ml-lg-0" data-toggle="collapse" data-target="#headerMenuCollapse">
                <span class="header-toggler-icon"></span>
            </a>
        </div>
    </div>
</div>
