<?php
class Transaksi extends Controller {
    public function index () 
    {
        // echo "Hello World!";
      $directoryURI = $_SERVER['REQUEST_URI'];
      $path = parse_url($directoryURI, PHP_URL_PATH);
      $components = explode('/', $path);
      $first_part = $components[1];

      $data['active'] = $first_part;
      $data['pageTitle'] = 'CARIKOS | Daftar Transaksi';
    //   $data['transaksi'] = $this->model('TransaksiModel')->getAllTransaksi();
      $data['transaksi'] = $this->model('TransaksiModel')->getAllTransaksiWithUser();
      $data['user'] = $this->model('UsersModel')->getAllUsers();
      $data['kost'] = $this->model('KostModel')->getAllKostWithKamar();

    //   var_dump($data['kost']);
    //   return;
      // echo $first_part;

      $this->view('templates/header', $data);
      $this->view('transaksi/index', $data);
      $this->view('templates/footer');
    }

    public function addTransaksi()
    {
        if($this->model('TransaksiModel')->storeTransaksi($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/transaksi');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/transaksi');
            exit;
        }
    }

    public function deleteTransaksi($id)
    {
        if($this->model('TransaksiModel')->deleteTransaksi($id) > 0) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/transaksi');
            exit;
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/transaksi');
            exit;
        }
    }

    public function editTransaksi() {
        if($this->model('TransaksiModel')->updateTransaksi($_POST) > 0) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL . '/transaksi');
            exit;
        } else {
            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASEURL . '/transaksi');
            exit;
        }
    }

    public function getEditTransaksi() {
        echo json_encode($this->model('TransaksiModel')->getTransaksiById($_POST['id']));
    }
}
?>