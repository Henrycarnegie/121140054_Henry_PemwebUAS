<?php
// hapus.php
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['motor_id'])) {
    $motor_id = $_GET['motor_id'];

    $sql = "DELETE FROM motor WHERE motor_id = $motor_id";
    if ($conn->query($sql) === TRUE) {
        echo "Data motor berhasil dihapus.";
        header('Location: read.php');
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
} else {
    echo "Permintaan tidak valid.";
}

$conn->close();
?>
