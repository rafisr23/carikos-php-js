<?php 
class Owners extends Controller {
  public function index()
  {
      // echo "Hello World!";
      $directoryURI = $_SERVER['REQUEST_URI'];
      $path = parse_url($directoryURI, PHP_URL_PATH);
      $components = explode('/', $path);
      $first_part = $components[3];

      $data['active'] = $first_part;
      $data['pageTitle'] = 'CARIKOS | Daftar Pemilik Kost';
      $data['owners'] = $this->model('OwnerModel')->getAllOwners();

      $this->view('templates/header', $data);
      $this->view('owners/index', $data);
      $this->view('templates/footer');
  }

  public function uploadFoto()
  {
    $namaFile = $_FILES['foto_ktp_owner']['name'];
    $ukuranFile = $_FILES['foto_ktp_owner']['size'];
    $error = $_FILES['foto_ktp_owner']['error'];
    $tmpName = $_FILES['foto_ktp_owner']['tmp_name'];

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

  public function addOwner() {
    $_POST['foto_ktp_owner'] = $this->uploadFoto();

    if($this->model('OwnerModel')->storeOwner($_POST) > 0) {
      Flasher::setFlash('berhasil', 'ditambahkan', 'success');
      header('Location: ' . BASEURL . '/owners');
      exit;
    } else {
      Flasher::setFlash('gagal', 'ditambahkan', 'danger');
      header('Location: ' . BASEURL . '/owners');
      exit;
    }
  }

  public function deleteOwner($id) {
    if($this->model('OwnerModel')->deleteOwner($id) > 0) {
      Flasher::setFlash('berhasil', 'dihapus', 'success');
      header('Location: ' . BASEURL . '/owners');
      exit;
    } else {
      Flasher::setFlash('gagal', 'dihapus', 'danger');
      header('Location: ' . BASEURL . '/owners');
      exit;
    }
  }

  public function editOwner() {
    $_POST['foto_ktp_owner'] = $this->uploadFoto();

    if($_POST['foto_ktp_owner'] == false) {
      $_POST['foto_ktp_owner'] = $_POST['foto_ktp_owner_old'];

      if ($this->model('OwnerModel')->updateOwner($_POST) > 0) {
        Flasher::setFlash('berhasil', 'diubah', 'success');
        header('Location: ' . BASEURL . '/owners');
        exit;
      } else {
        Flasher::setFlash('gagal', 'diubah', 'danger');
        header('Location: ' . BASEURL . '/owners');
        exit;
      }
    } else {
      if ($this->model('OwnerModel')->updateOwner($_POST) > 0) {
        Flasher::setFlash('berhasil', 'diubah', 'success');
        header('Location: ' . BASEURL . '/owners');
        exit;
      } else {
        Flasher::setFlash('gagal', 'diubah', 'danger');
        header('Location: ' . BASEURL . '/owners');
        exit;
      }
    }
  }

  public function getEdit() {
    echo json_encode($this->model('OwnerModel')->getOwnerById($_POST['id']));
  }
}
?>