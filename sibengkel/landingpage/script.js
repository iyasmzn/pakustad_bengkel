// document.getElementById('reservasiForm').addEventListener('submit', function (e) {
//   e.preventDefault();

//   // Ambil data dari form
//   const nama = document.getElementById('nama').value;
//   const email = document.getElementById('email').value;
//   const telepon = document.getElementById('telepon').value;
//   const tanggal = document.getElementById('tanggal').value;
//   const layanan = document.getElementById('layanan').value;

//   // Simpan data reservasi (simulasi)
//   const reservasiData = {
//     nama,
//     email,
//     telepon,
//     tanggal,
//     layanan,
//   };

//   // Tampilkan status reservasi
//   const statusElement = document.getElementById('reservasiStatus');
//   statusElement.textContent = `Terima kasih, ${nama}! Reservasi Anda untuk layanan ${layanan} pada ${tanggal} telah berhasil. Kami akan mengirimkan konfirmasi ke email ${email}.`;
//   statusElement.style.color = 'green';

//   // Reset form
//   document.getElementById('reservasiForm').reset();
// });