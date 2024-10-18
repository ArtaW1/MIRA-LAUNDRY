<?php

    session_start();
    session_unset();
    session_destroy();
    
    setcookie('login','',time()-60);
    echo "<script>
    alert('Sampai Jumpa :v')
    document.location.href = 'login.php';
    </script>";
    // header("Location: login.php")

?>