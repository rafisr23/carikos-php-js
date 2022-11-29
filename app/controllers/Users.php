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

  public function addUser() {
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
}
?>