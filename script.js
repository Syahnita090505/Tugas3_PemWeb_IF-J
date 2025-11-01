document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('registrationForm');
    
    // Validasi form
    form.addEventListener('submit', function(event) {
        // Validasi form Bootstrap
        if (!form.checkValidity()) {
            event.preventDefault();
            event.stopPropagation();
            form.classList.add('was-validated');
            
            // Cari file yang error
            const invalidFields = form.querySelectorAll(':invalid');
            if (invalidFields.length > 0) {
                const firstInvalidField = invalidFields[0];
                firstInvalidField.scrollIntoView({ behavior: 'smooth', block: 'center' });
            }
            return;
        }
        
        // Konfirmasi dulu sebelum submit
        const confirmation = confirm("Apakah Anda yakin dengan data yang telah diisi?");
        if (!confirmation) {
            event.preventDefault();
            alert("Pendaftaran dibatalkan");
        }
    });
    
    setTimeout(function() {
        const alerts = document.querySelectorAll('.alert');
        alerts.forEach(alert => {
            const bsAlert = new bootstrap.Alert(alert);
            bsAlert.close();
        });
    }, 5000);

    const deleteButtons = document.querySelectorAll('a[href*="hapus.php"]');
    deleteButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            if (!confirm('Apakah Anda yakin ingin menghapus data ini?')) {
                e.preventDefault();
            }
        });
    });
});

