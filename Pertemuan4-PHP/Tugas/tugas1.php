<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas 1</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <?php 
        $produk1 = [
            "nama_produk"=> "TV", 
            "jumlah_produk"=> 3, 
            "harga" => 10000000, 
            "status" => 'Tersedia'
        ]; 

        $produk2 = [
            "nama_produk"=> "Kipas Angin", 
            "jumlah_produk"=> 5, 
            "harga" => 150000, 
            "status" => 'Tersedia'
        ]; 

        $produk3 = [
            "nama_produk"=> "Printer", 
            "jumlah_produk"=> 0, 
            "harga" => 1200000, 
            "status" => 'Tidak Tersedia'
        ]; 

        $barang = [$produk1, $produk2, $produk3];
        function hitungNilaiTotal($jumlah_produk, $harga){
            return $nilaiTotal= $jumlah_produk*$harga;
        } 
    ?>
    <div style="padding: 50px">
    <h2 style="justify-content:center; font-size:20px">Laporan Inventaris</h2>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Produk</th>
                    <th scope="col">Jumlah Produk</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Total Nilai</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>

            <tbody>
                <?php
            foreach ($barang as $key =>$index) {
                $total_nilai = hitungNilaiTotal($index["jumlah_produk"], $index["harga"]);
                echo '<tr>
                    <th scope="row">'.($key + 1).'</th>
                    <td>'.$index["nama_produk"].'</td>
                    <td>'.$index["jumlah_produk"].'</td>
                    <td>Rp '.number_format($index["harga"], 0, ',', '.').'</td>
                    <td>Rp '.number_format($total_nilai, 0, ',', '.').'</td>
                    <td>'.$index["status"].'</td>
                </tr>';
            }
            ?>
            </tbody>
        </table>
        </div>;
</body>
</html>