<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Pendaftaran Poli</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Daftar Poli</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-4">
            <div class="card card-warning">
                <div class="card-header">
                    <h3 class="card-title">Daftar Poli</h3>
                </div>
                <div class="card-body">
                    <form action="pages/daftarPoli/daftarPoli.php" method="post">
                        <div class="form-group mb-3">
                            <label for="no_rm font-weight-bold">No Rekam Medis</label>
                            <input type="text" class="form-control" name="no_rm"
                                value="<?php echo $_SESSION['no_rm'] ?>" readonly required>
                        </div>
                        <div class="form-group">
                            <label for="poli">Pilih Poli</label>
                            <select class="form-control" id="poli" name="poli" required>
                                <option value="" selected>silahkan pilih poli</option>
                                <?php
                                require 'config/koneksi.php';
                                $queryPoli = "SELECT * FROM poli";
                                $resultPoli = mysqli_query($mysqli, $queryPoli);
                                while ($dataPoli = mysqli_fetch_assoc($resultPoli)) {
                                ?>
                                    <option value="<?php echo $dataPoli['id'] ?>">
                                        <?php echo $dataPoli['nama_poli'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="no_rm font-weight-bold">Pilih Jadwal</label>
                            <select class="form-control" id="jadwal" name="jadwal" required>
                                <?php
                                require 'config/koneksi.php';
                                // $queryJadwal = "SELECT * FROM jadwal_periksa";
                                $queryJadwal = "SELECT * FROM jadwal";
                                $resultJadwal = mysqli_query($mysqli, $queryJadwal);
                                while ($dataPoli = mysqli_fetch_assoc($resultJadwal)) {
                                ?>
                                    <!-- <option value="<?php echo $dataPoli['id'] ?>">
                                        <?php
                                        // echo "$dataPoli[hari] ( $dataPoli[jam_mulai] '-' $dataPoli[jam_selesai] ) " 
                                        // echo "$dataPoli[mulai]" 
                                        ?>
                                    </option> -->
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="keluhan">Keluhan</label>
                            <textarea class="form-control" rows="3" id="keluhan" name="keluhan" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-block btn-primary">
                            Daftar
                        </button>
                    </form>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <div class="col-md-8">
            <div class="card card-warning">
                <div class="card-header">
                    <h3 class="card-title">Riwayat Daftar Poli</h3>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Poli</th>
                                <th>Dokter</th>
                                <th>Hari</th>
                                <th>Tanggal</th>
                                <th>mulai</th>
                                <th>Antrian</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            <!-- TAMPILKAN DATA OBAT DI SINI -->
                            <?php
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

                            $no = 1;
                            // $queryObat = "SELECT daftar_poli.id as idDaftarPoli, poli.nama_poli, dokter.nama, jadwal.hari, jadwal_periksa.jam_mulai, jadwal_periksa.jam_selesai, daftar_poli.no_antrian FROM daftar_poli INNER JOIN jadwal_periksa ON daftar_poli.id_jadwal = jadwal_periksa.id INNER JOIN dokter ON jadwal_periksa.id_dokter = dokter.id INNER JOIN poli ON dokter.id_poli = poli.id WHERE daftar_poli.id_pasien = '$idPasien'";
                            $queryObat = "SELECT daftar_poli.id as idDaftarPoli, poli.nama_poli, dokter.nama, jadwal.mulai, daftar_poli.no_antrian FROM daftar_poli INNER JOIN jadwal ON daftar_poli.id_jadwal = jadwal.id INNER JOIN dokter ON jadwal.id_dokter = dokter.id INNER JOIN poli ON dokter.id_poli = poli.id WHERE daftar_poli.id_pasien = '$idPasien'";
                            $resultObat = mysqli_query($mysqli, $queryObat);

                            while ($data = mysqli_fetch_assoc($resultObat)) {
                                $hari = getHariIndonesia($data['mulai']);
                                $tanggal = date('d-m-Y', strtotime($data['mulai'])); // Format tanggal
                                $jamMulai = date('H:i', strtotime($data['mulai']));
                            ?>
                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $data['nama_poli'] ?></td>
                                    <td><?php echo $data['nama'] ?></td>
                                    <td><?php echo $hari ?></td>
                                    <td><?php echo $tanggal ?></td>
                                    <td><?php echo $jamMulai ?></td>
                                    <td><?php echo $data['no_antrian'] ?></td>
                                    <td>
                                        <a href="detailDaftarPoli.php?id=<?php echo $data['idDaftarPoli'] ?>"
                                            class='btn btn-sm btn-primary edit-btn'>Detail</a>
                                    </td>
                                </tr>
                            <?php } ?>

                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>
</section>