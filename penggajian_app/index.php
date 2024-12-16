<?php
include 'db.php';

// Menambahkan karyawan baru
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $position = $_POST['position'];
    $salary = $_POST['salary'];

    $stmt = $pdo->prepare("INSERT INTO employees (name, position, salary) VALUES (?, ?, ?)");
    $stmt->execute([$name, $position, $salary]);

    header("Location: employees.php");
    exit();
}
?>

<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Penggajian Karyawan</title>
</head>

    <div class="container">
        <h1>Penggajian Karyawan</h1>
        <form method="POST" action="">
            <input type="text" name="name" placeholder="Nama Karyawan" required>
            <input type="text" name="position" placeholder="Jabatan" required>
            <input type="number" name="salary" placeholder="Gaji" required>
            <button type="submit">Tambah Karyawan</button>
        </form>
        <a href="employees.php">Lihat Daftar Karyawan</a>
    </div>
    <script src="script.js"></script>
</body>
</html>

