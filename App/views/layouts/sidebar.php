<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
    <a href="<?=URL?>" class="app-brand-link">
        <span class="app-brand-text demo menu-text fw-bold ms-2">Test</span>
    </a>

    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
        <i class="bx bx-chevron-left bx-sm d-flex align-items-center justify-content-center"></i>
    </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <li class="menu-item">
            <a
                href="<?=URL?>"
                class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-smile"></i>
                <div class="text-truncate" data-i18n="Home">Home</div>
            </a>
        </li>

        <?php if(USER_LOGGED):?>
            <li class="menu-item">
                <a
                    href="<?=Urls::authDashboard()?>"
                    class="menu-link">
                    <i class="menu-icon tf-icons bx bx-home-smile"></i>
                    <div class="text-truncate" data-i18n="Dashboard">Dashboard</div>
                </a>
            </li>
            <!-- Events -->
            <li class="menu-item">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-layout"></i>
                <div class="text-truncate" data-i18n="Events">Events</div>
                </a>

                <ul class="menu-sub">
                    <li class="menu-item">
                        <a href="layouts-without-menu.html" class="menu-link">
                        <div class="text-truncate" data-i18n="Create Event">Create Event</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="layouts-without-navbar.html" class="menu-link">
                        <div class="text-truncate" data-i18n="Event Lists">Event Lists</div>
                        </a>
                    </li>
                </ul>
            </li>
        <?php endif; ?>

    </ul>
</aside>