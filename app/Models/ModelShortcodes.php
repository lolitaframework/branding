<?php

namespace branding;

use \branding\LolitaFramework\Core\View;

class ModelShortcodes
{

    /**
     * Header login
     * @return string HTML code header.
     */
    public static function wpLoginHeader()
    {
        return View::make(
            'blocks' . DS . 'wp_login_header',
            ModelBranding::signPagesOptions()
        );
    }

    /**
     * Footer login
     * @return string HTML code footer.
     */
    public static function wpLoginFooter()
    {
        return View::make('blocks' . DS . 'wp_login_footer');
    }
}
