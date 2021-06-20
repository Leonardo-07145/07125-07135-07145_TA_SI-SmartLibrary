<?php
class MemberModel
{
    /** Function get berfungsi untuk mengambil seluruh data member
     * @param integer id berisi id member */
    public function get($id)
    {
        $sql = "SELECT * FROM member WHERE id = $id";
        $query = koneksi()->query($sql);
        return $query->fetch_assoc();
    }
    
    /** Function getkoleksi berfungsi untuk mengambil seluruh data koleksi */
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
    
    /** Function getPeminjaman berfungsi untuk mengambil data peminjaman*/
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

    /** Function prosesUpdate berfungsi untuk update data member dari database
     * @param String nama berisi nama member
     * @param String password berisi password member
     * @param String tgllahir berisi tgllahir member
     * @param String alamat berisi alamat member
     * @param String notelp berisi notelp member
     * @param integer id berisi id member*/
    public function prosesUpdate($nama, $password, $tgllahir, $alamat, $notelp, $id)
    {
        $sql ="UPDATE member SET nama='$nama', password='$password', tgllahir='$tgllahir', alamat='$alamat', notelp='$notelp' WHERE id='$id'";
        $query = koneksi()->query($sql);
        return $query;
    }
    
    /** Function prosesStoreKoleksi berfungsi untuk input data peminjaman ke database
     * @param integer idMember berisi id member
     * @param integer idKoleksi berisi id koleksi
     * @param integer tglpinjam berisi tglpinjam
     * @param integer tglkembali berisi tglkembali
     */
    public function prosesStoreKoleksi($idMember, $idKoleksi, $tglpinjam, $tglkembali)
    {
        $sql ="INSERT INTO peminjaman(member_id, koleksi_id, tglpinjam, tglkembali, status) 
        VALUES($idMember, $idKoleksi, '$tglpinjam', '$tglkembali', 0)";
        $query = koneksi()->query($sql);
        return $query;
    }
}