
  // Ambil elemen
  const contactForm = document.getElementById('contactForm');
  const notification = document.getElementById('notification');
  const errorAlert = document.getElementById('error');

  // Submit form menggunakan AJAX
  contactForm.addEventListener('submit', function (e) {
    e.preventDefault(); // Mencegah reload halaman
    const formData = new FormData(contactForm); // Ambil data form

    fetch('server/proses_kontak.php', {
      method: 'POST',
      body: formData,
    })
      .then((response) => response.json())
      .then((data) => {
        if (data.success) {
          // Tampilkan notifikasi sukses
          notification.style.display = 'block';
          notification.textContent = 'Pesan Anda berhasil dikirim!';
          errorAlert.style.display = 'none';
          contactForm.reset(); // Reset form
        } else {
          // Tampilkan notifikasi error
          errorAlert.style.display = 'block';
          errorAlert.textContent = 'Terjadi kesalahan: ' + data.message;
          notification.style.display = 'none';
        }
      })
      .catch((error) => {
        // Tampilkan error jaringan
        errorAlert.style.display = 'block';
        errorAlert.textContent = 'Kesalahan jaringan. Coba lagi nanti.';
        notification.style.display = 'none';
      });
  });
