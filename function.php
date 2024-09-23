<?php

session_start();

$conn = mysqli_connect('localhost','root','','db_coffeshop');

// login start
if(isset($_POST['masuk'] ) ){
    $username = $_POST ['username'];
    $password = $_POST ['password'];

    $check = mysqli_query($conn, "SELECT * FROM user WHERE username='$username' and password='$password' ");
    $count = mysqli_num_rows($check);

    if($count>0){


        $_SESSION['login']='true';
        header('location:beranda.php');
    }else{                                                  
        echo'
        <script>
            alert("Username/Password salah");
            window.location.href="index.php"
        </script>

        ';

    }
    // login end
}

  // Menu Start
    

  // Menu End


  //Edit Menu

  if(isset($_POST['editmenu'])){
    $namamenu = $_POST['namamenu'];
    $harga = $_POST['harga'];
    $gambar = $_POST['gambar'];
    $idm = $_POST['idm']; //idmenu

    $query = mysqli_query($conn,"UPDATE menu SET namamenu='$namamenu', harga='$harga', gambar='$gambar' WHERE idmenu='$idm'");

        if($query){
            header('location:order.php');
        } else {                                                  
            echo'
            <script>
                alert("Gagal Edit Menu");
                window.location.href="order.php"
            </script>

            '; 
            }
    }
    //Hapus Barang
    if(isset($_POST['hapusmenu'])){
        $idm = $_POST['idm'];

        $query = mysqli_query($conn,"DELETE FROM menu WHERE idmenu='$idm' ");

        if($query){
            header('location:order.php');
        } else {                                                  
            echo'
            <script>
                alert("Gagal");
                window.location.href="order.php"
            </script>
    
            ';
        }
    }

    if(isset($_POST['tambahmenu'])){
        $namamenu = $_POST['nama_menu'];
        $harga = $_POST['harga'];
        $gambar = $_POST['gambar'];

        $tambah = mysqli_query($conn,"insert into menu (namamenu,harga,gambar) values ('$namamenu','$harga','$gambar')");

        if($tambah){
            header('location:order.php');
        } else {                                                  
            echo'
            <script>
                alert("Gagal Menambah Menu Baru");
                window.location.href="order.php"
            </script>
    
            ';
        } 
        
    }

    if(isset($_POST['hapusdatatransaksi'])){
        $idt = $_POST['idt'];//idtransaksi

        $cekdata = mysqli_query($conn,"SELECT * FROM pembelian WHERE id_pembelian='$idt'");

        while($ok = mysqli_fetch_array($cekdata)){
        $idp = $ok['id_pembelian'];

        $querydelete = mysqli_query($conn,"DELETE FROM pembelian WHERE id_pembelian='$idp'");


    } 
        if($querydelete){
            header('locaton:transaksi.php');
            }else{
                echo'
                <script>
                alert("Gagal Hapus Data!");
                window.location.href="transaksi.php"
                
                </script>
                ';
            }
    }


    

   
?>