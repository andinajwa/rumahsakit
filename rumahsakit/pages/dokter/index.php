<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Manajemen Dokter</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php?page=home">Home</a></li>
                    <li class="breadcrumb-item active">Dokter</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Dokter</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-sm btn-success float-right" data-toggle="modal"
                                data-target="#addModal">
                                Tambah
                            </button>
                        </div>
                    </div>
                    <!-- /.card-header -->

                    <!-- Modal Tambah Data Dokter -->
                    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="addModalLabel">Tambah Data Dokter</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="pages/dokter/tambahDokter.php" method="post">
                                        <div class="form-group">
                                            <label for="nama_dokter">Nama Dokter</label>
                                            <input type="text" class="form-control" id="nama_dokter" name="nama" maxlength="100" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="alamat">Alamat</label>
                                            <textarea class="form-control" rows="3" id="alamat" name="alamat" maxlength="255"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="no_hp">No. Hp</label>
                                            <input type="tel" class="form-control" id="no_hp" name="no_hp" maxlength="15" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="poli">Poli</label>
                                            <select class="form-control" id="poli" name="poli" required>
                                                <?php
                                                require 'config/koneksi.php';
                                                $query = "SELECT * FROM poli";
                                                $result = mysqli_query($mysqli, $query);
                                                while ($dataPoli = mysqli_fetch_assoc($result)) {
                                                ?>
                                                    <option value="<?php echo $dataPoli['id'] ?>">
                                                        <?php echo $dataPoli['nama_poli'] ?>
                                                    </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Tambah</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama Dokter</th>
                                    <th>Alamat</th>
                                    <th>No. Hp</th>
                                    <th>Poli</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $url = "http://localhost:3000/api/dokter";
                                $ch = curl_init();
                                curl_setopt($ch, CURLOPT_URL, $url);
                                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

                                $response = curl_exec($ch);
                                $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);

                                if (curl_errno($ch)) {
                                    echo "<tr><td colspan='6'>Error: " . curl_error($ch) . "</td></tr>";
                                } else if ($http_status !== 200) {
                                    echo "<tr><td colspan='6'>Error: Unable to fetch data, HTTP Status $http_status</td></tr>";
                                } else {
                                    $datas = json_decode($response, true);
                                    foreach ($datas as $data) {
                                ?>
                                    <tr>
                                        <td><?php echo $data['id'] ?></td>
                                        <td><?php echo $data['nama'] ?></td>
                                        <td style="white-space: pre-line;">
                                            <?php echo $data['alamat'] ?>
                                        </td>
                                        <td><?php echo $data['no_hp'] ?></td>
                                        <td><?php echo $data['nama_poli'] ?></td>
                                        <td>
                                            <button type='button' class='btn btn-sm btn-warning' data-toggle="modal"
                                                data-target="#editModal<?php echo $data['id'] ?>">Edit</button>
                                            <button type='button' class='btn btn-sm btn-danger' data-toggle="modal"
                                                data-target="#hapusModal<?php echo $data['id'] ?>">Hapus</button>
                                        </td>

                                        <!-- Modal Edit Data Dokter -->
                                        <div class="modal fade" id="editModal<?php echo $data['id'] ?>" tabindex="-1"
                                            role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Edit Data Dokter</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="pages/dokter/editDokter.php" method="post">
                                                            <input type="hidden" name="id" value="<?php echo $data['id'] ?>" required>
                                                            <div class="form-group">
                                                                <label for="nama">Nama Dokter</label>
                                                                <input type="text" class="form-control" id="nama"
                                                                    name="nama" value="<?php echo $data['nama'] ?>"
                                                                    required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="alamat">Alamat</label>
                                                                <textarea class="form-control" rows="3" id="alamat"
                                                                    name="alamat"><?php echo $data['alamat'] ?></textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="no_hp">No. Hp</label>
                                                                <input type="text" class="form-control" id="no_hp"
                                                                    name="no_hp" value="<?php echo $data['no_hp'] ?>"
                                                                    required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="poli">Poli</label>
                                                                <select class="form-control" id="poli" name="poli" required>
                                                                    <?php
                                                                    require 'config/koneksi.php';
                                                                    $query = "SELECT * FROM poli";
                                                                    $results = mysqli_query($mysqli, $query);
                                                                    while ($dataPoli = mysqli_fetch_assoc($results)) {
                                                                        $selected = ($dataPoli['id'] == $data['id_poli']) ? "selected" : "";
                                                                    ?>
                                                                        <option value="<?php echo $dataPoli['id'] ?>" <?php echo $selected ?>>
                                                                            <?php echo $dataPoli['nama_poli'] ?>
                                                                        </option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                            <button type="submit" class="btn btn-success">Simpan</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Modal Hapus Data Dokter -->
                                        <div class="modal fade" id="hapusModal<?php echo $data['id'] ?>" tabindex="-1"
                                            role="dialog" aria-labelledby="hapusModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Hapus Data Dokter</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="pages/dokter/hapusDokter.php" method="post">
                                                            <input type="hidden" name="id" value="<?php echo $data['id'] ?>" required>
                                                            <p>Apakah anda yakin akan menghapus data dokter <span class="font-weight-bold"><?php echo $data['nama'] ?></span>?</p>
                                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </tr>
                                <?php
                                    }
                                }
                                curl_close($ch);
                                ?>

                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->
