<div class="row">
    <div class="col-sm-12">
        <div class="alert alert-danger">
            <ul class="list-unstyled m-0">
                <?php foreach ($errors as $error) : ?>
                    <li><?php echo _escape($error); ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>
