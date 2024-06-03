<?php

class Riwayat extends Controller
{
    public function index()
    {
        if (!isset($_SESSION['user'])) {
            header('Location: ' . BASEURL . '/auth');
            exit;
        } else {
            $data['judul'] = "Laporan";
            $data['roles_id'] = $_SESSION['user']['roles_id'];
            $data['id'] = $_SESSION['user']['id'];
            $data['penitipan'] = $this->model('Penitipan_model')->getAllPenitipanDone($data['roles_id'], $data['id']);
            $this->view('templates/header', $data);
            $this->view('templates/sidebar', $data);
            $this->view('riwayat/index', $data);
            $this->view('templates/footer');
        }
    }
}