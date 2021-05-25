<?php

class AuthModel
{
    public function prosesStoreMember($nama,$password,$tgllahir,$alamat,$notelp)
    {
        $sql ="INSERT INTO member(nama,password,tgllahir,alamat,notelp)values('$nama','$password',
        '$tgllahir','$alamat','$notelp')";
        return koneksi()->query($sql);
    }
    /** Function untuk cek dari database berdasarkan
     * @param String $nama berisi nama
     * @param String $password berisi password */
    public function prosesAuthMember($nama, $password)
    {
        $sql = "SELECT * FROM member WHERE nama='$nama' and password='$password'";
        $query = koneksi()->query($sql);
        return $query->fetch_assoc();
    }
    /** Function untuk cek dari database berdasarkan
     * @param String $nama berisi nama
     * @param String $password berisi password */
    public function prosesAuthAdmin($nama, $password)
    {
        $sql = "SELECT * FROM aslab WHERE nama='$nama' and password='$password'";
        $query = koneksi()->query($sql);
        return $query->fetch_assoc();
    }
}