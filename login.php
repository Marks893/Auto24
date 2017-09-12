<?php

require 'autoload.php';

if (Request::isAuthenticated()) {
    _redirect('index.php');
    exit();
}

$errors = [];
if (isset($_POST['submit'])) {
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

    if (empty($email))
        $errors[] = _translate('validator.required', Language::current() === Language::english() ? ['email'] : ['e-post']);

    if (empty($password))
        $errors[] = _translate('validator.required', Language::current() === Language::english() ? ['password'] : ['parool']);

    if (empty($errors)) {
        $user = Database::instance()
            ->query('SELECT * FROM auto24_users WHERE email=:email', [
                ':email' => $email
            ])
            ->fetch();

        if (!$user || !Hash::verify($user['password'], $password)) {
            $errors[] = Language::current() === Language::english() ? 'Incorrect password or email.' : 'Vale parool või e-post.';
        } else {
            Auth::login($user);
            
            _redirect('index.php');
        }
    }
}

?>

<style>
    .form-group input {
        text-align: center;
    }
</style>

<?php _getHeader(['PAGE_TITLE' => _translate('login.title')]); ?>
    <div class="container">
        <div class="row mt-5 justify-content-center text-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"><?php echo _translate('login.title'); ?></h4>
                        <?php _validationSummary($errors); ?>
                        <hr>
                        <form action="" method="post">
                            <div class="form-group">
                                <input
                                    type="email"
                                    name="email"
                                    placeholder="<?php echo _translate('register.email'); ?>"
                                    value="<?php echo _escape(_old('email')); ?>"
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
                                <button name="submit" type="submit" class="btn btn-primary btn-block"><?php echo _translate('login.submit'); ?></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php _getFooter(); ?>