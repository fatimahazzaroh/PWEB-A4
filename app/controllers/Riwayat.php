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

    // public function downloadPDF($penitipan_id) {
    //     $data['penitipan_id'] = $penitipan_id;
    //     $data['id'] = $_SESSION['user']['id'];
    //     $data['report'] = $this->model('Report_model')->getLaporanByPenitipanId($penitipan_id);            
    //     $this->view('templates/header', $data);
    //     $this->view('riwayat/print', $data);
    //     $this->view('templates/footer');
    // }

    public function downloadPDF($penitipan_id) {
        // Mendapatkan data laporan berdasarkan penitipan_id
        $data['report'] = $this->model('Report_model')->getLaporanByPenitipanId($penitipan_id); 
    
        // Include template PDF
        $this->view('riwayat/pdf', $data);
    }
    
}