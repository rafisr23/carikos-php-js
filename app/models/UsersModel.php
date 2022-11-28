<?php 
class UsersModel {
  private $db;

  public function __construct()
  {
      $this->db = new Database;
  }

  public function getAllUsers()
  {
      $this->db->query('SELECT * FROM users');
      return $this->db->resultSet();
  }

  public function getOneUsers($id) {
    $this->db->query('SELECT * FROM users WHERE id = :id');
    $this->db->bind('id', $id);
    return $this->db->single();
  }

  public function storeUser() {
    $nama_user = $_POST['nama_user'];
    $gender_user = $_POST['gender_user'];
    $tgl_lahir_user = $_POST['tgl_lahir_user'];
    $alamat_rumah_user = $_POST['alamat_rumah_user'];
    $no_tlp_user = $_POST['no_tlp_user'];
    $foto_ktp_user = $_POST['foto_ktp_user'];

    $query = "INSERT INTO users VALUES ('',:nama_user, :gender_user, :tgl_lahir_user, :alamat_rumah_user, :no_tlp_user, :foto_ktp_user)";

    $this->db->query($query);
    $this->db->bind('nama_user', $nama_user);
    $this->db->bind('gender_user', $gender_user);
    $this->db->bind('tgl_lahir_user', $tgl_lahir_user);
    $this->db->bind('alamat_rumah_user', $alamat_rumah_user);
    $this->db->bind('no_tlp_user', $no_tlp_user);
    $this->db->bind('foto_ktp_user', $foto_ktp_user);
    
    $this->db->execute();
    return $this->db->rowCount();
  }

  
}
?>