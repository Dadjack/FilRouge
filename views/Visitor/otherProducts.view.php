<?php 

//---<> PAGE D'AFFICHAGE DES PRODUITS <>---//

?>

<h1>Bienvenue Sur NoTre Page De Produits</h1>

<?php ?>

<table class="table text-center">
        <tr class="table-dark">
                <th>Nom du produit</th>
                <th>Image Du Produit</th>
                <th>Description Du Produit</th>
                <th>Quantité Du Produit</th>
                <th>Prix Du Produit</th>
        </tr>
        <?php
                for($i=0; $i < count($products);$i++) :
        ?>
        <tr>
                <td class="align-middle"><a href="<?= URL ?>products/p/<?= $products[$i]->getIdProduct(); ?>"><?= $products[$i]->getProductName(); ?></a></td>
                <td class="align-middle"><img src="<?= URL ?>public/images/ImgM/<?= $products[$i]->getProductImage(); ?>" width="300px;">
                <td class="align-middle"><?= $products[$i]->getProductDescription();  ?></a></td>
                <td class="align-middle"><?= $products[$i]->getProductQuantity(); ?></td>
                <td class="align-middle"><?= $products[$i]->getProductPrice()?></td>           
        </tr>
                <!--<> JE FERME MA BOUCLE FOR <>--> 
        <?php endfor; ?>
</table>
        <!--<> D-BLOCK PERMET DE PRENDRE TOUT L'ESPACE DISPONIBLE <>--->