<?php

class Flasher
{
    public static function setFlash($tipe, $pesan, $aksi)
    {
        $_SESSION['flash'] = [
            'tipe' => $tipe,
            'pesan' => $pesan,
            'aksi' => $aksi
        ];
    }

    public static function flash()
    {
        if (isset($_SESSION['flash'])) {
            echo '<div class="alert alert-'. $_SESSION['flash']['tipe'] .' alert-dismissible fade show" role="alert">
                    <strong>'. $_SESSION['flash']['pesan'] .'  ' .$_SESSION['flash']['aksi']. '</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';

            unset($_SESSION['flash']); // Hapus pesan flash setelah ditampilkan
        }
    }
}
