<?php

class Penitipan extends Controller {
    public function index() {
        if (!isset($_SESSION['user'])) {
            header('Location: ' . BASEURL . '/auth');
            exit;
        } else {
            $data['judul'] = 'Daftar Booking';
            $data['roles_id'] = $_SESSION['user']['roles_id'];
            $data['id'] = $_SESSION['user']['id'];
            $data['penitipan'] = $this->model('Penitipan_model')->getAllPenitipanBooking($data['roles_id'], $data['id']);
            $this->view('templates/header', $data);
            $this->view('templates/sidebar', $data);
            $this->view('penitipan/index', $data);
            $this->view('templates/footer');
        }
    }    
    public function updateStatus($id) {
        if (!isset($_SESSION['user']) || $_SESSION['user']['roles_id'] = 2) {
            header('Location: ' . BASEURL . '/auth');
            exit;
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $status = $_POST['status'];
            $this->model('Penitipan_model')->updateStatus($id, $status);
            header('Location: ' . BASEURL . '/penitipan');
            exit;
        }
    }
}