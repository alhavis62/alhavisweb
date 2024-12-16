<?php
include 'db.php';

// Mengambil ID karyawan dari URL
$id = $_GET['id'];

// Mengambil data karyawan berdasarkan ID
$stmt = $pdo->prepare("SELECT * FROM employees WHERE id = ?");
$stmt->execute([$id]);
$employee = $stmt->fetch();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $position = $_POST['position'];
    $salary = $_POST['salary'];

    // Memperbarui data karyawan
    $stmt = $pdo->prepare("UPDATE employees SET name = ?, position = ?, salary = ? WHERE id = ?");
    $stmt->execute([$name, $position, $salary, $id]);

    header("Location: employees.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Edit Karyawan</title>
</head>
<body>
    <div class="container">
        <h1>Edit Karyawan</h1>
        <form method="POST" action="">
            <input type="text" name="name" value="<?php echo $employee['name']; ?>" required>
            <input type="text" name="position" value="<?php echo $employee['position']; ?>" required>
            <input type="number" name="salary" value="<?php echo $employee['salary']; ?>" required>
            <button type="submit">Perbarui Karyawan</button>
        </form>
        <a href="employees.php">Kembali ke Daftar Karyawan</a>
    </div>
</body>
</html>