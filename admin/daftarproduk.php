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
                    <a href="daftarproduk.php" class="sidebar-link" style="background-color: #0a7fec90;">
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
                            <a href="pendapatan.php" class="sidebar-link">Pendapatan</a>
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
                <h2 class="m-4">Daftar Produk</h2>
                <div class="m-4" style="background-color: #FFFFFF;">
                    <div class="navbar">
                        <button type="button" class="btn btn-primary" id="tambahproduk">Tambah Produk</button>
                        <form class="d-flex">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        </form>
                    </div>
                    <form action="" class="m-4">
                        <table border="2" class="table table-bordered" style="background-color: #002FCC;">
                            <tr class="text-center" style="color: #FFFFFF;">
                                <th>Nama Produk</th>
                                <th>Harga</th>
                                <th>Aksi</th>
                            </tr>
                        </table>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <!-- FORM POPUP -->
    <div id="formproduk" class="popup">
        <div class="close-btn me-3">&times;</div>
        <div class="form row align-items-center">
            <h4>Tambah Produk Baru</h4>
            <div class="form-element">
                <label for="namaproduk" class="col-3">Nama Produk</label>
                <input type="text" name="" id="namaproduk" placeholder="">
            </div>
            <div class="form-element">
                <label for="harga" class="col-3">Harga</label>
                <input type="text" name="" id="harga" placeholder="">
            </div>
            <div class="form-element d-flex justify-content-end ms-1">
                <button class="btn btn-primary me-2">Tambah</button>
                <!-- <a href="daftarakun.php" class="btn btn-danger">Batal</a> -->
                <button class="btn btn-danger batalproduk">Batal</button>
            </div>
        </div>
    </div>

    <script src="../script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>