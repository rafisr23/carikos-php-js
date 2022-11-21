<?php
class App
{
    // Default controller
    protected $controller = "Home";
    // Default method
    protected $method = "index";
    // Default parameter
    protected $params = [];

    public function __construct()
    {
        $url = $this->parseURL();
        if ($url == null) {
            $url = [$this->controller];
        }

        // controller
        if (file_exists('../app/controllers/' . $url[0] . '.php')) {  // check controllers file
            $this->controller = $url[0];
            unset($url[0]); // remove index 0
        }

        require_once '../app/controllers/' . $this->controller . '.php';  // include controllers file depands on url
        $this->controller = new $this->controller;  // instance new controller

        // method
        if (isset($url[1])) {  // check if in url send new method. ex: (about/profile, profile = method)
            if (method_exists($this->controller, $url[1])) {  // check if method exists in controller
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        // params
        if (!empty($url)) {
            $this->params = array_values($url);
        }

        // run controller & method, and send params if there are
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    public function parseURL()
    {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
    }
}
