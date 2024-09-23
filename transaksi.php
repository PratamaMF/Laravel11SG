<?php
session_start();
require 'function.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Oishi Coffee | Data Transaksi</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="css/transaksi.css">
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
            <a class="navbar-brand ps-3 fs-1" >Oishi Coffee</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Menu</div>
                            <a class="nav-link" href="beranda.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Beranda
                            </a>
                            <a class="nav-link" href="transaksi.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-money-check-dollar"></i></div>
                                Transaksi
                            </a>
                            </a>
                            <a class="nav-link" href="keranjang.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-cart-shopping"></i></div>
                                Keranjang
                            </a>

                            <!-- menu start -->
                            <div class="sb-sidenav-menu-heading">Master </div>

                            <!-- order start -->
                            
                            <a class="nav-link" href="order.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-money-check-dollar"></i></div>
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
                            <!-- Karyawab end -->
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-right-from-bracket"></i></div>
                                Logout
                            </a>
                            
                    </div>
                </nav>
            </div>

            <!-- BERANDA START-->
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <!-- TABLE START -->
                        
                        <h1 class="fs-3">Data Transaksi</h1>
                        <div class="card mb-4">
                            <div class="card-header">
                            <div class="row mt-4">
                                <div class="col">
                                    <form method="post" class="form-inline">
                                        <input type="date" name="tgl_mulai">  -  
                                        <input type="date" name="tgl_selesai">
                                        <button type="submit" name="filter_tgl" class="btn btn-secondary">Filter</button>
                                    </form>
                                </div>
                            </div>
                            </div>
                            <div class="card-body">
                                
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Atas Nama</th>
                                            <th>Total Pembayaran</th>
                                            <th>Tanggal Pembayaran</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 

                                        if(isset($_POST['filter_tgl'])){
                                            $mulai = $_POST['tgl_mulai'];
                                            $selesai = $_POST['tgl_selesai'];

                                            if($mulai!=null || $selesai!=null){

                                            $ambil = $conn->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan AND tanggal_pembelian BETWEEN '$mulai' AND DATE_ADD('$selesai',INTERVAL 0 DAY) ");

                                            }else{
                                                $ambil = $conn->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan");

                                            }
                                        }else{
                                            $ambil = $conn->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan");
                                        }




                                        $nomor = 1;

                                        while($pecah = $ambil->fetch_assoc()) {
                                            $idtrans = $pecah['id_pembelian'];

                                    ?>
                                        
                                        <tr class="text-left">
                                            <td><?= $nomor ?></td>
                                            <td><?= $pecah['nama_pelanggan']; ?></td>
                                            <td>Rp. <?= number_format($pecah['total_pembelian']); ?></td>
                                            <td><?= $pecah['tanggal_pembelian']; ?></td>
                                            <td>
                                                <a target="_blank" href="cetak.php?id=<?=$idtrans?>" class="btn  btn-success btn-xs">Cetak</a>
                                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapus<?=$idtrans?>">
                                                    Hapus
                                                </button>
                                            </td>
                                        </tr>
                                            <!-- THE MODAL DELETE -->
                                        <div class="modal fade" id="hapus<?=$idtrans?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content">

                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Hapus Data Pesanan</h4>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                    </div>

                                                    <form method="post">
                                                    <!-- Modal body -->
                                                    <div class="modal-body">
                                                        Apakah anda yakin akan menghapus pesanan ini?
                                                        <input type="hidden" name="idt" value="<?=$idtrans?>">
                                                    </div>

                                                    <!-- Modal footer -->
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-success" name="hapusdatatransaksi">Ya</button>
                                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tidak</button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>



                                        <?php 
                                        $nomor++;
                                        } ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>   
                        <!-- TABLE END -->
                    </div>
                </main>
            </div>

                    </div>
                </footer>
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