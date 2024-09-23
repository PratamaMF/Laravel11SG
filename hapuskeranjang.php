<?php
session_start();
$id_menu = $_GET["id"];
unset($_SESSION["keranjang"][$id_menu]);

echo"
    <script>
    alert ('Menu di hapus dari keranjang');
    location='keranjang.php';
    </script>
";

?>