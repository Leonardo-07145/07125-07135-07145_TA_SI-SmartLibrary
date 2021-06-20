<?php
class MemberController
{
    private $model;

    /**
     * Function ini adalah constructor yang berguna menginisialisasi Obyek MemberModel
     */
    public function __construct()
    {
        $this->model = new MemberModel();
    }

    /** Function index berfungsi untuk mengatur tampilan awal halaman member */
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

    /** Function daftarKoleksi berfungsi untuk mengatur tampilan halaman daftar pinjam */
    public function daftarKoleksi()
    {
        $data = $this->model->getKoleksi();
        extract($data);
        require_once("View/member/daftarKoleksi.php"); 
    }

    /** Function storeKoleksi berfungsi untuk memproses data peminjaman yang dipilih untuk ditambahkan */
    public function storeKoleksi()
    {
        $idKoleksi = $_POST['koleksi'];
        $tglpinjam = $_POST['tglpinjam'];
        $tglkembali = $_POST['tglkembali'];
        $idMember = $_SESSION['member']['id'];
        if($this->model->prosesStoreKoleksi($idMember, $idKoleksi, $tglpinjam, $tglkembali)){
            header("location: index.php?page=member&aksi=peminjaman&pesan=Berhasil Daftar");
        }else{
            header("location: index.php?page=member&aksi=daftarKoleksi&pesan=Gagal Daftar");
        }
    }

    /** Function peminjaman berfungsi untuk menampilkan data peminjaman yang dipilih */
    public function peminjaman()
    { 
        $id = $_SESSION['member']['id'];
        $data = $this->model->getPeminjaman($id);
        extract($data);
        require_once("View/member/peminjaman.php");
    }
}
?>