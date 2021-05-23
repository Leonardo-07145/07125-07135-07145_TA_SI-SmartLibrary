<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profil Member</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>

<body>
    <div class="container">

        <div class="card mt-5">
            <div class="card-header text-center">
                <h2>Edit Profil Member</h2>
                <a href="index.php?page=member&aksi=view" class="btn btn-info float-right">Kembali</a>
            </div>
            <div class="card-body">
                <form action="index.php?page=member&aksi=update" method="POST">
                    <!-- Diganti saat modul 3 -->
                    <input type="hidden" name="id" value="#">
                    <div class="form-group">
                        <label for="">Nama</label>
                        <input type="text" name="nama" class="form-control" value="John Doe">
                    </div>
                    <div class="form-group">
                        <label for="">Tanggal Lahir</label>
                        <input type="date" name="npm" class="form-control" value="06.2099.12.92929">
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" name="password" class="form-control" value="password">
                    </div>
                    <div class="form-group">
                        <label for="">No.Telp</label>
                        <input type="text" name="no_hp" class="form-control" value="087632">
                    </div>
                    <div class="form-group">
                        <label for="">Alamat</label>
                        <input type="text" name="no_hp" class="form-control" value="087632">
                    </div>
                    <button type="submit" class="btn btn-success btn-lg btn-block">Simpan</button>
                </form>
            </div>
        </div>
    </div>

    <script src="assets/js/jquery-3.3.1.slim.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.css"></script>
</body>

</html>