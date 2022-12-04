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

        $this->view('templates/header', $data);
        $this->view('home/index', $data);
        $this->view('templates/footer');
    }
}