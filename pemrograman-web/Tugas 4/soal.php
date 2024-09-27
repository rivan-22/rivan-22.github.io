<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input Data</title>
    <style>
        body {
            font-family: 'Helvetica', sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        input[type="text"], input[type="date"], input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        input[type="radio"] {
            margin-right: 10px;
        }

        form div {
            margin-bottom: 15px;
        }

        h3 {
            color: #333;
        }


    </style>
</head>
<body>
    <h2>Form Input Data</h2>
    <form method="POST">
        NPM: <input type="text" name="npm"><br><br>
        Nama: <input type="text" name="nama"><br><br>
        Alamat: <input type="text" name="alamat"><br><br>
        Tempat Lahir: <input type="text" name="tempat_lahir"><br><br>
        Tanggal Lahir: <input type="date" name="tanggal_lahir"><br><br>
        Jenis Kelamin: 
        <input type="radio" name="jenis_kelamin" value="Laki-laki"> Laki-laki
        <input type="radio" name="jenis_kelamin" value="Perempuan"> Perempuan<br><br>
        Hobi: <input type="text" name="hobi"><br><br>
        <input type="submit" name="submit" value="Submit">
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $npm = $_POST['npm'];
        $nama = strtoupper($_POST['nama']);  // Konversi ke huruf besar
        $alamat = strtoupper($_POST['alamat']);  // Konversi ke huruf besar
        $tempat_lahir = $_POST['tempat_lahir'];
        $tanggal_lahir = $_POST['tanggal_lahir'];
        $jenis_kelamin = $_POST['jenis_kelamin'];
        $hobi = $_POST['hobi'];

        echo "<h3>Data yang Anda Inputkan:</h3>";
        echo "NPM: $npm<br>";
        echo "Nama: $nama<br>";
        echo "Alamat: $alamat<br>";
        echo "Tempat Lahir: $tempat_lahir<br>";
        echo "Tanggal Lahir: $tanggal_lahir<br>";
        echo "Jenis Kelamin: $jenis_kelamin<br>";
        echo "Hobi: $hobi<br>";
    }
    ?>
</body>
</html>
