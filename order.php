<?php
session_start();
require 'function.php'

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Oishi Coffee | Order</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="css/order.css">
        <style>
            @font-face {
                font-family:"font-osaka" ;
                src: url("Karasha (DEMO).ttf");
            }
            .navbar-brand {
                font-family: "font-osaka";
            }
        </style>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3 fs-1">Oishi Coffee</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
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

                            <!-- order start -->
                            <div class="sb-sidenav-menu-heading">Master </div>
                            
                            <a class="nav-link" href="#">
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
                            <!-- Karyawan end -->
                            <a class="nav-link" href="logout.php">
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
                    <div class="container-fluid px-4" >
                    <h1 class="fs-3 mt-3">Order</h1>
                    <!-- Button to Open the Modal -->
                    <button type="button" class="btn btn-info mt-4"   data-bs-toggle="modal" data-bs-target="#myModal">
                        Tambah Menu
                    </button>
                    </div>
                    
                    <!-- MENU START -->
                    
                    
                    
                    <section class="py-5 ">
                    <div class="container px-4 px-lg-5 mt-3" >
                        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-start">
                            <?php
                                    $get = mysqli_query($conn, "SELECT * FROM menu");

                                    while($m=mysqli_fetch_array($get)){
                                        $namamenu = $m['namamenu'];
                                        $harga = $m['harga'];
                                        $gambar = $m['gambar'];
                                        $idmenu = $m['idmenu'];
                                    ?>

                            <div class="col mb-5">
                                <div class="card h-100">
                                    <!-- Product image-->
                                    <img class="card-img-top" src="assets/img/<?= $gambar ?>" />
                                    <!-- Product details-->
                                    <div class="card-body p-4">
                                        <div class="text-center">
                                            <!-- Product name-->
                                            <h5 class="fw-bolder fs-6"><?=$namamenu?></h5>
                                            <!-- Product price-->
                                            <span class=" fs-6">Rp. <?= number_format($harga) ?></span>
                                        </div>
                                    </div>
                                    <!-- Product actions -->
                                    
                                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                        <div class="text-center fs-6"><a class="btn btn-success mt-auto" href="pesan.php?id=<?= $m['idmenu']; ?>">Pesan</a></div>

                                    <div class="card-footer p-2 pt-0 border-top-0 bg-transparent m-auto">
                                        <div class="text-center fs-6"><a class="btn btn-warning mt-auto" data-bs-toggle="modal" data-bs-target="#edit<?= $idmenu ?>">Edit</a>
                                        <a class="btn btn-danger m-2" data-bs-toggle="modal" data-bs-target="#delete<?= $idmenu ?>">Hapus</a>

                                        
                                        <!-- The Modal Edit -->
                                        <div class="modal fade" id="edit<?= $idmenu ?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    
                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Edit Menu</h4>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                    </div>
                                                    <form  method="post">
                                                        <!-- Modal body -->
                                                        <div class="modal-body">
                                                            <input type="text" name="namamenu" class="form-control" placeholder="namamenu" value="<?=$namamenu?>">
                                                            <input type="text" name="harga" class="form-control mt-2" placeholder="harga Rp. " value="<?= ($harga) ?>">
                                                            <input type="text" name="gambar" class="form-control mt-2" placeholder="gambar" value="<?= $gambar ?>">
                                                            <input type="hidden" name="idm" value="<?= $idmenu ?>">
                                                            
                                                            
                                        </div>

                                        <!-- Modal footer -->
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-success" name="editmenu">Submit</button>
                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </form>
                                    
                                </div>
                            </div>
                        </div>
                        
                        <!-- The Modal Delete -->
                        <div class="modal fade" id="delete<?= $idmenu ?>">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    
                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title">Hapus</h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <form  method="post">
                                        <!-- Modal body -->
                                        <div class="modal-body">
                                            Apakah anda yakin ingin menghapus menu ini?
                                            <input type="hidden" name="idm" value="<?= $idmenu ?>">
                                        </div>
                                        
                                        <!-- Modal footer -->
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-danger" name="hapusmenu">Submit</button>
                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </form>
                                    
                                    
                                </div>
                            </div>
                        </div>
                                        
                                    </div>
                                

                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <?php
                    };
                    ?>
                    </section>
                    
                    <!-- MENU END -->
                    <!-- KERANJANG START -->
                    <!-- KERANJANG END -->

                </main>
                <!-- <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                        </div>
                    </div>
                </footer> -->
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
    <!-- The Modal -->
    <div class="modal fade" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
            <h4 class="modal-title">Tambah Menu Baru</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <form  method="post">
        <!-- Modal body -->
        <div class="modal-body">
            <input type="text" name="nama_menu" class="form-control" placeholder="Nama">
            <input type="text" name="harga" class="form-control mt-2" placeholder="Harga Rp. ">
            <input type="text" name="gambar" class="form-control mt-2" placeholder="Gambar">
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
            <button type="submit" class="btn btn-success" name="tambahmenu">Submit</button>
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        </div>
        </form>
        </div>
    </div>
    </div>
</html>