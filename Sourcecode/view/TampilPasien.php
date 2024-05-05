<?php

include("KontrakView.php"); // Mengimpor file KontrakView.php yang mungkin berisi antarmuka atau kelas abstrak yang diperlukan.
include("presenter/ProsesPasien.php"); // Mengimpor file ProsesPasien.php yang berisi kelas ProsesPasien.

class TampilPasien implements KontrakView // Mendefinisikan kelas TampilPasien yang mengimplementasikan antarmuka KontrakView.
{
    private $prosespasien; // Variabel untuk menyimpan objek ProsesPasien yang digunakan untuk berinteraksi dengan data pasien.
    private $tpl; // Variabel untuk menyimpan objek Template.

    function __construct()
    {
        // Konstruktor
        $this->prosespasien = new ProsesPasien(); // Membuat objek ProsesPasien untuk mengakses data pasien.
    }

    function tampil()
    {
        // Metode untuk menampilkan data pasien ke dalam tabel HTML.
        if(isset($_GET['hapus'])) {
            $id = $_GET['hapus'];
            $result = $this->prosespasien->hapusDataPasien($id); // Memanggil metode hapusDataPasien dari presenter untuk menghapus data pasien.
            if($result) {
              echo "<script>alert('Data berhasil dihapus');</script>"; // Menampilkan pesan sukses jika penghapusan berhasil.
            }
        } else if(isset($_POST['tambah'])){
          $result = $this->prosespasien->tambahDataPasien($_POST);
          if($result) {
              echo "<script>alert('Data berhasil ditambahkan');</script>"; // Menampilkan pesan sukses jika penambahan berhasil.
          }
        } else if(isset($_POST['edit'])){
            $result = $this->prosespasien->updateDataPasien($_POST); // Memanggil metode updateDataPasien dari presenter untuk memperbarui data pasien.
            if($result) {
              echo "<script>alert('Data berhasil diupdate');</script>"; // Menampilkan pesan sukses jika pembaruan berhasil.
            }
        }

        $this->prosespasien->prosesDataPasien(); // Memanggil metode prosesDataPasien dari presenter untuk mengambil data pasien dari database.
        $data = null;

        // Membuat baris tabel untuk setiap data pasien yang diambil dari presenter.
        for ($i = 0; $i < $this->prosespasien->getSize(); $i++) {
          $no = $i + 1;
          $data .= "<tr>
              <td>" . $no . "</td>
              <td>" . $this->prosespasien->getNik($i) . "</td>
              <td>" . $this->prosespasien->getNama($i) . "</td>
              <td>" . $this->prosespasien->getTempat($i) . "</td>
              <td>" . $this->prosespasien->getTl($i) . "</td>
              <td>" . $this->prosespasien->getGender($i) . "</td>
              <td>" . $this->prosespasien->getEmail($i) . "</td>
              <td>" . $this->prosespasien->getTelp($i) . "</td>
              <td>
                <a href='index.php?edit=" . $this->prosespasien->getId($i) . "'>Update</a> | 
                <a href='index.php?hapus=" . $this->prosespasien->getId($i) . "' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\")'>Delete</a>
            </td>

          </tr>";
        }      

        // Membaca template skin.html
        $this->tpl = new Template("templates/skin.html");

        // Mengganti kode DATA_TABEL dengan data yang sudah diproses
        $this->tpl->replace("DATA_TABEL", $data);

        // Menampilkan ke layar
        $this->tpl->write();
    }

