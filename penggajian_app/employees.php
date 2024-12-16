
<?php
include 'db.php';

$stmt = $pdo->query("SELECT * FROM employees ORDER BY created_at DESC");
$employees = $stmt->fetchAll();
?>

<!DOCTYPE html>
< lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Daftar Karyawan</title>
</head>
<>
    <div class="container">
        <h1>Daftar Karyawan</h1>
        <table>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Jabatan</th>
                <th>Gaji</th>
                <th>Dibuat Pada</th>
            </tr>
            <?php foreach ($employees as $employee): ?>
            <tr>
                <td><?php echo $employee['id']; ?></td>
                <td><?php echo $employee['name']; ?></td>
                <td><?php echo $employee['position']; ?></td>
                <td><?php echo number_format($employee['salary'], 2, ',', '.'); ?></td>
                <td><?php echo $employee['created_at']; ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <a href="index.php">Tambah Karyawan Baru</a>
    </div>
    <script src="script.js"></script>
</body>
</html>

<td>
    <a href="edit_employee.php?id=<?php echo $employee['id']; ?>">Edit</a>
    <a href="delete_employee.php?id=<?php echo $employee['id']; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus karyawan ini?');">Hapus</a>
</td>
<form method="GET" action="">
    <input type="text" name="search" placeholder="Cari Karyawan" required>
    <button type="submit">Cari</button>
</form>

<?php
$search = $_GET['search'] ?? '';
$query = "SELECT * FROM employees WHERE name LIKE ? ORDER BY created_at DESC";
$stmt = $pdo->prepare($query);
$stmt->execute(["%$search%"]);
$employees = $stmt->fetchAll();
?>
