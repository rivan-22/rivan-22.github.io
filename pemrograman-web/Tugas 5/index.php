<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mhs";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if (isset($_POST['insert'])) {
    $npm = $_POST['npm'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $tgl_lhr = $_POST['tgl_lhr'];
    $jk = $_POST['jk'];
    $email = $_POST['email'];

    $sql = "INSERT INTO identitas (npm, nama, alamat, tgl_lhr, jk, email) VALUES ('$npm', '$nama', '$alamat', '$tgl_lhr', '$jk', '$email')";

    if ($conn->query($sql) === TRUE) {
        echo "Data berhasil ditambahkan!";
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
    <title>Tambah Data Mahasiswa</title>
</head>
<body>
    <h2>Form Tambah Data Mahasiswa</h2>
    <form action="" method="POST">
        <input type="text" name="npm" placeholder="NPM" required>
        <input type="text" name="nama" placeholder="Nama" required>
        <input type="text" name="alamat" placeholder="Alamat" required>
        <input type="date" name="tgl_lhr" placeholder="Tanggal Lahir" required>

        <label for="jk">Jenis Kelamin:</label>
        <label><input type="radio" name="jk" value="L" required> Laki-laki</label>
        <label><input type="radio" name="jk" value="P" required> Perempuan</label><br><br>

        <input type="email" name="email" placeholder="Email" required>
        <button type="submit" name="insert">Tambah Data</button>
    </form>

    <h2>Data Mahasiswa</h2>
    <table border="1">
        <tr>
            <th>NPM</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Tanggal Lahir</th>
            <th>Jenis Kelamin</th>
            <th>Email</th>
            <th>Aksi</th>
        </tr>
        <?php
        $sql = "SELECT * FROM identitas";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row['npm'] . "</td>
                        <td>" . $row['nama'] . "</td>
                        <td>" . $row['alamat'] . "</td>
                        <td>" . $row['tgl_lhr'] . "</td>
                        <td>" . $row['jk'] . "</td>
                        <td>" . $row['email'] . "</td>
                        <td>
                            <a href='edit.php?npm=" . $row['npm'] . "'>Edit</a> | 
                            <a href='?delete=" . $row['npm'] . "' onclick='return confirm(\"Yakin ingin menghapus data ini?\")'>Delete</a>
                        </td>
                    </tr>";
            }
        } else {
            echo "<tr><td colspan='7'>Tidak ada data</td></tr>";
        }

        if (isset($_GET['delete'])) {
            $npm = $_GET['delete'];
        
            $sql = "DELETE FROM identitas WHERE npm='$npm'";
        
            if ($conn->query($sql) === TRUE) {
                echo "Data berhasil dihapus!";
                header("Location: index.php");
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
        ?>
    </table>
</body>
</html>