<?php
class AdminController
{
    private $model;

    /**
     * Function ini adalah constructor yang berguna menginisialisasi Obyek admin Model
     */
    public function __construct()
    {
        $this->model = new AdminModel();
    }

    /**
     * Function index berfungsi untuk mengatur tampilan awal
     */
    public function index()
    {
        $id = $_SESSION['admin']['id'];
        $data = $this->model->get($id);
        extract($data);
        require_once("View/admin/index.php");
    }
}
?>