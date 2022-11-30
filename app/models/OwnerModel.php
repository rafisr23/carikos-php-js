<?php 
class OwnerModel {
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  public function getAllOwners()
  {
    $this->db->query('SELECT * FROM owners');
    return $this->db->resultSet();
  }

  public function getOwnerById($id) {
    $query = "SELECT * FROM owners WHERE id_owner= :id";
    // $this->db->query('SELECT * FROM owners WHERE id = :id');
    $this->db->query($query);
    $this->db->bind('id', $id);
    return $this->db->single();
  }

  public function storeOwner($data) {
    $query = "INSERT INTO owners(id_owner,nama_owner, gender_owner, tgl_lahir_owner, alamat_rumah_owner, no_tlp_owner, foto_ktp_owner) VALUES (null,:nama_owner, :gender_owner, :tgl_lahir_owner, :alamat_rumah_owner, :no_tlp_owner, :foto_ktp_owner)";

    $this->db->query($query);
    $this->db->bind('nama_owner', $data["nama_owner"]);
    $this->db->bind('gender_owner', $data["gender_owner"]);
    $this->db->bind('tgl_lahir_owner', $data["tgl_lahir_owner"]);
    $this->db->bind('alamat_rumah_owner', $data["alamat_rumah_owner"]);
    $this->db->bind('no_tlp_owner', $data["no_tlp_owner"]);
    $this->db->bind('foto_ktp_owner', $data["foto_ktp_owner"]);
    
    $this->db->execute();
    return $this->db->rowCount();
  }

  public function updateOwner($data) {
    $query = "UPDATE owners SET
              nama_owner = :nama_owner,
              gender_owner = :gender_owner,
              tgl_lahir_owner = :tgl_lahir_owner,
              alamat_rumah_owner = :alamat_rumah_owner,
              no_tlp_owner = :no_tlp_owner,
              foto_ktp_owner = :foto_ktp_owner
              WHERE id_owner = :id_owner";

    $this->db->query($query);
    $this->db->bind('nama_owner', $data["nama_owner"]);
    $this->db->bind('gender_owner', $data["gender_owner"]);
    $this->db->bind('tgl_lahir_owner', $data["tgl_lahir_owner"]);
    $this->db->bind('alamat_rumah_owner', $data["alamat_rumah_owner"]);
    $this->db->bind('no_tlp_owner', $data["no_tlp_owner"]);
    $this->db->bind('foto_ktp_owner', $data["foto_ktp_owner"]);
    $this->db->bind('id_owner', $data["id_owner"]);

    $this->db->execute();
    return $this->db->rowCount();
  }

  public function deleteOwner($id) {
    $query = "DELETE FROM owners WHERE id_owner = :id_owner";
    $this->db->query($query);
    $this->db->bind('id_owner', $id);

    $this->db->execute();
    return $this->db->rowCount();
  }

  

  
}
?>