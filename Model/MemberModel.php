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
    public function getKoleksi()
    {
        $sql = "SELECT * FROM koleksi";
        $query = koneksi()->query($sql);
        $hasil = [];
        while ($data = $query->fetch_assoc()){
            $hasil[] = $data;
        }
        return $hasil;
    }
    
    /** Function getModul berfungsi untuk mengambil data modul dari praktikum yang aktif */
     public function getPeminjaman($id)
    {
        $sql = "SELECT peminjaman.id, koleksi.judul, peminjaman.tglpinjam, peminjaman.tglkembali, 
        koleksi.id, peminjaman.status FROM peminjaman
        JOIN koleksi on koleksi.id = peminjaman.koleksi_id
        WHERE peminjaman.member_id = $id";
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
    public function prosesStoreKoleksi($idMember, $idKoleksi, $tglpinjam, $tglkembali)
    {
        $sql ="INSERT INTO peminjaman(member_id, koleksi_id, tglpinjam, tglkembali, status) 
        VALUES($idMember, $idKoleksi, '$tglpinjam', '$tglkembali', 0)";
        $query = koneksi()->query($sql);
        return $query;
    }
}
// $tes = new PraktikanModel();
// var_export($tes->getNilaiPraktikan(3,3));
// die();