<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas 2</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style>
        .centered-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 50vh;
            flex-direction: column;
            margin-top:200px;
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
        <h2 style="align-items:center; font-size:20px">Menghitung Luas, Keliling, dan Panjang Diagonal Persegi Panjang</h2>
        <div class="form-container">
            <h5 class="text-white">Masukkan Panjang dan Lebar</h5>
            <form method="post" action="">
                <div class="mb-3">
                    <label for="lebar" class="form-label text-white">Lebar</label>
                    <input type="number" step="any" class="form-control" id="lebar" name="lebar" required>
                </div>
                <div class="mb-3">
                    <label for="panjang" class="form-label text-white">Panjang</label>
                    <input type="number" class="form-control" id="panjang" name="panjang" required>
                </div>
                <button type="submit" class="btn btn-primary">Hitung</button>
                <button type="button" step="any" class="btn btn-secondary" onclick="resetForm()">Reset</button>
            </form>
        </div>
        
        <?php 
            if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["panjang"]) && isset($_POST["lebar"])){
                $panjang = $_POST["panjang"]; 
                $lebar = $_POST["lebar"]; 

                function hitungLuas($panjang, $lebar){
                    return $panjang * $lebar;
                }

                function hitungKeliling($panjang, $lebar){ 
                    return 2 * ($panjang + $lebar);
                }
            
                function hitungDiagonal($panjang, $lebar){
                    return sqrt(($panjang ** 2) + ($lebar ** 2));
                }
                
                $luas = hitungLuas($panjang, $lebar);
                $keliling = hitungKeliling($panjang, $lebar);
                $diagonal = hitungDiagonal($panjang, $lebar);
                
                echo '<div id="hasil" class="form-container">';
                echo "<h5 class='text-white'>Hasil Perhitungan Persegi Panjang</h5>";
                echo "<p class='text-white'>Panjang: $panjang satuan</p>";
                echo "<p class='text-white'>Lebar: $lebar satuan</p>";
                echo "<p class='text-white'>Luas: $luas satuan persegi</p>";
                echo "<p class='text-white'>Keliling: $keliling satuan</p>";
                echo "<p class='text-white'>Panjang Diagonal: " . number_format($diagonal, 2, ',', '.') . " satuan</p>";
                echo '</div>';
            }
        ?>
    </div>

    <script>
        function resetForm() {
            document.querySelector('form').reset();
            document.getElementById('hasil').style.display = 'none';
        }
    </script>
</body>
</html>
