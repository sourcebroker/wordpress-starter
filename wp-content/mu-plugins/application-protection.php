<?php

if (defined('APPLICATION_PROTECTION_DISABLED') && APPLICATION_PROTECTION_DISABLED !== true) {
    add_action('wp', 'application_protection_disabled_check');
    function application_protection_disabled_check()
    {
        global $pagenow;
        if ($pagenow !== 'wp-login.php' && !is_user_logged_in()) {
            auth_redirect();
        }
    }
}
