<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="/dashboard">
                <i class="fa fa-home menu-icon"></i>
                <span class="menu-title"><?php translate('Dashboard');?></span>
            </a>
        </li>
        <li class="nav-item d-none d-lg-block">
            <a class="nav-link" data-toggle="collapse" href="#sidebar-layouts" aria-expanded="false" aria-controls="sidebar-layouts">
                <i class="icon-settings menu-icon"></i>
                <span class="menu-title"><?php translate('Setup And Configurations');?></span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="sidebar-layouts">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="/language"><?php translate('Language');?></a></li>
                    <li class="nav-item"> <a class="nav-link" href="/currency"><?php translate('Currency');?></a></li>
                </ul>
            </div>
        </li>
    </ul>
</nav>