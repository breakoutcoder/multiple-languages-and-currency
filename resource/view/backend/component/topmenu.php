<?php use App\Config\DB\DB; ?>
<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row default-layout-navbar">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo" href="/dashboard"><img src="<?php asset('backend/images/logo.svg') ?>"
                                                                  alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="/dashboard"><img src="" alt="logo"/></a>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-stretch">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="fas fa-bars"></span>
        </button>
        <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item dropdown d-lg-flex">
                <div class="nav-link">
                    <span class="dropdown-toggle btn btn-outline-dark" id="CurrDropdown"
                          data-toggle="dropdown">
                        <?php
                        $currencies = currencies();
                        if (getSession('currency')) {
                            if (DB::table('currencies')->where('code', getSession('currency'))->where('status', 1)->first()) {
                                foreach ($currencies as $currency) {
                                    if ($currency->code == getSession('currency')) {
                                        echo $currency->code;
                                        break;
                                    }
                                }
                            } else {
                                echo 'USD';
                            }
                        } else {
                            echo 'USD';
                        }
                        ?>
                    </span>
                    <div class="dropdown-menu navbar-dropdown" aria-labelledby="CurrDropdown">
                        <?php foreach ($currencies as $currency) { ?>
                            <form action="/currency/sessioncurrency" method="post">
                                <input type="hidden" value="<?php echo $currency->code ?>" name="code">
                                <button class="dropdown-item font-weight-medium" type="submit" style="cursor: pointer">
                                    <?php echo $currency->code ?>
                                </button>
                            </form>
                        <?php } ?>
                    </div>
                </div>
            </li>
            <li></li>
            <li class="nav-item dropdown d-lg-flex">
                <div class="nav-link">
                    <span class="dropdown-toggle btn btn-outline-dark" id="languageDropdown" data-toggle="dropdown">
                        <?php
                        $languages = languages();
                        if (getSession('locale')) {
                            if (DB::table('languages')->where('code', getSession('locale'))->where('status', 1)->first()) {
                                foreach ($languages as $language) {
                                    if ($language->code == getSession('locale')) {
                                        translate($language->name);
                                        break;
                                    }
                                }
                            } else {
                                translate('English');
                            }
                        } else {
                            translate('English');
                        }
                        ?>
                    </span>
                    <div class="dropdown-menu navbar-dropdown" aria-labelledby="languageDropdown">
                        <?php foreach ($languages as $language) {
                            if ($language->status == 1) { ?>
                                <form action="/language/translate" method="post">
                                    <input type="hidden" value="<?php echo $language->code ?>" name="code">
                                    <button type="submit" class="dropdown-item font-weight-medium"
                                            style="cursor: pointer">
                                        <?php translate($language->name); ?>
                                    </button>
                                </form>
                            <?php }
                        } ?>
                    </div>
                </div>
            </li>
            <li class="nav-item nav-profile dropdown">
                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                    <i class="icon-user"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                    <a class="dropdown-item" href="/logout">
                        <i class="fas fa-power-off text-primary"></i>
                        <?php translate('Logout'); ?>
                    </a>
                </div>
            </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                data-toggle="offcanvas">
            <span class="fas fa-bars"></span>
        </button>
    </div>
</nav>