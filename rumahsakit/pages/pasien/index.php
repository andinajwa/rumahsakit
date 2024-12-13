<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Manajemen Pasien</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php?page=home">Home</a></li>
                    <li class="breadcrumb-item active">Pasien</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Pasien</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-sm btn-success float-right" data-toggle="modal"
                                data-target="#addModal">
                                Tambah
                            </button>
                        </div>
                    </div>
                    <!-- /.card-header -->

                    <!-- Modal Tambah Data Pasien -->
                    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="addModalLabel">Tambah Data Pasien</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="pages/pasien/tambahPasien.php" method="post">
                                        <div class="form-group">
                                            <label for="nama">Nama Pasien</label>
                                            <input type="text" class="form-control" id="nama" name="nama" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="alamat">Alamat</label>
                                            <textarea class="form-control" id="alamat" name="alamat" rows="3"
                                                required></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="no_ktp">No. KTP</label>
                                            <input type="text" class="form-control" id="no_ktp" name="no_ktp" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="no_hp">No. HP</label>
                                            <input type="text" class="form-control" id="no_hp" name="no_hp" required>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Tambah</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Tabel Data Pasien -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama Pasien</th>
                                    <th>Alamat</th>
                                    <th>No. KTP</th>
                                    <th>No. HP</th>
                                    <th>No. RM</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $url = "http://localhost:3000/api/pasien";
                                $ch = curl_init();
                                curl_setopt($ch, CURLOPT_URL, $url);
                                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                                $response = curl_exec($ch);

                                if (curl_errno($ch)) {
                                    echo "<tr><td colspan='7'>Error: " . curl_error($ch) . "</td></tr>";
                                } else {
                                    $datas = json_decode($response, true);
                                    if (isset($datas['data']) && is_array($datas['data'])) {
                                        foreach ($datas['data'] as $data) {
                                            ?>
                                            <tr>
                                                <td><?php echo $data['id'] ?></td>
                                                <td><?php echo $data['nama'] ?></td>
                                                <td><?php echo $data['alamat'] ?></td>
                                                <td><?php echo $data['no_ktp'] ?></td>
                                                <td><?php echo $data['no_hp'] ?></td>
                                                <td><?php echo $data['no_rm'] ?></td>
                                                <td>
                                                    <button type="button" class="btn btn-sm btn-warning"
                                                        data-toggle="modal"
                                                        data-target="#editModal<?php echo $data['id'] ?>">Edit</button>
                                                    <button type="button" class="btn btn-sm btn-danger"
                                                        data-toggle="modal"
                                                        data-target="#hapusModal<?php echo $data['id'] ?>">Hapus</button>
                                                </td>
                                            </tr>

                                            <!-- Modal Edit Data Pasien -->
                                            <div class="modal fade" id="editModal<?php echo $data['id'] ?>" tabindex="-1"
                                                role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Edit Data Pasien</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="pages/pasien/editPasien.php" method="post">
                                                                <input type="hidden" name="id"
                                                                    value="<?php echo $data['id'] ?>">
                                                                <div class="form-group">
                                                                    <label for="nama">Nama Pasien</label>
                                                                    <input type="text" class="form-control" id="nama"
                                                                        name="nama"
                                                                        value="<?php echo $data['nama'] ?>" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="alamat">Alamat</label>
                                                                    <textarea class="form-control" id="alamat"
                                                                        name="alamat" rows="3"
                                                                        required><?php echo $data['alamat'] ?></textarea>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="no_ktp">No. KTP</label>
                                                                    <input type="text" class="form-control" id="no_ktp"
                                                                        name="no_ktp"
                                                                        value="<?php echo $data['no_ktp'] ?>" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="no_hp">No. HP</label>
                                                                    <input type="text" class="form-control" id="no_hp"
                                                                        name="no_hp"
                                                                        value="<?php echo $data['no_hp'] ?>" required>
                                                                </div>
                                                                <button type="submit"
                                                                    class="btn btn-success">Simpan</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Modal Hapus Data Pasien -->
                                            <div class="modal fade" id="hapusModal<?php echo $data['id'] ?>"
                                                tabindex="-1" role="dialog" aria-labelledby="hapusModalLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Hapus Data Pasien</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="pages/pasien/hapusPasien.php" method="post">
                                                                <input type="hidden" name="id"
                                                                    value="<?php echo $data['id'] ?>">
                                                                <p>Apakah Anda yakin ingin menghapus data pasien
                                                                    <strong><?php echo $data['nama'] ?></strong>?</p>
                                                                <button type="submit"
                                                                    class="btn btn-danger">Hapus</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                    } else {
                                        echo "<tr><td colspan='7'>Data tidak ditemukan.</td></tr>";
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
    </div>
</div>
<!-- /.content -->
