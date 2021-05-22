<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Member</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>

<body>
    <div class="container">

        <div class="card mt-5">
            <div class=" card-header">
                <center>
                <h2>Perpustakaan</h2>
                </center>
                <a href="index.php?page=praktikan&aksi=view" class="btn btn-info float-right">Kembali</a>
            </div>
            <div class="card-body">
                <form action="index.php?page=praktikan&aksi=storePraktikum" method="POST">
                    <div class="row">
                        <div class="col">
                            <!-- Digant saat modul 3 -->
                            <label for="">Daftar Buku : </label>
                            <select name="praktikum" class="form-control">
                                <option value="1">Kisah Tanah Jawa</option>
                            </select>
                            <div class="row">
                            <div class="col">
                                <label for="">Tanggal Pinjam :</label>
                                <input type="date" name="tglpinjam" class="form-control" required>
                            </div>
                            <div class="col">
                                <label for="">Tanggal Kembali : </label>
                                <input type="date" name="tglkembali" class="form-control" required>
                            </div>
                        </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary float-right mt-3">Pinjam</button>
                </form>


            </div>
        </div>
    </div>

    <script src="assets/js/jquery-3.3.1.slim.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.css"></script>
</body>

</html>