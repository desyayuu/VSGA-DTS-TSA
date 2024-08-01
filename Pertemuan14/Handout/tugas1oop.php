<?php
class Database {
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "dboo";
    private $conn;

    // Constructor untuk membuka koneksi
    public function __construct() {
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        if ($this->conn->connect_error) {
            die("Koneksi gagal: " . $this->conn->connect_error);
        }
    }

    // Method untuk menambah data
    public function addParticipant($name, $email) {
        $stmt = $this->conn->prepare("INSERT INTO participants (nama, email) VALUES (?, ?)");
        $stmt->bind_param("ss", $name, $email);
        if ($stmt->execute()) {
            echo "New Record created successfully";
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    }

    // Destructor untuk menutup koneksi
    public function __destruct() {
        $this->conn->close();
    }
}

// Penggunaan kelas Database untuk menambah data
$db = new Database();
$db->addParticipant('Lika', 'Lika@gmail.com');
$db->addParticipant('Rafli', 'Rafli@gmail.com');
?>
