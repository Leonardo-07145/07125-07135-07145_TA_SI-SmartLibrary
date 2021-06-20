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
     * Function prosesStore berfungsi untuk input data koleksi
     * @param String $judul berisi nama judul
     * @param String $pengarang berisi nama pengarang
     * @param String $jenis_id berisi nama jenis_id
     */
    public function prosesStore($judul, $pengarang, $jenis_id)
    {
        $sql = "INSERT INTO koleksi(judul,pengarang,jenis_id) VALUES('$judul','$pengarang','$jenis_id')";
        return koneksi()->query($sql);
    }

    /**
     * Function update berfungsi untuk mengubah data di database
     * @param String $judul berisi data judul
     * @param String $pengarang berisi data pengarang
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