<?php

/******************************************
Asisten Pemrogaman 13
 ******************************************/

class Pasien
{
    var $id = ''; // ID Pasien
    var $nik = ''; // Nomor Induk Kependudukan (NIK)
    var $nama = ''; // Nama Pasien
    var $tempat = ''; // Tempat Lahir Pasien
    var $tl = ''; // Tanggal Lahir Pasien
    var $gender = ''; // Jenis Kelamin Pasien
    var $email = ''; // Email Pasien
    var $telp = ''; // Nomor Telepon Pasien

    function __construct($id = '', $nik = '', $nama = '', $tempat = '', $tl = '', $gender = '', $email = '', $telp='')
    {
        // Konstruktor untuk menginisialisasi properti objek Pasien
        $this->id = $id;
        $this->nik = $nik;
        $this->nama = $nama;
        $this->tempat = $tempat;
        $this->tl = $tl;
        $this->gender = $gender;
        $this->email= $email;
        $this->telp = $telp;
    }

    // Metode untuk mengatur nilai properti Pasien
    function setId($id)
    {
        $this->id = $id;
    }
    function setNik($nik)
    {
        $this->nik = $nik;
    }
    function setNama($nama)
    {
        $this->nama = $nama;
    }
    function setTempat($tempat)
    {
        $this->tempat = $tempat;
    }
    function setTl($tl)
    {
        $this->tl = $tl;
    }
    function setGender($gender)
    {
        $this->gender = $gender;
    }
    function setEmail($email)
    {
        $this->email = $email;
    }
    function setTelp($telp)
    {
        $this->telp = $telp;
    }

    // Metode untuk mengambil nilai properti Pasien
    function getId()
    {
        return $this->id;
    }
    function getNik()
    {
        return $this->nik;
    }
    function getNama()
    {
        return $this->nama;
    }
    function getTempat()
    {
        return $this->tempat;
    }
    function getTl()
    {
        return $this->tl;
    }
    function getGender()
    {
        return $this->gender;
    }
    function getEmail()
    {
        return $this->email;
    }
    function getTelp()
    {
        return $this->telp;
    }
}
