<?php

class Auth extends Controller
{
    public function index()
    {
        $data[ 'judul' ] = 'Login';
        $this->view( 'templates/header', $data );
        $this->view( 'auth/index' );
        $this->view( 'templates/footer' );
    }
    // make logout

    public function HalRegister() {
        $data['judul'] = 'Register';
        $data['kecamatan'] = $this->model('Kecamatan_model')->getAllKecamatan();
        $this->view('templates/header', $data);
        $this->view('auth/register', $data);
        $this->view('templates/footer');
    }

    public function register()
    {
        if (isset($_POST['email']) && $this->model('Individuals_model')->checkEmail($_POST['email']) > 0) {
            header('Location: ' . BASEURL . '/auth');
            Flasher::setFlash('danger', 'Email dah ada bang, monggo login!', ' ');
            exit;
        } else {
            $alamatId = $this->model('Alamat_model')->addAlamat($_POST);
            if ($alamatId > 0) {
                $_POST['alamat_id'] = $alamatId;
                if ($this->model('Individuals_model')->register($_POST) > 0) {
                    header('Location: ' . BASEURL . '/auth');
                    Flasher::setFlash('success', 'Kelar regis monggo login', ' ');
                    exit;
                } else {
                    header('Location: ' . BASEURL . '/auth/halregister');
                    Flasher::setFlash('danger', 'Register Gagal', 'Ditambahkan.');
                    exit;
                }
            }
        }
    }
    
    public function sessionLogin()
    {
        $post = array_map('htmlspecialchars', $_POST);
        $user = $this->model('Individuals_model')->login($post);

        // var_dump($user);die;

        if ($user) {
            session_regenerate_id(true);
            $_SESSION['user'] = [
                'id'=> $user->id,
                'email' => $user->email,
                'roles_id' => $user->roles_id,
            ];
            // Debugging: Periksa isi session setelah login
            // var_dump($_SESSION);
            setcookie('user_session', session_id(), time() + 3600, '/', null, true, true);
            header( 'Location: ' . BASEURL .'/kamar' );
            exit;
        } else {
            header( 'Location: ' . BASEURL .'/auth' );
            exit;
        }
        
    }
    // if ($user) {
        //     $_SESSION[ 'user' ] = $user;
        //     header( 'Location: ' . BASEURL .'/kamar' );
        // }

    public function logout()
    {
        if ( !$_SESSION[ 'user' ] ) {
            header( 'location:' . BASEURL . '/auth' );
        } else {
            unset($_SESSION[ 'user' ] );
            header( 'Location: ' . BASEURL . '/auth' );
        }
    }
}