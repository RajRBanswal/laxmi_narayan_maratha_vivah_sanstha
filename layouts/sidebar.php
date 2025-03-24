<div class="app-sidebar sidebar-shadow">
    <div class="app-header__logo">
        <h1 class="logo-src">
            <?php echo $_SESSION['memberId']; ?>
        </h1>
        <div class="header__pane ml-auto">
            <div>
                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <div class="app-header__mobile-menu">
        <div>
            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </button>
        </div>
    </div>
    <div class="app-header__menu">
        <span>
            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                <span class="btn-icon-wrapper">
                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                </span>
            </button>
        </span>
    </div>
    <div class="scrollbar-sidebar">
        <div class="app-sidebar__inner">
            <ul class="vertical-nav-menu">
                <li class="app-sidebar__heading">Dashboards</li>
                <li>
                    <a href="./user_dashboard.php" class="<?php echo $actual_link === '/LaxmiNarayanMarathaVivahSanstha/user_dashboard.php' ? 'mm-active' : '' ?>">
                        <i class="metismenu-icon fas fa-home text-danger pe-7s-rocket"></i>
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="./my_matches.php" class="<?php echo $actual_link === '/LaxmiNarayanMarathaVivahSanstha/my_matches.php' ? 'mm-active' : '' ?>">
                        <i class="metismenu-icon fas fa-user text-primary pe-7s-rocket"></i>
                        My Matches
                    </a>
                </li>
                <li>
                    <a href="./shortlist.php" class="<?php echo $actual_link === '/LaxmiNarayanMarathaVivahSanstha/shortlist.php' ? 'mm-active' : '' ?>">
                        <i class="metismenu-icon fas fa-heart text-pink pe-7s-rocket"></i>
                        Shortlist
                    </a>
                </li>
                <li>
                    <a href="./membership_plan.php" class="<?php echo $actual_link === '/LaxmiNarayanMarathaVivahSanstha/membership_plan.php' ? 'mm-active' : '' ?>">
                        <i class="metismenu-icon fas fa-money-check text-info pe-7s-rocket"></i>
                        Membership Plan
                    </a>
                </li>
                <li>
                    <a href="./plan_purchase_history.php" class="<?php echo $actual_link === '/LaxmiNarayanMarathaVivahSanstha/plan_purchase_history.php' ? 'mm-active' : '' ?>">
                        <i class="metismenu-icon fas fa-clock text-info pe-7s-rocket"></i>
                        Plan Purchase History
                    </a>
                </li>
                <li>
                    <a href="./show_all_profile.php" class="<?php echo $actual_link === '/LaxmiNarayanMarathaVivahSanstha/show_all_profile.php' ? 'mm-active' : '' ?>">
                        <i class="metismenu-icon fas fa-users text-primary pe-7s-rocket"></i>
                        All Profile
                    </a>
                </li>
                <li>
                    <a href="./inbox.php" class="<?php echo $actual_link === '/LaxmiNarayanMarathaVivahSanstha/inbox.php' ? 'mm-active' : '' ?>">
                        <i class="metismenu-icon fas fa-inbox text-success pe-7s-rocket"></i>
                        Inbox
                    </a>
                </li>
                <li>
                    <a href="./outbox.php" class="<?php echo $actual_link === '/LaxmiNarayanMarathaVivahSanstha/outbox.php' ? 'mm-active' : '' ?>">
                        <i class="metismenu-icon fa-solid fa-box text-danger pe-7s-rocket"></i>
                        Outbox
                    </a>
                </li>

            </ul>
        </div>
    </div>
</div>
<div class="app-main__outer">
    <div class="app-main__inner">