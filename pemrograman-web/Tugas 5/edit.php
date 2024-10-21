<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mhs";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$npm = $nama = $alamat = $tgl_lhr = $jk = $email = "";

if (isset($_GET['npm'])) {
    $npm = $_GET['npm'];

    $sql = "SELECT * FROM identitas WHERE npm='$npm'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $npm = $row['npm'];
        $nama = $row['nama'];
        $alamat = $row['alamat'];
        $tgl_lhr = $row['tgl_lhr'];
        $jk = $row['jk'];
        $email = $row['email'];
    }
}

if (isset($_POST['update'])) {
    $npm = $_POST['npm'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $tgl_lhr = $_POST['tgl_lhr'];
    $jk = $_POST['jk'];
    $email = $_POST['email'];

    $sql = "UPDATE identitas SET nama='$nama', alamat='$alamat', tgl_lhr='$tgl_lhr', jk='$jk', email='$email' WHERE npm='$npm'";

    if ($conn->query($sql) === TRUE) {
        echo "Data berhasil diupdate!";
        header("Location: index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Edit Data Mahasiswa</title>
</head>
<body>
    <h2>Form Edit Data Mahasiswa</h2>
    <form action="" method="POST">
        <input type="hidden" name="npm" value="<?php echo $npm; ?>">
        <input type="text" name="nama" placeholder="Nama" value="<?php echo $nama; ?>" required>
        <input type="text" name="alamat" placeholder="Alamat" value="<?php echo $alamat; ?>" required>
        <input type="date" name="tgl_lhr" placeholder="Tanggal Lahir" value="<?php echo $tgl_lhr; ?>" required>

        <label for="jk">Jenis Kelamin:</label><br>
        <label><input type="radio" name="jk" value="L" <?php if($jk == 'L') echo 'checked'; ?>> Laki-laki</label>
        <label><input type="radio" name="jk" value="P" <?php if($jk == 'P') echo 'checked'; ?>> Perempuan</label><br><br>

        <input type="email" name="email" placeholder="Email" value="<?php echo $email; ?>" required>
        <button type="submit" name="update">Update Data</button>
    </form>
</body>
</html>