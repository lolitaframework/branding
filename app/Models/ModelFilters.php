<?php

namespace branding;

class ModelFilters
{
    /**
     * Replace Lost Password URL to right slug
     *
     * @param  string $lostpassword_url
     * @return string
     */
    public static function replaceLostPasswordUrl($lostpassword_url)
    {
        return str_replace('wp-login.php', ModelOptions::lostPassword(), $lostpassword_url);
    }

    /**
     * Replace Login URL to right slug
     *
     * @param  string $login_url
     * @return string
     */
    public static function replaceLoginUrl($login_url)
    {
        return str_replace('wp-login.php', ModelOptions::signIn(), $login_url);
    }

    /**
     * Replace register URL to right slug
     *
     * @param  string $login_url
     * @return string
     */
    public static function replaceRegisterUrl($register_url)
    {
        return str_replace('wp-login.php', ModelOptions::signUp(), $register_url);
    }

    /**
     * upload_mimes Filter.
     */
    public static function addMimeSvg($mimes)
    {
        $mimes['svg'] = 'image/svg+xml';
        return $mimes;
    }
}
