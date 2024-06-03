<?php

class Log extends Controller
{
    public function index()
    {
        $data['title'] = 'Login';
        $this->view('templates/header', $data);
        $this->view('auth/log');
        $this->view('templates/footer');
    }

    public function sessionLogin()
    {
        $post = array_map( 'htmlspecialchars', $_POST );
        $user = $this->model( 'User_model' )->login( $post );
        if ( $user ) {
            $_SESSION[ 'user' ] = $user;
            header( 'Location: ' . BASEURL .'home' );
        }
    }

    public function logout()
    {
        if ( !$_SESSION[ 'user' ] ) {
            header( 'location:' . BASEURL . 'log' );
        } else {
            unset( $_SESSION[ 'user' ] );
            header( 'Location: ' . BASEURL . 'login' );
        }
    }

    // public function login()
    // {
    //     header('Location: ' . BASEURL . '/home');
    //     if(isset($_POST['email']) && $this->model('Individuals_model')->checkEmail($_POST['email']) > 0) 
    //     {
    //         if ($this->model('Individuals_model')->checkPassword($_POST['email'], $_POST['password'])) 
    //         {
    //             // $user = $this->model('Individuals_model')->getUserByEmail($_POST['email']);
                
    //             // if ($user != NULL) {
    //                 // Set session
    //                 // $_SESSION['id'] = $user['id'];
    //                 // $_SESSION['email'] = $user['email'];
    //                 flasher::setFlash('success', 'Login Berhasil', ' ');
    //                 header('Location: ' . BASEURL . '/home');
    //                 exit;
    //             } else {
    //                 flasher::setFlash('danger', 'User tidak ditemukan', ' ');
    //                 header('Location: ' . BASEURL . '/login');
    //                 exit;
    //             }
    //         }  else {
    //             flasher::setFlash('danger', 'Password salah', ' ');
    //             header('Location: ' . BASEURL . '/login');
    //             exit;
    //         }
    //     } else {
    //         flasher::setFlash('danger', 'Email tidak ditemukan', ' ');
    //         header('Location: ' . BASEURL . '/login');
    //         exit;
    //     }
    // }

}