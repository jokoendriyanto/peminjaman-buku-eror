# TUGAS TROUBLESHOOTING: Aplikasi Peminjaman Buku Berbasis Web

Selamat datang di project ujian praktik troubleshooting Laravel! 
Sistem informasi Peminjaman Buku Perpustakaan ini saat ini **sedang mengalami banyak error (sengaja dirusak)**. Tugas Anda adalah berperan sebagai seorang Web Developer yang sedang melakukan proses *debugging* untuk mencari, menganalisa, dan memperbaiki seluruh error tersebut hingga aplikasi dapat berjalan dengan sempurna.


---

## 🛠 Aturan Pengerjaan
1. Anda **TIDAK PERLU** membuat project Laravel dari awal. Silakan langsung perbaiki *source code* pada project ini.
2. Jangan panik saat melihat layar peringatan error (Ignition) berwarna merah dari Laravel. Itu adalah petunjuk utama Anda!
3. Baca *Stack Trace* dan pesan error yang muncul pelan-pelan. Laravel biasanya memberi tahu Anda persis di file mana dan di baris berapa aplikasi mengalami kegagalan.
4. **Dilarang keras** melakukan _copy-paste_ dari project teman!

---

## 🎯 Panduan Analisa & Troubleshooting

Aplikasi ini mengalami kerusakan di berbagai lapisan arsitektur MVC (Model-View-Controller). Gunakan panduan konseptual di bawah ini untuk membantu Anda menganalisa masalah:

### 1. Pesan Error Halaman & Routing (`routes/web.php`)
- **Konsep:** Routing adalah pintu gerbang aplikasi. Saat Anda mengetikkan URL, routing akan mengarahkannya ke Controller yang tepat.
- **Troubleshooting:** 
  - Jika aplikasi tidak mau dimuat sama sekali dan menampilkan peringatan *Class not found*, periksa apakah alamat/namespace yang di-*import* (`use ...`) di bagian atas file sudah diketik dengan nama folder yang tepat. Jangan sampai ada salah ejaan!
  - Ingatlah aturan dasar pemrograman PHP: setiap akhir dari sebuah instruksi fungsi atau deklarasi harus ditandai dengan karakter penutup perintah. Pastikan tidak ada yang tertinggal.

### 2. Error pada Controller (`AuthController.php` & `BukuController.php`)
- **Konsep:** Controller adalah otak yang mengolah data, validasi, dan mengembalikan respon (seperti mengalihkan halaman atau memanggil view).
- **Troubleshooting:**
  - Jika Anda menemui error *Fatal Error: Call to undefined function*, ini berarti Anda mencoba memanggil fungsi yang tidak ada atau tidak dikenali oleh sistem. Periksa kembali ejaan dari fungsi bawaan Laravel yang digunakan untuk berpindah halaman.
  - Jika Anda menemui *Parse Error* atau *Syntax Error*, kemungkinan besar ada struktur pengkondisian (`if`) atau array yang belum ditutup sempurna oleh tanda kurung, atau ada baris yang belum diakhiri dengan semikolon. Telusuri baris yang ditandai merah oleh Laravel.

### 3. Masalah Tampilan, HTML, & Blade (`resources/views/...`)
- **Konsep:** Blade adalah *template engine* Laravel. HTML membangun kerangka, dan CSS mempercantik tampilannya.
- **Troubleshooting:**
  - **Blade Directives:** Perhatikan saat Anda menggunakan fitur pengulangan data buku di tabel. Setiap directive perulangan harus dipasangkan dengan penutup yang sesuai dengan namanya. Jika Anda membuka dengan *foreach*, pastikan penutupnya juga memiliki nama yang senada.
  - **HTML Tags:** Form dan tombol yang berantakan biasanya disebabkan oleh struktur anatomi HTML yang tidak seimbang. Cek dengan teliti tag `<input>`, `<button>`, dan `<div>`. Apakah sudah memiliki karakter penutup tag `>`? Apakah pasangan tag penutupnya sudah ada tanda slash-nya (`</...>`)?
  - **HTTP Method:** Ketika form disubmit tapi memunculkan error *MethodNotAllowedHttpException*, periksa atribut `method="..."` pada form HTML Anda. Sesuaikan jenis method pengiriman data tersebut dengan apa yang diminta oleh Routing.

### 4. Database & Model (`app/Models/...` & Migration)
- **Konsep:** Model bertugas sebagai jembatan yang menghubungkan aplikasi Anda dengan tabel di database.
- **Troubleshooting:**
  - Jika proses menampilkan data atau manipulasi data gagal dengan pesan error SQL seperti *Table or view not found*, Anda perlu mencurigai Model yang digunakan. Periksa definisi nama tabel di dalam model tersebut; apakah sudah benar-benar sama dengan nama tabel yang dibuat di database?
  - Seperti halnya file PHP lainnya, deklarasi variabel array di dalam Model juga patuh pada aturan sintaks PHP standar.

### 5. Styling CSS (`public/css/custom.css`)
- File ini mengatur keindahan UI. Jika ada gaya (style) yang tidak teraplikasi, biasanya browser mengabaikan baris tersebut karena penulisan sintaksnya tidak valid. Periksa setiap baris properti; CSS mengharuskan adanya titik dua dan diakhiri titik koma pada setiap valuenya.

---

## 🚀 Langkah Menjalankan Aplikasi

Sebelum memulai perbaikan, pastikan Anda telah menjalankan perintah dasar ini di Terminal VSCode Anda:

1. Lakukan migrasi database (Aplikasi ini dikonfigurasi menggunakan SQLite):
   ```bash
   php artisan migrate:fresh
   ```
2. Jalankan server lokal:
   ```bash
   php artisan serve
   ```
3. Buka hasil running di browser Anda: `http://127.0.0.1:8000`

Jika terjadi error, tarik napas panjang, baca pesannya perlahan, dan jadilah seorang _problem solver_!

**Selamat Mencoba & Buktikan Skill Pemrograman Anda!**
# peminjaman-buku-eror
