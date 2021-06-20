<?php
//**Memanggil Helper */
require_once("Koneksi.php");

/**Memanggil Model */
require_once("Model/AuthModel.php");
require_once("Model/KoleksiModel.php");
require_once("Model/AdminModel.php");
require_once("Model/MemberModel.php");
require_once("Model/DaftarPinjamModel.php");
/**Memanggil Controller */
require_once("Controller/AdminController.php");
require_once("Controller/AuthController.php");
require_once("Controller/DaftarPinjamController.php");
require_once("Controller/MemberController.php");
require_once("Controller/KoleksiController.php");

//Routing dari URL ke Obyek Class PHP
if (isset($_GET['page']) && isset($_GET['aksi']))
{
    session_start();
    $page = $_GET['page']; // Berisi nama page
    $aksi = $_GET['aksi']; // Aksi Dari setiap page

    if ($page == "auth") {
        $auth = new AuthController();
        if ($aksi == 'view') {
            $auth->index();
        } else if ($aksi == 'loginAdmin') {
            $auth->login_admin();
        } else if ($aksi == 'loginMember') {
            $auth->login_member();
        } else if ($aksi == 'authAdmin') {
            $auth->authAdmin();
        } else if ($aksi == 'authMember') {
            $auth->authMember();
        } else if ($aksi == 'logout') {
            $auth->logout();
        } else if ($aksi == 'daftarMember') {
            $auth->daftarMember();
        } else if ($aksi == 'storeMember') {
            $auth->storeMember();
        } else {
            echo "Method Not Found";
        }
    } else if ($page == "admin") {
        require_once("View/menu/menu_admin.php");
        if ($_SESSION['role'] == 'admin')
        {
            $admin = new AdminController();    
            if ($aksi == 'view') {
                $admin->index();
            } else {
                echo "Method Not Found";
            }
        } else {
            header("location: index.php?page=auth&aksi=loginAdmin"); //Jangan ada spasi habis location
        }
    } else if ($page == "koleksi") {
        require_once("View/menu/menu_admin.php");
        if ($_SESSION['role'] == 'admin')
        {
            $koleksi = new KoleksiController();
            if ($aksi == 'view') {
                $koleksi->index();
            } else if ($aksi == 'create') {
                $koleksi->create();
            } else if ($aksi == 'store') {
                $koleksi->store();
            } else if ($aksi == 'edit') {
                 $koleksi->edit();
            } else if ($aksi == 'update') {
                $koleksi->update();
            } else if ($aksi == 'delete') {
                $koleksi->delete();
            } else {
                echo "Method Not Found";
            }
        } else {
            header("location: index.php?page=auth&aksi=loginAdmin"); //Jangan ada spasi habis location
        }
    } else if ($page == "member") {
        require_once("View/menu/menu_member.php");
        if($_SESSION['role'] == 'member')
        {
            $member = new MemberController();
            if ($aksi == 'view') {
                $member->index();
            } else if ($aksi == 'edit') {
                $member->edit();
            } else if ($aksi == 'update') {
                $member->update();
            } else if ($aksi == 'peminjaman') {
                $member->peminjaman();
            } else if ($aksi == 'daftarKoleksi') {
                $member->daftarKoleksi();
            } else if ($aksi == 'storeKoleksi') {
                $member->storeKoleksi();
            } else {
                echo "Method Not Found";
            }
        } else {
            header("location: index.php?page=auth&aksi=loginMember");
        }
    } else if ($page == 'daftarpinjam') {
        require_once("View/menu/menu_admin.php");
        if($_SESSION['role'] == 'admin')
        {
            $daftarpinjam = new DaftarPinjamController();    
            if ($aksi == 'view') {
                $daftarpinjam->index();
            } else if ($aksi == 'verif') {
                $daftarpinjam->verif();
            } else if ($aksi == 'unVerif') {
                $daftarpinjam->unVerif();
            } else {
                echo "Method Not Found";
            }
        } else {
            header("location: index.php?page=auth&aksi=loginAdmin");
        }
    } else {
        echo "Page Not Found";
    }
} else {
    header("location: index.php?page=auth&aksi=view"); //Jangan ada spasi habis location
}