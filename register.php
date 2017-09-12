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
    $passConfirm = filter_input(INPUT_POST, 'passwordConfirm', FILTER_SANITIZE_STRING);

    if (empty($email))
        $errors[] = _translate('validator.required', Language::current() === Language::english() ? ['email'] : ['e-post']);
    
    if (empty($password))
        $errors[] = _translate('validator.required', Language::current() === Language::english() ? ['password'] : ['parool']);

    if ($password !== $passConfirm)
        $errors[] = Language::current() === Language::english() ? 'Passwords do not match.' : 'Paroolid ei klapi.';

    $db = Database::instance();

    $results = $db->query('SELECT id FROM auto24_users WHERE email=:email', [':email' => $email]);

    if ($results->rowCount() !== 0)
        $errors[] = Language::current() === Language::english() ? 'That email is taken.' : 'See e-post on juba kasutusel.';

    if (empty($errors)) {
        $db->query('INSERT INTO auto24_users (email, password) VALUES (:email, :password)', [
            ':email' => $email,
            ':password' => Hash::make($password)
        ]);

        Auth::login([
            'id' => (int)$db->lastId(),
            'email' => $email
        ]);

        _redirect('index.php');
    }
}

?>

<?php _getHeader(['PAGE_TITLE' => _translate('register.title')]); ?>

<style>
    .form-group input {
        text-align: center;
    }
</style>

<div class="container">
    <div class="row justify-content-center text-center mt-5">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title"><?php echo _translate('register.title'); ?></h4>
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
                            <input
                                type="password"
                                name="passwordConfirm"
                                placeholder="<?php echo _translate('register.passwordConfirm'); ?>"
                                class="form-control">
                        </div>
                        <div class="form-group">
                            <button name="submit" type="submit" class="btn btn-primary btn-block"><?php echo _translate('register.submit'); ?></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php _getFooter(); ?>