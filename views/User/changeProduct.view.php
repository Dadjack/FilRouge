<?php 

?>

<form method="POST" action="<?= URL ?>userProducts/mpv" enctype="multipart/form-data">
    <h3>Images : </h3>
    <img src="<?= URL ?>public/images/ImgM<?= $product->getProductImage() ?>">
    <div class="form-group">
        <label for="product_image">Changer l'image : </label>
        <input type="file" class="form-control-file" id="product_image" name="product_image">
    </div>
    <div class="form-group">
        <label for="product_name">Nom : </label>
        <input type="text" class="form-control" id="product_name" name="product_name" value="<?= $product->getProductName() ?>">
    </div>
    <div class="form-group">
        <label for="product_description">Description : </label>
        <input type="text" class="form-control" id="product_description" name="product_description" value="<?= $product->getProductDescription() ?>">
    </div>
    <div class="form-group">
        <label for="product_quantity">Quantité: </label>
        <input type="number" class="form-control" id="product_quantity" name="product_quantity" value="<?= $product->getProductQuantity() ?>">
    </div>
    <div class="form-group">
        <label for="product_price">Prix : </label>
        <input type="number" class="form-control" id="product_price" name="product_price" value="<?= $product->getProductPrice() ?>">
    </div>
    <input type="hidden" name="identifiant" value="<?= $product->getIdProduct(); ?>">
    <button type="submit" class="btn btn-primary">Valider</button>
</form>

<?php

?>