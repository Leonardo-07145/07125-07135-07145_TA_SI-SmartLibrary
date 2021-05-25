<?php
require_once("koneksi.php");

/**Memanggil Model */
require_once("Model/AuthModel.php");

/**Memanggil Model */
require_once("Controller/AuthController.php");

//Routing dari URL ke Obyek Class PHP
if (isset($_GET['page']) && isset($_GET['aksi']))
{
    session_start();
    $page = $_GET['page']; // Berisi nama page
    $aksi = $_GET['aksi']; // Aksi Dari setiap page

    // require_once akan Dirubah Saat Modul 2
    if ($page == "auth") {
        $auth = new AuthController(); 
        if ($aksi == 'view') {
            require_once("View/auth/index.php");
        } else if ($aksi == 'loginAdmin') {
            require_once("View/auth/login_admin.php");
        } else if ($aksi == 'loginMember') {
            require_once("View/auth/login_member.php");
        } else if ($aksi == 'authAdmin') {
            require_once("View/menu/menu_admin.php");
            require_once("View/admin/index.php");
        } else if ($aksi == 'authMember') {
            require_once("View/menu/menu_member.php");
            require_once("View/member/index.php");
        } else if ($aksi == 'logout') {
            require_once("View/auth/index.php");
        } else if ($aksi == 'daftarMember') {
            $auth->daftarMember();
        } else if ($aksi == 'storeMember') {
            $auth->storeMember();
        } else {
            echo "Method Not Found";
        }
    } else if ($page == "admin") {
        require_once("View/menu/menu_admin.php");
        if ($aksi == 'view') {
            require_once("View/admin/index.php");
        } else if ($aksi == 'nilai') {
            require_once("View/admin/nilai.php");
        } else if ($aksi == 'createNilai') {
            require_once("View/admin/createNilai.php");
        } else if ($aksi == 'storeNilai') {
            require_once("View/admin/nilai.php");
        } else {
            echo "Method Not Found";
        }
    } else if ($page == "koleksi") {
        require_once("View/menu/menu_admin.php");
        if ($aksi == 'view') {
            require_once("View/koleksi/index.php");
        } else if ($aksi == 'create') {
            require_once("View/koleksi/create.php");
        } else if ($aksi == 'store') {
            require_once("View/koleksi/index.php");
        } else if ($aksi == 'edit') {
            require_once("View/koleksi/edit.php");;
        } else if ($aksi == 'update') {
            require_once("View/koleksi/index.php");
        } else if ($aksi == 'aktifkan') {
            require_once("View/koleksi/index.php");
        } else if ($aksi == 'nonAktifkan') {
            require_once("View/koleksi/index.php");
        } else {
            echo "Method Not Found";
        }
    } else if ($page == "modul") {
        require_once("View/menu/menu_aslab.php");
        if ($aksi == 'view') {
            require_once("View/modul/index.php");
        } else if ($aksi == 'create') {
            require_once("View/modul/create.php");
        } else if ($aksi == 'store') {
            require_once("View/modul/index.php");
        } else if ($aksi == 'delete') {
            require_once("View/modul/index.php");
        } else {
            echo "Method Not Found";
        }
    } else if ($page == "member") {
        require_once("View/menu/menu_member.php");
        if ($aksi == 'view') {
            require_once("View/member/index.php");
        } else if ($aksi == 'edit') {
            require_once("View/member/edit.php");
        } else if ($aksi == 'update') {
            require_once("View/member/index.php");
        } else if ($aksi == 'peminjaman') {
            require_once("View/member/peminjaman.php");
        } else if ($aksi == 'pinjamBuku') {
            require_once("View/member/pinjamBuku.php");
        } else if ($aksi == 'storePeminjaman') {
            require_once("View/member/peminjaman.php");
        } else if ($aksi == 'nilaiPraktikan') {
            require_once("View/member/nilaiPraktikan.php");
        } else {
            echo "Method Not Found";
        }
    } else if ($page == 'daftarprak') {
        require_once("View/menu/menu_aslab.php");
        if ($aksi == 'view') {
            require_once("View/daftarprak/index.php");
        } else if ($aksi == 'verif') {
            require_once("View/daftarprak/index.php");
        } else if ($aksi == 'unVerif') {
            require_once("View/daftarprak/index.php");
        } else {
            echo "Method Not Found";
        }
    } else {
        echo "Page Not Found";
    }
} else {
    header("location: index.php?page=auth&aksi=view"); //Jangan ada spasi habis location
}
