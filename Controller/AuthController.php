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
     * Fungsi ini membutuhkan data nama, password, tgllahir, alamat, notelp dengan metode http request post
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
    /** Function authMember berfungsi untuk authentication member */
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
    /** Function login_member berfungsi untuk mengatur halaman login untuk member */
    public function login_member()
    {
        require_once("View/auth/login_member.php");
    }
    /** Function authAdmin berfungsi untuk authentication admin */
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
            header("location: index.php?page=auth&aksi=loginAdmin&pesan=Nama atau Password salah");
        }
    }
    /** Function login_admin berfungsi untuk mengatur halaman login untuk admin */
    public function login_admin()
    {
        require_once("View/auth/login_admin.php");
    }
    /** Function logout untuk destroy session login sebelumnya  */
    public function logout()
    {
        session_destroy();
        header("location: index.php?page=auth&aksi=view&pesan=Berhasil Logout");
    }
}
?>