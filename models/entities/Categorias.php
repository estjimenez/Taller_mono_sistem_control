<?php
namespace MonoApp\Models\Entities;

require_once(__DIR__ . '/../drivers/ConexDB.php');
use MonoApp\Models\Drivers\ConexDB;

require_once(__DIR__ . '/Model.php'); 
class Categorias 
{
    protected $id = 0;
    protected $name = '';

    public function setId($id) {
        $this->id = $id;
    }

    public function getId() {
        return $this->id;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getName() {
        return $this->name;
    }

    public function AddCategory() {
        $conexDb = new ConexDB();
        $sql = "INSERT INTO categories (name) VALUES ('" . $this->name . "')";
        $res = $conexDb->exeSQL($sql);
        $conexDb->close();
        return $res;
    }

    public function UpdateCategory() {
        $conexDb = new ConexDB();
        $sql = "UPDATE categories SET name = '" . $this->name . "' WHERE id = " . $this->id;
        $res = $conexDb->exeSQL($sql);
        $conexDb->close();
        return $res;
    }


    public function hasRelatedDishes() {
        $conexDb = new ConexDB();
        $sql = "SELECT COUNT(*) as total FROM dishes WHERE idCategory = " . $this->id;
        $res = $conexDb->exeSQL($sql);
        $row = $res->fetch_assoc();
        $conexDb->close();
        return $row['total'] > 0;
    }


    public function DeleteCategory() {
        if ($this->hasRelatedDishes()) {

            return false;
        }
        $conexDb = new ConexDB();
        $sql = "DELETE FROM categories WHERE id = " . $this->id;
        $res = $conexDb->exeSQL($sql);
        $conexDb->close();
        return $res;
    }


    public static function getAllDishe() {
        $conexDb = new ConexDB();
        $sql = "SELECT * FROM categories";
        $res = $conexDb->exeSQL($sql);
        $conexDb->close();
        return $res;
    }


    public static function getAll() {
        return self::getAllDishe();
    }


    public function all() {
        $conexDb = new ConexDB();
        $sql = "SELECT * FROM categories";
        $result = $conexDb->exeSQL($sql);

        $categories = [];
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $category = new self();
                $category->setId($row['id']);
                $category->setName($row['name']);
                $categories[] = $category;
            }
        }
        $conexDb->close();
        return $categories;
    }


    public static function getById($id) {
        $conexDb = new ConexDB();
        $sql = "SELECT * FROM categories WHERE id = $id";
        $res = $conexDb->exeSQL($sql);
        if ($res && $res->num_rows > 0) {
            $row = $res->fetch_assoc();
            $conexDb->close();
            return $row;
        }
        $conexDb->close();
        return null;
    }
}
