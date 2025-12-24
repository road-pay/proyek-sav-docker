<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data - SAV</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #4e73df;
            --light: #f8f9fc;
            --white: #ffffff;
            --shadow: 0 4px 15px rgba(0,0,0,0.05);
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--light);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }

        .card {
            background: var(--white);
            padding: 40px;
            border-radius: 15px;
            box-shadow: var(--shadow);
            width: 100%;
            max-width: 450px;
        }

        h3 { 
            margin-top: 0; 
            color: #333; 
            text-align: center;
            margin-bottom: 30px;
        }

        .form-group { margin-bottom: 20px; }

        label {
            display: block;
            margin-bottom: 8px;
            color: #666;
            font-size: 14px;
            font-weight: 500;
        }

        input {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-family: inherit;
            box-sizing: border-box; /* Agar padding tidak merusak lebar */
            transition: 0.3s;
            outline: none;
        }

        input:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(78, 115, 223, 0.1);
        }

        .btn-group {
            display: flex;
            gap: 10px;
            margin-top: 30px;
        }

        button {
            flex: 2;
            padding: 12px;
            background-color: var(--primary);
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 600;
            transition: 0.3s;
        }

        button:hover { background-color: #2e59d9; }

        .btn-back {
            flex: 1;
            text-align: center;
            padding: 12px;
            text-decoration: none;
            color: #666;
            background: #f1f1f1;
            border-radius: 8px;
            font-size: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .btn-back:hover { background: #e2e2e2; }
    </style>
</head>
<body>

    <div class="card">
        <h3>Input Mahasiswa Baru</h3>
        <form method="POST" action="">
            <div class="form-group">
                <label>Nama Lengkap</label>
                <input type="text" name="nama" placeholder="Contoh: Budi Santoso" required>
            </div>
            
            <div class="form-group">
                <label>Nomor Induk (NIM)</label>
                <input type="number" name="nim" placeholder="Contoh: 2023001" required>
            </div>
            
            <div class="form-group">
                <label>Program Studi</label>
                <input type="text" name="jurusan" placeholder="Contoh: Teknik Informatika" required>
            </div>
            
            <div class="btn-group">
                <a href="index.php" class="btn-back">Batal</a>
                <button type="submit" name="simpan">Simpan Data</button>
            </div>
        </form>

        <?php
        if (isset($_POST['simpan'])) {
            $nama = $_POST['nama'];
            $nim = $_POST['nim'];
            $jurusan = $_POST['jurusan'];

            $insert = mysqli_query($koneksi, "INSERT INTO mahasiswa (nama, nim, jurusan) VALUES ('$nama', '$nim', '$jurusan')");

            if ($insert) {
                echo "<script>window.location='index.php';</script>";
            } else {
                echo "<p style='color:red; text-align:center; margin-top:10px;'>Gagal menyimpan: " . mysqli_error($koneksi) . "</p>";
            }
        }
        ?>
    </div>

</body>
</html>