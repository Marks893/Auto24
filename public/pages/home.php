<?php

if(!defined('MAIN_PATH')) {
    header("Location: /");
    exit();
}

$args = [
    'categories'  => [
        'filter' => FILTER_SANITIZE_STRING,
        'flags'  => FILTER_REQUIRE_ARRAY,
    ],
    'action'      => FILTER_SANITIZE_STRING
];

$categories = filter_input_array(INPUT_POST, $args);

if(isset($categories['action']) && $categories['action'] == 'search') {
    $category_ids = array_unique($categories['categories']);
    $category_ids = join(",", $category_ids);

    $products = Product::find_by_category($category_ids);
} else {
    $products = Product::find_all();
}

?>
<div class="row">
    <div class="col-lg-12">
        <?php if(!empty($products)) : foreach ($products as $product) : ?>
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <img src="..." alt="...">
                    <div class="caption">
                        <h3>Thumbnail label</h3>
                        <p>...</p>
                        <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
                    </div>
                </div>
            </div>
        <?php endforeach; else: ?>

            <?php echo infoMessage('info', 'Tooted puuduvad'); ?>

        <?php endif; ?>
    </div>
</div>