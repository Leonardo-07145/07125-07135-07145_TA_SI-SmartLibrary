<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Member</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>

<body>
    <center>
        <div class="container">
            <div class="card mt-5" style="width : 50%;">
                <div class=" card-header">
                    <h2>Profil</h2>
                    <a href="index.php?page=member&aksi=edit" class="btn btn-warning float-right">Edit Profil</a>
                </div>
                <div class="card-body">
                    <div class="row ml-4">
                        <div class="form-inline">
                            <label class="form-control mr-sm-2 col-form-label"><span class="badge badge-primary">Nama Member</span> : <?=$data['nama']?> </label>
                        </div>
                    </div>

                    <div class="row ml-4 mt-2">
                        <div class="form-inline">
                            <label class="form-control mr-sm-2 col-form-label"><span class="badge badge-primary">Tanggal Lahir</span> : <?=$data['tgllahir']?> </label>
                        </div>
                    </div>
                    <div class="row ml-4 mt-2">
                        <div class="form-inline">
                            <label class="form-control mr-sm-2 col-form-label"><span class="badge badge-primary">Alamat</span> : <?=$data['alamat']?> </label>
                        </div>
                    </div>
                    <div class="row ml-4 mt-2">
                        <div class="form-inline">
                            <label class="form-control mr-sm-2 col-form-label"><span class="badge badge-primary">No.Telp</span> : <?=$data['notelp']?> </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </center>

    <script src="assets/js/jquery-3.3.1.slim.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.css"></script>
</body>

</html>