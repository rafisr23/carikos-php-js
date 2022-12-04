<?php 
class KamarKostModel {
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  public function getAllKamarBasedOnKost($id) {
    $query = "SELECT * FROM kamar_kost INNER JOIN kost ON kamar_kost.id_kost = kost.id_kost WHERE kamar_kost.id_kost = :id";

    $this->db->query($query);
    $this->db->bind('id', $id);
    
    return $this->db->resultSet();
  }

  public function getKamarKostById($id) {
    $query = "SELECT * FROM kamar_kost WHERE id_kamar= :id";
    // $this->db->query('SELECT * FROM kost WHERE id = :id');
    $this->db->query($query);
    $this->db->bind('id', $id);
    return $this->db->single();
  }

  public function getLastIdKamar() {
    $this->db->query('SELECT * FROM kamar_kost ORDER BY id_kamar DESC');
    return $this->db->single();
  }

  public function storeKamarKost($data) {
    $query = "INSERT INTO kamar_kost(id_kamar, id_kost, no_kamar, fasilitas_kamar, kapasitas_kamar, harga_kamar ) VALUES (null,:id_kost, :no_kamar, :fasilitas_kamar, :kapasitas_kamar, :harga_kamar)";

    $this->db->query($query);
    $this->db->bind('id_kost', $data["id_kost"]);
    $this->db->bind('no_kamar', $data["no_kamar"]);
    $this->db->bind('fasilitas_kamar', $data["fasilitas_kamar"]);
    $this->db->bind('kapasitas_kamar', $data["kapasitas_kamar"]);
    $this->db->bind('harga_kamar', $data["harga_kamar"]);

    $this->db->execute();
    return $this->db->rowCount();
  }

  public function deleteKamarKost($id) {
    $query = "DELETE FROM kamar_kost WHERE id_kamar = :id_kamar";
    $this->db->query($query);
    $this->db->bind('id_kamar', $id);

    $this->db->execute();
    return $this->db->rowCount();
  }

  public function updateKamarKost($data) {
    $query = "UPDATE kamar_kost SET 
    id_kost = :id_kost, 
    no_kamar = :no_kamar, 
    fasilitas_kamar = :fasilitas_kamar, 
    kapasitas_kamar = :kapasitas_kamar, 
    harga_kamar = :harga_kamar 
    WHERE id_kamar = :id_kamar";

    $this->db->query($query);
    $this->db->bind('id_kamar', $data["id_kamar"]);
    $this->db->bind('id_kost', $data["id_kost"]);
    $this->db->bind('no_kamar', $data["no_kamar"]);
    $this->db->bind('fasilitas_kamar', $data["fasilitas_kamar"]);
    $this->db->bind('kapasitas_kamar', $data["kapasitas_kamar"]);
    $this->db->bind('harga_kamar', $data["harga_kamar"]);

    $this->db->execute();
    return $this->db->rowCount();
  }

}
?>