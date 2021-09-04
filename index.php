<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/css/all.min.css">

    <!-- Animate CSS -->
    <link rel="stylesheet" href="assets/css/animate.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/style3.css?version=<?= filemtime('assets/css/style3.css') ?>">

    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <title>Kelompok 1 | Beranda</title>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-md navbar-dark fixed-top header-nav">
        <div class="container">
            <a href="<?= dirname($_SERVER['PHP_SELF']) ?>" class="navbar-brand">Selamat Datang</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menu" aria-controls="menu" aria-expanded="false" aria-label="Menu Navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div id="menu" class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a href="#" role="button" class="nav-link">About</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" role="button" class="nav-link">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main -->
    <div class="jumbotron bg-dark">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery -->
    <script src="assets/js/jquery-3.6.0.js"></script>

    <!-- Bootstrap JS -->
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Sweet2alert JS -->
    <script src="assets/js/sweetalert2.all.min.js"></script>

    <script>
        $(document).ready(function() {
            $('li.nav-item > a').hover(function() {
                $(this).addClass('nav-ac');
            }, function() {
                $(this).removeClass('nav-ac');
            });

            $('li.nav-item > a').click(function() {
                $(this).addClass('nav-ac');
            });
        });
    </script>
</body>

</html>