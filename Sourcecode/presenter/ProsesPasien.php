<?php

include("KontrakPresenter.php"); // Mengimpor file KontrakPresenter.php yang mungkin berisi antarmuka atau kelas abstrak yang diperlukan.

class ProsesPasien implements KontrakPresenter // Mendefinisikan kelas ProsesPasien yang mengimplementasikan antarmuka KontrakPresenter.
{
    private $tabelpasien; // Variabel untuk menyimpan objek TabelPasien.
    private $data = []; // Variabel untuk menyimpan data pasien dalam bentuk array.

    function __construct()
    {
        //konstruktor
        try {
            $db_host = "localhost"; // Nama host untuk koneksi basis data MySQL.
            $db_user = "root"; // Nama pengguna untuk koneksi basis data MySQL.
            $db_password = ""; // Kata sandi untuk koneksi basis data MySQL.
            $db_name = "mvp_php"; // Nama basis data MySQL.
            $this->tabelpasien = new TabelPasien($db_host, $db_user, $db_password, $db_name); // Membuat objek TabelPasien dengan parameter koneksi basis data.
            $this->data = array(); // Inisialisasi array untuk menyimpan data pasien.
        } catch (Exception $e) {
            echo "wiw error" . $e->getMessage(); // Menangani kesalahan jika terjadi ketika membuat objek TabelPasien.
        }
    }

    function prosesDataPasien()
    {
        try {
            // Mengambil data dari tabel pasien.
            $this->tabelpasien->open(); // Membuka koneksi ke basis data.
            $this->tabelpasien->getPasien(); // Mengambil data pasien dari tabel.

            while ($row = $this->tabelpasien->getResult()) {
                // Membuat objek Pasien dan mengisinya dengan data dari tabel.
                $pasien = new Pasien(); 
                $pasien->setId($row['id']); // Mengatur ID pasien.
                $pasien->setNik($row['nik']); // Mengatur NIK pasien.
                $pasien->setNama($row['nama']); // Mengatur nama pasien.
                $pasien->setTempat($row['tempat']); // Mengatur tempat lahir pasien.
                $pasien->setTl($row['tl']); // Mengatur tanggal lahir pasien.
                $pasien->setGender($row['gender']); // Mengatur jenis kelamin pasien.
                $pasien->setEmail($row['email']); // Mengatur email pasien.
                $pasien->settelp($row['telp']); // Mengatur nomor telepon pasien.

                // Menambahkan data pasien ke dalam array data.
                $this->data[] = $pasien;
            }
            
            $this->tabelpasien->close(); // Menutup koneksi setelah selesai mengambil data.
        } catch (Exception $e) {
            // Menangani kesalahan jika terjadi.
            echo "Error: " . $e->getMessage();
        }
    }
    function getData(){
        return $this->data; // Mengembalikan data pasien yang telah diproses.
    }

    function prosesDataPasienbyId($id){
        try {
            $this->tabelpasien->open();
            $row = $this->tabelpasien->getPasienbyId($id);
            $pasien = new Pasien(); 
            // Mengisi atribut pasien dengan data dari tabel
            $pasien->setId($row['id']);
            $pasien->setNik($row['nik']);
            $pasien->setNama($row['nama']);
            $pasien->setTempat($row['tempat']);
            $pasien->setTl($row['tl']);
            $pasien->setGender($row['gender']);
            $pasien->setEmail($row['email']);
            $pasien->settelp($row['telp']);
            $this->data[] = $pasien; //tambahkan data pasien ke dalam list
            $this->tabelpasien->open();

        } catch (Exception $e) {
            echo "wiw error part 2" . $e->getMessage();
        }

        
    }
    function tambahDataPasien($data){
        try {
            // Mengeksekusi query
            $this->tabelpasien->open();
            if($this->tabelpasien->insertPasien($data)>0){
                $result = true;
            }else{
                $result = false;
            }
            $this->tabelpasien->close();
            return $result;
        } catch (Exception $e) {
            // Memproses error
            echo "Error: " . $e->getMessage();
        }
    }
    function hapusDataPasien($id){
        try {
            // Mengeksekusi query
            $this->tabelpasien->open();
            if($this->tabelpasien->deletePasien($id)>0){
                $result = true;
            }else{
                $result = false;
            }
            $this->tabelpasien->close();
            return $result;
        } catch (Exception $e) {
            // Memproses error
            echo "Error: " . $e->getMessage();
        }
    }
    function updateDataPasien($id){
        try {
            // Mengeksekusi query
            $this->tabelpasien->open();
            if($this->tabelpasien->updatePasien($id)>0){
                $result = true;
            }else{
                $result = false;
            }
            $this->tabelpasien->close();
            return $result;
        } catch (Exception $e) {
            // Memproses error
            echo "Error: " . $e->getMessage();
        }
    }
    function getId($i)
    {
        //mengembalikan id Pasien dengan indeks ke i
        return $this->data[$i]->getId();
    }
    function getNik($i)
    {
        // Mengembalikan nik Pasien dengan indeks ke i
        return $this->data[$i]->getNik();
    }

    function getNama($i)
    {
        // Mengembalikan nama Pasien dengan indeks ke i
        return $this->data[$i]->getNama();
    }

    function getTempat($i)
    {
        // Mengembalikan tempat Pasien dengan indeks ke i
        return $this->data[$i]->getTempat();
    }

    function getTl($i)
    {
        // Mengembalikan tanggal lahir(TL) Pasien dengan indeks ke i
        return $this->data[$i]->getTl();
    }

    function getGender($i)
    {
        // Mengembalikan gender Pasien dengan indeks ke i
        return $this->data[$i]->getGender();
    }

    function getEmail($i)
    {
        // Mengembalikan email Pasien dengan indeks ke i
        return $this->data[$i]->getEmail();
    }

    function getTelp($i)
    {
        // Mengembalikan telpon Pasien dengan indeks ke i
        return $this->data[$i]->getTelp();
    }

    function getSize()
    {
        return sizeof($this->data);
    }
}
