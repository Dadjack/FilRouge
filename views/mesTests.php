<?php

// public function del($ref_product){
//         // $_SESSION['cart'] = $this->numberProducts($ref_product);
//         $_SESSION['cart'] = $this->add($ref_product);
//         $tmp = $_SESSION['cart'];
//             $tmp = array("idProduct"=>array(),
//                     "product_name"=>array(),
//                     "product_image"=>array(),
//                     "product_description"=>array(),
//                     "product_quantity"=>array(),
//                     "product_price"=>array(),
//                     );
//                     //var_dump($tmp);
//                     //var_dump($_SESSION['cart']);
//         //     for($i = 0; $i < $nb_articles; $i++){
//         //         /* On transfère tout sauf l'article à supprimer */
//         //         if($_SESSION['cart']['idProduct'][$i] != $ref_product){
//         //             array_push($tmp['idProduct'],$_SESSION['cart']['idProduct'][$i]);
//         //             array_push($tmp['product_name'],$_SESSION['cart']['product_name'][$i]);
//         //             array_push($tmp['product_image'],$_SESSION['cart']['product_image'][$i]);
//         //             array_push($tmp['product_description'],$_SESSION['cart']['product_description'][$i]);
//         //             array_push($tmp['product_quantity'],$_SESSION['cart']['product_quantity'][$i]);
//         //             array_push($tmp['product_price'],$_SESSION['cart']['product_price'][$i]);
//         //             }
//         //         }
//         //         $_SESSION['cart'] = $tmp;
//         //         /* Option : on peut maintenant supprimer notre panier temporaire: */
//         //         unset($tmp);
//         // }
//         //var_dump($key);
//         //var_dump($tmp);
//     }


// //     function numberProducts($ref_product){
// //         // $this->loadingProducts();
// //         // $_GET['idProduct'] = $this->getProductById($ref_product);
// //         // $ref_product = $_GET['idProduct'];
// //         $_SESSION['cart']['idProduct'] = array();
// //         $number = false;
// //     $nb_art = count($_SESSION['cart']['idProduct']);
// //     /* On parcoure le panier à la recherche de l'article pour vérifier le cas échéant combien sont enregistrés */
// //     for($i = 0; $i < $nb_art; $i++){
// //         if($_SESSION['cart']['idProduct'][$i] == $ref_product)
// //         $nombre = $_SESSION['cart']['product_quantity'][$i];
// //     }
// //     return $number;
// // }

// //     public function numberProducts($ref_product){
// //         $_GET['idProduct'][] = $this->getProductById($ref_product);
// //         $ref_product = $_GET['idProduct'];
// //         /* On initialise la variable de retour */
// //         $number = false;
// //         /* Comptage du panier */
// //         $nbProducts = count($_SESSION['cart']['idProduct']);
// //         /* On parcoure le panier à la recherche de l'article pour vérifier le cas échéant combien sont enregistrés */
// //         for($i = 0; $i < $nbProducts; $i++){
// //             if($_SESSION['cart']['idProduct'][$i] == $ref_product)
// //             $number = $_SESSION['cart']['product_quantity'][$i];
// //         }
// //         return $number;
// // }
