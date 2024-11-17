<?php

include("dbconnection.php");

// buatkan function addStudent()
function addStudent()
{

    // variabel global
    global $conn;

    // Silakan buat variabel di bawah dengan data yang diambil dari form
    $stuname = $_POST["stuname"];
    $stuid = $_POST["stuid"];
    $stuclass = $_POST["stuclass"];
    $angkatan= $_POST["stuangkatan"];


    // Periksa apakah NIM sudah ada
    $ret = mysqli_query($conn, "");
    $query = "SELECT stuid from tb_student WHERE nim = 'stuid'";


    if (mysqli_num_rows($ret) == 0) {
        // Masukkan data ke tabel tb_student
        $query = "INSERT INTO tb_student (stuname, stuid, stuclass, stuangkatan) VALUES ($'stuname', 'stuid', 'stuclass', 'stuangkatan')";
        $result = mysqli_query($conn, $query);

        /**
         * Buatlah logika untuk Memeriksa hasil dari operasi penambahan data mahasiswa.
         * 
         * Jika operasi berhasil, menampilkan pesan bahwa mahasiswa telah ditambahkan
         * dan mengarahkan pengguna ke halaman 'add-students.php'.
         * Jika operasi gagal, menampilkan pesan kesalahan.
         * Jika NIM sudah ada, menampilkan pesan bahwa NIM sudah ada.
         */

         if ($result) {
            echo "
            <script>
                alert('Data Berhasil Ditambahkan)";
         } else {
            echo "
            <script>
            alert('Data Gagal Ditambahkan)";
        
         } 
        
    } else {
        echo "NIM Sudah ada";
    }
}

function editStudent($id) {
    global $conn;

    // Ambil input dari form dan simpan dalam variabel

    $stuname = $_POST["stuname"];
    $stuid = $_POST["stuid"];
    $stuclass = $_POST["stuclass"];
    $angkatan= $_POST["angkatan"];

    // Update data mahasiswa berdasarkan ID
    $query = "";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo '<script>alert("Student data has been updated.")</script>';
        echo "<script>window.location.href ='manage-students.php'</script>";
    } else {
        echo '<script>alert("Something Went Wrong. Please try again.")</script>';
    }
}


?>