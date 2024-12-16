<?php
include 'db.php';

// Mengambil ID karyawan dari URL
$id = $_GET['id'];

// Menghapus karyawan berdasarkan ID
$stmt = $pdo->prepare("DELETE FROM employees WHERE id = ?");
$stmt->execute([$id]);

header("Location: employees.php");
exit();
?>