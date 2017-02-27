<?php echo __('Someone has requested a password reset for the following account:'); ?>


<?php echo network_home_url('/') ?>


Username: <?php echo $user_login ?>


<?php echo __('If this was a mistake, just ignore this email and nothing will happen.') ?>


<?php echo __('To reset your password, visit the following address:') ?>


<<?php echo network_site_url("wp-login.php?action=rp&key=$key&login=" . rawurlencode($user_login), 'login')?>>