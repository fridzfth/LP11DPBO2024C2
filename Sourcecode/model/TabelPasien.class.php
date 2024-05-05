<?php

/******************************************
Asisten Pemrogaman 13
 ******************************************/

class TabelPasien extends DB
{
    // Metode untuk mendapatkan semua data pasien dari tabel
    function getPasien()
    {
        // Query MySQL untuk memilih semua data pasien
        $query = "SELECT * FROM pasien";
        // Mengeksekusi query menggunakan metode execute yang diwarisi dari kelas induk DB
        return $this->execute($query);
    }
    
    // Metode untuk mendapatkan data pasien berdasarkan ID
    function getPasienbyId($id)
    {
        // Query MySQL untuk memilih data pasien berdasarkan ID yang diberikan
        $query = "SELECT * FROM pasien WHERE id='$id'";
        // Mengeksekusi query menggunakan metode execute yang diwarisi dari kelas induk DB
        $this->execute($query);
        // Mengembalikan hasil query menggunakan metode getResult yang diwarisi dari kelas induk DB
        return $this->getResult();
    }

    // Metode untuk menyisipkan data pasien baru ke dalam tabel
    function insertPasien($data)
    {
        // Mendapatkan nilai-nilai data pasien dari array yang diberikan
        $nik = $data['nik'];
        $nama = $data['nama'];
        $tempat = $data['tempat'];
        $tl = $data['tl'];
        $gender = $data['gender'];
        $email = $data['email'];
        $telp = $data['telp'];

        // Query MySQL untuk menyisipkan data pasien baru ke dalam tabel pasien
        $query = "INSERT INTO pasien (nik, nama, tempat, tl, gender, email, telp) 
                VALUES ('$nik', '$nama', '$tempat', '$tl', '$gender', '$email', '$telp')";
        
        // Mengeksekusi query menggunakan metode executeAffected yang diwarisi dari kelas induk DB
        return $this->executeAffected($query);
    }

    // Metode untuk memperbarui data pasien yang ada dalam tabel
    function updatePasien($data)
    {
        // Mendapatkan nilai-nilai data pasien dari array yang diberikan
        $id = $data['id'];
        $nik = $data['nik'];
        $nama = $data['nama'];
        $tempat = $data['tempat'];
        $tl = $data['tl'];
        $gender = $data['gender'];
        $email = $data['email'];
        $telp = $data['telp'];

        // Query MySQL untuk memperbarui data pasien yang sesuai dengan ID yang diberikan
        $query = "UPDATE pasien SET 
                nik = '$nik', 
                nama = '$nama', 
                tempat = '$tempat', 
                tl = '$tl', 
                gender = '$gender', 
                email = '$email', 
                telp = '$telp' 
                WHERE id = $id";

        // Mengeksekusi query menggunakan metode executeAffected yang diwarisi dari kelas induk DB
        return $this->executeAffected($query);
    }

    // Metode untuk menghapus data pasien dari tabel berdasarkan ID
    function deletePasien($id)
    {
        // Query MySQL untuk menghapus data pasien berdasarkan ID yang diberikan
        $query = "DELETE FROM pasien WHERE id = $id";

        // Mengeksekusi query menggunakan metode executeAffected yang diwarisi dari kelas induk DB
        return $this->executeAffected($query);
    }
}
