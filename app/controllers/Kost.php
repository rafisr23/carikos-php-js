<?php 
class Kost extends Controller {
  public function index() {
    $directoryURI = $_SERVER['REQUEST_URI'];
    $path = parse_url($directoryURI, PHP_URL_PATH);
    $components = explode('/', $path);
    $first_part = $components[1];

    $data['active'] = $first_part;
    $data['pageTitle'] = 'CARIKOS | Daftar Kost';
    $data['kost'] = $this->model('KostModel')->getAllKostWithOwners();
    $data['owners'] = $this->model('OwnerModel')->getAllOwners();

    // var_dump($data['kost']);
    // return;

    $this->view('templates/header', $data);
    $this->view('kost/index', $data);
    $this->view('templates/footer');
  }

  public function showKamar($id) {
    $directoryURI = $_SERVER['REQUEST_URI'];
    $path = parse_url($directoryURI, PHP_URL_PATH);
    $components = explode('/', $path);
    $first_part = $components[1];

    $data['active'] = $first_part;
    $data['pageTitle'] = 'CARIKOS | Kamar Kost';
    $data['kost'] = $this->model('KamarKostModel')->getAllKamarBasedOnKost($id);
    $data['owners'] = $this->model('OwnerModel')->getAllOwners();
    $data['detailKost'] = $this->model('KostModel')->getKostById($id);
    $data['fotoKost'] = $this->model('FotoKamar')->getFotoByKamar($id);
    $data['jmlFoto'] = $this->model('FotoKamar')->countRowFoto($id);
    // $data['fotoKost'] = $data['fotoKost']
    // $data['kost'] = $data['kost'][0];
    // var_dump($data['kost']);
    // return;

    $this->view('templates/header', $data);
    $this->view('kost/showKamar', $data);
    $this->view('templates/footer');
  }

  public function getFoto() {
    echo json_encode($this->model('FotoKamar')->getFotoByKamar($_POST['id']));
  }


  public function addKost() {
    // $_POST['foto_ktp_owner'] = $this->uploadFoto();

    if($this->model('KostModel')->storeKost($_POST) > 0) {
      Flasher::setFlash('berhasil', 'ditambahkan', 'success');
      header('Location: ' . BASEURL . '/kost');
      exit;
    } else {
      Flasher::setFlash('gagal', 'ditambahkan', 'danger');
      header('Location: ' . BASEURL . '/kost');
      exit;
    }
  }

  public function deleteKost($id) {
    if($this->model('KostModel')->deleteKost($id) > 0) {
      Flasher::setFlash('berhasil', 'dihapus', 'success');
      header('Location: ' . BASEURL . '/kost');
      exit;
    } else {
      Flasher::setFlash('gagal', 'dihapus', 'danger');
      header('Location: ' . BASEURL . '/kost');
      exit;
    }
  }

  public function getEdit() {
    echo json_encode($this->model('KostModel')->getKostById($_POST['id']));
  }

  public function editKost() {
    if ($this->model('KostModel')->updateKost($_POST) > 0) {
      Flasher::setFlash('berhasil', 'diubah', 'success');
      header('Location: ' . BASEURL . '/kost');
      exit;
    } else {
      Flasher::setFlash('gagal', 'diubah', 'danger');
      header('Location: ' . BASEURL . '/kost');
      exit;
    }
  }

  public function uploadFoto($data, $id_kamar = null)
  {
    // return $data['foto_kamar']['name'][0];
    if ($data) {
      $i = 0;
      $foto = [];
      foreach ($data['foto_kamar']['name'] as $key => $value) {
        $foto[$i]['name'] = $data['foto_kamar']['name'][$key];
        $foto[$i]['type'] = $data['foto_kamar']['type'][$key];
        $foto[$i]['tmp_name'] = $data['foto_kamar']['tmp_name'][$key];
        $foto[$i]['error'] = $data['foto_kamar']['error'][$key];
        $foto[$i]['size'] = $data['foto_kamar']['size'][$key];
        $i++;
      }
      $i = 0;
      foreach ($foto as $key => $value) {
        $nama_file = $foto[$i]['name'];
        $ukuran_file = $foto[$i]['size'];
        $error = $foto[$i]['error'];
        $tmp_name = $foto[$i]['tmp_name'];

        // cek apakah tidak ada gambar yang diupload
        if ($error === 4) {
          echo "<script>
            alert('pilih gambar terlebih dahulu!');
          </script>";
          return false;
        }

        // cek apakah yang diupload adalah gambar
        $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
        $ekstensiGambar = explode('.', $nama_file);
        $ekstensiGambar = strtolower(end($ekstensiGambar));
        if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
          echo "<script>
            alert('yang anda upload bukan gambar!');
          </script>";
          return false;
        }

        // cek jika ukurannya terlalu besar
        if ($ukuran_file > 10000000) {
          echo "<script>
            alert('ukuran gambar terlalu besar!');
          </script>";
          return false;
        }

        // lolos pengecekan, gambar siap diupload
        // generate nama gambar baru
        $namaFileBaru = uniqid();
        $namaFileBaru .= '.';
        $namaFileBaru .= $ekstensiGambar;

        move_uploaded_file($tmp_name, 'img/kamar/' . $namaFileBaru);
        $this->model('FotoKamar')->storeFotoKamar($namaFileBaru, $id_kamar);
        $i++;
      }

      return true;
    } else {
      return false;
    }
  }

  public function addKamarKost() {
    // $test = $this->uploadFoto($_FILES);
    // var_dump($test);
    // return;
    
    if($this->model('KamarKostModel')->storeKamarKost($_POST) > 0) {
      $id_kamar = $this->model('KamarKostModel')->getLastIdKamar();
      if ($this->uploadFoto($_FILES, $id_kamar['id_kamar'])) {
        Flasher::setFlash('berhasil', 'ditambahkan', 'success');
        header('Location: ' . BASEURL . '/kost');
        exit;
      } else {
        Flasher::setFlash('gagal', 'ditambahkan', 'danger');
        header('Location: ' . BASEURL . '/kost');
        exit;
      }
    } else {
      Flasher::setFlash('gagal', 'ditambahkan', 'danger');
      header('Location: ' . BASEURL . '/kost/showKamar/' . $_POST['id_kost']);
      exit;
    }
  }

  public function deleteKamarKost($id) {
    if($this->model('KamarKostModel')->deleteKamarKost($id) > 0) {
      Flasher::setFlash('berhasil', 'dihapus', 'success');
      header('Location: ' . BASEURL . '/kost');
      exit;
    } else {
      Flasher::setFlash('gagal', 'dihapus', 'danger');
      header('Location: ' . BASEURL . '/kost');
      exit;
    }
  }

  public function editKamarKost() {
    if ($this->model('KamarKostModel')->updateKamarKost($_POST) > 0) {
      Flasher::setFlash('berhasil', 'diubah', 'success');
      header('Location: ' . BASEURL . '/kost');
      exit;
    } else {
      Flasher::setFlash('gagal', 'diubah', 'danger');
      header('Location: ' . BASEURL . '/kost');
      exit;
    }
  }

  public function getEditKamar() {
    echo json_encode($this->model('KamarKostModel')->getKamarKostById($_POST['id']));
  }
}

?>