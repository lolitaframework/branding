<?php

namespace branding;

use \branding\LolitaFramework\Core\View;

class ModelPages
{
    /**
     * Login page
     *
     * @return void
     */
    public static function login()
    {
        ModelBranding::redirectLoggedInUsers();
        echo View::make(
            'pages' . DS . 'login',
            ModelBranding::signPagesOptions()
        );
    }

    /**
     * Login page
     *
     * @return void
     */
    public static function lostPassword()
    {
        ModelBranding::redirectLoggedInUsers();
        echo View::make(
            'pages' . DS . 'lost_password',
            ModelBranding::signPagesOptions()
        );
    }

    /**
     * Registration page
     *
     * @return void
     */
    public static function registration()
    {
        ModelBranding::redirectLoggedInUsers();
        echo View::make(
            'pages' . DS . 'registration',
            ModelBranding::signPagesOptions()
        );
    }
}
