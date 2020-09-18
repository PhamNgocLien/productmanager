<?php


namespace Product\Model;


class ProductManager
{
    protected $DBConnect;

    public function __construct()
    {
        $this->DBConnect = new DBConnect();
    }

    public function getAll()
    {
        $sql = "SELECT * FROM `product`";
        $stmt = $this->DBConnect->connectDB()->query($sql);
        $data = $stmt->fetchAll();
        $products = [];
        foreach ($data as $item) {
            $product = new Product($item['name'], $item['type'], $item['price'], $item['amount'], $item['description']);
            $product->setId($item['id']);
            array_push($products, $product);
        }
        return $products;
    }

    public function add($product)
    {
        $sql = "INSERT INTO `product`( `name`, `type`, `price`, `amount`,`description`) VALUES (:name,:type,:price,:amount,:description)";
        $stmt = $this->DBConnect->connectDB()->prepare($sql);
        $stmt->bindParam(':name', $product->getName());
        $stmt->bindParam(':type', $product->getType());
        $stmt->bindParam(':price', $product->getPrice());
        $stmt->bindParam(':amount', $product->getAmount());
        $stmt->bindParam(':description', $product->getDescription());
        $stmt->execute();
    }

    public function getById($id)
    {
        $sql = "SELECT * FROM `product` WHERE `id`=:id";
        $stmt = $this->DBConnect->connectDB()->prepare($sql);
        $stmt->bindParam(':id',$id);
        $stmt->execute();
        $product = $stmt->fetch();
        return $product;
    }

    public function update($product)
    {
        $sql = "UPDATE `product` SET `name`=:name,`type`=:type,`price`=:price,`amount`=:amount,`description`=:description WHERE `id`=:id";
        $stmt = $this->DBConnect->connectDB()->prepare($sql);
        $stmt->bindParam(':name',$product->getName());
        $stmt->bindParam(':type',$product->getType());
        $stmt->bindParam(':price',$product->getPrice());
        $stmt->bindParam(':amount',$product->getAmount());
        $stmt->bindParam(':description',$product->getDescription());
        $stmt->bindParam(':id',$product->getId());
        $stmt->execute();
    }

    public function delete($id)
    {
        $sql = "DELETE FROM `product` WHERE`id`=:id";
        $stmt = $this->DBConnect->connectDB()->prepare($sql);
        $stmt->bindParam(':id',$id);
        $stmt->execute();
    }

    public function search($keyword)
    {
        $sql = "SELECT * FROM `product` WHERE `name` LIKE :keyword";
        $stmt = $this->DBConnect->connectDB()->prepare($sql);
        $stmt->bindValue(':keyword','%'.$keyword.'%');
        $stmt->execute();
        $data = $stmt->fetchAll();
        $products = [];
        foreach ($data as $item){
            $product = new Product($item['name'], $item['type'], $item['price'], $item['amount'], $item['description']);
            $product->setId($item['id']);
            array_push($products,$product);
        }
        return $products;
    }
}