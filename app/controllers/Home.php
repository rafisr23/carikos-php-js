<?php
class Home extends Controller
{
    public function index()
    {
        // echo "Hello World!";
        $data['pageTitle'] = 'Welcome to PHP MVC Template';

        $this->view('templates/header', $data);
        $this->view('home/index', $data);
        $this->view('templates/footer');
    }
}
