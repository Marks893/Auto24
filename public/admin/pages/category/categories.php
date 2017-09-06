<?php 

if(!defined('MAIN_PATH')) { 
    header("Location: /"); 
    exit(); 
} 

$categories = Category::find_all(); 

?> 
<h3 class="page-header"> 
    <a href="<?php echo ADMIN_URL . "?page=category"; ?>"><small class="text-left"><span class="glyphicon glyphicon-plus-sign"></span> <?php echo translate('add_catgory'); ?></small></a> 
    <span class="pull-right"><?php echo $pages[$page]['name'] ?></span> 
</h3> 

<?php echo isset($session->message) ? $session->message : '' ?> 

<?php if (!empty($categories)) : ?> 
    <table class="table"> 
        <thead> 
        <tr> 
            <th>ID</th> 
            <th> <?php echo translate('name'); ?></th> 
            <th> <?php echo translate('added'); ?></th> 
            <th> <?php echo translate('parent'); ?></th> 
            <th> <?php echo translate('change_category'); ?></th> 
            <th> <?php echo translate('delete_category'); ?></th> 
        </tr> 
        </thead> 
        <tbody> 
        <?php foreach ($categories as $cat) : ?> 
            <tr> 
                <td><?php echo $cat->ID ?></td> 
                <td><?php echo $cat->name ?></td> 
                <td><?php echo $cat->added ?></td> 
                <td> 
                    <?php $parent = Category::find_by_ID($cat->parent); ?> 
                    <?php echo empty($parent) ? 'Põhikategooria' : $parent->name; ?> 
                </td> 
                <td> 
                    <a href="<?php echo ADMIN_URL . "?page=category&ID=" . $cat->ID; ?>"> 
                        <span class="glyphicon glyphicon-pencil"></span> 
                    </a> 
                </td> 
                <td> 
                    <a href="<?php echo ADMIN_URL . "?page=delete&ID=" . $cat->ID; ?>"> 
                        <span class="glyphicon glyphicon-trash"></span> 
                    </a> 
                </td> 
            </tr> 
        <?php endforeach; ?> 
        </tbody> 
    </table> 
<?php else : 
    echo infoMessage('info', 'Kategooriad puuduvad'); 
endif; ?> 