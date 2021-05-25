<?php

class AuthModel
{
    public function prosesStoreMember($nama,$password,$tgllahir,$alamat,$notelp)
    {
        $sql ="INSERT INTO member (nama,password,tgllahir,alamat,notelp)values('$nama','$password',
        '$tgllahir','$alamat','$notelp')";
        return koneksi()->query($sql);
    }
}