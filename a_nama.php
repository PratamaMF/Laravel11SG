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
        <title>Beranda</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="css/beranda.css">
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" >Oishi Coffee</a>
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
                            </div>
                            Karyawan end -->
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
                    <form action="" method="post">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Atas Nama</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="atas_nama">
                        <div id="emailHelp" class="form-text">Silahkan isi nama pelanggan dan konfirmasi nama pelanggan</div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Konfirmasi</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="k_atas_nama">
                    </div>
                    
                    <button type="submit" class="btn btn-success" name="proses">Lanjutkan</button>
                    </form>

                    <?php 
                    if(isset($_POST['proses'])){
                    mysqli_query($conn, "INSERT INTO pelanggan SET 
                    nama_pelanggan = '$_POST[atas_nama]'");

                    }
                    if(isset($_POST['proses'])){
                    
                    //variabel
                    $nama_pelanggan = $_POST['k_atas_nama'];
                    
                    $ambil = $conn->query("SELECT * FROM pelanggan
                        WHERE nama_pelanggan='$nama_pelanggan'");

                        $namayangtersedia = $ambil->num_rows;
                        if($namayangtersedia==1){
                            $nama = $ambil->fetch_assoc();
                            $_SESSION["pelanggan"] = $nama;
                            echo "<script>location='checkout.php';</script>";
                        }else{
                            echo "<script>alert('Konfirmasi nama dengan benar');</script>";
                            echo "<script>location='a_nama.php';</script>";
                        }

                    
                    }


                    //simpan di session pelanggan
                    


                    ?>
                 

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
