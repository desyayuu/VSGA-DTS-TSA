<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status Kelulusan Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style>
        .centered-container {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            padding:50px;
        }
        .form-container {
            width: 50%;
            background-color: #800080;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="centered-container">
        <div class="form-container">
            <h2 class="text-white">Input Data Mahasiswa</h2>
            <form method="post" action="">
                <div class="mb-3">
                    <label for="nim" class="form-label text-white">NIM</label>
                    <input type="text" class="form-control" id="nim" name="nim" required>
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label text-white">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" required>
                </div>
                <div class="mb-3">
                    <label for="nilai_q1" class="form-label text-white">Nilai Quiz 1</label>
                    <input type="number" step="any" class="form-control" id="nilai_q1" name="nilai_q1" required>
                </div>
                <div class="mb-3">
                    <label for="nilai_q2" class="form-label text-white">Nilai Quiz 2</label>
                    <input type="number" step="any" class="form-control" id="nilai_q2" name="nilai_q2" required>
                </div>
                <div class="mb-3">
                    <label for="nilai_uts" class="form-label text-white">Nilai UTS</label>
                    <input type="number" step="any" class="form-control" id="nilai_uts" name="nilai_uts" required>
                </div>
                <div class="mb-3">
                    <label for="nilai_uas" class="form-label text-white">Nilai UAS</label>
                    <input type="number" step="any" class="form-control" id="nilai_uas" name="nilai_uas" required>
                </div>
                <div class="mb-3">
                    <label for="nilai_proyek" class="form-label text-white">Nilai Proyek</label>
                    <input type="number" step="any" class="form-control" id="nilai_proyek" name="nilai_proyek" required>
                </div>
                <button type="submit" class="btn btn-primary">Cek Kelulusan</button>
                <button type="button" class="btn btn-secondary" onclick="resetForm()">Reset</button>
            </form>
        </div>
        
        <?php 
            if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["nim"]) && isset($_POST["nama"]) && isset($_POST["nilai_q1"]) && isset($_POST["nilai_q2"]) && isset($_POST["nilai_uts"]) && isset($_POST["nilai_uas"]) && isset($_POST["nilai_proyek"])){
                $nim = $_POST["nim"];
                $nama = $_POST["nama"];
                $nilai_q1 = $_POST["nilai_q1"];
                $nilai_q2 = $_POST["nilai_q2"];
                $nilai_uts = $_POST["nilai_uts"];
                $nilai_uas = $_POST["nilai_uas"];
                $nilai_proyek = $_POST["nilai_proyek"];

                function hitungNilaiAkhir($q1, $q2, $uts, $uas, $proyek) {
                    return ($q1 * 0.1) + ($q2 * 0.1) + ($uts * 0.1) + ($uas * 0.2) + ($proyek * 0.5);
                }

                $nilai_akhir = hitungNilaiAkhir($nilai_q1, $nilai_q2, $nilai_uts, $nilai_uas, $nilai_proyek);
                $status = $nilai_akhir > 60 ? "Lulus" : "Tidak Lulus";

                echo '<div id="hasil" class="form-container">';
                echo "<h2 class='text-white'>Hasil Perhitungan</h2>";
                echo "<p class='text-white'>NIM: $nim</p>";
                echo "<p class='text-white'>Nama: $nama</p>";
                echo "<p class='text-white'>Nilai Akhir: $nilai_akhir</p>";
                echo "<p class='text-white'>Status: $status</p>";
                echo '</div>';
            }
        ?>
    </div>

    <script>
        function resetForm() {
            document.querySelector('form').reset();
            const hasilDiv = document.getElementById('hasil');
            if (hasilDiv) {
                hasilDiv.style.display = 'none';
            }
        }
    </script>
</body>
</html>
