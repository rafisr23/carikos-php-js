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

    public function addFotoKamar() {
        $query = "INSERT INTO foto(id_foto, id_kamar, nama_file) VALUES (null, :id_kamar, :nama_file)";
        $this->db->query($query);

        $this->db->execute();
        return $this->db->rowCount();
    }
}
?>