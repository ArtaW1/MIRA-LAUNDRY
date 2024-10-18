<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("Location:login.php");
    exit;
}
// echo $_SESSION["user"];

?>
<?php include("../koneksi.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage Karyawan</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <div class="d-flex">
        <!-- SIDEBAR -->
        <aside id="sidebar" class="sidebar-toggle" style="background-color: #1DA4FF;">
            <div class="sidebar-logo">
                <a href="#" style="font-size: 40px;" class="text-center">MIRA LAUNDRY</a>
            </div>
            <!-- SIDEBAR NAVIGATION -->
            <ul class="sidebar-nav p-0">
                <li class="sidebar-item">
                    <a href="../homepageowner.php" class="sidebar-link">
                        <i class="lni lni-home"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                        data-bs-target="#datamaster" aria-expanded="true" aria-controls="datamaster">
                        <i class="fa-solid fa-database"></i>
                        <span>Data Master</span>
                    </a>
                    <ul id="datamaster" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="datapelanggan.php" class="sidebar-link">Data Pelanggan</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="datasupplier" class="sidebar-link">Data Supplier</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="dataproduk.php" class="sidebar-link">Data Produk</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="datapendapatan.php" class="sidebar-link">Data Pendapatan</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="datapengeluaran.php" class="sidebar-link">Data Pengeluaran</a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item">
                    <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                        data-bs-target="#laporan" aria-expanded="true" aria-controls="laporan">
                        <i class="fa-solid fa-book-open"></i>
                        <span>Laporan</span>
                    </a>
                    <ul id="laporan" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="labarugi.php" class="sidebar-link">Laba Rugi</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="neracasaldo.php" class="sidebar-link" style="background-color: #0a7fec90;">Neraca Saldo</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="aruskas.php" class="sidebar-link">Arus Kas</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="perubahanmodal.php" class="sidebar-link">Perubahan Modal</a>
                        </li>
                    </ul>
                </li>
            </ul>

            <!-- SIDEBAR NAVIGATION END -->
            <div class="sidebar-footer">
                <a href="../logout.php" class="sidebar-link">
                    <i class="lni lni-exit"></i>
                    <span>Logout</span>
                </a>
            </div>
        </aside>

        <!-- NAVBAR -->
        <div class="main">
            <nav class="navbar" style="background-color: #1DA4FF;">
                <button class="toggler-btn" type="button">
                    <i class="lni lni-text-align-left" style="color: #FFFFFF;"></i>
                </button>
                <div class="d-flex flex-row bd-highlight">
                    <h3 class="p-2 bd-highlight" style="color: #FFFFFF;;"><?php echo $_SESSION["role"]; ?></h3>
                    <img src="../img/account.png" alt="" srcset="" style="width: 50px; height: 50px;">
                </div>
            </nav>
            <div>

                <!-- MAIN -->
                <h2 class="m-4">Laporan Neraca Saldo</h2>

                <div class="m-4" style="background-color: #FFFFFF;">

                    <div class="row">
                        <div class=" col-2">
                            <div class="p-3">Tanggal Awal</div>
                        </div>
                        <div class="col-2">
                            <div class="p-3">Tanggal Akhir</div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-2 ms-3">
                            <div class="input-group date" id="datepicker">
                                <input type="date" class="form-control">
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="input-group date" id="datepicker">
                                <input type="date" class="form-control">
                            </div>
                        </div>
                        <div class="col-2">
                            <button type="button" class="btn btn-primary">Search</button>
                        </div>
                    </div>

                    <div class="d-flex bd-highlight m-3">
                        <button type="button" class="btn btn-danger">PDF</button>
                        <button type="button" class="btn btn-success ms-3">EXCEL</button>
                    </div>

                </div>

            </div>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="../script.js"></script>
</body>

</html>