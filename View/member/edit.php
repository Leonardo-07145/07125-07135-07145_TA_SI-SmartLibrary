<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edi Profil</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>

<body>
    <div class="container">

        <div class="card mt-5">
            <div class="card-header text-center">
                <h2>Edit Profil</h2>
                <a href="index.php?page=member&aksi=view" class="btn btn-info float-right">Kembali</a>
            </div>
            <div class="card-body">
                <form action="index.php?page=member&aksi=update" method="POST">
                    <input type="hidden" name="id" value="<?= $data['id'] ?>">
                    <div class="form-group">
                        <label for="">Nama Member</label>
                        <input type="text" name="nama" class="form-control" value="<?= $data['nama'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Password Member</label>
                        <input type="password" name="password" class="form-control" value="<?= $data['password'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Tanggal Lahir Member</label>
                        <input type="date" name="tgllahir" class="form-control" value="<?= $data['tgllahir'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Alamat Member</label>
                        <input type="text" name="alamat" class="form-control" value="<?= $data['alamat'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="">No.Telp Member</label>
                        <input type="text" name="notelp" class="form-control" value="<?= $data['notelp'] ?>">
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