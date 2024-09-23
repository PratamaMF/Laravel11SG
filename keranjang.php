<?php 
session_start();

require 'function.php';

if(empty($_SESSION['keranjang']) OR !isset($_SESSION['keranjang']) ){
    echo"
        <script>
        alert('keranjang kosong, silahkan pesan terlebih dahulu');
        location='order.php';
        </script>
    ";
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Oishi Coffee | Keranjang</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="css/beranda.css">
        <style>
            @font-face {
                font-family:"font-osaka" ;
                src: url("Karasha (DEMO).ttf");
            }
            .navbar-brand {
                font-family: "font-osaka";
            }
        </style>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3 fs-1">Oishi Coffee</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Menu</div>
                            <a class="nav-link" href="#">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Beranda
                            </a>
                            <a class="nav-link" href="transaksi.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-money-check-dollar"></i></div>
                                Transaksi
                            </a>
                            <a class="nav-link" href="keranjang.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-cart-shopping"></i></div>
                                Keranjang
                            </a>
                            

                            <!-- order start -->
                            <div class="sb-sidenav-menu-heading">Master</div>
                            
                            <a class="nav-link" href="order.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-money-bills"></i></div>
                                Order
                            </a>
                           
                            <!-- order end -->
                            <!-- Karyawan start -->
                            <!-- <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#karyawanlayout" aria-expanded="false" aria-controls="orderlayout">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-user"></i></div>
                                Karyawan
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="karyawanlayout" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="#">Waiters</a>
                                    <a class="nav-link" href="#">Barista</a>
                                    <a class="nav-link" href="#">Chef</a>
                                </nav>
                            </div> -->
                            <!-- Karyawan end -->
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-right-from-bracket"></i></div>
                                Logout
                            </a>
                            
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                            </a>     
                                </nav>
                            </div>
                           

            <!-- BERANDA START-->
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                    <!-- TABLE START -->
                    <h1 class="fs-3">Keranjang</h1>
                        <div class="card mb-4">
                            <div class="card-body">
                                <table class="table table-borderless">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Menu</th>
                                            <th>Jumlah</th>
                                            <th>Harga</th>
                                            <th>Subharga</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $nomor = 1; ?>
                                        <?php foreach($_SESSION['keranjang'] as $id_menu => $jumlah): ?>
                                        <!-- menampilkan menu yang sedang diperulangkan berdasarkan id_menu -->
                                        <?php
                                        $ambil = $conn->query("SELECT * FROM menu WHERE idmenu='$id_menu' ");
                                        $pecah = $ambil->fetch_assoc();
                                        $subharga = $pecah["harga"] * $jumlah;

                                        ?>
                                        
                                        <tr class="text-left">
                                            <td><?= $nomor; ?></td>
                                            <td><?= $pecah['namamenu']; ?></td>
                                            <td><?= $jumlah ?></td>
                                            <td>Rp. <?= number_format($pecah['harga']); ?></td>
                                            <td>Rp. <?= number_format($subharga); ?></td>
                                            <td>
                                                <a href="hapuskeranjang.php?id=<?= $id_menu ?>" class="btn btn-danger btn-xs">Hapus</a>
                                            </td>
                                        </tr>
                                        <?php $nomor++; ?>
                                        <?php endforeach ?>
                                    </tbody>
                                    
                                </table>

                                <a href="order.php" class="btn btn-outline-success">Lanjut Pesan</a>
                                <a href="a_nama.php" class="btn btn-success">Checkout</a>
                                
                            </div>
                        </div>   
                        <!-- TABLE END -->

                    </div>
                </main>
                
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
