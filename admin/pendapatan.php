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
    <title>Bootstrap Sidebar</title>
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
                    <a href="../homepageadmin.php" class="sidebar-link">
                        <i class="lni lni-home"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="daftarakun.php" class="sidebar-link">
                        <i class="lni lni-credit-cards"></i>
                        <span>Daftar Akun</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="daftarpelanggan.php" class="sidebar-link">
                        <i class="lni lni-user"></i>
                        <span>Daftar Pelanggan </span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="daftarsupplier.php" class="sidebar-link">
                        <i class="lni lni-support"></i>
                        <span>Daftar Supplier </span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="daftarproduk.php" class="sidebar-link">
                        <i class="lni lni-dropbox"></i>
                        <span>Daftar Produk </span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                        data-bs-target="#auth" aria-expanded="true" aria-controls="auth">
                        <i class="lni lni-protection"></i>
                        <span>Transaksi</span>
                    </a>
                    <ul id="auth" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="pendapatan.php" class="sidebar-link" style="background-color: #0a7fec90;">Pendapatan</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="pengeluaran.php" class="sidebar-link">Pengeluaran</a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a href="jurnalumum.php" class="sidebar-link">
                        <i class="lni lni-book"></i>
                        <span>Jurnal Umum</span>
                    </a>
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
                <h2 class="m-4">Pendapatan</h2>
                <div class="d-flex bd-highlight m-4">
                    <button type="button" class="btn btn-primary me-auto">Tambah Pendapatan</button>
                    <button type="button" class="btn btn-danger">PDF</button>
                    <button type="button" class="btn btn-success ms-2">EXCEL</button>
                </div>


                <div class="m-4" style="background-color: #FFFFFF;">
                    <form class="d-inline-flex p-2 m-2 bd-highlight">
                        <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                    </form>

                    <form action="" class="m-3">
                        <table border="2" class="table table-bordered" style="background-color: #002FCC;">
                            <tr class="text-center" style="color: #FFFFFF;">
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Pelanggan</th>
                                <th>Produk</th>
                                <th>Qty</th>
                                <th>Total Harga</th>
                                <th>Aksi</th>
                            </tr>
                        </table>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="../script.js"></script>
</body>

</html>