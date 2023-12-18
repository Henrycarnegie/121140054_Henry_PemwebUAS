<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Motor</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 400px;
            margin: auto;
        }

        h2 {
            color: #333;
            text-align: center;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 8px;
            color: #555;
        }

        input,
        select {
            padding: 8px;
            margin-bottom: 16px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<?php
// update.php
include 'connection.php';

// Mulai atau perbarui session
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifikasi apakah pengguna telah login
    if (!isset($_SESSION['user_id'])) {
        echo "Akses ditolak. Anda harus login terlebih dahulu.";
        exit();
    }

    $motor_id = $_POST['motor_id'];
    $merk = $_POST['merk'];
    $tipe = $_POST['tipe'];
    $tahun_produksi = $_POST['tahun_produksi'];
    $warna = $_POST['warna'];
    $harga_sewa_per_hari = $_POST['harga_sewa_per_hari'];
    $status = $_POST['status'];

    $sql = "UPDATE motor
            SET merk = '$merk',
                tipe = '$tipe',
                tahun_produksi = $tahun_produksi,
                warna = '$warna',
                harga_sewa_per_hari = $harga_sewa_per_hari,
                status = '$status'
            WHERE motor_id = $motor_id";

    if ($conn->query($sql) === TRUE) {
        echo "Data motor berhasil diperbarui.";
        header('Location: read.php');
    } else {
        echo "Error: " . $conn->error;
    }
}

if (isset($_GET['motor_id'])) {
    $motor_id = $_GET['motor_id'];

    $sql = "SELECT * FROM motor WHERE motor_id = $motor_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $motor_id = $row['motor_id'];
        $merk = $row['merk'];
        $tipe = $row['tipe'];
        $tahun_produksi = $row['tahun_produksi'];
        $warna = $row['warna'];
        $harga_sewa_per_hari = $row['harga_sewa_per_hari'];
        $status = $row['status'];
    } else {
        echo "Data motor tidak ditemukan.";
        header('Location: read.php');
        exit();
    }
} else {
    echo "Permintaan tidak valid.";
    header('Location: read.php');
    exit();
}
?>

<div class="container">
    <h2>Edit Data Motor</h2>
    <form method="POST" action="update.php">
        <input type="hidden" name="motor_id" value="<?php echo $motor_id; ?>">

        <label>Merk:</label>
        <input type="text" name="merk" value="<?php echo $merk; ?>" required>

        <label>Tipe:</label>
        <input type="text" name="tipe" value="<?php echo $tipe; ?>" required>

        <label>Tahun Produksi:</label>
        <input type="number" name="tahun_produksi" value="<?php echo $tahun_produksi; ?>" required>

        <label>Warna:</label>
        <input type="text" name="warna" value="<?php echo $warna; ?>" required>

        <label>Harga Sewa per Hari:</label>
        <input type="number" name="harga_sewa_per_hari" value="<?php echo $harga_sewa_per_hari; ?>" required>

        <label>Status:</label>
        <select name="status" required>
            <option value="Tersedia" <?php echo ($status == 'Tersedia') ? 'selected' : ''; ?>>Tersedia</option>
            <option value="Disewa" <?php echo ($status == 'Disewa') ? 'selected' : ''; ?>>Disewa</option>
        </select>

        <button type="submit">Simpan Perubahan</button>
    </form>
</div>

</body>
</html>

