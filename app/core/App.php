<?php

class App {
    protected $controller = 'Kamar';
    protected $method = 'index';
    protected $params = [];

    public function __construct() {
        $url = $this->parseURL();
        // Controller
        if ($url == NULL) {
            $url[0] = $this->controller;
        }
        // Mengecek apakah ada nama file php di controllers yang sesuai dengan keyword pertama pada url
        if (file_exists('./app/controllers/' .$url[0] . '.php')) {
            $this->controller = $url[0]; // Menjadikan url[0] sebagai controller
            unset($url[0]);
        }
        require_once './app/controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller;
        // Method
        if (isset($url[1])){
            if(method_exists($this->controller, $url[1])){
                $this->method = $url[1];
                unset($url[1]);
            }
        }
        // Params
        if(!empty($url)) {
            $this->params = array_values($url);
        }
        // Jalankan controller & method, serta kirim params jka ada
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    // Ambil url diisi dengan url
    public function parseURL(){
        if(isset($_GET['url'])){
            $url = rtrim($_GET['url'], '/'); // Menghilangkan slice di belakang
            $url = filter_var($url, FILTER_SANITIZE_URL); // Memfilter url agar bersih dari karakter aneh
            $url = explode('/', $url); // Memecah url dari tiap slice
            return $url;
        }
    }
}
