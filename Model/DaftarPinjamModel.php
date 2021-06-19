<?php
class DaftarPinjamModel{
    /** Function get berfungsi untuk mengambil seluruh data praktikan yang telah mendaftar praktikum */
    public function get()
    {
        $sql = "SELECT peminjaman.id, member.nama, koleksi.judul, koleksi.pengarang, peminjaman.tglpinjam, 
        peminjaman.tglkembali, peminjaman.status
        FROM peminjaman
        JOIN member ON peminjaman.member_id=member.id
        JOIN koleksi ON peminjaman.koleksi_id=koleksi.id";
        $query = koneksi()->query($sql);
        $hasil = [];
        while ($data = $query->fetch_assoc()){
            $hasil[] = $data;
        }
        return $hasil;
    }
    /** Function prosesVerif berfungsi untuk mengupdate status pada database yang telah di verifikasi
     * @param integer id berisi id
     * @param integer idAslab berisi id aslab */
    public function prosesVerif($id , $idAdmin)
    {
        $sql = "UPDATE peminjaman SET status=1, admin_id = $idAdmin where id = $id";
        $query = koneksi()->query($sql);
        return $query;
    }
    /** Function prosesUnverif untuk membatalkan status verifikasi
     * @param integer id berisi id
     * @param integer idPraktikan berisi id praktikan */
    public function prosesUnverif($id, $idMember)
    {
        $sqlUpdate ="UPDATE peminjaman SET status=0, admin_id = NULL where id = $id";
        $query = koneksi()->query($sqlUpdate);
        return $query;
    }
}
// $tes = new DaftarPrakModel();
// var_export($tes->prosesVerif(3, 1));
// var_export($tes->prosesUnVerif(3, 1));
// die();