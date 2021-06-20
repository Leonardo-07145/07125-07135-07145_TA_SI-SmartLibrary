<?php
class AuthModel
{
    /**
     * Function untuk cek dari database berdasarkan
     * @param String $nama berisi nama
     * @param String $password berisi password
     */
    public function prosesAuthAdmin($nama, $password)
    {
        $sql = "select * from admin where nama='$nama' and password='$password'";
        $query = koneksi()->query($sql);
        return $query->fetch_assoc();
    }

    /**
     * Function untuk cek dari database berdasarkan
     * @param String $nama berisi nama
     * @param String $password berisi password
     */
    public function prosesAuthMember($nama, $password)
    {
        $sql = "select * from member where nama='$nama' and password='$password'";
        $query = koneksi()->query($sql);
        return $query->fetch_assoc();
    }

    /**
     * Function store berfungsi untuk menambah data member ke database
     * @param String nama berisi data nama
     * @param String password berisi data password
     * @param String tgllahir berisi data tgllahir
     * @param String alamat berisi data alamat
     * @param String notelp berisi data notelp
     */
    public function prosesStoreMember($nama, $password, $tgllahir, $alamat, $notelp)
    {
        $sql = "INSERT INTO member(nama, password, tgllahir, alamat, notelp) VALUES('$nama', '$password', '$tgllahir', '$alamat', '$notelp')";
        return koneksi()->query($sql);
    }
}