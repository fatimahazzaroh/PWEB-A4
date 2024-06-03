<?php

// Kelas utama dari folder controllers
class Controller
{
    // Untuk mengarahkan ke folder views
    public function view($view, $data = [])
    {
        require_once './app/views/' . $view . '.php';
    }
    // Untuk mengarahkan ke folder models
    public function model($model)
    {
        require_once './app/models/' . $model . '.php';
        return new $model;
    }
}
