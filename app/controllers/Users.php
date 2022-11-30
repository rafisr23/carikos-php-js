<?php 
class Users extends Controller {
  public function index()
  {
      // echo "Hello World!";
      $data['pageTitle'] = 'CARIKOS | Daftar Pengguna';
      $data['users'] = $this->model('UsersModel')->getAllUsers();

      $this->view('templates/header', $data);
      $this->view('users/index', $data);
      $this->view('templates/footer');
  }

  public function uploadFoto()
  {
    $namaFile = $_FILES['foto_ktp_user']['name'];
    $ukuranFile = $_FILES['foto_ktp_user']['size'];
    $error = $_FILES['foto_ktp_user']['error'];
    $tmpName = $_FILES['foto_ktp_user']['tmp_name'];

    // cek apakah tidak ada gambar yang diupload
    if ($error === 4) {
      return false;
    }

    // cek apakah yang diupload adlah gambar
    $extGambar = ['jpg', 'jpeg', 'png'];
    $extGambarUser = explode('.', $namaFile);  // explode adalah sebuah fungsi utk memecah string menjadi sebuah array
    $extGambarUser = strtolower(end($extGambar)); // end adalah sebuah fungsi untuk mengambil nilai array paling akhir

    if (!in_array($extGambarUser, $extGambar)) {    // in_array adalah fungsi untuk mencari/mencocokan elemen array satu dengan yang lainnya
      echo "<script>
      alert('Gambar tidak valid!')
      </script>";
    }

    // cek apakah ukuran gambar terlalu besar
    if ($ukuranFile >  1000000) {  // ukuran gambar dalam satuan byte
      echo "<script>
      alert('Ukurang gambar terlalu besar!')
      </script>";
    }

    // upload gambar
    // generate nama gambar baru
    $newFile = uniqid(); // uniqid adalah sebuah fungsi untuk membangkitkan string random
    $newFile .= '.';
    $newFile .= $extGambar[0];

    move_uploaded_file($tmpName, $_SERVER['DOCUMENT_ROOT'] . '/pemweb-project-uts2/public/img/' . $newFile);

    return $newFile;
  }

  public function addUser() {
    $_POST['foto_ktp_user'] = $this->uploadFoto();

    if($this->model('UsersModel')->storeUser($_POST) > 0) {
      Flasher::setFlash('berhasil', 'ditambahkan', 'success');
      header('Location: ' . BASEURL . '/users');
      exit;
    } else {
      Flasher::setFlash('gagal', 'ditambahkan', 'danger');
      header('Location: ' . BASEURL . '/users');
      exit;
    }
  }

  public function deleteUser($id) {
    if($this->model('UsersModel')->deleteUser($id) > 0) {
      Flasher::setFlash('berhasil', 'dihapus', 'success');
      header('Location: ' . BASEURL . '/users');
      exit;
    } else {
      Flasher::setFlash('gagal', 'dihapus', 'danger');
      header('Location: ' . BASEURL . '/users');
      exit;
    }
  }

  public function editUser() {
    $_POST['foto_ktp_user'] = $this->uploadFoto();

    if($_POST['foto_ktp_user'] == false) {
      $_POST['foto_ktp_user'] = $_POST['foto_ktp_user_old'];

      if ($this->model('UsersModel')->updateUser($_POST) > 0) {
        Flasher::setFlash('berhasil', 'diubah', 'success');
        header('Location: ' . BASEURL . '/users');
        exit;
      } else {
        Flasher::setFlash('gagal', 'diubah', 'danger');
        header('Location: ' . BASEURL . '/users');
        exit;
      }
    } else {
      if ($this->model('UsersModel')->updateUser($_POST) > 0) {
        Flasher::setFlash('berhasil', 'diubah', 'success');
        header('Location: ' . BASEURL . '/users');
        exit;
      } else {
        Flasher::setFlash('gagal', 'diubah', 'danger');
        header('Location: ' . BASEURL . '/users');
        exit;
      }
    }
  }

  public function getEdit() {
    echo json_encode($this->model('UsersModel')->getUserById($_POST['id']));
  }
}
?>