# README: LP11DPBO2024C2
**Saya Mohammad Faridz Fathin [2202680] mengerjakan LP11 dalam mata kuliah Desain dan Pemrograman Berorientasi Objek (DPBO) untuk keberkahanNya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin.**

## Desain Program

Aplikasi ini dirancang untuk manajemen data pasien. Pengguna dapat menambahkan, mengedit, dan menghapus data pasien melalui antarmuka web. Aplikasi ini terdiri dari beberapa komponen utama:

1. **Model**: Komponen ini bertanggung jawab untuk berinteraksi dengan database dan merepresentasikan entitas dalam sistem. Model ini terdiri dari kelas-kelas seperti `Pasien`, `TabelPasien`, dan `DB` yang digunakan untuk mengakses data pasien dari database.

2. **Presenter**: Komponen ini bertanggung jawab untuk melakukan operasi logika bisnis dan berkomunikasi dengan model dan view. Kelas `ProsesPasien` berfungsi sebagai presenter yang mengatur operasi-operasi seperti menambah, mengedit, dan menghapus data pasien.

3. **View**: Komponen ini bertanggung jawab untuk menampilkan data kepada pengguna dan menerima input dari pengguna. Kelas `TampilPasien` berfungsi sebagai view yang menangani tampilan data pasien dan formulir penambahan/pembaruan data.

4. **Template**: Komponen ini digunakan untuk mengelola template HTML yang digunakan dalam tampilan. Kelas `Template` digunakan untuk mengelola struktur dan format tampilan.

## Alur Program

1. Pengguna mengakses aplikasi melalui browser web.
2. Jika pengguna ingin menambahkan data pasien, pengguna akan diarahkan ke formulir penambahan data pasien (`tambah()`).
3. Jika pengguna ingin mengedit data pasien, pengguna akan diarahkan ke formulir pembaruan data pasien (`update($id)`).
4. Jika tidak ada operasi penambahan atau pembaruan yang diminta, pengguna akan melihat tampilan data pasien dalam bentuk tabel (`tampil()`).
5. Kelas `TampilPasien` akan memanggil metode yang sesuai berdasarkan parameter yang diterima melalui URL.
6. Kelas `ProsesPasien` berinteraksi dengan model (`TabelPasien`) untuk memproses operasi yang diminta.
7. Data yang diperoleh dari model akan ditampilkan kepada pengguna melalui tampilan yang dihasilkan oleh kelas `TampilPasien`.
8. Pengguna dapat menambahkan, mengedit, atau menghapus data pasien sesuai dengan aksi yang dilakukan di antarmuka web.

Dengan demikian, aplikasi ini mengikuti pola arsitektur MVC (Model-View-Controller), di mana model bertanggung jawab untuk logika bisnis dan akses data, view bertanggung jawab untuk tampilan antarmuka pengguna, dan presenter berperan sebagai penghubung antara model dan view.

## Dokumentasi
1. Screenrecord
   https://github.com/fridzfth/LP11DPBO2024C2/assets/140497713/4ff9bad7-e348-4d7e-b238-1bc5c08ee6b7

   
3. Screenshots
![스크린샷 2024-05-05 185735](https://github.com/fridzfth/LP11DPBO2024C2/assets/140497713/4d86ee26-c60b-459b-b436-01229650dfec)
![스크린샷 2024-05-05 185717](https://github.com/fridzfth/LP11DPBO2024C2/assets/140497713/6a375312-b0e9-43f0-9b32-dee24082ac02)
![스크린샷 2024-05-05 185838](https://github.com/fridzfth/LP11DPBO2024C2/assets/140497713/728a3feb-2702-4f0d-b059-6fe76187be59)
![스크린샷 2024-05-05 185819](https://github.com/fridzfth/LP11DPBO2024C2/assets/140497713/50878a8f-0a11-44cc-9784-b59299b0e5cd)
![스크린샷 2024-05-05 185803](https://github.com/fridzfth/LP11DPBO2024C2/assets/140497713/d892888b-e840-4a0d-a920-1afd65b28e6e)
