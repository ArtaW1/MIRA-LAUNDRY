<?php
session_start();
// if(isset($_SESSION["login"])){
//     header("Location:awal.php");
//     exit;
// }

// if(isset($_SESSION["login"])){
//     header("Location:awal.php");
//     exit;
// }

if (isset($_COOKIE["login"])) {
    $_COOKIE['login'] == 'true';
    $_SESSION['login'] = 'true';
}

include("koneksi.php");

if (isset($_POST["login"])) {
    // menangkap data yang dikirim dari form login
    $username = $_POST['username'];
    $password = $_POST['password'];

    // menyeleksi data pada tabel admin dengan username dan password yang sesuai
    $sql = "SELECT * FROM login1 WHERE username='$username' and password='$password'";

    $query = mysqli_query($db, $sql);

    // menghitung jumlah data yang ditemukan
    $cek = mysqli_num_rows($query);


    if ($cek > 0) {
        $_SESSION["login"] = true;
        $_SESSION["user"] = $username;

        $cekrole = mysqli_fetch_assoc($query);

        if ($cekrole['role'] == "admin") {
            $_SESSION['username'] = $username;
            $_SESSION['role'] = "admin";

            setcookie('login', 'true', time() + 60);
            echo "<script>
            alert('Selamat Datang Adminku :v')
            document.location.href = 'homepageadmin.php';
            </script>";
        } elseif ($cekrole['role'] == "owner") {
            $_SESSION['username'] = $username;
            $_SESSION['role'] = "owner";

            setcookie('login', 'true', time() + 60);
            echo "<script>
            alert('Selamat Datang Owner :v')
            document.location.href = 'homepageowner.php';
            </script>";
        }
    } else {
        echo '<script>alert("Maaf Username dan Password Anda Salah")</script>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FORM LOGIN</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>

<body class="cover" style="background-image:url(img/LOGIN.png); background-size: cover; height: 100vh;">
    <form action="" method="POST">
        <section class="vh-100 gradient-custom">
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100 pt-5">
                    <div class="col-12 col-md-8 col-lg-6 col-xl-5 ">
                        <div class="card text-white kotak" style="border-radius: 1rem; background-color: #1DA4FF;">
                            <div class="card-body p-5">

                                <div>
                                    <div class="text-center">
                                        <h1 class="fw-bold mb-5 text-uppercase">MIRA LAUNDRY</h1>
                                    </div>

                                    <div class="form-outline form-white mb-5">
                                        <label class="form-label" for="typeEmailX">Username</label>
                                        <input type="text" id="typeEmailX" class="form-control form-control-lg" name="username" placeholder="Username" />
                                    </div>

                                    <div class="form-outline form-white mb-5">
                                        <label class="form-label" for="typePasswordX">Password</label>
                                        <input type="password" id="typePasswordX" class="form-control form-control-lg" name="password" placeholder="Password" />
                                    </div>

                                    <!-- <div class="form-check d-flex justify-content-start mb-5">
                                        <input class="form-check-input" type="checkbox" value="" id="form1Example3" name="remember" />
                                        <label class="form-check-label" for="form1Example3"> Remember password </label>
                                    </div> -->

                                    <button class="btn btn-primary btn-lg mt-5" style="width: 100%;" type="submit" name="login">Login</button>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </form>
</body>

</html>