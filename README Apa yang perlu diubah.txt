1.Buka File Laravel
2.Ekspor Database NilaiMahasiswa
3.Buat Model di terminal laravel 
(caranya : php artisan make:model Siswa)
//Siswa Nama model yang akan dibuat
4.Buat Tabel Siswa di XAMPP/LocalHost samakan namanya dengan make:model(liat contoh untuk created_at dan updated_at wajib ditambahkan
5.CTRL + P cari nama model yang sudah dibuat
6.Isi Model Siswa dengan
protected table // nama tabelnya samakan dengan tabel yang ada di xampp
protected primarykey untuk primary
protected fillable untuk isi tabelnya samakan dengan ada di xampp
public $timestamps = true;

     // Format default kolom timestamp
     const CREATED_AT = 'created_at';
     const UPDATED_AT = 'updated_at';
(WAJIB) bukan hanya sholat


7.buat controller dengan cara php artisan make:controller SiswaController (liat Contoh/Copy)
8.tambahkan di api(liat contoh/copy)

9.jalankan di postman