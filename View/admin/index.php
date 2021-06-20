<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Member</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>

<body>
    <center>
        <div class="container">
            <div class="card mt-5">
                <div class=" card-header">
                    <h2>Data Member</h2>
                </div>
                <div class="card-body">

                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Member</th>
                                <th>Judul</th>
                                <th>Pengarang</th>
                                <th>Tanggal Pinjam</th>
                                <th>Tanggal Kembali</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($data as $row) : ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td><?= $row['nama']?></td>
                                <td><?= $row['judul']?></td>
                                <td><?= $row['pengarang']?></td>
                                <td><?= $row['tglpinjam']?></td>
                                <td><?= $row['tglkembali']?></td>
                                <td><?= $row['status'] == 0 ? '<span class="badge badge-danger">Belum Diverifikasi</span>' : '<span class="badge badge-success">Sudah Diverifikasi</span>'; ?></td>
                            </tr>
                            <?php $no++;
                            endforeach;?>
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