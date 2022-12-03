<?php 
class KostModel {
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  public function getAllKost()
  {
    $this->db->query('SELECT * FROM kost');
    return $this->db->resultSet();
  }

  public function getKostById($id) {
    $query = "SELECT * FROM kost WHERE id_kost= :id";
    // $this->db->query('SELECT * FROM kost WHERE id = :id');
    $this->db->query($query);
    $this->db->bind('id', $id);
    return $this->db->single();
  }

  public function getAllKostWithOwners()
  {
    $this->db->query('SELECT * FROM kost INNER JOIN owners ON kost.id_owner = owners.id_owner');
    return $this->db->resultSet();
  }

  public function storeKost($data) {

    $query = "INSERT INTO kost(id_kost, id_owner, nama_kost, alamat_kost, kategori_kost, fasilitas_kost) VALUES (null,:id_owner, :nama_kost, :alamat_kost, :kategori_kost, :fasilitas_kost)";

    $this->db->query($query);
    $this->db->bind('id_owner', $data["id_owner"]);
    $this->db->bind('nama_kost', $data["nama_kost"]);
    $this->db->bind('alamat_kost', $data["alamat_kost"]);
    $this->db->bind('kategori_kost', $data["kategori_kost"]);
    $this->db->bind('fasilitas_kost', $data["fasilitas_kost"]);

    $this->db->execute();
    return $this->db->rowCount();
  }
}

?>