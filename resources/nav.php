<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="index.php"><?php echo App::resolve('name'); ?></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
        <?php if (!Request::isAuthenticated()) : ?>
            <li class="nav-item">
                <a class="nav-link" href="register.php"><?php echo _translate('nav.register'); ?></a>
            </li>
        <?php else : ?>
            <li class="nav-item">
                <a class="nav-link" href="#"><?php echo _escape(Auth::user()['email']); ?></a>
            </li>
        <?php endif; ?>

        <li class="nav-item dropdown">
            <a 
                href="" 
                class="nav-link dropdown-toggle" 
                id="navbarDropdownMenuLink" 
                data-toggle="dropdown" 
                aria-haspopup="true" 
                aria-expanded="false">
                <?php echo Language::current() === Language::english() ? 'English' : 'Eesti'; ?>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <form action="set-language.php" method="post">
                    <input 
                        type="hidden" 
                        name="redirectUrl"
                        value="<?php echo $_SERVER['REQUEST_URI']; ?>">
                    <input 
                        type="hidden" 
                        name="language" 
                        value="<?php echo Language::current() === Language::english() ? Language::estonian() : Language::english(); ?>">
                    <button 
                        style="cursor:pointer;"
                        type="submit" 
                        class="dropdown-item"><?php echo Language::current() === Language::english() ? 'Eesti' : 'English'; ?></button>
                </form>
            </div>
        </li>

        <li class="nav-item">
            <?php if (Request::isAuthenticated()) : ?>
                <a class="nav-link" href="logout.php"><?php echo _translate('nav.logout'); ?></a>
            <?php else : ?>
                <a class="nav-link" href="login.php"><?php echo _translate('nav.login'); ?></a>
            <?php endif; ?>
        </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
    </div>
</nav>