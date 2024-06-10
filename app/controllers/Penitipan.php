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
        if (!isset($_SESSION['user']) || $_SESSION['user']['roles_id'] != 2) {
            header('Location: ' . BASEURL . '/auth');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $status_id = 2; // Status yang baru
            if ($this->model('Penitipan_model')->updateStatus($id, $status_id) > 0) {
                Flasher::setFlash('Status berhasil diubah.', 'success', '');
            } else {
                // var_dump('po');
                // die();
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