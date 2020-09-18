<?php

namespace Product\Controller;

use Product\Model\Product;
use Product\Model\ProductManager;
use Product\Model\TypeManager;

class ProductController
{
    protected $productController;

    public function __construct()
    {
        $this->productController = new ProductManager();
        $this->type = new TypeManager();
    }

    public function view()
    {
        $products = $this->productController->getAll();
        include_once "src/View/listProduct.php";
    }

    public function add()
    {
        if ($_SERVER["REQUEST_METHOD"] == "GET"){
            $types = $this->type->getAll();
            include_once "src/View/addProduct.php";
        } else{
            $name = $_POST['name'];
            $type = $_POST['type'];
            $price = $_POST['price'];
            $amount = $_POST['amount'];
            $description = $_POST['description'];
            $product = new Product($name,$type,$price,$amount,$description);
            $this->productController->add($product);
            header("location:index.php");
        }
    }

    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET'){
            $id = $_REQUEST['id'];
            $product = $this->productController->getById($id);
            $types = $this->type->getAll();
            $type = $this->type->getById($id);
            include_once 'src/View/updateProduct.php';
        } else {
            $id = $_REQUEST['id'];
            $name = $_POST['name'];
            $type = $_POST['type'];
            $price = $_POST['price'];
            $amount = $_POST['amount'];
            $description = $_POST['description'];
            $product = new Product($name,$type,$price,$amount,$description);
            $product->setId($id);
            $this->productController->update($product);
            header("location:index.php");
        }
    }

    public function delete()
    {
        $id = $_REQUEST['id'];
        $this->productController->delete($id);
        header("location:index.php");
    }

    public function search()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $keyword = $_POST['search'];
            $products = $this->productController->search($keyword);
            include_once 'src/View/search.php';
        }
    }
}