<h1>Votre panier</h1>

<table class="table text-center">
        <tr class="table-dark">
                <th>Nom du produit</th>
                <th>Image Du Produit</th>
                <th>Description Du Produit</th>
                <th>Quantité Du Produit</th>
                <th>Prix Du Produit</th>
                <th colspan="2">Actions</th>
        </tr>


        <?php  
        foreach ($products as $key => $product) :
        ?>
                <tr>
                        <td class="align-middle"><?= htmlspecialchars(trim($product['product_name'])); ?></td>
                        <td class="align-middle"><a href="#" class="img"><img src="<?= URL ?>public/images/ImgM/<?= htmlspecialchars(trim($product['product_image'])); ?>" width="450px;"></a></td>
                        <td class="align-middle"><?= htmlspecialchars(trim($product['product_description'])); ?></a></td>
                        <td class="align-middle"><?= htmlspecialchars(trim($product['product_quantity'])); ?></td>
                        <td class="align-middle"><?= htmlspecialchars(trim(number_format($product['product_price'],2,',',' '))); ?>€</td>
                        <td class="align-middle"><a href="<?= URL ?>userProducts/d/<?= htmlspecialchars(trim($product['idProduct'])); ?>"class="btn btn-success">SUPPRIMER</a></td>
                </tr>       
        <?php endforeach; ?>        
</table>
<?php if(empty($product)) : ?>
        <h2>Votre panier est vide</h2>
<?php else : ?>
        <div class="d-flex justify-content-center d-block" >
                <a href="<?= URL ?>userProducts/dc/<?= $product['idProduct']; ?>" class="btn btn-success">VIDER LE PANIER</a>
        </div>
<?php endif; ?>