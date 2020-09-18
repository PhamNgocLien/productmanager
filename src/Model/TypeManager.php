<?php


namespace Product\Model;


class TypeManager
{
    protected $DBConnect;

    public function __construct()
    {
        $this->DBConnect = new DBConnect();
    }

    public function getAll()
    {
        $sql = "SELECT * FROM `type`";
        $stmt = $this->DBConnect->connectDB()->query($sql);
        $data = $stmt->fetchAll();
        $types = [];
        foreach ($data as $item) {
            $type = new Type($item['id'], $item['name']);
            array_push($types, $type);
        }
        return $types;
    }

    public function getById($id)
    {
        $sql = "SELECT * FROM `type` WHERE `id`=:id";
        $stmt = $this->DBConnect->connectDB()->prepare($sql);
        $stmt->bindParam(':id',$id);
        $stmt->execute();
        $type = $stmt->fetch();
        return $type;
    }
}