<!DOCTYPE html>
<!--[if IE 8]>
    <html xmlns="http://www.w3.org/1999/xhtml" class="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 8) ]><!-->
    <html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta name="format-detection" content="telephone=no">
<title><?php echo get_bloginfo('name', 'display'); ?></title>
<?php do_action('login_enqueue_scripts'); ?>
<?php do_action('login_head'); ?>
</head>
<body class="login">
<?php echo do_shortcode('[lf_css_loader_8]'); ?>
