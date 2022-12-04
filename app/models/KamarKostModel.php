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
}
?>