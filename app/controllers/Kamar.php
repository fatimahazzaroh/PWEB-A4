<?php

class Kamar extends Controller {
    public function index() {
        if ( !isset($_SESSION[ 'user' ])) {
            header( 'location:' . BASEURL . '/auth' );
            exit;
        } else {
            $data[ 'judul' ] = 'Daftar Kamar';
            $data[ 'kamar' ] = $this->model( 'Kamar_model' )->getAllKamar();
            $data[ 'jenis_kamar' ] = $this->model( 'Kamar_model' )->getJenisKamar();
            $data['no_kamar'] = $this->model('Kamar_model')->getNoKamar();
            $data['roles_id'] = $_SESSION['user']['roles_id'];

            var_dump($data['roles_id']);
            $this->view( 'templates/header', $data );
            $this->view( 'templates/sidebar', $data);
            $this->view( 'kamar/index', $data );
            $this->view( 'templates/footer' );
        }
    }

    public function detail( $id ) {
        if ( !$_SESSION[ 'user' ] ) {
            header( 'location:' . BASEURL . '/auth' );
        } else {
            $data[ 'judul' ] = 'Detail Kamar';
            $data[ 'kamar' ] = $this->model( 'Kamar_model' )->getKamarById( $id );
            $this->view( 'templates/header', $data );
            $this->view( 'kamar/detail', $data );
            $this->view( 'templates/footer' );
        }
    }

    public function addKamar() {
        if (isset($_POST['jenis_kamar']) && isset($_POST['harga']) && isset($_POST['deskripsi'])) {
            if ($this->model('Kamar_model')->addKamar($_POST) > 0) {
                Flasher::setFlash('berhasil', 'ditambahkan', 'success');
                header('location: ' . BASEURL . '/kamar');
                exit;
            } else {
                Flasher::setFlash('gagal', 'ditambahkan', 'danger');
                header('location: ' . BASEURL . '/kamar');
                exit;
            }
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('location: ' . BASEURL . '/kamar');
            exit;
        }
    }

    public function editKamar($id) {
        if (isset($_POST['jenis_kamar']) && isset($_POST['harga']) && isset($_POST['deskripsi'])) {
            if ($this->model('Kamar_model')->editKamar($id, $_POST) > 0) {
                Flasher::setFlash('berhasil', 'diubah', 'success');
                header('location: ' . BASEURL . '/kamar');
                exit;
            } else {
                Flasher::setFlash('gagal', 'diubah', 'danger');
                header('location: ' . BASEURL . '/kamar');
                exit;
            }
        } else {
            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('location: ' . BASEURL . '/kamar');
            exit;
        }
    }

    public function getKamarById($id) {
        echo json_encode($this->model('Kamar_model')->getKamarById($id));
    }    

    public function updateKamar() {
        if ($this->model('Kamar_model')->updateKamar($_POST['id']) > 0) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
        } else {
            Flasher::setFlash('gagal', 'diubah', 'danger');
        }
        header('location: ' . BASEURL . '/kamar');
        exit;
    }
}