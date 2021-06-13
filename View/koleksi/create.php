<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Koleksi</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>

<body>
    <center>
        <div class="container">

            <div class="card mt-5">
                <div class=" card-header">
                    <h2>Create Koleksi</h2>
                    <a href="index.php?page=koleksi&aksi=view" class="btn btn-info float-right">Kembali</a>
                </div>
                <div class="card-body">
                    <form action="index.php?page=koleksi&aksi=store" method="POST">
                    <div class="form-group">
                                <label for="">Judul :</label>
                                <input type="text" name="judul" class="form-control" required>
                            </div>
                        <div class="row">
                            <div class="col">
                                <label for="">Nama Pengarang :</label>
                                <input type="text" name="pengarang" class="form-control" required>
                            </div>
                            <div class="col">
                            <div class="col">
                                <label for="">Jenis Koleksi (Masukkan nomor nya) :</label>
                                <input type="text" name="jenis_id" class="form-control" required>
                            </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary float-right mt-3">Simpan</button>
                        <br></br>
                        <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Jenis Koleksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Diganti Saat Modul 2 -->
                            <?php 
                            foreach ($data as $row) : ?>
                            <tr>
                                <td><?= $row['id']; ?></td>
                                <td><?= $row['jeniskoleksi']; ?></td>
                            </tr>
                            <?php 
                            endforeach; ?>
                        </tbody>
                    </table>
                    </form>
                </div>
            </div>
        </div>
    </center>

    <script src="assets/js/jquery-3.3.1.slim.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.css"></script>
</body>

</html>