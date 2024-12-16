// Validasi Form
document.querySelector('form').addEventListener('submit', function(event) {
    const name = document.querySelector('input[name="name"]').value;
    const position = document.querySelector('input[name="position"]').value;
    const salary = document.querySelector('input[name="salary"]').value;

    if (!name || !position || !salary) {
        alert('Semua field harus diisi!');
        event.preventDefault(); // Mencegah form dari pengiriman
    }
});

// Konfirmasi Hapus
const deleteLinks = document.querySelectorAll('a[href*="delete_employee.php"]');
deleteLinks.forEach(link => {
    link.addEventListener('click', function(event) {
        const confirmation = confirm('Apakah Anda yakin ingin menghapus karyawan ini?');
        if (!confirmation) {
            event.preventDefault(); // Mencegah penghapusan jika tidak dikonfirmasi
        }
    });
});

// Pencarian Karyawan
document.querySelector('input[name="search"]').addEventListener('input', function() {
    const searchTerm = this.value.toLowerCase();
    const rows = document.querySelectorAll('table tr');

    rows.forEach(row => {
        const cells = row.getElementsByTagName('td');
        let found = false;

        for (let i = 0; i < cells.length; i++) {
            if (cells[i]) {
                const cellText = cells[i].textContent.toLowerCase();
                if (cellText.indexOf(searchTerm) > -1) {
                    found = true;
                }
            }
        }

        if (found) {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    });
});