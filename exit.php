<?
session_start();//¿ªÆôsession¶Ô»°
session_destroy();
echo "<script>alert('Safety Exit System£¡');window.top.location.href='index.php'</script>";
?>