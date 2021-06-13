<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Koleksi</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>

<body>
    <center>
        <div class="container">
            <div class="card mt-5">
                <div class=" card-header">
                    <h2>Data Koleksi</h2>
                    <a href="index.php?page=koleksi&aksi=create" class="btn btn-success float-right">Tambah Buku</a>
                </div>
                <div class="card-body">

                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Judul</th>
                                <th>Nama Pengarang</th>
                                <th>Jenis Koleksi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Diganti Saat Modul 2 -->
                            <?php $no = 1;
                            foreach ($data as $row) : ?>
                            <tr>
                                <td><?= $no; ?></td>
                                <td><?= $row['judul']; ?></td>
                                <td><?= $row['pengarang']; ?></td>
                                <td><?= $row['jeniskoleksi']; ?></td>
                                <td>
                                    <a href="index.php?page=koleksi&aksi=edit&id=<?= $row['id'] ?>" class="btn btn-warning">Edit</a>
                                    <a href="index.php?page=koleksi&aksi=delete&id=<?= $row['id']; ?>" class="btn btn-danger">Hapus</a>
                                </td>
                            </tr>
                            <?php $no++;
                            endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </center>

    <script src="assets/js/jquery-3.3.1.slim.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.css"></script>
</body>

</html>