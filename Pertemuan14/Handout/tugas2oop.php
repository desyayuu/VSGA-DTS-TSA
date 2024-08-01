<?php
class Database {
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "dbpro";
    private $conn;

    public function __construct() {
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        if ($this->conn->connect_error) {
            die("Koneksi gagal: " . $this->conn->connect_error);
        }
    }

    public function getParticipantsSortedByName() {
        $sql = "SELECT * FROM participants ORDER BY nama ASC";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo $row["nama"] . " - " . $row["email"] . "<br>";
            }
        } else {
            echo "0 results";
        }
    }

    public function __destruct() {
        $this->conn->close();
    }
}

$db = new Database();
$db->getParticipantsSortedByName();
?>
