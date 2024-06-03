<?php

class Register extends Controller
{

    public function index()
    {
        $data['judul'] = 'Register';
        $data['kabupaten'] = $this->model('Kabupaten_model')->getAllKabupaten();
        $data['kecamatan'] = $this->model('Kecamatan_model')->getAllKecamatan();
        $this->view('templates/header', $data);
        $this->view('auth/register', $data);
        $this->view('templates/footer');
    }

    public function alamat()
    {
        if ($this->model('Alamat_model')->addAlamat($_POST) > 0) {
            header('Location: ' . BASEURL . '/login');
            exit;
        }
    }
    public function register()
    {
        if (isset($_POST['email']) && $this->model('Individuals_model')->checkEmail($_POST['email']) > 0) {
            Flasher::setFlash('danger', 'Email dah ada bang, monggo login!', ' ');
            header('Location: ' . BASEURL . '/register');
            exit;
            }
        else {
            $alamatId = $this->model('Alamat_model')->addAlamat($_POST);
            if ($alamatId > 0) {
                $_POST['alamat_id'] = $alamatId;
                if ($this->model('Individuals_model')->addIndividuals($_POST) > 0) {
                    Flasher::setFlash('success', 'Kelar regis monggo login', ' ');
                    header('Location: ' . BASEURL . '/login');
                    exit;
                }
                else {
                    Flasher::setFlash('danger', 'Register Gagal', 'Ditambahkan.');
                    header('Location: ' . BASEURL . '/register');
                    exit;
                }
            }
        }
    }
}
