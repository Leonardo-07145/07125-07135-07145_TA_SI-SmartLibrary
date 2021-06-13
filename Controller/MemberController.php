<?php
class MemberController
{
    private $model;

    /**
     * Function ini adalah constructor yang berguna menginisialisasi Obyek PraktikanModel
     */
    public function __construct()
    {
        $this->model = new MemberModel();
    }

    /** Function index berfungsi untuk mengatur tampilan awal halaman praktikan */
    public function index()
    {
        $id = $_SESSION['member']['id'];
        $data = $this->model->get($id);
        extract($data);
        require_once("View/member/index.php");
    }

    /** Function edit berfungsi untuk menampilkan form edit */
    public function edit()
    {
        $id = $_SESSION['member']['id'];
        $data = $this->model->get($id);
        extract($data);
        require_once("View/member/edit.php");
    }

    /** Function update berfungsi untuk menyimpan hasil edit */
    public function update()
    {
        $id = $_POST['id'];
        $nama = $_POST['nama'];
        $password = $_POST['password'];
        $tgllahir = $_POST['tgllahir'];
        $alamat = $_POST['alamat'];
        $notelp = $_POST['notelp'];
        if($this->model->prosesUpdate($nama, $password, $tgllahir, $alamat, $notelp, $id)){
            header("location: index.php?page=member&aksi=view&pesan=Berhasil Ubah Data");
        }else{
            header("location: index.php?page=member&aksi=edit&pesan=Gagal Ubah Data");
        }
    }

    // /** Function praktikum berfungsi untuk mengatur ke tampilan halaman praktikum praktikan */
    // public function peminjaman()
    // {
    //     $idPraktikan = $_SESSION['member']['id'];
    //     $data = $this->model->getPeminjamanMember($idMember);
    //     extract($data);
    //     require_once("View/member/praktikum.php");
    // }

    /** Function daftarPraktikum berfungsi untuk mengatur tampilan halaman daftar praktikum */
    public function daftarBuku()
    {
        $data = $this->model->getBuku();
        extract($data);
        require_once("View/member/daftarPraktikum.php"); 
    }

    /** Function storePraktikum berfungsi untuk memproses data praktikum yang dipilih untuk ditambahkan */
    public function storePraktikum()
    {
        $praktikum = $_POST['praktikum'];
        $idPraktikan = $_SESSION['praktikan']['id'];
        if($this->model->prosesStorePraktikum($idPraktikan, $praktikum)){
            header("location: index.php?page=praktikan&aksi=praktikum&pesan=Berhasil Daftar Praktikum");
        }else{
            header("location: index.php?page=praktikan&aksi=daftarPraktikum&pesan=Gagal Daftar Praktikum");
        }
    }

    /** Function nilaiPraktikum berfungsi untuk mengatur halaman nilai praktikum praktikan */
    public function nilaiPraktikan()
    {
        $idPraktikan = $_SESSION['praktikan']['id'];
        $idPraktikum = $_GET['idPraktikum'];
        $modul = $this->model->getModul($idPraktikum);
        $nilai = $this->model->getNilaiPraktikan($idPraktikan,$idPraktikum);
        extract($modul);
        extract($nilai);
        require_once("View/praktikan/nilaiPraktikan.php");
    }
}
?>