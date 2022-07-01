<h1>MEUBLES DECO</h1>
<table class="table text-center">
        <tr class="table-dark">
                <th>Image</th>
                <th>Nom</th>
                <th>Description</th>
                <th>Quantité</th>
                <th>Prix</th>
        </tr>
        <?php for($i=0; $i < count($products);$i++) :?>
                <tr>
                        <td class="align-middle border border-dark"><a href="<?= URL ?>products/p/<?= $products[$i]->getIdProduct(); ?>"><img src="<?= URL ?>public/images/ImgM/<?= $products[$i]->getProductImage(); ?>" width="400px;"></a></td>
                        <td class="align-middle"><?= $products[$i]->getProductName(); ?></td>
                        <td class="align-middle"><?= $products[$i]->getProductDescription();  ?></a></td>
                        <td class="align-middle"><?= $products[$i]->getProductQuantity(); ?></td>
                        <td class="align-middle"><?= $products[$i]->getProductPrice()?></td>  
                </tr>
                <!--<> JE FERME MA BOUCLE FOR <>--> 
        <?php endfor; ?>
</table>
        <!--<> D-BLOCK PERMET DE PRENDRE TOUT L'ESPACE DISPONIBLE <>--->