<?php
include("../koneksi.php");

session_start();
if (!isset($_SESSION["login"])) {
    header("Location:../login.php");
    exit;
}
// echo $_SESSION["user"];

if (isset($_POST['submit_akun'])) { //saat variabel simpan terbentuk => saat button simpan di tekan
    //menangkap data dari form customer
    $kodeakun = $_POST['kode_akun'];
    $namaakun = $_POST['nama_akun'];
    $kelompokakun = $_POST['kelompok_akun'];

    // buat query
    // Check if idakun already exists
    $checkQuery = "SELECT * FROM akun WHERE kode_akun = '$kodeakun'";
    $checkResult = mysqli_query($db, $checkQuery);

    if (mysqli_num_rows($checkResult) > 0) {
        // If idakun exists, do not insert and show an alert
        echo "<script>
            alert('Kode Akun sudah ada! Tidak bisa menambahkan data.');
            document.location.href = 'daftarakun.php';
        </script>";
    } else {
        // If idakun does not exist, insert the new record
        $sql1 = "INSERT INTO akun VALUE('$kodeakun', '$namaakun', '$kelompokakun')";


        $query = mysqli_query($db, $sql1);

        if ($query) {
            echo "<script>
                alert('Data Sudah Ditambahkan');
                document.location.href = 'daftarakun.php';
            </script>";
        } else {
            echo "<script>
                alert('Insert Data Gagal Gan');
                document.location.href = 'daftarakun.php';
            </script>";
        }
    }
}

if (isset($_GET['deleteakun']) && isset($_GET['kode_akun'])) {
    $kodeakun = mysqli_real_escape_string($db, $_GET['kode_akun']); // Sanitize input

    // Create deleteakun query
    $deleteakunQuery = "DELETE FROM akun WHERE kode_akun = '$kodeakun'";

    if (mysqli_query($db, $deleteakunQuery)) {
        echo "<script>
            alert('Data berhasil dihapus');
            document.location.href = 'daftarakun.php';
        </script>";
    } else {
        echo "<script>
            alert('Gagal menghapus data');
            document.location.href = 'daftarakun.php';
        </script>";
    }
}

if (isset($_GET['delete']) && isset($_GET['kode_akun'])) {
    $kodeakun = mysqli_real_escape_string($db, $_GET['kode_akun']); // Sanitize input

    // Create delete query
    $deleteQuery = "DELETE FROM akun WHERE kode_akun = '$kodeakun'";

    if (mysqli_query($db, $deleteQuery)) {
        echo "<script>
            alert('Data berhasil dihapus');
            document.location.href = 'daftarakun.php';
        </script>";
    } else {
        echo "<script>
            alert('Gagal menghapus data');
            document.location.href = 'daftarakun.php';
        </script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap Sidebar</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" rel="stylesheet" />

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
                    <a href="daftarakun.php" class="sidebar-link" style="background-color: #0a7fec90;">
                        <i class=" lni lni-credit-cards"></i>
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
                <h2 class="m-4">Daftar Akun</h2>
                <div class="m-4" style="background-color: #FFFFFF;">
                    <div class="navbar">
                    <?php include('../message.php'); ?>
                        <button type="button" class="btn btn-primary" id="tambahakun">Tambah Akun</button>
                        <form class="d-flex" method="POST" action="">
                            <input class="form-control me-2 searchakun" type="text" name="cari" placeholder="Search" aria-label="Search">
                            <button type="submit" name="searchakun" class="btn btn-outline-success">Search</button>
                        </form>
                    </div>

                    <form action="" class="m-4">
                        <table border="2" class="table table-bordered" style="background-color: #002FCC;">
                            <tr class="text-center" style="color: #FFFFFF;">
                                <th>Kode Akun</th>
                                <th>Nama Akun</th>
                                <th>Kelompok Akun</th>
                                <th>Aksi</th>
                            </tr>
                            <?php
                            // Check if the search button was pressed
                            if (isset($_POST['searchakun'])) {
                                $searchTerm = mysqli_real_escape_string($db, $_POST['cari']); // Sanitize input
                                $query = mysqli_query($db, "SELECT * FROM akun WHERE nama_akun LIKE '%$searchTerm%'
                OR kode_akun LIKE '%$searchTerm%'
                OR kelompok_akun LIKE '%$searchTerm%'
            ");
                            } else {
                                $query = mysqli_query($db, "SELECT * FROM akun");
                            }

                            // Loop through results and display them
                            while ($akun = mysqli_fetch_array($query)) {
                                echo "<tr class='text-center' style='color: #000000; font-weight: bold; background: #c7c7c7;'>";
                                echo "<td>" . $akun['kode_akun'] . "</td>";
                                echo "<td>" . $akun['nama_akun'] . "</td>";
                                echo "<td>" . $akun['kelompok_akun'] . "</td>";
                                echo "<td>";
                                echo "<a href='daftarakun.php?editakun=true&kode_akun=" . $akun['kode_akun'] . "' class='btn btn-success'><i class='fa-regular fa-pen-to-square'></i></i></a>";
                                echo "<a href='daftarakun.php?deleteakun=true&kode_akun=" . $akun['kode_akun'] . "' class='btn btn-danger' onclick=\"return confirm('Apakah Anda yakin ingin menghapus akun ini?');\"><i class='fa-regular fa-trash-can'></i></a>";
                                echo "</td>";
                                echo "</tr>";
                            }
                            ?>
                        </table>
                    </form>
                </div>

            </div>
        </div>
    </div>



    <!-- FORM POPUP -->
    <form action="" method="post">
        <div id="formakun" class="popup">
            <div class="close-btn me-3">&times;</div>
            <div class="form row align-items-center">
                <h4>Tambah Akun Baru</h4>
                <div class="form-element">
                    <label for="kode_akun" class="col-3">Kode Akun</label>
                    <input type="text" name="kode_akun" id="kode_akun" placeholder="">
                </div>
                <div class="form-element">
                    <label for="nama_akun" class="col-3">Nama Akun</label>
                    <input type="text" name="nama_akun" id="nama_akun" placeholder="">
                </div>
                <div class="form-element ">
                    <label for="kelompok_akun" class="col-3 pe-3">Jenis Akun</label>
                    <select name="kelompok_akun" id="kelompok_akun">
                        <option>Hotel</option>
                        <option>Umum</option>
                    </select>
                    <!-- <input type="text" name="jenis_akun" id="jenis_akun" placeholder=""> -->
                </div>
                <div class="form-element d-flex justify-content-end ms-1">
                    <button class="btn btn-primary me-2" name="submit_akun" type="submit">Tambah</button>
                    <button class="btn btn-danger batalakun">Batal</button>
                </div>
            </div>
        </div>
    </form>
    
    <script src="../script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>