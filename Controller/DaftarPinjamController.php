<?php
class DaftarPinjamController
{
    private $model;

    /**
     * Function ini adalah constructor yang berguna menginisialisasi Obyek DaftarPinjamModel
     */
    public function __construct()
    {
        $this->model = new DaftarPinjamModel();
    }

    /** Function index berfungsi  untuk mengatur tampilan awal halaman daftar */
    public function index()
    {
        $data = $this->model->get();
        extract($data);
        require_once("View/daftarpinjam/index.php");
    }

    /** Function verif berfungsi memverifikasi yang sudah meminjam koleksi */
    public function verif()
    {
        $id = $_GET['id'];
        $idAdmin = $_SESSION['admin']['id'];
        if($this->model->prosesVerif($id, $idAdmin)){
            header("location: index.php?page=daftarpinjam&aksi=view&pesan=Berhasil Verif");
        }else{
            header("location: index.php?page=daftarpinjam&aksi=view&pesan=Gagal Verif");
        }
    }
    /** Function unVerif berfungsi untuk membatalkan verifikasi */
    public function unVerif()
    {
        $id = $_GET['id'];
        $idMember = $_GET['member_id'];
        if($this->model->prosesunVerif($id)){
            header("location: index.php?page=daftarpinjam&aksi=view&pesan=Berhasil Un-Verif");
        }else{
            header("location: index.php?page=daftarpinjam&aksi=view&pesan=Gagal Un-Verif");
        }
    }
}
?>