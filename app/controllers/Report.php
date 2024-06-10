<?php

class Report extends Controller
{
    public function index()
    {
        if (!isset($_SESSION['user'])) {
            header('Location: ' . BASEURL . '/auth');
            exit;
        } else {
            $data['judul'] = "Report";
            $data['roles_id'] = $_SESSION['user']['roles_id'];
            $data['id'] = $_SESSION['user']['id'];
            $data['penitipan'] = $this->model('Penitipan_model')->getAllPenitipanProgress($data['roles_id'], $data['id']);
            $this->view('templates/header', $data);
            $this->view('templates/sidebar', $data);
            $this->view('report/index', $data);
            $this->view('templates/footer');
        }
    }

    public function updateStatusProgress() {
        if (!isset($_SESSION['user']) || $_SESSION['user']['roles_id'] != 2) {
            header('Location: ' . BASEURL . '/auth');
            exit;
        }
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $status_id = 3; // Status yang baru
            if ($this->model('Penitipan_model')->updateStatus($id, $status_id) > 0) {
                Flasher::setFlash('Status berhasil diubah.', 'success', '');
            } else {
                Flasher::setFlash('Status gagal diubah.', 'danger', '');
            }
            header('Location: ' . BASEURL . '/report');
            exit;
        }
    }

    public function detailReport($penitipan_id)
    {
        if (!isset($_SESSION['user'])) {
            header('Location: ' . BASEURL . '/auth');
            exit;
        } else {
            $data['judul'] = "Detail Report";
            $data['roles_id'] = $_SESSION['user']['roles_id'];
            $data['penitipan_id'] = $penitipan_id;
            $data['report'] = $this->model('Report_model')->getLaporanByPenitipanId($penitipan_id);
            $this->view('templates/header', $data);
            $this->view('templates/sidebar', $data);
            $this->view('report/detailReport', $data);
            $this->view('templates/footer');
        }
    }

    public function addReport() {
        // Pastikan data yang diperlukan tersedia
        if (isset($_POST['deskripsi']) && isset($_FILES['gambar']) && isset($_POST['penitipan_id'])) {
            $penitipan_id = $_POST['penitipan_id'];
            if ($this->model('Report_model')->addLaporan($_POST, $penitipan_id) > 0) {
                header('Location: ' . BASEURL . '/report/detailReport/' . $penitipan_id);
                exit;
            }
        }
    }
    
}