<?php

namespace branding;

use \branding\LolitaFramework\Core\Arr;
use \branding\LolitaFramework\Core\Loc;
use \branding\LolitaFramework\Core\View;
use \WP_Error;

class ModelBranding
{
    /**
     * Redirect logged in users
     *
     * @return void
     */
    public static function redirectLoggedInUsers()
    {
        if (is_user_logged_in() && !is_customize_preview()) {
            wp_redirect(home_url('wp-admin'));
        }
    }

    /**
     * Get blog name
     *
     * @return array
     */
    public static function blogname()
    {
        if (is_multisite()) {
            return Loc::currentSite()->site_name;
        }
        /*
         * The blogname option is escaped with esc_html on the way into the database
         * in sanitize_option we want to reverse this for the plain text arena of emails.
         */
        return wp_specialchars_decode(get_option('blogname'), ENT_QUOTES);
    }

    /**
     * Check user login for errors
     *
     * @param  string $user_login
     * @return mixed
     */
    public static function checkUserLogin($user_login)
    {
        $errors = new WP_Error();
        if ('' === $user_login) {
            $errors->add('empty_username', __('<strong>ERROR</strong>: Enter a username or email address.'));
        }
        if (is_email($user_login)) {
            $user_data = get_user_by('email', $user_login);
            if (empty($user_data)) {
                $errors->add('invalid_email', __('<strong>ERROR</strong>: There is no user registered with that email address.'));
            }
        } else {
            $user_data = get_user_by('login', $user_login);
            if (empty($user_data)) {
                $errors->add('invalidcombo', __('<strong>ERROR</strong>: Invalid username or email.'));
            }
        }
        if ($errors->get_error_code()) {
            return $errors;
        }
        return $user_data;
    }

    /**
     * Sign pages options
     *
     * @return array
     */
    public static function signPagesOptions()
    {
        return array(
            'users_can_register'  => get_option('users_can_register'),
            'registration_url'    => home_url(ModelOptions::signUp()),
            'login_url'           => home_url(ModelOptions::signIn()),
            'lost_password_url'   => home_url(ModelOptions::lostPassword()),
            'phone'               => ModelOptions::phone(),
            'email'               => ModelOptions::email(),
            'description'         => ModelOptions::description(),
            'is_password_reseted' => self::isPasswordReseted(),
            'is_registered'       => self::isRegistered(),
        );
    }

    /**
     * Is password reseted
     *
     * @return boolean
     */
    public static function isPasswordReseted()
    {
        return array_key_exists('checkmail', $_GET) && 'confirm' === $_GET['checkmail'];
    }

    /**
     * Is registered
     *
     * @return boolean
     */
    public static function isRegistered()
    {
        return array_key_exists('checkmail', $_GET) && 'registered' === $_GET['checkmail'];
    }

    /**
     * Branding JS variables
     *
     * @return array
     */
    public static function localize()
    {
        return self::signPagesOptions();
    }
}
