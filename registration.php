<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Petugas</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <link href="style.css" rel="stylesheet">

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow">
        <div class="container-fluid">

            <!-- navbar brand -->
            <a href="#" class="navbar-brand" JongKoding>
                <img src="image/logo-jongkreatif.png">
            </a>

            <!-- navbar toggle -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- navbar collapse -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#">Daftar Petugas</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div id="form" class="pt-5">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col col-8 p-4 bg-light">
                    <form action="action_register.php" method="POST">
                        <div class="form-group mb-2">
                            <label for="email">Alamat Email</label>
                            <input name="email" id="email" class="form-control" type="email" placeholder="Alamat Email" required>
                        </div>

                        <div class="form-group mb-2">
                            <label for="name">Nama Lengkap</label>
                            <input name="name" id="name" class="form-control" type="text" placeholder="Nama Lengkap" required>
                        </div>

                        <div class="form-group mb-2">
                            <label for="password">Password</label>
                            <input name="password" class="form-control" id="password" type="password" placeholder="Password" required>
                        </div>

                        <div class="form-group mb-2">
                            <label for="re-password">Konfirmasi Password</label>
                            <input name="re-password" class="form-control" id="re-password" type="password" placeholder="Ulangi Password" required>
                        </div>

                        <input name="submit" type="submit" value="kirim" class="btn btn-primary mt-4">
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>