<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tampil Data</title>
</head>
<body>
    <h2>Data Identitas</h2>

    <?php if (session()->get('level') == '1'): ?>
        <!-- User biasa, tampilkan data diri sendiri -->
        <p>NPM: <?= $identitas['npm'] ?></p>
        <p>Nama: <?= $identitas['nama'] ?></p>
        <p>Alamat: <?= $identitas['alamat'] ?></p>
        <p>Jenis Kelamin: <?= $identitas['jk'] ?></p>
        <p>Tanggal Lahir: <?= $identitas['tgl_lhr'] ?></p>
        <p>Email: <?= $identitas['email'] ?></p>
    <?php elseif (session()->get('level') == '2'): ?>
        <!-- Admin, tampilkan semua data -->
        <table>
            <tr>
                <th>NPM</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Jenis Kelamin</th>
                <th>Tanggal Lahir</th>
                <th>Email</th>
            </tr>
            <?php foreach ($identitas as $data): ?>
                <tr>
                    <td><?= $data['npm'] ?></td>
                    <td><?= $data['nama'] ?></td>
                    <td><?= $data['alamat'] ?></td>
                    <td><?= $data['jk'] ?></td>
                    <td><?= $data['tgl_lhr'] ?></td>
                    <td><?= $data['email'] ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
</body>
</html>
