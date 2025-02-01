<nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme rounded-pill" id="layout-navbar">
    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-4 me-xl-0 d-xl-none">
        <a class="nav-item nav-link px-0 me-xl-6" href="javascript:void(0)">
        <i class="bx bx-menu bx-md"></i>
        </a>
    </div>

    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
        
        <div class="navbar-nav align-items-center">
            <div class="nav-item d-flex align-items-center">
                <h5 class="mb-0"><b><?=$title ?? ''?></b></h5>
            </div>
        </div>

        <ul class="navbar-nav flex-row align-items-center ms-auto">
            <!-- User -->
            <?php if(USER_LOGGED): ?>
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                    <a
                    class="nav-link dropdown-toggle hide-arrow p-0"
                    href="javascript:void(0);"
                    data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                        <img src="<?=URL?>public/assets/img/profile.webp" alt class="w-px-40 h-auto rounded-circle" />
                    </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                        <a class="dropdown-item" href="#">
                        <div class="d-flex">
                            <div class="flex-shrink-0 me-3">
                            <div class="avatar avatar-online">
                                <img src="<?=URL?>public/assets/img/profile.webp" alt class="w-px-40 h-auto rounded-circle" />
                            </div>
                            </div>
                            <div class="flex-grow-1">
                                <h6 class="mb-0"><?=USER_INFO['first_name']?> <?=USER_INFO['last_name']?></h6>
                                <small class="text-muted"><?=USER_INFO['role'] ?? 'User'?></small>
                            </div>
                        </div>
                        </a>
                    </li>
                    <li>
                        <div class="dropdown-divider my-1"></div>
                    </li>
                    <li>
                        <a class="dropdown-item" href="<?=Urls::authLogout()?>">
                        <i class="bx bx-power-off bx-md me-3"></i><span>Log Out</span>
                        </a>
                    </li>
                    </ul>
                </li>
            <?php else: ?>
                <li class="nav-item mx-2">
                    <a class="nav-link border rounded px-2" href="<?=Urls::authLogin()?>">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link border rounded px-2" href="<?=Urls::authRegister()?>">Register</a>
                </li>
            <?php endif; ?>
        </ul>
    </div>
</nav>