<?php
include 'connection.php';

session_start();

if (!isset($_SESSION['user_id'])) {
    echo "Akses ditolak. Anda harus login terlebih dahulu.";
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $motor_id = $_POST['motor_id'];
    $merk = $_POST['merk'];
    $tipe = $_POST['tipe'];
    $tahun_produksi = $_POST['tahun_produksi'];
    $warna = $_POST['warna'];
    $harga_sewa_per_hari = $_POST['harga_sewa_per_hari'];
    $status = $_POST['status'];

    $sql = "INSERT INTO motor (motor_id ,merk, tipe, tahun_produksi, warna, harga_sewa_per_hari, status)
            VALUES ('$motor_id','$merk', '$tipe', $tahun_produksi, '$warna', $harga_sewa_per_hari, '$status')";

    if ($conn->query($sql) === TRUE) {
        echo "Data motor berhasil ditambahkan.";
        header('Location: read.php');
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Motor</title>
</head>
<body>

<h2>Tambah Data Motor</h2>
<form method="POST" action="create.php">
    <label>Motor_ID:</label>
    <input type="number" name="motor_id" required><br>

    <label>Merk:</label>
    <input type="text" name="merk" required><br>

    <label>Tipe:</label>
    <input type="text" name="tipe" required><br>

    <label>Tahun Produksi:</label>
    <input type="number" name="tahun_produksi" required><br>

    <label>Warna:</label>
    <input type="text" name="warna" required><br>

    <label>Harga Sewa per Hari:</label>
    <input type="number" name="harga_sewa_per_hari" required><br>

    <label>Status:</label>
    <select name="status" required>
        <option value="Tersedia">Tersedia</option>
        <option value="Disewa">Disewa</option>
    </select><br>

    <button type="submit">Tambah Motor</button>
</form>

</body>
</html>

<?php
$conn->close();
?>
