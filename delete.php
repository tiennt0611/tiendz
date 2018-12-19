<?php

ob_start();
session_start();
if (!isset($_SESSION["id"])) {
    header("Location:login.php");
}
$host = "localhost";
$username = "root";
$password = "";
$db_name = "ftico";

$conn = mysqli_connect($host, $username, $password, $db_name) or die("Không thể kết nối tới CSDL!");

if (isset($_GET["idNews"])) {
    $idNews = $_GET["idNews"];
    settype($trang, "int");
    $sql = "DELETE FROM tbl_news WHERE idNews = '$idNews' " ;
    $result = mysqli_query($conn, $sql);
    header("location:admin.php");
}
mysqli_close($conn);
?>
