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

    /** Function index berfungsi untuk mengatur tampilan awal */
    public function index()
    {
        require_once("View/auth/index.php");
    }

    /** Function login_aslab berfungsi untuk mengatur halaman login untuk aslab */
    public function login_admin()
    {
        require_once("View/auth/login_admin.php");
    }

    /** Function login_praktikan berfungsi untuk mengatur halaman login untuk praktikan */
    public function login_member()
    {
        require_once("View/auth/login_member.php");
    }

    /** Function authAslab berfungsi untuk authentication aslab */
    public function authAdmin()
    {
        $nama = $_POST['nama'];
        $password = $_POST['password'];
        $data = $this->model->prosesAuthAdmin($nama, $password);
        if ($data){
            $_SESSION['role'] = 'admin';
            $_SESSION['admin'] = $data;

            header("location: index.php?page=admin&aksi=view&pesan=Berhasil Login");
        } else {
            header("location: index.php?page=auth&aksi=loginAdmin&pesan=Nama atau Passwors salah");
        }
    }

    /** Function authPraktikan berfungsi untuk authentication praktikan */
    public function authMember()
    {
        $nama = $_POST['nama'];
        $password = $_POST['password'];
        $data = $this->model->prosesAuthMember($nama, $password);
        if ($data){
            $_SESSION['role'] = 'member';
            $_SESSION['member'] = $data;

            header("location: index.php?page=member&aksi=view&pesan=Berhasil Login");
        } else {
            header("location: index.php?page=auth&aksi=loginMember&pesan=Nama atau Password salah");
        }
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
        if ($this->model->prosesStoreMember($nama, $password, $tgllahir, $alamat, $notelp)){
            header("location: index.php?page=auth&aksi=view&pesan=Berhasil Daftar");
        } else {
            header("location: index.php?page=auth&aksi=daftarMember&pesan=Gagal Daftar");
        }
    }

    /**
     * Function Logout untuk destroy session login sebelumnya
     */
    public function logout()
    {
        session_destroy();
        header("location: index.php?page=auth&aksi=view&pesan=Berhasil Logout");
    }
}
?>