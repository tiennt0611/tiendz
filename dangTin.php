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
mysqli_set_charset($conn, 'utf8');
?>

<?php

$TieuDe = $TomTat = $HinhAnh = $TheLoai = $NoiDung = $ChiTiet = $NgayDang = $NguoiDang = "";
if (isset($_POST["btnSubmit"])) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $TieuDe = $_POST["txtTieuDe"];
        $TomTat = $_POST["txtTomTat"];
        $HinhAnh = "img/" . $_POST["txtHinhAnh"];
        $TheLoai = $_POST["txtTheLoai"];
        $NoiDung = "txt/" . date("Y.m.d.h.i.sa") . ".txt";
        $ChiTiet = $_POST["txtChiTiet"];
        $NgayDang = date("Y/m/d");
        $NguoiDang = $_SESSION["id"];
        $file = fopen("txt/" . date("Y.m.d.h.i.sa") . ".txt", 'w');
        fwrite($file, $ChiTiet);
        $sqldb = "INSERT INTO tbl_news (TieuDe,TomTat,urlHinhAnh,NoiDung,idAdmin,idLTT,NgayDang) VALUES('$TieuDe','$TomTat','$HinhAnh','$NoiDung','$NguoiDang','$TheLoai','$NgayDang')";
        $resultdb = mysqli_query($conn, $sqldb);
        header("Location:admin.php");
    } else {
        header("Location:admin.php");
    }
}
mysqli_close($conn);
?>     