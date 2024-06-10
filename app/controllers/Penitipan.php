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
    public function updateStatusBooking() {
        // var_dump($_POST);
        // die;
        if (!isset($_SESSION['user']) || $_SESSION['user']['roles_id'] != 2) {
            header('Location: ' . BASEURL . '/auth');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['penitipan_id'];
            $status_id = 2; // Status yang baru
            var_dump($_POST);
            if ($this->model('Penitipan_model')->updateStatusBooking($id, $status_id) > 0) {
                Flasher::setFlash('Status berhasil diubah.', 'success', '');
            } else {
                Flasher::setFlash('Status gagal diubah.', 'danger', '');
            }
            header('Location: ' . BASEURL . '/penitipan');
            exit;
        }
    }

    public function updateStatusProgress() {
        // var_dump($_POST);
        // die;
        if (!isset($_SESSION['user']) || $_SESSION['user']['roles_id'] != 2) {
            header('Location: ' . BASEURL . '/auth');
            exit;
        }
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['penitipan_id'];
            $status_id = 3; // Status yang baru
            var_dump($_POST);
            if ($this->model('Penitipan_model')->updateStatusProgress($id, $status_id) > 0) {
                Flasher::setFlash('Status berhasil diubah.', 'success', '');
            } else {
                Flasher::setFlash('Status gagal diubah.', 'danger', '');
            }
            header('Location: ' . BASEURL . '/penitipan');
            exit;
        }
    }
    // public function addPenitipan(){
    //     $data['jenisKamar'] = $this->model('Kamar_model')->getJenisKamar();
    //     $data['no_kamar'] = $this->model('Kamar_model')->getNoKamar($jenis_kamar_id);
    //     // if (isset($_POST['Tanggal_masuk']) && $_POST['Tanggal_keluar'])
    // }
    
    
}