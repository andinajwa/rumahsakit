<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Jadwal Periksa</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php?page=home">Home</a></li>
                    <li class="breadcrumb-item active">Jadwal Periksa</li>
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
                        <h3 class="card-title">Daftar Jadwal Periksa</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-sm btn-success float-right" data-toggle="modal"
                                data-target="#addModal">
                                Tambah Jadwal
                            </button>
                            <!-- Modal Tambah Data Jadwal Periksa -->
                            <div class="modal fade" id="addModal" tabindex="-1" role="dialog"
                                aria-labelledby="addModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="addModalLabel">Tambah Jadwal Periksa</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- Form tambah data jadwal disini -->
                                            <form action="pages/jadwalPeriksa/tambahJadwal.php" method="post">
                                                <div class="form-group">
                                                    <label for="hari">tanggal periksa</label>
                                                    <input type="datetime-local" class="form-control" name="tanggal_periksa" id="tanggal-periksa" min="">
                                                </div>
                                                <button type="submit" class="btn btn-success">Tambah</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->


                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama Dokter</th>
                                    <th>Hari</th>
                                    <th>Tanggal</th>
                                    <th>Jam Mulai</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>

                                <!-- TAMPILKAN DATA PASIEN DI SINI -->
                                <?php
                                $no = 1;
                                require 'config/koneksi.php';

                                function getHariIndonesia($tanggal)
                                {
                                    $hariInggris = date('l', strtotime($tanggal));
                                    $hariIndonesia = [
                                        'Sunday' => 'Minggu',
                                        'Monday' => 'Senin',
                                        'Tuesday' => 'Selasa',
                                        'Wednesday' => 'Rabu',
                                        'Thursday' => 'Kamis',
                                        'Friday' => 'Jumat',
                                        'Saturday' => 'Sabtu'
                                    ];
                                    return $hariIndonesia[$hariInggris];
                                }

                                $query = "SELECT jadwal.id, jadwal.id_dokter, jadwal.mulai, 
                                jadwal.status, dokter.id AS idDokter, dokter.nama, 
                                dokter.alamat, dokter.no_hp, dokter.id_poli, poli.id AS idPoli, poli.nama_poli, poli.keterangan 
                                FROM jadwal INNER JOIN dokter ON jadwal.id_dokter = dokter.id INNER JOIN poli ON 
                                dokter.id_poli = poli.id WHERE id_poli = '$id_poli' AND dokter.id = '$id_dokter'";
                                $result = mysqli_query($mysqli, $query);

                                while ($data = mysqli_fetch_assoc($result)) {
                                    $hari = getHariIndonesia($data['mulai']);
                                    $tanggal = date('d-m-Y', strtotime($data['mulai'])); // Format tanggal
                                    $jamMulai = date('H:i', strtotime($data['mulai']));
                                ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $data['nama'] ?></td>
                                        <td><?php echo $hari ?></td>
                                        <td><?php echo $tanggal ?></td>
                                        <td><?php echo $jamMulai ?></td>
                                        <td>
                                            <?php
                                            if ($data['status'] == '0') {
                                                echo 'Nonaktif';
                                            } else if ($data['status'] == '1') {
                                                echo 'Aktif';
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            if ($data['status'] == '0') {
                                            ?>
                                                <a href="pages/jadwalPeriksa/ubahStatus.php?id=<?php echo $data['id'] ?>&status=<?php echo $data['status'] ?>" class="btn btn-primary">Aktif</a>
                                            <?php } else if ($data['status'] == '1') { ?>
                                                <a href="pages/jadwalPeriksa/ubahStatus.php?id=<?php echo $data['id'] ?>&status=<?php echo $data['status'] ?>" class="btn btn-secondary">Nonaktif</a>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                <?php } ?>

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