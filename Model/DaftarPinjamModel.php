<?php
class DaftarPinjamModel
{
    /** Function get berfungsi untuk mengambil seluruh data member yang telah meminjam koleksi */
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
     * @param integer id berisi id peminjaman
     * @param integer idAdmin berisi id admin */
    public function prosesVerif($id , $idAdmin)
    {
        $sql = "UPDATE peminjaman SET status=1, admin_id = $idAdmin where id = $id";
        $query = koneksi()->query($sql);
        return $query;
    }

    /** Function prosesUnverif untuk membatalkan status verifikasi
     * @param integer id berisi id peminjaman
     */
    public function prosesUnverif($id)
    {
        $sqlUpdate ="UPDATE peminjaman SET status=0, admin_id = NULL where id = $id";
        $query = koneksi()->query($sqlUpdate);
        return $query;
    }
}