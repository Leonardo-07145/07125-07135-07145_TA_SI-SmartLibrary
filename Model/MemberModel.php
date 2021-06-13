<?php
class MemberModel
{
    /** Function get berfungsi untuk mengambil seluruh data praktikan
     * @param integer id berisi id praktikan */
    public function get($id)
    {
        $sql = "SELECT * FROM member WHERE id = $id";
        $query = koneksi()->query($sql);
        return $query->fetch_assoc();
    }
    
    /** Function getPraktikum berfungsi untuk mengambil seluruh data praktikum yang aktif */
    public function getPraktikum()
    {
        $sql = "SELECT * FROM praktikum WHERE status = 1";
        $query = koneksi()->query($sql);
        $hasil = [];
        while ($data = $query->fetch_assoc()){
            $hasil[] = $data;
        }
        return $hasil;
    }
    
    // /** Function getPendaftaranPraktikum berfungsi untuk mengambil data pendaftaran praktikum praktikan
    //  * @param integer idPraktikan berisi id praktikan */
    // public function getPeminjamanMember($idMember)
    // {
    //     $sql = "SELECT daftarprak.id as idDaftar , praktikum.nama as namaPraktikum , praktikum.id as idPraktikum , daftarprak.status FROM daftarprak
    //     JOIN praktikum on praktikum.id = daftarprak.praktikum_id
    //     WHERE daftarprak.praktikan_id = $idPraktikan";
    //     $query = koneksi()->query($sql);
    //     $hasil = [];
    //     while ($data = $query->fetch_assoc()){
    //         $hasil[] = $data;
    //     }
    //     return $hasil;
    // }
    
    /** Function getModul berfungsi untuk mengambil data modul dari praktikum yang aktif */
     public function getDetailPeminjaman($idPeminjaman, $idKoleksi)
    {
        $sql = "SELECT peminjaman.id, koleksi.id, koleksi.judul, peminjaman.status
        FROM detailpeminjaman
        JOIN peminjaman ON peminjaman_id = peminjaman.id
        JOIN koleksi ON koleksi_id = koleksi.id
        WHERE peminjaman.id = $idPeminjaman
        AND koleksi.id = $idKoleksi";
        $query = koneksi()->query($sql);
        $hasil = [];
        while ($data = $query->fetch_assoc()){
            $hasil[] = $data;
        }
        return $hasil;
    }

    /** Function getNilaiPraktikan berfungsi untuk mengambil data nilai praktikan di tiap-tiap praktikum
     * @param integer idPraktikan berisi id praktikan
     * @param integer idPraktikum berisi id praktikum */
    public function getNilaiPraktikan($idPraktikan,$idPraktikum)
    {
        $sql = "SELECT * FROM nilai
        JOIN modul on modul.id = nilai.modul_id
        WHERE praktikan_id = $idPraktikan
        AND praktikum_id = $idPraktikum
        ORDER BY modul.id";
        $query = koneksi()->query($sql);
        $hasil = [];
        while ($data = $query->fetch_assoc()){
            $hasil[] = $data;
        }
        return $hasil;
    }

    /** Function prosesUpdate berfungsi untuk update data praktikan dari database
     * @param String nama berisi nama praktikan
     * @param String npm berisi npm praktikan
     * @param String password berisi password praktikan
     * @param String no_hp berisi nomor telepon praktikan
     * @param integer id berisi id praktikan*/
    public function prosesUpdate($nama, $password, $tgllahir, $alamat, $notelp, $id)
    {
        $sql ="UPDATE member SET nama='$nama', password='$password', tgllahir='$tgllahir', alamat='$alamat', notelp='$notelp' WHERE id='$id'";
        $query = koneksi()->query($sql);
        return $query;
    }
    
    /** Function prosesStorePraktikum berfungsi untuk input data daftar praktikum ke database
     * @param integer idPraktikan berisi id praktikan
     * @param integer idPraktikum berisi id praktikum */
    public function prosesStorePraktikum($idPraktikan, $idPraktikum)
    {
        $sql ="INSERT INTO daftarprak(praktikan_id,praktikum_id,status) VALUES($idPraktikan, $idPraktikum, 0)";
        $query = koneksi()->query($sql);
        return $query;
    }
}
// $tes = new PraktikanModel();
// var_export($tes->getNilaiPraktikan(3,3));
// die();