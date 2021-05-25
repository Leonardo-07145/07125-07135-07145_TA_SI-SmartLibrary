<?php 
class AuthController
{
    private $model;

    /** 
     * Function ini adalah constructor yang berguna menginisialisasi Obyek Auth Model
     */
    public function __construct()
    {
        $this->model = new AuthModel();
    }

    /** Function daftarPraktikan berfungsi untuk mengatur tampilan daftar */
    public function daftarMember()
    {
        require_once("View/auth/daftar_member.php");
    }

    /**
     * Function ini berfungsi untuk memproses data untuk ditambahkan
     * Fungsi ini membutuhkan data nama, npm, password, notelp dengan metode http request post
     */
    public function storeMember()
    {
        $nama = $_POST['nama'];
        $password = $_POST['password'];
        $tgllahir = $_POST['tgllahir'];
        $alamat = $_POST['alamat'];
        $notelp = $_POST['notelp'];
        if ($this->model->prosesStoreMember($nama,$password,$tgllahir,$alamat,$notelp)){
            header("location: index.php?page=auth&aksi=view&pesan=Berhasil Daftar");
        } else {
            header("location: index.php?page=auth&aksi=daftarMember&pesan=Gagal Daftar");
        }
    }
}
?>