    function tambah()
    {
        // Metode untuk menampilkan formulir penambahan data pasien.
        $data = '
    <h3>INSERT NEW PATIENT</h3>
    <form id="patientForm" action="index.php" method="post" style="margin: 0 5% 5% 5%;">
      <div class="form-group">
        <label for="nik">NIK</label>
        <input type="text" class="form-control" id="nik" name="nik" placeholder="Enter NIK" required>
      </div>
      <div class="form-group">
        <label for="nama">Nama</label>
        <input type="text" class="form-control" id="nama" name="nama" placeholder="Enter Nama" required>
      </div>
      <div class="form-group">
        <label for="tempat">Tempat Lahir</label>
        <input type="text" class="form-control" id="tempat" name="tempat" placeholder="Enter Tempat Lahir" required>
      </div>
      <div class="form-group">
        <label for="tanggal_lahir">Tanggal Lahir</label>
        <input type="date" class="form-control" id="tanggal_lahir" name="tl" required>
      </div>
      <div class="form-group">
        <label for="gender">Gender</label>
        <select class="form-control" id="gender" name="gender" required>
          <option value="" disabled selected>Select Gender</option>
          <option>Laki-laki</option>
          <option>Perempuan</option>
        </select>
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" required>
      </div>
      <div class="form-group">
        <label for="telp">Telpon</label>
        <input type="tel" class="form-control" id="telp" name="telp" placeholder="Enter Telpon" required>
      </div>
      <button type="submit" name="tambah" class="btn btn-primary">Submit</button>
      <button type="button" class="btn btn-secondary float-right" onclick="clearForm()">Clear Form</button>
    </form>';


        // Membaca template skinform.html
        $this->tpl = new Template("templates/skinform.html");

        // Mengganti kode DATA_FORM dengan data yang sudah diproses
        $this->tpl->replace("DATA_FORM", $data);
        $this->tpl->replace("DATA_TITLE", "INSERT NEW PATIENT");


        // Menampilkan ke layar
        $this->tpl->write();
    }

    function update($id){

    // Metode untuk menampilkan formulir pembaruan data pasien berdasarkan ID yang diberikan.
    $this->prosespasien->prosesDataPasienbyId($id); // Memanggil metode prosesDataPasienbyId dari presenter untuk mengambil data pasien berdasarkan ID.
    $pasien = $this->prosespasien->getData()[0]; // Mengambil objek Pasien dari data yang sudah diproses.

    $data = '
    <h3>Update Pasien</h3>
    <form id="patientForm" action="index.php" method="post" style="margin: 0 5% 5% 5%;">
      <input type="hidden" name="id" value="'. $pasien->getId() .'"> <!-- Hidden input untuk menyimpan ID pasien -->
      <div class="form-group">
        <label for="nik">NIK</label>
        <input type="text" class="form-control" id="nik" name="nik" value="'. $pasien->getNik() .'" placeholder="Enter NIK" required>
      </div>
      <div class="form-group">
        <label for="nama">Nama</label>
        <input type="text" class="form-control" id="nama" name="nama" value="'. $pasien->getNama() .'" placeholder="Enter Nama" required>
      </div>
      <div class="form-group">
        <label for="tempat">Tempat Lahir</label>
        <input type="text" class="form-control" id="tempat" name="tempat" value="'. $pasien->getTempat() .'" placeholder="Enter Tempat Lahir" required>
      </div>
      <div class="form-group">
        <label for="tanggal_lahir">Tanggal Lahir</label>
        <input type="date" class="form-control" id="tanggal_lahir" name="tl" value="'. $pasien->getTl() .'" required>
      </div>
      <div class="form-group">
        <label for="gender">Gender</label>
        <select class="form-control" id="gender" name="gender" required>
          <option value="" disabled selected>Select Gender</option>
          <option '. ($pasien->getGender() == "Laki-laki" ? 'selected' : '') .'>Laki-laki</option>
          <option '. ($pasien->getGender() == "Perempuan" ? 'selected' : '') .'>Perempuan</option>
        </select>
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" value="'. $pasien->getEmail() .'" placeholder="Enter Email" required>
      </div>
      <div class="form-group">
        <label for="telp">Telpon</label>
        <input type="tel" class="form-control" id="telp" name="telp" value="'. $pasien->getTelp() .'" placeholder="Enter Telpon" required>
      </div>
      <button type="submit" name="edit" class="btn btn-primary">Submit</button>
    </form>';


        // Membaca template skinform.html
        $this->tpl = new Template("templates/skinform.html");

        // Mengganti kode DATA_FORM dengan data yang sudah diproses
        $this->tpl->replace("DATA_FORM", $data);
        $this->tpl->replace("DATA_TITLE", "UPDATE DATA");

        // Menampilkan ke layar
        $this->tpl->write();
    }

}
