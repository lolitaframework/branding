<?php

namespace branding;

use \branding\LolitaFramework\Core\Arr;
use \branding\LolitaFramework\Core\Loc;
use \branding\LolitaFramework\Core\View;
use \branding\LolitaFramework\Core\Url;
use \branding\LolitaFramework;

class ModelActions
{
    /**
     * Redirect if wp-login or wp-register
     *
     * @return void
     */
    public static function checkLogin()
    {
        $pagenow = Loc::pagenow();
        $pages   = array('wp-login.php', 'wp-register.php');

        if (strpos($_SERVER['REQUEST_URI'], '?') > -1) {
            list($file, $arguments) = explode("?", $_SERVER['REQUEST_URI']);
        } else {
            $file = $_SERVER['REQUEST_URI'];
        }
        if ('POST' !== $_SERVER['REQUEST_METHOD']) {
            if (in_array($pagenow, $pages) && 'rp' !== Arr::get($_REQUEST, 'action')) {
                if ('/' . ModelOptions::signIn() !== $file) {
                    wp_redirect(home_url());
                }
            }
        }
    }

    /**
     * Login into WP
     * [AJAX]
     *
     * @return void
     */
    public static function login()
    {
        check_ajax_referer('Lolita Framework', 'nonce');
        $user = wp_signon($_REQUEST);
        if (is_wp_error($user)) {
            wp_send_json_error($user->get_error_messages());
        } else {
            wp_send_json_success($user->ID);
        }
    }

    /**
     * Lost password
     * [AJAX]
     *
     * @return void
     */
    public static function lostPassword()
    {
        check_ajax_referer('Lolita Framework', 'nonce');
        $user_login = trim(wp_unslash(Arr::get($_REQUEST, 'user_login')));
        $user_data = ModelBranding::checkUserLogin($user_login);

        if (is_wp_error($user_data)) {
            wp_send_json_error($user_data->get_error_messages());
        }

        $key = get_password_reset_key($user_data);

        if (is_wp_error($key)) {
            wp_send_json_error('<strong>ERROR</strong>: Reset key can not be generated!.');
        }

        $mail = wp_mail(
            $user_data->user_email,
            wp_specialchars_decode(
                View::make(
                    'mails' . DS . 'title_lost_password',
                    array(
                        'blogname' => ModelBranding::blogname(),
                    )
                )
            ),
            View::make(
                'mails' . DS . 'message_lost_password',
                array(
                    'user_login' => $user_data->user_login,
                    'key'        => $key,
                )
            )
        );
        if (false === $mail) {
            wp_send_json_error(__('The email could not be sent.') . "<br />\n" . __('Possible reason: your host may have disabled the mail() function.'));
        }
        wp_send_json_success(
            array(
                'mail' => $mail
            )
        );
    }

    /**
     * Registration
     * [AJAX]
     *
     * @return void
     */
    public static function registration()
    {
        check_ajax_referer('Lolita Framework', 'nonce');
        $errors = register_new_user(
            Arr::get($_POST, 'user_login'),
            Arr::get($_POST, 'user_email')
        );
        if (is_wp_error($errors)) {
            wp_send_json_error($errors->get_error_messages());
        }
        wp_send_json_success(true);
    }

    /**
     * Deregister all scripts
     *
     * @return void
     */
    public static function deregisterScripts()
    {
        $wp_scripts_queue = wp_scripts()->queue;

        if (is_array($wp_scripts_queue)) {
            foreach ($wp_scripts_queue as $handle) {
                wp_deregister_script($handle);
            }
        }
    }

    /**
     * Deregister all styles
     *
     * @return void
     */
    public static function deregisterStyles()
    {
        $wp_styles_queue  = wp_styles()->queue;
        if (is_array($wp_styles_queue)) {
            foreach ($wp_styles_queue as $handle) {
                wp_deregister_style($handle);
            }
        }
        wp_enqueue_style('old-browser', BASE_URL . '/app/assets/css/old-browser.min.css');
    }

    /**
     * Styling our login page
     * Action: login_footer
     *
     * @return void
     */
    public static function styling()
    {
        echo View::make(
            'styles' . DS . 'styles',
            array(
                'bg'                     => ModelOptions::bgColor(),
                'bg_image'               => ModelOptions::bgImage(),
                'logo'                   => ModelOptions::logo(),
                'logo_width'             => ModelOptions::logoWidth(),
                'logo_height'            => ModelOptions::logoHeight(),
                'text_color'             => ModelOptions::textColor(),
                'border_color'           => ModelOptions::borderColor(),
                'hover_effect_color'     => ModelOptions::hoverEffectColor(),
                'input_background_color' => ModelOptions::inputBackgroundColor(),
                'input_text_color'       => ModelOptions::inputTextColor(),
            )
        );
    }

    /**
     * Fix customize bug
     *
     * @return void
     */
    public static function customizePreviewSettings()
    {
        echo '<!-- customize start -->';
        if (is_customize_preview()) {
            Loc::wpCustomize()->customize_preview_settings();
        }
        echo '<!-- customize end -->';
    }
}
