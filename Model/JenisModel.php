<?php
class JenisModel{

    /** Function get berfungsi untuk mengambil seluruh data dari database */
    // public function get()
    // {
    //     $sql = "SELECT modul.id as id , praktikum.nama as praktikum , praktikum.status as status , modul.nama as nama
    //     FROM modul JOIN praktikum ON modul.praktikum_id = praktikum.id WHERE praktikum.status = 1";
    //     $query = koneksi()->query($sql);
    //     $hasil = [];
    //     while ($data = $query->fetch_assoc()){
    //         $hasil[] = $data;
    //     }
    //     return $hasil;
    // }

    

    /** Function getLastData untuk mengambil data modul */
    public function getLastData()
    {
        $sql = "SELECT modul.id as id , modul.nama as nama FROM modul
        JOIN praktikum ON modul.praktikum_id = praktikum.id
        WHERE praktikum.status = 1
        ORDER BY id DESC LIMIT 1";
        $query =  koneksi()->query($sql);
        return $query->fetch_assoc();
    }

    /** Function prosesStore berfungsi untuk menambahkan data modul ke database
     * @param string modul berisi nama modul
     * @param string idPraktikum berisi id praktikum */
    public function prosesStore($modul , $idPraktikum)
    {
        $sql = "INSERT INTO modul(nama,praktikum_id) VALUES ('$modul','$idPraktikum')";
        return koneksi()->query($sql);
    }

    /** Function delete berfungsi untuk menambahkan data modul ke database
     * @param integer id berisi id */
    public function prosesDelete($id)
    {
        $sql = "DELETE FROM modul WHERE id=$id";
        return koneksi()->query($sql);
    }

    /**
     * Function getPraktikum berfungsi untuk mengambil seluruh data dari database */
    public function getPraktikum()
    {
        $sql = "SELECT * FROM praktikum WHERE status=1";
        $query = koneksi()->query($sql);
        $hasil = [];
        while ($data = $query->fetch_assoc()){
            $hasil[] = $data;
        }
        return $hasil;
    }
}
// $tes = new ModulModel();
// // var_export($tes->prosesStore("tesNama", 4));
// var_export($tes->prosesDelete(2));
// die();