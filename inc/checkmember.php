<?
session_start();//¿ªÆôsession¶Ô»°
if(empty($_SESSION["userid"]))
{
echo "<script>alert('Please login£¡');window.top.location.href='login.php'</script>";
}
?> 
