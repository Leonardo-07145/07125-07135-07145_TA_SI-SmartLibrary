<?php
class DaftarprakController
{
    private $model;

    /**
     * Function ini adalah constructor yang berguna menginisialisasi Obyek DaftarprakModel
     */
    public function __construct()
    {
        $this->model = new DaftarprakModel();
    }

    /** Function index berfungsi  untuk mengatur tampilan awal halaman daftar */
    public function index()
    {
        $data = $this->model->get();
        extract($data);
        require_once("View/daftarprak/index.php");
    }

    /** Function verif berfungsi memverifikasi yang sudah mendaftar praktikum */
    public function verif()
    {
        $id = $_GET['id'];
        $idAslab = $_SESSION['aslab']['id'];
        if($this->model->prosesVerif($id, $idAslab)){
            header("location: index.php?page=daftarprak&aksi=view&pesan=Berhasil Verif Praktikan");
        }else{
            header("location: index.php?page=daftarprak&aksi=view&pesan=Gagal Verif Praktikan");
        }
    }
    /** Function unVerif berfungsi untuk membatalkan verifikasi */
    public function unVerif()
    {
        $id = $_GET['id'];
        $idPraktikan = $_GET['idPraktikan'];
        if($this->model->prosesunVerif($id, $idPraktikan)){
            header("location: index.php?page=daftarprak&aksi=view&pesan=Berhasil Un-Verif Praktikan");
        }else{
            header("location: index.php?page=daftarprak&aksi=view&pesan=Gagal Un-Verif Praktikan");
        }
    }
}
?>