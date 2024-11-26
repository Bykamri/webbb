# Sistem Donasi Online

## Struktur Proyek

- \`/api\`: Berisi logika server dan API
- \`/frontend\`: Berisi antarmuka pengguna

## Prasyarat

- PHP 7.4+
- MySQL
- Web Server (Apache/Nginx)

## Instalasi

1. Clone repositori
2. Buat database dengan memakai code SQL di bawah ini
   ```
    CREATE TABLE mahasiswa {
        sd
    }
   ```
3. Konfigurasi koneksi database di \`backend/config/database.php\`
4. Jalankan server

## Fitur

### Role Admin

- Manajemen Pengguna
  - CRUD (Create, Read, Update, Delete) untuk data:
    - [ ] Donatur Tetap
    - [ ] Penerima Donasi
    - [ ] Customer Support (CS)
- Manajemen Event Donasi
  - CRUD untuk event donasi, termasuk:
    - [ ] Judul, deskripsi, target donasi, tanggal mulai, dan tanggal berakhir.
    - [ ] Status event (aktif/nonaktif).
- Laporan Keuangan dan Donasi
  - [ ] Rekapitulasi semua transaksi donasi (grafik dan tabel).
  - [ ] Download laporan dalam format PDF atau Excel.

### Role Customer Support (CS)

- Manajemen Status Pengguna
  - Mengaktifkan/mematikan akun:
    - [ ] Donatur Tetap.
    - [ ] Penerima Donasi.
- Manajemen Status Event Donasi
  - [ ] Mengaktifkan/mematikan event donasi yang telah dibuat oleh Admin.
- Kontak dan Bantuan
  - [ ] Mengelola pesan atau pertanyaan dari donatur dan penerima donasi.

### Role Donatur Tetap

- Registrasi dan Profil
  - [ ] Registrasi dengan data pribadi lengkap (nama, email, nomor telepon, alamat, dan preferensi donasi).
  - [ ] Edit profil untuk memperbarui data pribadi.
- Riwayat Donasi
  - [ ] Daftar event yang telah didonasikan.
  - [ ] Total donasi yang telah diberikan.
- Donasi Online
  - [ ] Pilih event donasi.
  - [ ] Metode pembayaran: transfer bank, kartu kredit, atau e-wallet.
  - [ ] Konfirmasi donasi.
- Notifikasi
  - [ ] Notifikasi donasi sukses.
  - [ ] Update status event yang didukung.

### Role Penerima Donasi

- Registrasi dan Profil
  - [ ] Registrasi dengan data pribadi (nama, email, nomor telepon, dan informasi tambahan seperti kebutuhan donasi).
  - [ ] Edit data diri.
- Status Donasi
  - [ ] Informasi status pencairan atau bantuan donasi.
- Permintaan Bantuan
  - [ ] Ajukan permintaan bantuan baru.
  - [ ] Lacak status permintaan.
