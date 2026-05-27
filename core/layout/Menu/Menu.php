<?php
//require_once '../session/session.php';
?>
<?php
switch ($_SESSION['level']) {
    //admin (مدیر سیستم)
    case '0':
        echo '
<aside class="sidebar" id="sidebar">
    <div class="sidebar-header">
        
        <button class="close-sidebar-btn" id="closeSidebarBtn">
            <i class="fas fa-times"></i>
        </button>
    </div>

    <div class="user-profile-card">
        <div class="avatar-container">
            <img src="assets/images/avatar.png" alt="User Avatar" class="user-avatar">
            <span class="status-dot"></span>
        </div>
        <div class="user-info">
            <h4 class="user-name">"'. $_SESSION['name'] .'"</h4>
            <p class="user-role" Multi_lang="admin_role"></p>
        </div>
    </div>

    <ul class="sidebar-menu">
        <li class="menu-title" Multi_lang="main_menu"></li>
        <li><a href="dashboard" class="active"><i class="fas fa-home"></i> <span Multi_lang="menu_home"></span></a></li>
        <li><a href="Register_yarjo"><i class="fas fa-user-plus"></i> <span Multi_lang="menu_register_elderly"></span></a></li>
        <li><a href="Register_Camp_Yarjo"><i class="fas fa-store"></i> <span Multi_lang="menu_register_shop"></span></a></li>
        <li><a href="List_Users"><i class="fas fa-users"></i> <span Multi_lang="menu_list_elderly"></span></a></li>
        <li><a href="verify_doer"><i class="fas fa-check-circle"></i> <span Multi_lang="menu_verify_doer"></span></a></li>
        <li><a href="List_Users"><i class="fas fa-list"></i> <span Multi_lang="menu_list_doers"></span></a></li>
        <li><a href="List_Request"><i class="fas fa-clipboard-list"></i> <span Multi_lang="menu_list_requests"></span></a></li>
        <li><a href="ScoreBord"><i class="fas fa-star"></i> <span Multi_lang="menu_rate_doers"></span></a></li>
        <li><a href="register_reward"><i class="fas fa-gift"></i> <span Multi_lang="menu_register_reward"></span></a></li>
        <li><a href="register_support_call"><i class="fas fa-phone-alt"></i> <span Multi_lang="menu_register_support_call"></span></a></li>
        <li><a href="List_Users"><i class="fas fa-store"></i> <span Multi_lang="menu_list_shops"></span></a></li>
        <li><a href="List_Product_Shop"><i class="fas fa-boxes"></i> <span Multi_lang="menu_list_products"></span></a></li>
        <li><a href="Wallet"><i class="fas fa-wallet"></i> <span Multi_lang="menu_system_wallet"></span></a></li>
        <li><a href="system_coin"><i class="fas fa-coins"></i> <span Multi_lang="menu_system_coin"></span></a></li>
        
        <li class="menu-title" Multi_lang="account_menu"></li>
        <li><a href="Profile"><i class="fas fa-user-circle"></i> <span Multi_lang="menu_profile"></span></a></li>
        <li><a href="Logout" class="logout"><i class="fas fa-sign-out-alt"></i> <span Multi_lang="menu_logout"></span></a></li>
    </ul>
</aside>
';
        break;

    //doer (انجام دهنده)
    case '1':
        echo '
<aside class="sidebar" id="sidebar">
    <div class="sidebar-header">
        
        <button class="close-sidebar-btn" id="closeSidebarBtn">
            <i class="fas fa-times"></i>
        </button>
    </div>

    <div class="user-profile-card">
        <div class="avatar-container">
            <img src="assets/images/avatar.png" alt="User Avatar" class="user-avatar">
            <span class="status-dot"></span>
        </div>
        <div class="user-info">
            <h4 class="user-name">'. $_SESSION['name'] .'</h4>
            <p class="user-role" Multi_lang="doer_role"></p>
        </div>
    </div>

    <ul class="sidebar-menu">
        <li class="menu-title" Multi_lang="main_menu"></li>

<li><a href="dashboard" class="active"><i class="fas fa-home"></i> <span Multi_lang="menu_home"></span></a></li>
        <li><a href="List_FollowUp_Request"><i class="fas fa-tasks"></i> <span Multi_lang="menu_current_requests"></span></a></li>
        <li><a href="List_Request"><i class="fas fa-list"></i> <span Multi_lang="menu_list_all_requests"></span></a></li>
        <li><a href="Wallet"><i class="fas fa-wallet"></i> <span Multi_lang="menu_wallet"></span></a></li>
        
        <li class="menu-title" Multi_lang="account_menu"></li>
        <li><a href="Profile"><i class="fas fa-user-circle"></i> <span Multi_lang="menu_profile"></span></a></li>
        <li><a href="Logout" class="logout"><i class="fas fa-sign-out-alt"></i> <span Multi_lang="menu_logout"></span></a></li>
    </ul>
</aside>
';
        break;

    //elderly (سالمند)
    case '2':
        echo '
<aside class="sidebar" id="sidebar">
    <div class="sidebar-header">
        
        <button class="close-sidebar-btn" id="closeSidebarBtn">
            <i class="fas fa-times"></i>
        </button>
    </div>

    <div class="user-profile-card">
        <div class="avatar-container">
            <img src="assets/images/avatar.png" alt="User Avatar" class="user-avatar">
            <span class="status-dot"></span>
        </div>
        <div class="user-info">
            <h4 class="user-name"> سلام :'. $_SESSION['name'] .'</h4>
            <p class="user-role" Multi_lang="elderly_role"></p>
        </div>
    </div>

    <ul class="sidebar-menu">
        <li class="menu-title" Multi_lang="main_menu"></li>
        <li><a href="dashboard" class="active"><i class="fas fa-home"></i> <span Multi_lang="menu_home"></span></a></li>
        <li><a href="Register_Request"><i class="fas fa-plus-circle"></i> <span Multi_lang="menu_submit_request"></span></a></li>
        <li><a href="Order_FollowUp"><i class="fas fa-search"></i> <span Multi_lang="menu_track_request"></span></a></li>
        <li><a href="Register_Score"><i class="fas fa-star-half-alt"></i> <span Multi_lang="menu_rate_doer"></span></a></li>
        <li><a href="Wallet"><i class="fas fa-wallet"></i> <span Multi_lang="menu_wallet"></span></a></li>
        
        <li class="menu-title" Multi_lang="account_menu"></li>
        <li><a href="Profile"><i class="fas fa-user-circle"></i> <span Multi_lang="menu_profile"></span></a></li>
        <li><a href="need_verify"><i class="fas fa-shield-alt"></i> <span Multi_lang="menu_need_verify"></span></a></li>
        <li><a href="Logout" class="logout"><i class="fas fa-sign-out-alt"></i> <span Multi_lang="menu_logout"></span></a></li>
    </ul>
</aside>
';
        break;

    //shop (فروشگاه)
    case '3':
        echo '
<aside class="sidebar" id="sidebar">
    <div class="sidebar-header">
        
        <button class="close-sidebar-btn" id="closeSidebarBtn">
            <i class="fas fa-times"></i>
        </button>
    </div>

    <div class="user-profile-card">
        <div class="avatar-container">
            <img src="assets/images/avatar.png" alt="User Avatar" class="user-avatar">
            <span class="status-dot"></span>
        </div>
        <div class="user-info">
            <h4 class="user-name">'. $_SESSION['name'] .'</h4>
            <p class="user-role" Multi_lang="shop_role"></p>
        </div>
    </div>

    <ul class="sidebar-menu">
        <li class="menu-title" Multi_lang="main_menu"></li>
        <li><a href="dashboard" class="active"><i class="fas fa-home"></i> <span Multi_lang="menu_home"></span></a></li>
        <li><a href="Register_product"><i class="fas fa-plus"></i> <span Multi_lang="menu_register_product"></span></a></li>

<li><a href="List_Product_Shop"><i class="fas fa-list"></i> <span Multi_lang="menu_list_all_products"></span></a></li>
        <li><a href="Register_Offer"><i class="fas fa-ticket-alt"></i> <span Multi_lang="menu_register_off_product"></span></a></li>
        
        <li class="menu-title" Multi_lang="account_menu"></li>
        <li><a href="Profile"><i class="fas fa-store"></i> <span Multi_lang="menu_profile_shop"></span></a></li>
        <li><a href="Logout" class="logout"><i class="fas fa-sign-out-alt"></i> <span Multi_lang="menu_logout"></span></a></li>
    </ul>
</aside>
';
        break;

    //support (پشتیبان تلفنی)
    case '4':
        echo '
<aside class="sidebar" id="sidebar">
    <div class="sidebar-header">
        <button class="close-sidebar-btn" id="closeSidebarBtn">
            <i class="fas fa-times"></i>
        </button>
    </div>

    <div class="user-profile-card">
        <div class="avatar-container">
            <img src="assets/images/avatar.png" alt="User Avatar" class="user-avatar">
            <span class="status-dot"></span>
        </div>
        <div class="user-info">
            <h4 class="user-name">'. $_SESSION['name'] .'</h4>
            <p class="user-role" Multi_lang="support_role"></p>
        </div>
    </div>

    <ul class="sidebar-menu">
        <li class="menu-title" Multi_lang="main_menu"></li>
        <li><a href="dashboard" class="active"><i class="fas fa-home"></i> <span Multi_lang="menu_home"></span></a></li>
        <li><a href="register_elderly_support"><i class="fas fa-user-plus"></i> <span Multi_lang="menu_register_elderly"></span></a></li>
        <li><a href="submit_request_support"><i class="fas fa-plus-circle"></i> <span Multi_lang="menu_submit_request"></span></a></li>
        <li><a href="track_request_support"><i class="fas fa-search"></i> <span Multi_lang="menu_track_request"></span></a></li>
        <li><a href="list_shops_support"><i class="fas fa-store"></i> <span Multi_lang="menu_list_shops"></span></a></li>
        <li><a href="register_shop_support"><i class="fas fa-store-alt"></i> <span Multi_lang="menu_register_shop"></span></a></li>
        <li><a href="list_shop_products"><i class="fas fa-boxes"></i> <span Multi_lang="menu_list_shop_products"></span></a></li>
        
        <li class="menu-title" Multi_lang="account_menu"></li>
        <li><a href="Profile"><i class="fas fa-user-circle"></i> <span Multi_lang="menu_profile"></span></a></li>
        <li><a href="Logout" class="logout"><i class="fas fa-sign-out-alt"></i> <span Multi_lang="menu_logout"></span></a></li>
    </ul>
</aside>
';
        break;

    //default (سایر کاربران / صفحات عمومی)
    default:
        echo '
<aside class="sidebar" id="sidebar">
    <div class="sidebar-header">
        
        <button class="close-sidebar-btn" id="closeSidebarBtn">
            <i class="fas fa-times"></i>
        </button>
    </div>

    <div class="user-profile-card">
        <div class="avatar-container">
            <img src="assets/images/avatar.png" alt="User Avatar" class="user-avatar">
            <span class="status-dot"></span>
        </div>
        <div class="user-info">
            <h4 class="user-name">'. $_SESSION['name'] .'</h4>
            <p class="user-role" Multi_lang="guest_role"></p>
        </div>
    </div>

    <ul class="sidebar-menu">
        <li class="menu-title" Multi_lang="main_menu"></li>
        <li><a href="home"><i class="fas fa-home"></i> <span Multi_lang="menu_home"></span></a></li>
        <li><a href="about_us"><i class="fas fa-info-circle"></i> <span Multi_lang="menu_about_us"></span></a></li>

<li><a href="contact_us"><i class="fas fa-envelope"></i> <span Multi_lang="menu_contact_us"></span></a></li>
        <li><a href="rules"><i class="fas fa-gavel"></i> <span Multi_lang="menu_rules"></span></a></li>
        <li><a href="faq"><i class="fas fa-question-circle"></i> <span Multi_lang="menu_faq"></span></a></li>
        <li><a href="products_for_elderly"><i class="fas fa-box-open"></i> <span Multi_lang="menu_products_for_elderly"></span></a></li>
        <li><a href="product_details"><i class="fas fa-info"></i> <span Multi_lang="menu_product_details"></span></a></li>
        <li><a href="requests_for_doer"><i class="fas fa-clipboard-list"></i> <span Multi_lang="menu_requests_for_doer"></span></a></li>
        
        <li class="menu-title" Multi_lang="account_menu"></li>
        <li><a href="register"><i class="fas fa-user-plus"></i> <span Multi_lang="menu_register"></span></a></li>
        <li><a href="login"><i class="fas fa-sign-in-alt"></i> <span Multi_lang="menu_login"></span></a></li>
    </ul>
</aside>
';
        break;
}
?>
