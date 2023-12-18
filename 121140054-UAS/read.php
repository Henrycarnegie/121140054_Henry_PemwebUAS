<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Motor</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        table {
            width: 80%;
            border-collapse: collapse;
            margin: 20px 0;
            background-color: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        a {
            text-decoration: none;
            padding: 8px 16px;
            margin: 5px;
            display: inline-block;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
            transition: background-color 0.3s;
        }

        a:hover {
            background-color: #45a049;
        }

        .create-btn {
            margin: 20px;
        }

        .btn-edit {
            background-color: #008CBA;
            color: white;
        }

        .btn-delete {
            background-color: #f44336;
            color: white;
        }
    </style>
</head>
<body>

<?php
// read.php
include 'connection.php';

// Mulai atau perbarui session
session_start();

$sql = "SELECT * FROM motor";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table>
            <tr>
                <th>Motor ID</th>
                <th>Merk</th>
                <th>Tipe</th>
                <th>Tahun Produksi</th>
                <th>Warna</th>
                <th>Harga Sewa per Hari</th>
                <th>Status</th>
                <th>Action</th>
            </tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['motor_id']}</td>
                <td>{$row['merk']}</td>
                <td>{$row['tipe']}</td>
                <td>{$row['tahun_produksi']}</td>
                <td>{$row['warna']}</td>
                <td>{$row['harga_sewa_per_hari']}</td>
                <td>{$row['status']}</td>
                <td>
                    <a class='btn-edit' href='update.php?motor_id={$row['motor_id']}'>Edit</a>
                    <a class='btn-delete' href='delete.php?motor_id={$row['motor_id']}'>Hapus</a>
                </td>
            </tr>";
    }

    echo "</table>";
} else {
    echo "Tidak ada data motor.";
}

// Tambahkan tombol create jika pengguna sudah login
if (isset($_SESSION['user_id'])) {
    echo "<div class='create-btn'><a href='create.php'>Tambah Motor</a></div>";
}

$conn->close();
?>

</body>
</html>
