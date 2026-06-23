# SIAKAD — Sistem Informasi Akademik

**Link Demo : link host disini**

SIAKAD adalah aplikasi web Sistem Informasi Akademik berbasis Laravel yang dirancang untuk mendigitalkan proses manajemen akademik di perguruan tinggi. Aplikasi ini mempermudah interaksi antara mahasiswa, dosen, dan staf administrasi (admin) dalam mengelola data perkuliahan, jadwal, serta rencana studi secara daring dan real-time.

## Fitur Utama & Fungsi Halaman

Aplikasi ini dibagi menjadi 3 area utama berdasarkan peran pengguna (Role):

### 1. Umum (Autentikasi)

- **Halaman Login (`/login`)**: Pintu masuk utama bagi semua pengguna (Admin, Dosen, Mahasiswa). Dilengkapi dengan validasi kesalahan masukan langsung di bawah kolom input teks dengan pesan bahasa Indonesia, serta fitur tombol tampilkan/sembunyikan kata sandi.    

### 2. Panel Admin & Dosen

Admin dan Dosen Pembimbing berbagi panel manajemen dengan hak akses penuh (Dosen memiliki hak akses setara admin) untuk mengelola data operasional kampus:

- **Dashboard (`/admin/dashboard`)**: Menampilkan ringkasan statistik global mencakup Total Dosen, Total Mahasiswa, Total Mata Kuliah, Total Jadwal, Total KRS, serta tabel riwayat 5 transaksi pengisian KRS terbaru di sistem.
- **Manajemen Dosen (`/admin/dosen`)**: Berisi daftar seluruh dosen terdaftar beserta NIDN. Admin/Dosen dapat melakukan pencarian, penambahan (_Create_), pengubahan (_Edit_), dan penghapusan (_Delete_) data dosen beserta akun sistem mereka.
- **Manajemen Mahasiswa (`/admin/mahasiswa`)**: Berisi daftar seluruh mahasiswa terdaftar beserta NPM, email, dan nama Dosen Pembimbing Akademik mereka. Dilengkapi fitur CRUD dan tombol cepat untuk langsung melihat riwayat KRS mahasiswa terkait.
- **Manajemen Mata Kuliah (`/admin/matakuliah`)**: Halaman untuk mengelola katalog mata kuliah kampus yang memuat informasi Kode MK, Nama Mata Kuliah, dan jumlah SKS.
- **Manajemen Jadwal (`/admin/jadwal`)**: Halaman untuk menjadwalkan kelas perkuliahan dengan menetapkan Mata Kuliah, Dosen Pengajar, Hari, Jam Mulai, serta Kelas (A/B/C).
- **Data KRS Mahasiswa (`/admin/krs`)**: Menampilkan daftar pengambilan KRS seluruh mahasiswa secara global. Di halaman ini, Admin/Dosen dapat memfilter data berdasarkan nama mahasiswa atau memilih langsung mahasiswa tertentu untuk melihat kartu ringkasan KRS detail (termasuk total pengambilan SKS) serta mengekspornya ke PDF.

### 3. Panel Mahasiswa

Mahasiswa memiliki akses ke area khusus untuk mengelola rencana studi mandiri:

- **Dashboard (`/mahasiswa/dashboard`)**: Menyajikan informasi selamat datang personal, data profil singkat mahasiswa, informasi Dosen Pembimbing Akademik, serta ringkasan total SKS yang telah diambil pada semester berjalan.
- **Jadwal Kuliah (`/mahasiswa/jadwal`)**: Halaman baca-saja (_read-only_) untuk melihat jadwal kuliah aktif yang ditawarkan oleh kampus berdasarkan hari dan jam.
- **KRS Saya (`/mahasiswa/krs`)**: Halaman utama mahasiswa untuk mengisi kartu rencana studi semester. Mahasiswa dapat:
    - Melihat daftar mata kuliah yang telah diambil beserta total SKS.
    - Mengambil mata kuliah baru (_Ambil MK_) dari daftar mata kuliah yang tersedia.
    - Membatalkan/menghapus mata kuliah yang telah diambil (_Drop MK_).
    - Mencetak/mengekspor Kartu Rencana Studi (KRS) resmi ke dalam format berkas PDF dengan layout rapi yang menyandingkan tanda tangan Dosen Pembimbing dan Mahasiswa secara sejajar.

---

<div align="center">
<h1>Hosting Link : https://</h1>

# SIAKAD

### Sistem Informasi Akademik

<p>SIAKAD ini Adalah Sistem Informasi berbasis web untuk mengelola dan memberikan informasi data akademik perguruan tinggi.  </p>

</div>

---

## 📋 Tentang Proyek

**SIAKAD** (Sistem Informasi Akademik) adalah aplikasi berbasis web menggunakan framework LARAVEL yang dikembangkan untuk memenuhi **Tugas Besar Mata Kuliah Pemrograman Web II**. Aplikasi ini dirancang untuk mendigitalkan proses manajemen akademik di perguruan tinggi. Aplikasi ini mempermudah mahasiswa, dosen, dan staf administrasi (admin) dalam mengelola dan meilhat data perkuliahan, jadwal, serta rencana studi secara daring dan real-time.

---

## 📌 Informasi User

<div align="center">

| Username          | Role                     |
| ----------------- | ------------------------ |
| admin@unsur.ac.id | Admin                    |
| test@unsur.ac.id  | Mahasiswa                |


</div>

## 👥 Pembuat

<div align="center">

| Nama                       | NPM        |
| -------------------------- | ---------- |
| Muhammad Bimo Heru Wahyono | 5520124028 |

</div>

---

Proyek ini dibuat untuk memenuhi keperluan akademik **Tugas Besar Mata Kuliah Pemrograman Web II**.

---