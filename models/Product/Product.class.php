<?php

class Product{
    private $idProduct;
    private $productName;
    private $productImage;
    private $productDescription;
    private $productQuantity;
    private $productPrice;
    private $idUser;
    private $idCategory;

    public function __construct($idProduct,$productName,$productImage,$productDescription,$productQuantity,$productPrice,$idCategory){
        $this->idProduct = $idProduct;
        $this->productName = $productName;
        $this->productImage = $productImage;
        $this->productDescription = $productDescription;
        $this->productQuantity = $productQuantity;
        $this->productPrice = $productPrice;
        $this->idCategory = $idCategory;
    }

    public function getIdProduct()
    {
        return $this->idProduct;
    }
    public function setIdProduct($idProduct)
    {
        $this->idProduct = $idProduct;
    }

    public function getProductName()
    {
        return $this->productName;
    }
    public function setProductName($productName)
    {
        $this->productName = $productName;
    }

    public function getProductImage()
    {
        return $this->productImage;
    }
    public function setProductImage($productImage)
    {
        $this->productImage = $productImage;
    }

    public function getProductDescription()
    {
        return $this->productDescription;
    }
    public function setProductDescription($productDescription)
    {
        $this->productDescription = $productDescription;
    }

    public function getProductQuantity()
    {
        return $this->productQuantity;
    }
    public function setProductQuantity($productQuantity)
    {
        $this->productQuantity = $productQuantity;
    }

    public function getProductPrice()
    {
        return $this->productPrice;
    }
    public function setProductPrice($productPrice)
    {
        $this->productPrice = $productPrice;
    }
    public function getIsAvailable()
    {
        return $this->isAvailable;
    }
    public function setIsAvailable($isAvailable)
    {
        $this->isAvailable = $isAvailable;
    }
    public function getidUser()
    {
        return $this->idUser;
    }
    public function setidUser($idUser)
    {
        $this->idUser = $idUser;
    }
    public function getidCategory()
    {
        return $this->idCategory;
    }
    public function setidCategory($idCategory)
    {
        $this->idCategory = $idCategory;
    }
}
