<?php 

require_once "../../../../include/start.php"; 

$ID = filter_input(INPUT_GET, 'ID', FILTER_VALIDATE_INT); 
$btn = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING); 


if(isset($btn) && $btn == 'delete') { 
    $proID = filter_input(INPUT_POST, 'ID', FILTER_VALIDATE_INT); 

    $product = Product::find_by_ID($proID); 

    if(empty($product)) { 
        $session->message('<div class="alert alert-danger">Toode puudub</div>'); 
        reDirectTo(ADMIN_URL . '?page=products'); 
    } 

    if($product->delete()) { 
        $session->message('<div class="alert alert-success">Toode kustutati</div>'); 
        reDirectTo(ADMIN_URL . '?page=products'); 
    } 

    $session->message('<div class="alert alert-success">Toodet ei kustutatud</div>'); 
    reDirectTo(ADMIN_URL . '?page=products'); 
}


if(empty($ID)) { 
    $session->message('<div class="alert alert-danger">Toode puudub</div>'); 
    reDirectTo(ADMIN_URL . '?page=products'); 
} 

$product = Product::find_by_ID($ID); 

if(empty($product)) { 
    $session->message('<div class="alert alert-danger">Toode puudub</div>'); 
    reDirectTo(ADMIN_URL . '?page=products'); 
} 

?> 




// if(!$session->is_logged_in() || !User::checkRights($session->user_id, 'delete-product.php')) { 
    exit("Teil puuduvad õigused kustutamiseks"); 
} 

if(empty($ID)) { 
    exit("ID puudu!"); 
} 

$product = Product::find_by_ID($ID); 
if(empty($product)) { 
    exit("Toode puudu!"); 
} 

if(!$product->delete()) { 
    exit("Tekkis probleem kustutamisel!"); 
} //

<h1> <?php echo translate('delete_product'); ?></h1> 
<h3><?php echo $category->name; ?></h3> 
<h3><?php echo $category->added; ?></h3> 
<h3><?php echo $category->status == 1 ? 'aktiivne' : 'mitteaktiivne'; ?></h3> 
<form method="post"> 
    <input type="hidden" name="ID" value="<?php echo $product->ID; ?>"> 
    <button class="btn btn-danger" type="submit" value="delete" name="action"> <?php echo translate('delete_products'); ?></button> 
</form> 