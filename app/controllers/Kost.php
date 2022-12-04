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
    // $data['kost'] = $data['kost'][0];
    // var_dump($data['detailKost']);
    // return;
    
    // if($data['kost'] == null) {
    //   echo "Kost tidak ditemukan";
    //   return;
    // } else {
    //   echo "Kost ditemukan";
    //   return;
    // }

    $this->view('templates/header', $data);
    $this->view('kost/showKamar', $data);
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
}

?>