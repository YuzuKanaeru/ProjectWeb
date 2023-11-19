<?php 

session_start();
 
if (!isset($_SESSION['nama_lengkap'])) {
    header("Location: login.php");
    exit(); // Terminate script execution after the redirect
}

?>



<?php
ob_start();
 // Mulai output buffering
?>

<style>
        .gradient-text {
            font-size: 32px;
            text-align: center;
            background-image: linear-gradient(to left, #ff0000, #00ff00, #0000ff);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            animation: gradientTransition 5s linear infinite;
        }
        @keyframes gradientTransition {
            0% {
                background-position: 100%;
            }
            100% {
                background-position: 0%;
            }
        }
    </style>


<h1 class="text-center mb-5 text-white">DASHBOARD</h1>

<marquee><h1 class="gradient-text text-center mb-5 mt-5 ">ALOOOOOOOOOOO :)</h1></marquee>


<?php
$konten= ob_get_clean();

include '../ADMIN/body.php';

?>