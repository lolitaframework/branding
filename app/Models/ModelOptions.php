<?php

namespace branding;

use \branding\LolitaFramework\Core\Arr;
use \branding\LolitaFramework\Core\View;

class ModelOptions
{
    /**
     * Get from option or return default value
     *
     * @param  string $option
     * @param  mixed $default_func
     * @return mixed
     */
    public static function getOrDefault($option, $default_func)
    {
        $val = (string) get_theme_mod($option);
        $val = trim($val);
        if ('' === $val) {
            return $default_func();
        }
        return $val;
    }

    /**
     * Default background color
     *
     * @return string
     */
    public static function defaultBgColor()
    {
        return '#fff';
    }

    /**
     * Background color
     *
     * @return string
     */
    public static function bgColor()
    {
        return self::getOrDefault(
            'login_page_branding_styling_background_color',
            array(__CLASS__, 'defaultLogoWidth')
        );
    }

    /**
     * Default background image
     *
     * @return string
     */
    public static function defaultBgImage()
    {
        return '';
    }

    /**
     * Background color
     *
     * @return string
     */
    public static function bgImage()
    {
        return self::getOrDefault(
            'login_page_branding_branding_background',
            array(__CLASS__, 'defaultBgImage')
        );
    }

    /**
     * Default logo width
     *
     * @return integer
     */
    public static function defaultLogoWidth()
    {
        return 400;
    }

    /**
     * Logo width
     *
     * @return float
     */
    public static function logoWidth()
    {
        return self::getOrDefault(
            'login_page_branding_styling_logo_width_in_pixels',
            array(__CLASS__, 'defaultLogoWidth')
        );
    }

    /**
     * Default logo height
     *
     * @return integer
     */
    public static function defaultLogoHeight()
    {
        return 150;
    }

    /**
     * Logo height
     *
     * @return float
     */
    public static function logoHeight()
    {
        return self::getOrDefault(
            'login_page_branding_styling_logo_height_in_pixels',
            array(__CLASS__, 'defaultLogoHeight')
        );
    }

    /**
     * Default text color
     *
     * @return integer
     */
    public static function defaultTextColor()
    {
        return '#333';
    }

    /**
     * text color
     *
     * @return float
     */
    public static function textColor()
    {
        return self::getOrDefault(
            'login_page_branding_styling_text_color',
            array(__CLASS__, 'defaultTextColor')
        );
    }

    /**
     * Default hover effect color
     *
     * @return integer
     */
    public static function defaultHoverEffectColor()
    {
        return '#333';
    }

    /**
     * Hover effect color
     *
     * @return float
     */
    public static function hoverEffectColor()
    {
        return self::getOrDefault(
            'login_page_branding_styling_hover_effect_color',
            array(__CLASS__, 'defaultHoverEffectColor')
        );
    }

    /**
     * Default border color
     *
     * @return integer
     */
    public static function defaultBorderColor()
    {
        return '#333';
    }

    /**
     * Border color
     *
     * @return float
     */
    public static function borderColor()
    {
        return self::getOrDefault(
            'login_page_branding_styling_border_color',
            array(__CLASS__, 'defaultBorderColor')
        );
    }

    /**
     * Default description
     *
     * @return string
     */
    public static function defaultDescription()
    {
        return View::make('blocks' . DS . 'wp_login_default_desc');
    }

    /**
     * Description
     *
     * @return string
     */
    public static function description()
    {
        return self::getOrDefault(
            'login_page_branding_branding_description',
            array(__CLASS__, 'defaultDescription')
        );
    }

    /**
     * Default phone
     *
     * @return string
     */
    public static function defaultPhone()
    {
        return '+38 (0) 95 034 08 24';
    }

    /**
     * Phone
     *
     * @return string
     */
    public static function phone()
    {
        return self::getOrDefault(
            'login_page_branding_branding_phone',
            array(__CLASS__, 'defaultPhone')
        );
    }

    /**
     * Default email
     *
     * @return string
     */
    public static function defaultEmail()
    {
        return 'eugen.guriev@lolitaframework.com';
    }

    /**
     * Email
     *
     * @return string
     */
    public static function email()
    {
        return self::getOrDefault(
            'login_page_branding_branding_email',
            array(__CLASS__, 'defaultEmail')
        );
    }

    /**
     * Default logo
     *
     * @return string
     */
    public static function defaultLogo()
    {
        return BASE_URL . '/app/assets/img/logo.svg';
    }

    /**
     * Logo
     *
     * @return string
     */
    public static function logo()
    {
        return self::getOrDefault(
            'login_page_branding_branding_logo',
            array(__CLASS__, 'defaultLogo')
        );
    }

    /**
     * Default sign in slug
     *
     * @return string
     */
    public static function defaultSignIn()
    {
        return 'login';
    }

    /**
     * Sign in slug
     *
     * @return string
     */
    public static function signIn()
    {
        return self::getOrDefault(
            'login_page_branding_branding_sign_in_slug',
            array(__CLASS__, 'defaultSignIn')
        );
    }

    /**
     * Default sign up slug
     *
     * @return string
     */
    public static function defaultSignUp()
    {
        return 'registration';
    }

    /**
     * Sign up slug
     *
     * @return string
     */
    public static function signUp()
    {
        return self::getOrDefault(
            'login_page_branding_branding_sign_up_slug',
            array(__CLASS__, 'defaultSignUp')
        );
    }

    /**
     * Default lost password slug
     *
     * @return string
     */
    public static function defaultLostPassword()
    {
        return 'lost-password';
    }

    /**
     * Lost password slug
     *
     * @return string
     */
    public static function lostPassword()
    {
        return self::getOrDefault(
            'login_page_branding_branding_lost_password_slug',
            array(__CLASS__, 'defaultLostPassword')
        );
    }

    /**
     * Default input background color
     *
     * @return integer
     */
    public static function defaultInputBackgroundColor()
    {
        return '#fff';
    }

    /**
     * Input background color
     *
     * @return float
     */
    public static function inputBackgroundColor()
    {
        return self::getOrDefault(
            'login_page_branding_styling_input_background_color',
            array(__CLASS__, 'defaultInputBackgroundColor')
        );
    }

    /**
     * Default input text color
     *
     * @return integer
     */
    public static function defaultInputTextColor()
    {
        return '#333';
    }

    /**
     * Input text color
     *
     * @return float
     */
    public static function inputTextColor()
    {
        return self::getOrDefault(
            'login_page_branding_styling_input_text_color',
            array(__CLASS__, 'defaultInputTextColor')
        );
    }
}
