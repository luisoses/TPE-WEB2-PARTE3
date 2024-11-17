<?php

class BrandModel {
    private $db;


    public function __construct() { 
        $this->db = new PDO('mysql:host=localhost;dbname=vehiculos-db-mod;charset=utf8', 'root', '');
    }


    public function getAllBrands() {
        $query = $this->db->prepare('SELECT * FROM marcas');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function getBrand($id) {
        $query = $this->db->prepare('SELECT * FROM marcas WHERE ID_Marca = ?');
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function eraseBrand($idMarca) {
        $query = $this->db->prepare('DELETE FROM marcas WHERE ID_Marca = ?');
        return $query->execute([$idMarca]);
    }

    public function updateBrand($idMarca, $nuevoNombre) {
        $query = $this->db->prepare("UPDATE marcas SET Marca = ? WHERE ID_Marca = ?");
        $query->execute([$nuevoNombre, $idMarca]);
    }

    public function insertBrands ($Marca) {
        $query = $this -> db -> prepare('INSERT INTO marcas(Marca) VALUES (?)');
        $query -> execute([$Marca]);

        $id = $this->db->lastInsertId();

        return $id;
    }  
}

