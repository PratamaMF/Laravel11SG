<?php
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
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <style type="text/css">
            @font-face {
                font-family: "font-struk" ;
                src: url('merchant-copy.doublesize.ttf');
            }
            *{
                font-family: "font-struk";
            }
        </style>
        
    </head>
    <body class="sb-nav-fixed">
                <main>
                    <div class="container-fluid px-4">
                        <!-- KONTEN START-->
                        <?php
                            $ambil = $conn->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan WHERE pembelian.id_pembelian='$_GET[id]'");

                            $detail = $ambil->fetch_assoc();
                
                        ?>
                        <br><br>
                        <h4 class="text-center">.: -  OISHI =============== COFFEE  - :.</h4>
                        <h4 class="text-center">========================</h4>
                        <br><br><br>
                        <p>
                            A/Nama : <?= $detail['nama_pelanggan']; ?> <br>
                            Tanggal Pembelian : <?= $detail['tanggal_pembelian'] ?><br>
                            Total Pembayaran : <strong>Rp. <?= number_format($detail['total_pembelian']) ?></strong>
                        </p>
                        <br>
                        <h5>Detail Pembelian:</h5>

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Menu</th>
                                    <th>Harga</th>
                                    <th>Jumlah</th>
                                    <th>Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $nomor = 1;
                                    $ambilmenu = $conn->query("SELECT * FROM pembelian_menu JOIN menu ON pembelian_menu.id_menu=menu.idmenu WHERE pembelian_menu.id_pembelian='$_GET[id]'");
                                    

                                    while($pecah = $ambilmenu->fetch_assoc()){
                                ?>
                                <tr>
                                    <td><?= $nomor ?></td>
                                    <td><?= $pecah['namamenu']; ?></td>
                                    <td>Rp. <?= $pecah['harga']; ?></td>
                                    <td><?= $pecah['jumlah']; ?></td>
                                    <td>Rp. <?= $pecah['harga']*$pecah['jumlah']; ?></td>
                                </tr>
                                

                                <?php
                                    $nomor++;
                                    }
                                ?>
                            </tbody>
                           
                        </table>
                        <br><br><br>
                        <p class="text-center">.:. - Terima Kasih - .:.</p>
                        
                    <script type="text/javascript">
                        window.print();
                    </script>

                        <!-- KONTEN END -->
                    </div>
                </main>
                <!-- <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                        </div>
                    </div>
                </footer> -->
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@ 5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
