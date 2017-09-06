<?php 

require_once "../../include/start.php"; 

$page = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_STRING); 

if(!$session->is_logged_in() || !User::checkRights($session->user_id, 'index.php')) { 
    $session->message('<div class="alert alert-info">Teil puuduvad õigused näha Admin DashBoardi</div>'); 
    reDirectTo('login.php'); 
} 

get_template('head'); ?> 


<nav id="footer">
        <?php
		if(isset($_POST['en'])){
            $_SESSION['lang'] = 'en';
            reDirectTo("index.php");
        }
        if(isset($_POST['et'])){
            $_SESSION['lang'] = 'et';
            reDirectTo("index.php");
        }
        ?>
	<footer class="navbar-fixed-bottom" style=" background-color: #2EFE9A;">
        <ul>
                <ul>
				<li style="width:130px; margin:0; padding:0;" class="text-left">
                        <a href="" style="">
                            <form method="POST" action="" style="">
                                <input name="en" type="submit" value="" style="width:32px; height:32px; margin:0; background: url('../template/img/flag-icon-css-master/flags/4x3/gb.svg') no-repeat; border: none; background-size: cover;">
                            </form>
							<form method="POST" action="" style="">
                                <input name="et" type="submit" value="" style="width:32px; height:32px; margin:0; background: url('../template/img/flag-icon-css-master/flags/4x3/ee.svg') no-repeat; border: none; background-size: cover;">
                            </form>
                        </a>
                 </li>
				          
                </ul>
        </ul>

	</footer>
	</li>
</nav>






    <div class="container"> 
        <div class="row"> 
            <div class="col-lg-12"> 
                <h1 class="page-header text-center"><?php echo $t['admin_dashboard']; ?> <small class="pull-right"><a href="logout.php" class="btn btn-danger"><?php echo $t['logout']; ?></a></small></h1> 
            </div> 
        </div> 

        <div class="row"> 
            <div class="col-sm-3"> 
                <ul class="nav nav-pills nav-stacked"> 
                    <li role="presentation" <?php echo !isset($page) || $page == 'home' ? 'class="active"' : ''; ?>><a href="<?php echo ADMIN_URL; ?>"> <?php echo translate('home'); ?></a></li> 
                    <li role="presentation" <?php echo in_array($page, ['categories', 'category', 'delete']) ? 'class="active"' : ''; ?>><a href="<?php echo ADMIN_URL; ?>?page=categories"> <?php echo translate('categories'); ?></a></li> 
                    <li role="presentation" <?php echo in_array($page, ['products', 'product']) ? 'class="active"' : ''; ?>><a href="<?php echo ADMIN_URL; ?>?page=products"> <?php echo translate('products'); ?></a></li> 
                </ul> 
            </div> 
            <div class="col-sm-9"> 
                <?php if(!empty($page) && isset($pages[$page])) : 
                    require_once ADMIN_PAGES_PATH . $pages[$page]['path']; 
                else : 
                    require_once ADMIN_404; 
                endif; ?> 
            </div> 
        </div> 
    </div> 

	
	
	
<?php get_template('footer');