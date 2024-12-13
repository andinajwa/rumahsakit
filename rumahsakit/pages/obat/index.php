<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Manajemen Obat</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php?page=home">Home</a></li>
                    <li class="breadcrumb-item active">Obat</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Obat</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-sm btn-success float-right" data-toggle="modal"
                                data-target="#addModal">
                                Tambah
                            </button>

                            <!-- Modal Tambah Data Obat -->
                            <div class="modal fade" id="addModal" tabindex="-1" role="dialog"
                                aria-labelledby="addModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="addModalLabel">Tambah Data Obat</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="pages/obat/tambahObat.php" method="post">
                                                <div class="form-group">
                                                    <label for="nama_obat">Nama Obat</label>
                                                    <input type="text" class="form-control" id="nama_obat"
                                                        name="nama_obat" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="kemasan">Kemasan</label>
                                                    <input type="text" class="form-control" id="kemasan"
                                                        name="kemasan" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="harga">Harga</label>
                                                    <input type="number" class="form-control" id="harga"
                                                        name="harga" step="0.01" required>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Tambah</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- Card Body Table -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama Obat</th>
                                    <th>Kemasan</th>
                                    <th>Harga</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>

                                <!-- Mengambil Data Obat dari API -->
                                <?php
                                $url = "http://localhost:3000/api/obat";
                                $ch = curl_init();
                                curl_setopt($ch, CURLOPT_URL, $url);
                                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                                $response = curl_exec($ch);

                                if (curl_errno($ch)) {
                                    echo "Error: " . curl_error($ch);
                                } else {
                                    $datas = json_decode($response, true);
                                    if (isset($datas['data'])) {
                                        foreach ($datas['data'] as $data) {
                                ?>
                                            <tr>
                                                <td><?php echo $data['id']; ?></td>
                                                <td><?php echo $data['nama_obat']; ?></td>
                                                <td><?php echo $data['kemasan']; ?></td>
                                                <td><?php echo $data['harga']; ?></td>
                                                <td>
                                                    <button class="btn btn-warning btn-sm" data-toggle="modal"
                                                        data-target="#editModal<?php echo $data['id']; ?>">
                                                        Edit
                                                    </button>
                                                    <button class="btn btn-danger btn-sm" data-toggle="modal"
                                                        data-target="#hapusModal<?php echo $data['id']; ?>">
                                                        Hapus
                                                    </button>
                                                </td>
                                            </tr>

                                            <!-- Modal Edit Data -->
                                            <div class="modal fade" id="editModal<?php echo $data['id']; ?>" tabindex="-1"
                                                role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5>Edit Data Obat</h5>
                                                            <button type="button" class="close"
                                                                data-dismiss="modal" aria-label="Close">
                                                                <span>&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="pages/obat/editObat.php" method="POST">
                                                                <input type="hidden" name="id"
                                                                    value="<?php echo $data['id']; ?>">
                                                                <div class="form-group">
                                                                    <label for="nama_obat">Nama Obat</label>
                                                                    <input type="text" class="form-control"
                                                                        name="nama_obat" value="<?php echo $data['nama_obat']; ?>"
                                                                        required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="kemasan">Kemasan</label>
                                                                    <input type="text" class="form-control"
                                                                        name="kemasan" value="<?php echo $data['kemasan']; ?>"
                                                                        required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="harga">Harga</label>
                                                                    <input type="number" class="form-control"
                                                                        name="harga" step="0.01"
                                                                        value="<?php echo $data['harga']; ?>" required>
                                                                </div>
                                                                <button type="submit" class="btn btn-success mt-2">Simpan</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        <?php
                                        }
                                    }
                                }
                                ?>

                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
</div>
