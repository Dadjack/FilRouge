<h1>Ajouter Une Image Produit</h1>


<form method="POST" action="<?= URL ?>userProducts/aiv" enctype="multipart/form-data">

    <div class="form-group">
        <label class="Label" for="product_image" >Sélectionner une image à ajouter :</label>
        <input type="file" class="form-control" name="product_image" id="product_image" required/>
    </div>
    <input type="hidden" name="idProduct" value="<?= $product->getIdProduct(); ?>">
    <button type="submit" class="btn btn-primary">Valider</button>
</form>