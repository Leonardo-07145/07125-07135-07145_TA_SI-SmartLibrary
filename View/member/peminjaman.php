<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peminjaman Buku</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>

<body>
    <center>
        <div class="container">

            <div class="card mt-5">
                <div class=" card-header">
                    <h2>Peminjaman</h2>
                    <a href="index.php?page=member&aksi=daftarBuku" class="btn btn-primary float-right">Daftar Buku</a>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Judul</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- <?php $no = 1;
                            foreach ($data as $row) : ?>
                            <tr>
                                <td><?= $no; ?></td>
                                <td><?= $row['judul']; ?></td>
                                <td><?= $row['status']; ?></td>
                                <td>
                                    <a href="index.php?page=praktikan&aksi=nilaiPraktikan&idPraktikum=<?= $row['idPraktikum'] ?>" class="btn btn-info">Cek Nilai</a>
                                </td>
                            </tr>
                            <?php $no++;
                            endforeach; ?>
                                <td><span class="badge badge-danger">Belum Diverif</span><span class="badge badge-success">Sudah Diverif</span></td>
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