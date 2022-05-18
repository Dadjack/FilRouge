<?php 

//---<> PAGE D'AFFICHAGE DES PRODUITS <>---//

?>

<h1>Mes Produits</h1>


<?php ?>

<table class="table text-center">
        <tr class="table-dark">
                <th>Image Du Produit</th>
                <th>Nom du produit</th>
                <th>Description Du Produit</th>
                <th>Quantité Du Produit</th>
                <th>Prix Du Produit</th>
                <th colspan="2">Actions</th>
        </tr>
        <?php
                for($i=0; $i < count($products);$i++) :
        ?>
        <tr>
                <td class="align-middle"><a href="<?= URL ?>userProducts/up/<?= $products[$i]->getIdProduct(); ?>"><img src="<?= URL ?>public/images/ImgM/<?= $products[$i]->getProductImage(); ?>" width="300px;"></a></td>
                <td class="align-middle"><?= $products[$i]->getProductName(); ?></td>
                <td class="align-middle"><?= $products[$i]->getProductDescription();  ?></td>
                <td class="align-middle"><?= $products[$i]->getProductQuantity(); ?></td>
                <td class="align-middle"><?= $products[$i]->getProductPrice()?></td>
                <td class="align-middle row"><a href="<?= URL ?>userProducts/ai/<?= $products[$i]->getIdProduct(); ?>" class="btn btn-success">Ajouter une image</a></td>
                <td class="align-middle row"><a href="<?= URL ?>userProducts/mp/<?= $products[$i]->getIdProduct(); ?>" class="btn btn-warning">Modifier</a></td>
                <td class="align-middle row">
                <form method="POST" action="<?= URL ?>userProducts/sp/<?= $products[$i]->getIdProduct(); ?>" onSubmit="return confirm('Voulez-vous vraiment supprimer le produit ?');">
                        <button class="btn btn-danger" type="submit">Supprimer</button>
                </form> 
                </td>         
        </tr>
                <!--<> JE FERME MA BOUCLE FOR <>--> 
        <?php endfor; ?>
</table>
        <!--<> D-BLOCK PERMET DE PRENDRE TOUT L'ESPACE DISPONIBLE <>--->
        

