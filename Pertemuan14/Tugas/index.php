<?php include 'logic.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Data Mahasiswa</h2>
        <?php if (isset($_GET['message'])): ?>
            <div class="alert alert-success" role="alert">
                <?php echo htmlspecialchars($_GET['message']); ?>
            </div>
        <?php endif; ?>

        <!-- Button to open modal for adding data -->
        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addModal">
            Add Data
        </button>

        <!-- Modal for adding data -->
        <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addModalLabel">Add Data Mahasiswa</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="logic.php">
                            <input type="hidden" name="action" value="add">
                            <div class="mb-3">
                                <label for="nim" class="form-label">NIM</label>
                                <input type="text" class="form-control" id="nim" name="nim" required>
                            </div>
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="nama" name="nama" required>
                            </div>
                            <div class="mb-3">
                                <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                                <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" required>
                            </div>
                            <div class="mb-3">
                                <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required>
                            </div>
                            <div class="mb-3">
                                <label for="jurusan" class="form-label">Jurusan</label>
                                <input type="text" class="form-control" id="jurusan" name="jurusan" required>
                            </div>
                            <div class="mb-3">
                                <label for="program_studi" class="form-label">Program Studi</label>
                                <input type="text" class="form-control" id="program_studi" name="program_studi" required>
                            </div>
                            <div class="mb-3">
                                <label for="ipk" class="form-label">IPK</label>
                                <input type="number" step="0.01" class="form-control" id="ipk" name="ipk" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Add Data</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Display data -->
        <table class="table table-striped table-bordered mt-4">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Tempat Lahir</th>
                    <th>Tanggal Lahir</th>
                    <th>Jurusan</th>
                    <th>Program Studi</th>
                    <th>IPK</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Read Data 
                $result = $mahasiswa->read();
                if ($result->num_rows > 0) {
                    $index = 1;
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>
                            <th scope='row'>{$index}</th>
                            <td>{$row['nim']}</td>
                            <td>{$row['nama']}</td>
                            <td>{$row['tempat_lahir']}</td>
                            <td>{$row['tanggal_lahir']}</td>
                            <td>{$row['jurusan']}</td>
                            <td>{$row['program_studi']}</td>
                            <td>{$row['ipk']}</td>
                            <td>
                                <a href='#' class='btn btn-warning btn-sm' data-bs-toggle='modal' data-bs-target='#updateModal' 
                                data-nim='{$row['nim']}' 
                                data-nama='{$row['nama']}' 
                                data-tempat_lahir='{$row['tempat_lahir']}' 
                                data-tanggal_lahir='{$row['tanggal_lahir']}' 
                                data-jurusan='{$row['jurusan']}' 
                                data-program_studi='{$row['program_studi']}' 
                                data-ipk='{$row['ipk']}'>Update</a>
                                <a href='#' class='btn btn-danger btn-sm' data-bs-toggle='modal' data-bs-target='#deleteModal' 
                                data-nim='{$row['nim']}'>Delete</a>
                            </td>
                        </tr>";
                        $index++;
                    }
                } else {
                    echo "<tr><td colspan='9'>Tidak ada data mahasiswa</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    
    <!-- Modal for update data -->
    <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateModalLabel">Update Data Mahasiswa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="logic.php">
                        <input type="hidden" name="action" value="update">
                        <div class="mb-3">
                            <label for="nim_update" class="form-label">NIM</label>
                            <input type="text" class="form-control" id="nim_update" name="nim" required>
                        </div>
                        <div class="mb-3">
                            <label for="nama_update" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="nama_update" name="nama" required>
                        </div>
                        <div class="mb-3">
                            <label for="tempat_lahir_update" class="form-label">Tempat Lahir</label>
                            <input type="text" class="form-control" id="tempat_lahir_update" name="tempat_lahir" required>
                        </div>
                        <div class="mb-3">
                            <label for="tanggal_lahir_update" class="form-label">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="tanggal_lahir_update" name="tanggal_lahir" required>
                        </div>
                        <div class="mb-3">
                            <label for="jurusan_update" class="form-label">Jurusan</label>
                            <input type="text" class="form-control" id="jurusan_update" name="jurusan" required>
                        </div>
                        <div class="mb-3">
                            <label for="program_studi_update" class="form-label">Program Studi</label>
                            <input type="text" class="form-control" id="program_studi_update" name="program_studi" required>
                        </div>
                        <div class="mb-3">
                            <label for="ipk_update" class="form-label">IPK</label>
                            <input type="number" step="0.01" class="form-control" id="ipk_update" name="ipk" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Update Data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for delete -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Delete Data Mahasiswa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="logic.php">
                        <input type="hidden" name="action" value="delete">
                        <input type="hidden" id="delete-nim" name="nim">
                        <p>Are you sure you want to delete this data?</p>
                        <button type="submit" class="btn btn-danger">Delete</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        var updateModal = document.getElementById('updateModal');
        updateModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget;
            var nim = button.getAttribute('data-nim');
            var nama = button.getAttribute('data-nama');
            var tempatLahir = button.getAttribute('data-tempat_lahir');
            var tanggalLahir = button.getAttribute('data-tanggal_lahir');
            var jurusan = button.getAttribute('data-jurusan');
            var programStudi = button.getAttribute('data-program_studi');
            var ipk = button.getAttribute('data-ipk');

            var modal = updateModal.querySelector('form');
            modal.querySelector('#nim_update').value = nim;
            modal.querySelector('#nama_update').value = nama;
            modal.querySelector('#tempat_lahir_update').value = tempatLahir;
            modal.querySelector('#tanggal_lahir_update').value = tanggalLahir;
            modal.querySelector('#jurusan_update').value = jurusan;
            modal.querySelector('#program_studi_update').value = programStudi;
            modal.querySelector('#ipk_update').value = ipk;
        });

        var deleteModal = document.getElementById('deleteModal');
        deleteModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget;
            var nim = button.getAttribute('data-nim');
            var modalBodyInput = deleteModal.querySelector('input[name="nim"]');
            modalBodyInput.value = nim;
        });
    </script>
</body>
</html>
