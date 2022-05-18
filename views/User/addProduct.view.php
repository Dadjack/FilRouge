<?php 

?>

<h1>Bienvenue Sur NoTre Page De Produits</h1>

<form method="POST" action="<?= URL ?>userProducts/av" enctype="multipart/form-data">

    <div class="form-group">
        <label for="products">Choisir une catégorie:</label>
            <select id="products" name="idCategory">
                    <option value="1">Meubles</option>
                    <option value="2">Dessins</option>
                    <option value="3">Galets</option>
                    <option value="4">Autres</option>
            </select>
    </div>
    <div class="form-group">
        <label class="Label" for="product_name" >Nom Du Produit :</label>
        <input type="text" class="form-control" name="product_name" id="product_name" required/>
    </div>
    <div class="form-group">
        <label class="Label" for="product_image" >Image :</label>
        <input type="file" class="form-control" name="product_image" id="product_image" required/>
    </div>
    <div class="form-group">
        <label class="Label" for="product_description" >Description :</label>
        <input class="form-control" type="text" name="product_description" id="product_description" />
    </div>
    <div class="form-group">
        <label class="Label" for="product_quantity">Quantité :</label>
        <input class="form-control" type="int" name="product_quantity" id="product_quantity" required/>
    </div>
    <div class="form-group">
        <label class="Label" for="product_price" >Prix :</label>
        <input class="form-control" type="int" name='product_price' id="product_price" required/>
    </div>

    <input type="submit" class="btn btn-primary" value="Valider">
</form>

<!-- <form>
    <div class="form-group">
        <label for="exampleFormControlInput1">Email address</label>
        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
    </div>
    <div class="form-group">
        <label for="exampleFormControlSelect1">Example select</label>
        <select class="form-control" id="exampleFormControlSelect1">
            <option value="1">Meubles</option>
            <option value="2">Galets</option>
            <option value="3">Dessins</option>
            <option value="4">Autres</option>
        </select>
    </div>
    <div class="form-group">
        <label for="exampleFormControlTextarea1">Example textarea</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
    </div>
    <div class="form-group">
        <label for="exampleFormControlTextarea1">Example textarea</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
    </div>
    <div class="form-group">
        <label for="exampleFormControlTextarea1">Example textarea</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
    </div>
</form> -->
<?php

?>