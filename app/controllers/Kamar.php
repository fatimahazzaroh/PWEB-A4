<?php

class Kamar extends Controller {
    public function index() {
<<<<<<< HEAD
        if ( !isset($_SESSION[ 'user' ])) {
            header( 'location:' . BASEURL . '/auth' );
            exit;
        } else {
            $data[ 'judul' ] = 'Daftar Kamar';
            $data[ 'kamar' ] = $this->model( 'Kamar_model' )->getAllKamar();
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
=======
        if ( !$_SESSION[ 'user' ] ) {
            header( 'location:' . BASEURL . 'log' );
        } else {
            $data['judul'] = 'Daftar Kamar';
            $data['kamar'] = $this->model('Kamar_model')->getKamar();
            $this->view('templates/header', $data); // data jududl dikirim ke folder teplates class header
            $this->view('kamar/index', $data); // data berupa nama dikirim ke file index di view
            $this->view('templates/footer'); // class view ni menyimpan ke arah folder view
        }
    }
    public function detail($id) {
        if ( !$_SESSION[ 'user' ] ) {
            header( 'location:' . BASEURL . 'log' );
        } else {
            // echo $id;
            $data['judul'] = 'Detail Kamar';
            $data['kamar'] = $this->model('Kamar_model')->getKamarById($id);
            $this->view('templates/header', $data);
            $this->view('kamar/detail', $data);
            $this->view('templates/footer');
        }
    }

    public function tambah() {
        if ( !$_SESSION[ 'user' ] ) {
            header( 'location:' . BASEURL . 'log' );
        } else {
            $data['judul'] = 'Form Tambah Data Kamar';
            $this->view('templates/header', $data);
            $this->view('kamar/tambahKamar');
            $this->view('templates/footer');
        }
        
>>>>>>> dbabee18a9b5e9f09dd3ffe09b497ccdf2b1a95c
    }

    public function tambahBaru() {
        if ($this->model('Kamar_model')->tambahKamar($_POST) > 0) {
            header('Location: ' . BASEURL . '/kamar');
            exit;
        }
    }
}
