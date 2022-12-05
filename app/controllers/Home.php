<?php
class Home extends Controller
{
    public function index()
    {
        // echo "Hello World!";
        $directoryURI = $_SERVER['REQUEST_URI'];
        $path = parse_url($directoryURI, PHP_URL_PATH);
        $components = explode('/', $path);
        $first_part = $components[1];


        // var_dump($components[3]);
        // echo $first_part;
        // return;

        $data['active'] = $first_part;
        $data['pageTitle'] = 'CARIKOS | Home';
        $jmlkost = $this->model('KostModel')->getAllKost();
        $data['jmlkost'] = count($jmlkost);
        $jmlkamar = $this->model('KamarKostModel')->getAllKamar();
        $data['jmlkamar'] = count($jmlkamar);
        $jmlowner = $this->model('OwnerModel')->getAllOwners();
        $data['jmlowner'] = count($jmlowner);
        $jmluser = $this->model('UsersModel')->getAllUsers();
        $data['jmluser'] = count($jmluser);

        $this->view('templates/header', $data);
        $this->view('home/index', $data);
        $this->view('templates/footer');
    }
}