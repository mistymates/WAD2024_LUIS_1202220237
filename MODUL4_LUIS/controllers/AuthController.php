<?php

class AuthController
{
    private $conn;

    public function __construct()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        require_once 'config/database.php';
        $this->conn = $conn;
    }

    public function login()
    {
        global $conn;
        if (isset($_POST['submit'])) {
            // TODO: Lengkapi fungsi login dengan langkah berikut:
            // 1. Ambil nim dan password dari form login
            $nim = $_POST['nim'];
            $password = $_POST['password'];
            // 2. Buat query untuk mencari mahasiswa berdasarkan NIM
            $query = "SELECT * FROM mahasiswa WHERE nim = '$nim'";
            // 3. Eksekusi query menggunakan mysqli_query
            $result = mysqli_query($conn, $query);
            // 4. Ambil hasil query menggunakan mysqli_fetch_assoc
            $row = mysqli_fetch_assoc($result);
            // 5. Cek apakah mahasiswa ditemukan
        {
            if ($row);
               
            }
            // 6. Jika ditemukan, verifikasi password menggunakan password_verify
            if (password_verify($password, $data['password'])) {
                $_SESSION["user"] = $row;
            // 7. Jika password benar:
            //    - Set session login = true
                $_SESSION["login"] = true;
            //    - Set session user dengan data mahasiswa
                $_SESSION["user"] = $row;
            //    - Set session message dengan "Login Berhasil"
                $_SESSION["message"] = "Login Berhasil";
            //    - Jika remember_me dicentang, buat cookie untuk nim dan password
                if (isset($input["remember"])) {
                    setcookie("nim", $nim, time() + (86400 * 30), "/");
                    setcookie("password", $password, time() - 3600, "/");
                } else {
                    setcookie("nim", "", time() + (86400 * 30), "/");
                    setcookie("password", "", time() - 3600, "/"); //
            }
            //    - Redirect ke halaman dashboard menggunakan (header('Location: index.php?controller=dashboard&action=index'))
                header("Location: index.php?controller=dashboard&action=index");
            //    - Jangan lupa exit setelah redirect
            exit;
            // 8. Jika password salah, set session message "Login Gagal NIM atau Password Salah"
            } else {
            $_SESSION['message'] = "Password salah";
        }
            // 9. Jika mahasiswa tidak ditemukan, set session message "NIM Tidak Ditemukan"
            } else {
                $_SESSION['message'] = "Email tidak ditemukan";
            
            

            


        }

        include 'views/auth/login.php';
    }

    private function getJurusan($jurusan){
        // TODO: Lengkapi fungsi untuk mendapatkan kode jurusan
        // 1. Buat variabel $kode_jurusan dengan nilai default 0
        $kode_jurusan = 0;
        // 2. Gunakan switch-case atau if-else untuk mengatur kode jurusan:
        //    - kedokteran = 11
        //    - psikologi = 12
        //    - biologi = 13
        //    - teknik informatika = 14
            switch (strolower($jurusan)) {
                case "kedokteran":
                  $kode_jurusan = 11;
                  break;
                case "psikologi":
                    $kode_jurusan = 12;
                    break;
                case "biologi":
                    $kode_jurusan = 13;
                    break;
                case "teknik informatika":
                    $kode_jurusan = 14;
                    break;
                    default:
                    $kod_jurusan = 0;
                    break;
                }
        // 3. Return nilai kode_jurusan
        return $kodejurusan;
            }
            

    private function generateNIM($id_pendaftaran){
        // TODO: Lengkapi fungsi untuk generate NIM dengan format: [kode_jurusan][tahun_masuk][id_pendaftaran]
        // 1. Buat query untuk mengambil data pendaftaran berdasarkan id_pendaftaran
        $query = "SELECT * FROM pendaftaran WHERE id_pendafataran = '$id_pendaftaran'";
        // 2. Eksekusi query dan ambil hasilnya
        $result = mysqli_query($conn, $query);
        $row = mysql_ftech_assoc($result);
        // 3. Ambil tahun sekarang dalam format 2 digit menggunakan date('y')
        $date = date("y");
        // 4. Jika data ditemukan:
        //    - Ambil data jurusan dari hasil query
        //    - Dapatkan kode jurusan menggunakan fungsi getJurusan()
        //    - Jika kode jurusan valid (tidak 0):
        //      * Generate NIM dengan format: [kode_jurusan][tahun][id_pendaftaran_dengan_padding]
        //      * Gunakan str_pad untuk id_pendaftaran 2 digit
        //    - Return false jika kode jurusan tidak valid
        if (row) {
            $jurusan = $row[$jurusan];
            $kidejurusan = getJurusan();
        }
        // 5. Return false jika data tidak ditemukan
    }

    public function register_step_1()
    {
        if (isset($_POST['submit'])) {
            // TODO: Lengkapi fungsi register step 1
            // 1. Ambil id_pendaftaran dari form register step 1
            // 2. Buat query untuk mencari pendaftaran berdasarkan id_pendaftaran dengan status 'lulus'
            // 3. Eksekusi query dan ambil hasilnya
            // 4. Jika ditemukan:
            //    - Set session id_pendaftaran dengan id_pendaftaran
            //    - Redirect ke register step 2 menggunakan (header('Location: index.php?controller=auth&action=register_step_2'))
            //    - Jangan lupa exit setelah redirect
            // 5. Jika tidak ditemukan, set session message error

        }
        
        include 'views/auth/register_step_1.php';
    }

    public function register_step_2() 
    {
        // TODO: Cek apakah id_pendaftaran sudah ada di session
        // 1. Jika id_pendaftaran belum ada di session:
        //    - Redirect ke halaman register step 1
        //    - Gunakan header('Location: index.php?controller=auth&action=register_step_1')
        //    - Jangan lupa exit setelah redirect

        if (isset($_POST['submit'])) {
            // TODO: Ambil data dari form register step 2
            // 1. Ambil password dari form
            // 2. Ambil confirm_password dari form

            // TODO: Validasi password
            // 1. Cek apakah password sama dengan confirm_password
            // 2. Jika sama:
            //    - Ambil id_pendaftaran dari session
            //    - Buat query untuk mengambil data pendaftaran berdasarkan id_pendaftaran
            //    - Eksekusi query menggunakan mysqli_query
            //    - Ambil hasil query menggunakan mysqli_fetch_assoc
            //    - Generate NIM menggunakan fungsi generateNIM()
            //    
            //    - Buat query untuk cek apakah NIM sudah ada di database
            //    - Eksekusi query cek NIM
            //    - Jika NIM sudah ada:
            //      * Set session message "NIM sudah terdaftar"
            //    - Jika NIM belum ada:
            //      * Hash password menggunakan password_hash dengan PASSWORD_DEFAULT
            //      * Ambil nama dan jurusan dari data pendaftaran
            //      * Buat query INSERT untuk menyimpan data mahasiswa (nim, id_pendaftaran, password, nama, jurusan)
            //      * Eksekusi query INSERT
            //      * Jika berhasil:
            //        - Set session message berisi informasi berhasil dan NIM
            //        - Hapus session id_pendaftaran
            //        - Redirect ke halaman login menggunakan header('Location: index.php?controller=auth&action=login')
            //        - Exit setelah redirect
            //      * Jika gagal:
            //        - Set session message "Register Gagal"
            // 3. Jika password tidak sama:
            //    - Set session message "Password Tidak Cocok"
        }

        include 'views/auth/register_step_2.php';
    }

    public function logout() 
    {
        // TODO: Implementasikan fungsi logout
        // 1. Hapus semua data session
        // 2. Redirect ke halaman login dengan:
        //    - Gunakan header('Location: index.php?controller=auth&action=login')
        //    - Jangan lupa exit setelah redirect
                
    }
}

?>