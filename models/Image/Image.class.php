<?php

class Image{
    private $idImg;
    private $productImage;
    private $idProduct;

    public function __construct($idImg,$productImage,$idProduct){
        $this->idImg = $idImg;
        $this->productImage = $productImage;
        $this->idProduct = $idProduct;
    }

    public function getIdImg()
    {
        return $this->idImg;
    }
    public function setIdImg($idImg)
    {
        $this->idImg = $idImg;
    }

    public function getProductImage()
    {
        return $this->productImage;
    }
    public function setProductImage($productImage)
    {
        $this->productImage = $productImage;
    }

    public function getIdProduct()
    {
        return $this->idProduct;
    }
    public function setIdProduct($idProduct)
    {
        $this->idProduct = $idProduct;
    }
}