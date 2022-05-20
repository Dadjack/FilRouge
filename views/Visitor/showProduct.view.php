<?php if(empty($products)) : ?>
    <div class="row">
        <div class="col-7">
            <img src="<?= URL ?>public/images/ImgM/<?= $product->getProductImage(); ?>"width="600px;">
        </div>
<?php else : ?>
    <div class="row">
        <div class="col-7">
            <img src="<?= URL ?>public/images/ImgM/<?= $product->getProductImage(); ?>"width="600px;">
        </div>
        <div class="col-5 d-flex flex-column justify-content-around">
            <?php 
            for($i=0; $i < count($products);$i++) : 
            ?>
                <th>
                    <tr class="bg-light border">
                        <td class="align-middle border"><img src="<?= URL ?>public/images/ImgM/<?= $products[$i]->getProductImage(); ?>"width="200px;"></td>
                    </tr>
                </th>    
            <?php 
            endfor; 
            ?>
        </div> 
    </div>
<?php endif; ?>
<div class="col-12 border">
    <p>Nom Du Produit : <?= $product->getProductName(); ?></p>
    <p>Description Du Produit : <?= $product->getProductDescription(); ?></p>
    <p>Quantité : <?= $product->getProductQuantity(); ?></p>
    <p>Prix Du produit : <?= $product->getProductPrice(); ?></p>
</div>
<?php if(Security::isConnect()) : ?>
    <div class="position-relative start-50 translate-right-x"> 
        <p><a href="../../userProducts/c/<?= $product->getIdProduct(); ?>"class="btn btn-success">AJOUTER AU PANIER</a></p>
    </div>
<?php endif; ?>