<?php
class FotoKamar {
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getFotoByKamar($id) {
        $query = "SELECT * FROM foto WHERE id_kamar = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);

        return $this->db->resultSet();
    }

    public function storeFotoKamar($newFile, $id) {
        $query = "INSERT INTO foto(id_foto, id_kamar, nama_file) VALUES (null, :id_kamar, :nama_file)";
        
        $this->db->query($query);
        $this->db->bind('id_kamar', $id);
        $this->db->bind('nama_file', $newFile);

        $this->db->execute();
        // return $this->db->rowCount();
    }

    public function countRowFoto($id) {
        $query = "SELECT * FROM foto WHERE id_kamar = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);

        return $this->db->fetchColumn();
    }

    public function getFotoBasedOnKamar() {
        $query = "SELECT * FROM foto INNER JOIN kamar_kost ON foto.id_kamar = kamar_kost.id_kamar INNER JOIN kost ON kamar_kost.id_kost = kost.id_kost WHERE foto.id_kamar = kamar_kost.id_kamar";

        $this->db->query($query);
        return $this->db->resultSet();
    }
}
?>