<style type="text/css" media="screen">

/* Page Background */
.l-content.l-content {
    background-color: <?php echo $bg ?>;
    background-image: url('<?php echo $bg_image; ?>');
    background-position: 50% 50%;
    background-size: cover;
}

/* Error Message Background */
.b-login-form__message.b-login-form__message {
    background-color: #fff;
}

/* Form Inputs and Checkbox background and color */
.b-login-form__input.b-login-form__input,
.b-login-form__checkbox-label.b-login-form__checkbox-label:before {
    background-color: <?php echo $input_background_color; ?> !important;
    color: <?php echo $input_text_color; ?> !important;
}


/* Button:hover and Checkbox:checked backgrounds and text */
.b-login-form__button.b-login-form__button:hover,
.b-login-form__checkbox.b-login-form__checkbox[type=checkbox]:checked+label:before {
    background-color: <?php echo $hover_effect_color ?> !important;
    color: #fff !important;
}

/* Inputs and Checkbox border colors */
.b-login-form__input.b-login-form__input,
.b-login-form__checkbox.b-login-form__checkbox[type=checkbox]+label:before,
.b-login-form__button.b-login-form__button {
    border-color: <?php echo $border_color ?> !important;
}

.b-login-form__link-item:after {
    background-color: <?php echo $border_color ?> !important;
}

.b-content__link-item:after {
     background-color: <?php echo $border_color ?> !important;
}


/* Inputs Focus border color */
.b-login-form__input.b-login-form__input:focus {
    border-color: #333 !important;
}


/* Forms labels and button text color */
.b-login-form__label.b-login-form__label,
.b-login-form__button.b-login-form__button,
.b-login-form__checkbox-label.b-login-form__checkbox-label {
    color: <?php echo $text_color; ?> !important;
}

/* Links */
.b-login-form__link.b-login-form__link,
.b-content__link.b-content__link {
    color: <?php echo $text_color; ?> !important;
}

/* Logo */
.b-logo__item.b-logo__item {
    width: <?php echo $logo_width ?>px;
    height: <?php echo $logo_height ?>px;
    background-image: url('<?php echo $logo ?>');
    background-position: 50% 50%;
    background-size: contain;
}

/* Content */
.b-content__text.b-content__text.c-text p {
    color: <?php echo $text_color; ?> !important;
}

/* Horizontal Line */
.b-content__hr.b-content__hr {
    background-image: linear-gradient(-90deg, rgba(237, 237, 237, 0) 0, <?php echo $border_color ?> 49%, rgba(215, 215, 215, 0) 100%);
}

</style>