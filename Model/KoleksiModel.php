<?php
class KoleksiModel
{
    /**
     * Function get berfungsi untuk mengambil seluruh data dari database
     */
    public function get()
    {
        $sql = "select koleksi.id, koleksi.judul, koleksi.pengarang, jenis.jeniskoleksi
        FROM koleksi
        INNER JOIN jenis
        ON koleksi.jenis_id=jenis.id";
        $query = koneksi()->query($sql);
        $hasil = [];
        while ($data = $query->fetch_assoc()){
            $hasil[] = $data;
        }
        return $hasil;
    }

    /**
     * Function get berfungsi untuk mengambil seluruh data dari database
     */
    public function getJenis()
    {
        $sql = "select * from jenis";
        $query = koneksi()->query($sql);
        $hasil = [];
        while ($data = $query->fetch_assoc()){
            $hasil[] = $data;
        }
        return $hasil;
    }

    /**
     * Function prosesStore berfungsi untuk input data praktikum
     * @param String $nama berisi nama praktikum
     * @param String $tahun berisi nama praktikum
     */
    public function prosesStore($judul, $pengarang, $jenis_id)
    {
        $sql = "INSERT INTO koleksi(judul,pengarang,jenis_id) VALUES('$judul','$pengarang','$jenis_id')";
        return koneksi()->query($sql);
    }

    /**
     * Function update berfungsi untuk mengubah data di database
     * @param String $nama berisi data nama
     * @param String $tahun berisi data tahun
     * @param Integer $id berisi id dari suatu data di database
     */
    public function storeUpdate($judul, $pengarang, $id)
    {
        $sql = "UPDATE koleksi SET judul='$judul', pengarang='$pengarang' WHERE id=$id";
        return koneksi()->query($sql);
    }

    /** Function delete berfungsi untuk menambahkan data modul ke database
     * @param integer id berisi id */
    public function prosesDelete($id)
    {
        $sql = "DELETE FROM koleksi WHERE id=$id";
        return koneksi()->query($sql);
    }

    /**
     * Function aktifkan ini untuk merubah salah satu field di database
     * @param Integer $id berisi id dari suatu data di database
     */
    public function prosesAktifkan($id)
    {
        koneksi()->query(("UPDATE praktikum SET status=0")); // Merubah status praktikum yang aktif menjadi tidak aktif

        $sql = "UPDATE praktikum SET status=1 WHERE id=$id";
        return koneksi()->query($sql);
    }

    /**
     * Function nonAktifkan ini untuk merubah salah satu field di database
     * @param Integer $id berisi id dari suatu data di database
     */
    public function prosesNonAktifkan($id)
    {
        $sql = "UPDATE praktikum SET status=0 WHERE id=$id";
        return koneksi()->query($sql);
    }

    /**
     * Function getById berfungsi untuk mengambil satu data dari database
     * @param Integer $id berisi id dari suatu data di database
     */
    public function getById($id)
    {
        $sql = "select koleksi.id, koleksi.judul, koleksi.pengarang, jenis.jeniskoleksi
        FROM koleksi
        INNER JOIN jenis
        ON koleksi.jenis_id=jenis.id
	    WHERE koleksi.id=$id";
        $query = koneksi()->query($sql);
        return $query->fetch_assoc();
    }    
}
// $tes = new KoleksiModel();
// var_export($tes->getJenis());
// die();