<?php 
class Kost extends Controller {
  public function index() {
    $directoryURI = $_SERVER['REQUEST_URI'];
    $path = parse_url($directoryURI, PHP_URL_PATH);
    $components = explode('/', $path);
    $first_part = $components[3];

    $data['active'] = $first_part;
    $data['pageTitle'] = 'CARIKOS | Daftar Kost';

    $data['kost'] = $this->model('KostModel')->getAllKostWithOwners();

    // var_dump($data['kost']);
    // return;

    $this->view('templates/header', $data);
    $this->view('kost/index', $data);
    $this->view('templates/footer');
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
}

?>