<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa SAV</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #4e73df;
            --danger: #e74a3b;
            --dark: #2c3e50;
            --light: #f8f9fc;
            --white: #ffffff;
            --shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--light);
            color: var(--dark);
            margin: 0;
            padding: 40px 20px;
            display: flex;
            justify-content: center;
        }

        .container {
            width: 100%;
            max-width: 900px;
            background: var(--white);
            padding: 30px;
            border-radius: 15px;
            box-shadow: var(--shadow);
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            border-bottom: 2px solid #f1f1f1;
            padding-bottom: 20px;
        }

        h2 { margin: 0; color: var(--primary); font-weight: 600; }

        .btn {
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 500;
            transition: 0.3s;
            display: inline-block;
        }

        .btn-add {
            background-color: var(--primary);
            color: var(--white);
            box-shadow: 0 4px 10px rgba(78, 115, 223, 0.3);
        }

        .btn-add:hover { background-color: #2e59d9; transform: translateY(-2px); }

        .btn-del {
            background-color: #fff;
            color: var(--danger);
            border: 1px solid var(--danger);
            padding: 5px 15px;
        }

        .btn-del:hover {
            background-color: var(--danger);
            color: white;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th {
            text-align: left;
            padding: 15px;
            background-color: #f8f9fa;
            color: #888;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        td {
            padding: 15px;
            border-bottom: 1px solid #eee;
            font-size: 15px;
        }

        tr:hover { background-color: #fafafa; }
        
        /* Empty State */
        .empty-data { text-align: center; padding: 40px; color: #aaa; }
    </style>
</head>
<body>

    <div class="container">
        <div class="header">
            <div>
                <h2>Dashboard Mahasiswa</h2>
                <p style="margin:5px 0 0; color:#888; font-size:14px;">Proyek Akhir Sistem Aplikasi Virtual</p>
            </div>
            <a href="tambah.php" class="btn btn-add">+ Tambah Data</a>
        </div>

        <table>
            <thead>
                <tr>
                    <th width="5%">No</th>
                    <th>Nama Lengkap</th>
                    <th>NIM</th>
                    <th>Jurusan</th>
                    <th width="15%" style="text-align: center;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = mysqli_query($koneksi, "SELECT * FROM mahasiswa ORDER BY id DESC");
                $no = 1;
                if(mysqli_num_rows($query) > 0){
                    while ($data = mysqli_fetch_array($query)) {
                    ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><strong style="color:var(--dark);"><?php echo htmlspecialchars($data['nama']); ?></strong></td>
                        <td><span style="background:#eef2ff; color:var(--primary); padding:4px 8px; border-radius:5px; font-size:12px;"><?php echo htmlspecialchars($data['nim']); ?></span></td>
                        <td><?php echo htmlspecialchars($data['jurusan']); ?></td>
                        <td style="text-align: center;">
                            <a href="index.php?hapus=<?php echo $data['id']; ?>" class="btn btn-del" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                        </td>
                    </tr>
                    <?php } 
                } else {
                    echo "<tr><td colspan='5' class='empty-data'>Belum ada data mahasiswa</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <?php
    if (isset($_GET['hapus'])) {
        $id = $_GET['hapus'];
        mysqli_query($koneksi, "DELETE FROM mahasiswa WHERE id='$id'");
        echo "<script>window.location='index.php'</script>";
    }
    ?>
</body>
</html>