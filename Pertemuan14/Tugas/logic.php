<?php
class Database {
    private $host = "localhost";
    private $user = "root";
    private $pass = "";
    private $dbname = "task_crud";
    public $conn;

    public function __construct() {
        $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->dbname);
        if ($this->conn->connect_error) {
            die("Koneksi gagal: " . $this->conn->connect_error);
        }
    }
}

class Mahasiswa extends Database {
    // Fungsi Read
    public function read() {
        $sql = "SELECT nim, nama, tempat_lahir, tanggal_lahir, jurusan, program_studi, ipk FROM mahasiswa";
        $result = $this->conn->query($sql);
        return $result;
    }

    // Fungsi Add Data
    public function create($nim, $nama, $tempat_lahir, $tanggal_lahir, $jurusan, $program_studi, $ipk) {
        $stmt = $this->conn->prepare("INSERT INTO mahasiswa (nim, nama, tempat_lahir, tanggal_lahir, jurusan, program_studi, ipk) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssd", $nim, $nama, $tempat_lahir, $tanggal_lahir, $jurusan, $program_studi, $ipk);
        if ($stmt->execute()) {
            return "Data berhasil ditambahkan.";
        } else {
            return "Error: " . $stmt->error;
        }
    }

    // Fungsi Update
    public function update($nim, $nama, $tempat_lahir, $tanggal_lahir, $jurusan, $program_studi, $ipk) {
        $stmt = $this->conn->prepare("UPDATE mahasiswa SET nama = ?, tempat_lahir = ?, tanggal_lahir = ?, jurusan = ?, program_studi = ?, ipk = ? WHERE nim = ?");
        $stmt->bind_param("ssssssd", $nama, $tempat_lahir, $tanggal_lahir, $jurusan, $program_studi, $ipk, $nim);
        if ($stmt->execute()) {
            return "Data berhasil diperbarui.";
        } else {
            return "Error: " . $stmt->error;
        }
    }

    // Fungsi Delete
    public function delete($nim) {
        $stmt = $this->conn->prepare("DELETE FROM mahasiswa WHERE nim = ?");
        $stmt->bind_param("s", $nim);
        if ($stmt->execute()) {
            return "Data berhasil dihapus.";
        } else {
            return "Error: " . $stmt->error;
        }
    }
}

$mahasiswa = new Mahasiswa();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['action']) && $_POST['action'] == 'add') {
        //add
        $nim = $_POST['nim'];
        $nama = $_POST['nama'];
        $tempat_lahir = $_POST['tempat_lahir'];
        $tanggal_lahir = $_POST['tanggal_lahir'];
        $jurusan = $_POST['jurusan'];
        $program_studi = $_POST['program_studi'];
        $ipk = $_POST['ipk'];
        
        $message = $mahasiswa->create($nim, $nama, $tempat_lahir, $tanggal_lahir, $jurusan, $program_studi, $ipk);
        header("Location: index.php?message=" . urlencode($message));
        exit();

    } elseif (isset($_POST['action']) && $_POST['action'] == 'update') {
        //update
        $nim = $_POST['nim'];
        $nama = $_POST['nama'];
        $tempat_lahir = $_POST['tempat_lahir'];
        $tanggal_lahir = $_POST['tanggal_lahir'];
        $jurusan = $_POST['jurusan'];
        $program_studi = $_POST['program_studi'];
        $ipk = $_POST['ipk'];

        $message = $mahasiswa->update($nim, $nama, $tempat_lahir, $tanggal_lahir, $jurusan, $program_studi, $ipk);
        header("Location: index.php?message=" . urlencode($message));
        exit();

    } elseif (isset($_POST['action']) && $_POST['action'] == 'delete') {
        // delete
        $nim = $_POST['nim'];
        $message = $mahasiswa->delete($nim);
        header("Location: index.php?message=" . urlencode($message));
        exit();
    }
}
?>
