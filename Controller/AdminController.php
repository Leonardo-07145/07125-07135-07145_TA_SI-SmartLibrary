<?php
class AdminController
{
    private $model;

    /**
     * Function ini adalah constructor yang berguna menginisialisasi Obyek aslab Model
     */
    public function __construct()
    {
        $this->model = new AdminModel();
    }

    /**
     * Function index berfungsi untuk mengatur tampilan awal
     */
    public function index()
    {
        $id = $_SESSION['admin']['id'];
        $data = $this->model->get($id);
        extract($data);
        require_once("View/admin/index.php");
    }

    /**
     * Function nilai berfungsi untuk mengatur tampilan halaman data nilai praktikan
     */
    public function nilai()
    {
        $idPraktikan = $_GET['id'];
        $modul = $this->model->getModul();
        $nilai = $this->model->getNilaiPraktikan($idPraktikan);
        extract($modul);
        extract($nilai);
        require_once("View/aslab/nilai.php");
    }

    /**
     * Function createNilai berfungsi untuk mengatur ke halaman input nilai
     */
    public function createNilai()
    {
        $modul = $this->model->getModul();
        extract($modul);
        require_once("View/aslab/createNilai.php");
    }

    /**
     * Function storeNilai berfungsi untuk menyimpan data nilai sesuai id praktikan dari form yang
     * telah diisi aslab pada halaman createNilai.php
     */
    public function storeNilai()
    {
        $idModul = $_POST['modul'];
        $idPraktikan = $_GET['id'];
        $nilai = $_POST['nilai'];
        if ($this->model->prosesStoreNilai($idModul,$idPraktikan,$nilai)){
            header("location: index.php?page=aslab&aksi=nilai&pesan=Berhasil Tambah Data&id=$idPraktikan");
        } else {
            header("location: index.php?page=aslab&aksi=createNilai&pesan=Gagal Tambah Data&id=$idPraktikan");
        }
    }
}
?>