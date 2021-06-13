<?php
class AuthModel
{
    public function prosesAuthAdmin($nama, $password)
    {
        $sql = "select * from admin where nama='$nama' and password='$password'";
        $query = koneksi()->query($sql);
        return $query->fetch_assoc();
    }

    /**
     * Function untuk cek dari database berdasarkan
     * @param String $npm berisi npm
     * @param String $password berisi password
     */
    public function prosesAuthMember($nama, $password)
    {
        $sql = "select * from member where nama='$nama' and password='$password'";
        $query = koneksi()->query($sql);
        return $query->fetch_assoc();
    }

    /**
     * Function store berfungsi untuk menambah data ke database
     * @param String nama berisi data nama
     * @param String npm berisi data npm
     * @param String no_hp berisi data nomor  hp
     * @param String password berisi data password
     */
    public function prosesStoreMember($nama, $password, $tgllahir, $alamat, $notelp)
    {
        $sql = "INSERT INTO member(nama, password, tgllahir, alamat, notelp) VALUES('$nama', '$password', '$tgllahir', '$alamat', '$notelp')";
        return koneksi()->query($sql);
    }
}
// $tes = new AuthModel();
// var_export($tes->prosesStorePraktikan('tesNama','tesNpm','123','password'));
// die();