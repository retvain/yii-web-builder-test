<?php foreach ($products as $product): ?>

    <h4><?= $product->title ?> | <?= $product->price ?></h4>
    <p>Category: <?= $product->category->title ?></p>

<?php endforeach; ?>