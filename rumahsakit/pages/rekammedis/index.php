<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Rekam Medis</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php?page=home">Home</a></li>
                    <li class="breadcrumb-item active">Rekam Medis</li>
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
                        <h3 class="card-title">Daftar Riwayat Pasien</h3>

                        <div class="card-tools">
                            <!-- Modal Tambah Data Pasien -->

                        </div>
                    </div>
                    <!-- /.card-header -->


                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal Periksa</th>
                                    <th>Nama Pasien</th>
                                    <th>Keluhan</th>
                                    <th>catatan</th>
                                    <th>obat</th>
                                    <th>Nama Dokter</th>
                                    <th>Poli</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $nomor = 1;
                                require 'config/koneksi.php';
                                $sql = "SELECT 
                                                pasien.nama AS nama_pasien,
                                                pasien.no_rm AS no_rekam_medis,
                                                daftar_poli.keluhan,
                                                periksa.tgl_periksa,
                                                periksa.catatan,
                                                periksa.biaya_periksa,
                                                dokter.nama AS nama_dokter,
                                                poli.nama_poli AS poli,
                                                jadwal.mulai,
                                                detail_periksa.id_obat,
                                                obat.nama_obat
                                            FROM 
                                                detail_periksa
                                            INNER JOIN periksa ON detail_periksa.id_periksa = periksa.id
                                            INNER JOIN obat ON detail_periksa.id_obat = obat.id
                                            INNER JOIN daftar_poli ON periksa.id_daftar_poli = daftar_poli.id
                                            INNER JOIN pasien ON daftar_poli.id_pasien = pasien.id
                                            INNER JOIN jadwal ON daftar_poli.id_jadwal = jadwal.id
                                            INNER JOIN dokter ON jadwal.id_dokter = dokter.id
                                            INNER JOIN poli ON dokter.id_poli = poli.id
                                            
                                            WHERE 
                                                pasien.id = $idPasien
                                            ORDER BY 
                                                periksa.tgl_periksa DESC";

                                $results = mysqli_query($mysqli, $sql);
                                while ($datas = mysqli_fetch_assoc($results)) {
                                    # code...
                                ?>
                                    <tr>
                                        <td><?php echo $nomor++; ?></td>
                                        <td><?php echo $datas['tgl_periksa'] ?></td>
                                        <td><?php echo $datas['nama_pasien'] ?></td>
                                        <td><?php echo $datas['keluhan'] ?></td>
                                        <td style="white-space: pre-line;"><?php echo $datas['catatan'] ?></td>
                                        <td style="white-space: pre-line;"><?php echo $datas['nama_obat'] ?></td>
                                        <td><?php echo $datas['nama_dokter'] ?></td>
                                        <td><?php echo $datas['poli'] ?></td>
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