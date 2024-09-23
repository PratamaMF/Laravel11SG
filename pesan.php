<?php 

session_start();

//mendapatkan idmenu dari url
$id_menu = $_GET['id'];

//jika sudah ada menu itu dikeranjang, maka menu itu jumlahnya di +1
if(isset($_SESSION['keranjang'][$id_menu])){
    $_SESSION['keranjang'][$id_menu]+=1;
}
//selain itu (bnelum ada dikeranjang), maka menu itu dianggap dibeli 1
else{
    $_SESSION['keranjang'][$id_menu] = 1;
}

//Session MENU




// echo "<pre>";
// print_r($_SESSION);
// echo "</pre>";

//otw ke halaman keranjang
echo'
<script>
    window.location.href="keranjang.php"
</script>

';

?>