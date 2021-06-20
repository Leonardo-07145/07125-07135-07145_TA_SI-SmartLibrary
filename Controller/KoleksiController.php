<?php
class KoleksiController
{
    private $model;

    /**
     * Function ini adalah constructor yang berguna menginisialisasi Obyek KoleksiModel
     */
    public function __construct()
    {
        $this->model = new KoleksiModel();
    }

    /**
     * Function index berfungsi untuk mengatur tampilan awal
     */
    public function index()
    {
        $data = $this->model->get();
        extract($data);
        require_once("View/koleksi/index.php");
    }

    /**
     * Function create berfungsi untuk mengatur tampilan tambah data
     */
    public function create()
    {
        $data = $this->model->getJenis();
        extract($data);
        require_once("View/koleksi/create.php");
    }

    /**
     * Function store berfungsi untuk memproses data untuk di tambahkan
     * Fungsi ini membutuhkan data judul, pengarang, jenis_id dengan metode http request POST
     */
    public function store()
    {
        $judul = $_POST['judul'];
        $pengarang = $_POST['pengarang'];
        $jenis_id = $_POST['jenis_id'];
        if ($this->model->prosesStore($judul, $pengarang, $jenis_id)){
            header("location: index.php?page=koleksi&aksi=view&pesan=Berhasil Menambah Data"); // Jangan ada spasi habis location
        } else {
            header("location: index.php?page=koleksi&aksi=create&pesan=Gagal Menambah Data"); // Jangan ada spasi habis location
        }
    }

    /**
     * Function ini berfungsi untuk menampilkan halaman edit
     * Juga mengambil salah satu data dari database
     * Function membutuhkan data id dengan metode http request GET
     */
    public function edit()
    {
        $id = $_GET['id'];
        $data = $this->model->getById($id);
        extract($data);
        require_once("View/koleksi/edit.php");
    }

    /**
     * Function update berfungsi untuk memproses data untuk di update
     * Fungsi ini membutuhkan data nama,tahun dengan metode http request POST
     */
    public function update()
    {
        $id = $_POST['id'];
        $judul = $_POST['judul'];
        $pengarang = $_POST['pengarang'];
        if ($this->model->storeUpdate($judul, $pengarang, $id)){
            header("location: index.php?page=koleksi&aksi=view&pesan=Berhasil Mengubah Data"); // Jangan ada spasi habis location
        } else {
            header("location: index.php?page=koleksi&aksi=edit&pesan=Gagal Mengubah Data"); // Jangan ada spasi habis location
        }
    }

    /** Function delete berfungsi untuk menghapus koleksi */
    public function delete()
    {
        $id = $_GET['id'];
        if($this->model->prosesDelete($id)){
            header("location: index.php?page=koleksi&aksi=view&pesan=Berhasil Delete Data"); // Jangan ada spasi habis location  
        }else{
            header("location: index.php?page=koleksi&aksi=view&pesan=Gagal Delete Data"); // Jangan ada spasi habis location  
        } 
    }
}
?>