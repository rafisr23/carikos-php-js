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

  public function storeUser($data) {
    // $nama_user = $_POST['nama_user'];
    // $gender_user = $_POST['gender_user'];
    // $tgl_lahir_user = $_POST['tgl_lahir_user'];
    // $alamat_rumah_user = $_POST['alamat_rumah_user'];
    // $no_tlp_user = $_POST['no_tlp_user'];
    // $foto_ktp_user = $_POST['foto_ktp_user'];

    $query = "INSERT INTO users(id_user,nama_user, gender_user, tgl_lahir_user, alamat_rumah_user, no_tlp_user, foto_ktp_user) VALUES (null,:nama_user, :gender_user, :tgl_lahir_user, :alamat_rumah_user, :no_tlp_user, :foto_ktp_user)";

    $this->db->query($query);
    $this->db->bind('nama_user', $data["nama_user"]);
    $this->db->bind('gender_user', $data["gender_user"]);
    $this->db->bind('tgl_lahir_user', $data["tgl_lahir_user"]);
    $this->db->bind('alamat_rumah_user', $data["alamat_rumah_user"]);
    $this->db->bind('no_tlp_user', $data["no_tlp_user"]);
    $this->db->bind('foto_ktp_user', $data["foto_ktp_user"]);
    
    $this->db->execute();
    return $this->db->rowCount();
  }

  public function updateUser($data) {
    $query = "UPDATE user SET
              nama_user = :nama_user,
              gender_user = :gender_user,
              tgl_lahir_user = :tgl_lahir_user,
              alamat_rumah_user = :alamat_rumah_user,
              no_tlp_user = :no_tlp_user,
              -- foto_ktp_user = :foto_ktp_user
              WHERE id_user = :id_user";

    $this->db->query($query);
    $this->db->bind('nama_user', $data["nama_user"]);
    $this->db->bind('gender_user', $data["gender_user"]);
    $this->db->bind('tgl_lahir_user', $data["tgl_lahir_user"]);
    $this->db->bind('alamat_rumah_user', $data["alamat_rumah_user"]);
    $this->db->bind('no_tlp_user', $data["no_tlp_user"]);
    // $this->db->bind('foto_ktp_user', $data["foto_ktp_user"]);

    $this->db->execute();
    return $this->db->rowCount();
  }

  public function deleteUser($id) {
    $query = "DELETE FROM users WHERE id_user = :id_user";
    $this->db->query($query);
    $this->db->bind('id_user', $id);

    $this->db->execute();
    return $this->db->rowCount();
  }

  

  
}
?>