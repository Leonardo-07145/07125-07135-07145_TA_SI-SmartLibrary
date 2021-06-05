<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peminjaman Member</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>

<body>
    <center>
        <div class="container">

            <div class="card mt-5">
                <div class=" card-header">
                    <h2>Peminjaman</h2>
                    <a href="index.php?page=member&aksi=pinjamBuku" class="btn btn-primary float-right">Pinjam Buku</a>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Buku</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Diganti Saat Modul 2 -->
                            <tr>
                                <td>1</td>
                                <td>Kisah Tanah Jawa</td>
                                <td><span class="badge badge-danger">Belum Diverif</span><span class="badge badge-success">Sudah Diverif</span></td>
                            </tr>
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