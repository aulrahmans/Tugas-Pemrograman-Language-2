<h1>Ubah Data Mahasiswa</h1>

<?php
// Koneksi ke Database
include 'koneksi.php';
$db = new Database();
$con=$db->Connect();
$npm= $_GET['npm'];

// Mengambil data dari Database
$query=mysqli_query($con,"SELECT * FROM tbl_mhs WHERE npm='$npm'")or die(mysql_error());
while($data=mysqli_fetch_array($query)){

// Perintah update ke Database
if(isset($_POST['proses']))
{
$nama= $_POST['nama'];
$kelas= $_POST['kelas'];
$jurusan= $_POST['jurusan'];
$query=mysqli_query($con,"UPDATE tbl_mhs SET npm='$npm', nama='$nama', kelas='$kelas', jurusan='$jurusan' WHERE npm='$npm'");
header('location:latihan1.php');
}

?>

<form action="" method="POST">
NPM <br>
<input type="text" name="npm" value="<?php echo $data['npm'] ?>" disabled><br>
Nama <br>
<input type="text" name="nama" value="<?php echo $data['nama'] ?>"><br>
<br>
Kelas <br>
<input type="text" name="kelas" value="<?php echo $data['kelas'] ?>" ><br>
Jurusan <br>
<input type="text" name="jurusan" value="<?php echo $data['jurusan'] ?>"><br>
<br>
<input type="submit" name="proses" value="Simpan">
<input type='button' onclick=location.href='latihan1.php' value='Batal' />
</form>

<?php } ?>