<?php echo do_shortcode('[wp_login_header]') ?>
<div class="l-content l-content--user">
    <div class="l-content__container">
    <!-- b-content -->
    <div class="b-content  l-content__item">
        <div class="b-content__logo b-logo">
            <a href="<?php echo home_url() ?>" class="b-logo__item b-logo__item--user">Logo</a>
        </div>
        <div class="b-content__text b-content__text--user c-text">
            <p><?php echo $description ?></p>
        </div>
        <div class="b-content__hr b-content__hr--user"></div>
        <ul class="b-content__links">
            <li class="b-content__link-item"><a class="b-content__link b-content__link--user" href="tel:<?php echo $phone ?>"><?php echo $phone ?></a></li>
            <li class="b-content__link-item"><a class="b-content__link b-content__link--user" href="mailto:<?php echo $email ?>"><?php echo $email ?></a></li>
        </ul>
    </div>
    <!-- /b-content -->
    <!-- b-login-form -->
    <form class="b-login-form @@mod @@mix" action="" method="get" accept-charset="utf-8" id="login-form">
        <?php if ($is_password_reseted) : ?>
            <div class="b-login-form__message b-login-form__message--user lost-password-message-show-up">
                <div class="b-login-form__message-inner b-login-form__message-inner--user b-login-form__message-inner--info">
                    <div><?php _e('Check your email for the confirmation link.') ?></div>
                </div>
            </div>
        <?php endif ?>
        <?php if ($is_registered) : ?>
            <div class="b-login-form__message lost-password-message-show-up">
                <div class="b-login-form__message-inner b-login-form__message-inner--info">
                    <div><?php _e('Registration complete. Please check your email.') ?></div>
                </div>
            </div>
        <?php endif ?>
        <div class="b-login-form__message">
            <div class="b-login-form__message-inner">
                <div></div>
            </div>
        </div>
        <label class="b-login-form__label b-login-form__label--user" for="user_login"><?php _e('Username or email') ?></label>
        <input class="b-login-form__input b-login-form__input--user" type="text" id="user_login" name="user_login" tabindex="-1">
        <label class="b-login-form__label b-login-form__label--user" for="user_pass"><?php _e('Password') ?></label>
        <input class="b-login-form__input b-login-form__input--user" type="password" id="user_pass" name="user_pass">
        <div class="b-login-form__row">
            <input class="b-login-form__checkbox b-login-form__checkbox--user" id="rememberme" type="checkbox" name="rememberme">
            <label class="b-login-form__checkbox-label b-login-form__checkbox-label--user" for="rememberme">
                <?php _e('Remember me') ?>
            </label>
            <input class="b-login-form__button b-login-form__button--user" type="submit" name="login" value="Log in">
        </div>
        <ul class="b-login-form__links">
            <?php if ($users_can_register) : ?>
                <li class="b-login-form__link-item">
                    <a class="b-login-form__link b-login-form__link--user" href="<?php echo $registration_url ?>"><?php _e('Register') ?></a>
                </li>
            <?php endif ?>
            <li class="b-login-form__link-item">
                <a class="b-login-form__link b-login-form__link--user" href="<?php echo $lost_password_url ?>"><?php _e('Lost your password?') ?></a>
            </li>
        </ul>
    </form>
    <!-- /b-login-form -->
    </div>
</div>
<?php echo do_shortcode('[wp_login_footer]') ?>