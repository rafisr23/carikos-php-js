<?php 
class Users extends Controller {
  public function index()
    {
      // echo "Hello World!";
      $data['pageTitle'] = 'Users Table';

      $this->view('templates/header');
      $this->view('users/index', $data);
      $this->view('templates/footer');
    }
}
?>