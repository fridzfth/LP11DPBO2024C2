<?php

/******************************************
Asisten Pemrogaman 13
 ******************************************/

include("model/Template.class.php"); // Mengimpor kelas Template yang digunakan untuk mengelola template HTML.
include("model/DB.class.php"); // Mengimpor kelas DB yang digunakan untuk berinteraksi dengan database.
include("model/Pasien.class.php"); // Mengimpor kelas Pasien yang merepresentasikan entitas Pasien.
include("model/TabelPasien.class.php"); // Mengimpor kelas TabelPasien yang digunakan untuk mengakses tabel pasien dalam database.
include("view/TampilPasien.php"); // Mengimpor kelas TampilPasien yang digunakan untuk menampilkan data pasien.

$tp = new TampilPasien(); // Membuat objek TampilPasien untuk menampilkan data pasien.

if (isset($_GET['tambah'])){
    $data = $tp->tambah(); // Jika parameter 'tambah' diterima melalui URL, panggil metode tambah untuk menampilkan formulir penambahan data pasien.
} else if(isset($_GET['edit'])){
    $id = $_GET['edit']; // Jika parameter 'edit' diterima melalui URL, ambil nilai ID yang diberikan.
    $data = $tp->update($id); // Panggil metode update dengan ID yang diberikan untuk menampilkan formulir pembaruan data pasien.
}
else {
    $data = $tp->tampil(); // Jika tidak ada parameter tambah atau edit yang diterima, panggil metode tampil untuk menampilkan data pasien dalam tabel.
}
