<?php

require 'autoload.php';

?>

<?php _getHeader([ 'PAGE_TITLE' => _translate('register.title') ]); ?>

<style>
    .form-group input {
        text-align: center;
    }
</style>

<div class="container">
    <div class="row justify-content-center text-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title"><?php echo _translate('register.title'); ?></h4>
                    <form action="" method="post">
                        <div class="form-group">
                            <input
                                type="email"
                                name="email"
                                placeholder="<?php echo _translate('register.email'); ?>"
                                class="form-control">
                        </div>
                        <div class="form-group">
                            <input
                                type="password"
                                name="password"
                                placeholder="<?php echo _translate('register.password'); ?>"
                                class="form-control">
                        </div>
                        <div class="form-group">
                            <input
                                type="password"
                                name="passwordConfirm"
                                placeholder="<?php echo _translate('register.passwordConfirm'); ?>"
                                class="form-control">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block"><?php echo _translate('register.submit'); ?></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php _getFooter(); ?>