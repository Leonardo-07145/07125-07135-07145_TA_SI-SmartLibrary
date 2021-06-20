<?php
class AdminModel
{
    /**
     * @param integer $id berisi id
     * Function get berfungsi untuk mengambil seluruh data member dari database
     */
    public function get($id)
    {
        $sql = "SELECT peminjaman.id, member.nama, koleksi.judul, koleksi.pengarang, peminjaman.tglpinjam, 
        peminjaman.tglkembali, peminjaman.status
        FROM peminjaman
        JOIN member ON peminjaman.member_id=member.id
        JOIN koleksi ON peminjaman.koleksi_id=koleksi.id
        WHERE peminjaman.admin_id=$id";
        $query = koneksi()->query($sql);
        $hasil = [];
        while ($data = $query->fetch_assoc()){
            $hasil[] = $data;
        }
        return $hasil;
    }   
}