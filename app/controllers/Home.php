<?php
class Home extends Controller
{
    public function index()
    {
        // echo "Hello World!";
        $data['pageTitle'] = 'CARIKOS | Home';

        $this->view('templates/header', $data);
        $this->view('home/index', $data);
        $this->view('templates/footer');
    }
}