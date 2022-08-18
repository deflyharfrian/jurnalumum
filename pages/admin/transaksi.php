<?php
error_reporting(0);



?>
<script src="jsmod.js"></script>
<div class="row mb-2">
    <div class="col-sm-6">
        <h1 class="m-0">Transaksi</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Transaksi</li>
        </ol>
    </div><!-- /.col -->
</div><!-- /.row -->
</div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
    <div class="container-fluid">

        <div class="card">
            <div class="card-header bg-purple">
                <h3 class="card-title">Tabel Data Transaksi</h3>
            </div>
            <!-- /.card-header -->


            <div class="card-body">

                <form method="get" action="">

                    <table border="0">
                        <tr>
                            <td><label>Filter Berdasarkan:</label><br>

                                <select name="transaksi" width="300px" class="form-control" id="transaksi">
                                    <option value="">Pilih</option>
                                    <!-- <option value="1">Per Tanggal</option> -->
                                    <option value="2">Per Bulan</option>
                                    <option value="3">Per Tahun</option>
                                </select>


                            <td>
                            <td>
                                <div id="form-tanggal">
                                    <label>Tanggal</label><br>
                                    <input type="text" width="250px" class="form-control datepicker input-tanggal" name="tanggal" />
                                </div>
                            <td>
                            <td>
                                <div id="form-bulan">
                                    <label>Bulan</label><br>

                                    <select name="bulan" class="form-control" width="250px">
                                        <option value="">Pilih</option>
                                        <option value="1">Januari</option>
                                        <option value="2">Februari</option>
                                        <option value="3">Maret</option>
                                        <option value="4">April</option>
                                        <option value="5">Mei</option>
                                        <option value="6">Juni</option>
                                        <option value="7">Juli</option>
                                        <option value="8">Agustus</option>
                                        <option value="9">September</option>
                                        <option value="10">Oktober</option>
                                        <option value="11">November</option>
                                        <option value="12">Desember</option>
                                    </select>

                                </div>
                            <td>
                                <div id="form-tahun">
                                    <label>Tahun</label><br>

                                    <select name="tahun" class="form-control" width="250px">
                                        <option value="">Pilih</option>
                                        <?php
                                        $query = "SELECT YEAR(tanggal) AS tahun FROM tb_transaksi  GROUP BY YEAR(tanggal)"; // Tampilkan tahun sesuai di tabel transaksi
                                        $sql = mysqli_query($con, $query); // Eksekusi/Jalankan query dari variabel $query
                                        while ($data = mysqli_fetch_array($sql)) { // Ambil semua data dari hasil eksekusi $sql
                                            echo '<option value="' . $data['tahun'] . '">' . $data['tahun'] . '</option>';
                                        }
                                        ?>
                                    </select>

                                </div>
                            <td>

                                <label>&nbsp;</label><br>
                                <button type="submit" class="btn btn-warning text-white"><i class="fa fa-search" aria-hidden="true"></i> Tampilkan</button>
                                <a href="index.php">
                                    <div class="btn btn-danger"> <i class="fa fa-undo" aria-hidden="true"></i> Reset Filter</div>
                                </a>
                            </td>
                        </tr>
                    </table>
                </form>
                <?php



                if (isset($_GET['transaksi']) && !empty($_GET['transaksi'])) { // Cek apakah user telah memilih transaksi dan klik tombol tampilkan
                    $transaksi = $_GET['transaksi']; // Ambil data filder yang dipilih user
                    if ($transaksi == '1') { // Jika transaksi nya 1 (per tanggal)
                        $tgl = date('d-m-Y', strtotime($_GET['tanggal']));
                        echo '<b>Data Kondisi Lingkungan Tanggal ' . $tgl . '</b><br /><br />';
                        echo '<button type="button" class="btn text-white btn-success" data-toggle="modal" data-target="#exampleModal">
    <i class="fas fa-plus    "></i> Tambah Data 
  </button>
  <a href="proses.php?transaksi=1&tanggal=' . $_GET['tanggal'] . '"><button class="btn text-white btn-danger" >
  <i class="fas fa-print    "></i> Cetak pdf
</button></a> ';
                        $query = "SELECT * FROM tb_transaksi WHERE tanggal='" . $_GET['tanggal'] . "'"; // Tampilkan data transaksi sesuai tanggal yang diinput oleh user pada transaksi
                    } else if ($transaksi == '2') { // Jika filter nya 2 (per bulan)
                        $nama_bulan = array('', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
                        echo '<b>Data Transaksi Bulan ' . $nama_bulan[$_GET['bulan']] . ' ' . $_GET['tahun'] . '</b><br /><br />';
                        if ($_SESSION['level'] == 'admin') {

                            echo '   <button type="button" class="btn bg-purple" data-toggle="modal" data-target="#mdltambahtransaksi">
                            <i class="fa fa-plus"></i> Tambah Transaksi
                        </button> <a href="proses.php?filter=2&bulan=' . $_GET['bulan'] . '&tahun=' . $_GET['tahun'] . '"><button class="btn text-white btn-danger" >
<i class="fas fa-print    "></i> Cetak pdf
</button></a>';
                        }
                        $query = "SELECT * FROM tb_transaksi
                        LEFT JOIN tb_rekening AS rek ON tb_transaksi.id_rek = rek.id_rek
                        LEFT JOIN tb_user AS USER ON tb_transaksi.user_id = user.id_user
                        LEFT JOIN tb_kategori AS kateg ON tb_transaksi.id_kategori = kateg.kode_kategori WHERE MONTH(tanggal)='" . $_GET['bulan'] . "' AND YEAR(tanggal)='" . $_GET['tahun'] . "'"; // Tampilkan data transaksi sesuai bulan dan tahun yang diinput oleh user pada filter
                    } else { // Jika filter nya 3 (per tahun)
                        echo '<b>Data Kondisi Lingkungan Tahun ' . $_GET['tahun'] . '</b><br /><br />';
                        if ($_SESSION['level'] == 'admin') {

                            echo '<button type="button" class="btn bg-purple" data-toggle="modal" data-target="#mdltambahtransaksi">
                            <i class="fa fa-plus"></i> Tambah Transaksi
                        </button> <a href="proses.php?filter=3&tahun=' . $_GET['tahun'] . '"><button class="btn text-white btn-danger" >
<i class="fas fa-file-pdf    "></i> Cetak pdf
</button></a> ';
                        }
                        $query = "SELECT * FROM tb_transaksi
                        LEFT JOIN tb_rekening AS rek ON tb_transaksi.id_rek = rek.id_rek
                        LEFT JOIN tb_user AS USER ON tb_transaksi.user_id = user.id_user
                        LEFT JOIN tb_kategori AS kateg ON tb_transaksi.id_kategori = kateg.kode_kategori WHERE YEAR(tanggal)='" . $_GET['tahun'] . "' "; // Tampilkan data transaksi sesuai tahun yang diinput oleh user pada filter
                    }
                } else { // Jika user tidak mengklik tombol tampilkan
                    echo '<b>Semua Data Transaksi</b><br /><br />';



                    echo ' <button type="button" class="btn bg-purple" data-toggle="modal" data-target="#mdltambahtransaksi">
                        <i class="fa fa-plus"></i> Tambah Transaksi
                    </button> <a href="proses.php"><button class="btn text-white btn-danger" >
<i class="fas fa-file-pdf   "></i> Cetak pdf
</button></a>  ';

                    $tglnow = date('Y-m-d');
                    $query = "SELECT * FROM tb_transaksi
                    LEFT JOIN tb_rekening AS rek ON tb_transaksi.id_rek = rek.id_rek
                    LEFT JOIN tb_user AS USER ON tb_transaksi.user_id = user.id_user
                    LEFT JOIN tb_kategori AS kateg ON tb_transaksi.id_kategori = kateg.kode_kategori"; // Tampilkan semua data transaksi diurutkan berdasarkan tanggal
                }
                ?>
                <br><br>


                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <!---tampilan tabel perlu dirubah, ini terlalu nyempit--->
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Keterangan</th>
                            <th>Akun</th>
                            <th>Rekening</th>
                            <th>Debit (Rp)</th>
                            <th>Kredit (Rp)</th>
                            <th>Saldo Awal (Rp)</th>
                            <th>Saldo Akhir (Rp)</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!--- Tampilkan Transaksi --->
                        <?php
                        $i = 1;
                        $sql = mysqli_query($con, $query);
                        while ($data = mysqli_fetch_array($sql)) {


                        ?>
                            <tr>
                                <td><?= $data['id_transaksi'] ?></td>
                                <td><?= $data['tanggal'] ?></td>
                                <td><?= $data['keterangan'] ?></td>
                                <td><?= $data['nama'] ?></td>
                                <td><?= $data['no_rek'] . " | " . $data['nama_rek'] ?></td>
                                <td><?= "Rp " . number_format($data['debit'], 2, ',', '.'); ?></td>
                                <td><?= "Rp " . number_format($data['kredit'], 2, ',', '.'); ?></td>
                                <td><?= "Rp " . number_format($data['saldo_awal'], 2, ',', '.');  ?></td>
                                <td><?= "Rp " . number_format($data['saldo_akhir'], 2, ',', '.'); ?></td>
                                <td>
                                    <!--- <a onclick="return confirm('yakin ingin menghapus data ini?');" href="hapus_kategori.php?id_transaksi=<?= $data['id_transaksi'] ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>-->
                                    <a data-toggle="modal" data-target="#mdledittransaksi<?= $data['id_transaksi'] ?>" href="#mdledittransaksi<?= $data['id_transaksi'] ?>" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                    <button class="btn btn-success"><i class="fa fa-print"></i></button>
                                </td>
                            </tr>
                        <?php  } ?>
                    </tbody>

                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

        <!-- Modal TAMBAH -->
        <div class="modal fade" id="mdltambahtransaksi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-plus"></i> Tambah Transaksi Baru</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action='tambah_transaksi.php'>

                            <!-- TANGGAL -->
                            <div class="form-group">
                                <label>Tanggal</label>
                                <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                    <input type="text" name="tanggal" value="<?= date('Y-m-d') ?>" class="form-control datetimepicker-input" placeholder="Tanggal Transaksi" data-target="#reservationdate" />
                                    <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Keterangan</label>
                                <input type="text" class="form-control" name="keterangan" placeholder="Keterangan">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1"> Kategori</label>
                                <select name="kategori" class="form-control" id="id_kategori">
                                    <option value="-">--pilih kategori--</option>
                                    <?php $sql_kategori = mysqli_query($con, "SELECT * FROM tb_kategori");
                                    while ($data_kategori = mysqli_fetch_array($sql_kategori)) { ?>
                                        <option value="<?= $data_kategori['kode_kategori']; ?>"><?php echo $data_kategori['kode_kategori'] . " - " . $data_kategori['nama']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Rekening</label>
                                <select name="rekening" class="form-control" id="id_rek">
                                    <option value="-">--pilih rekening--</option>
                                    <?php $sql_rek = mysqli_query($con, "SELECT * FROM tb_rekening");
                                    while ($data_rek = mysqli_fetch_array($sql_rek)) { ?>
                                        <option value="<?= $data_rek['id_rek'] ?>" data-saldo="<?= $data_rek['nominal'] ?>"><?php echo $data_rek['no_rek'] . " | " . $data_rek['nama_rek']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Debit/Kredit</label>
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" name="debit_kredit" id="debit" value="debit">
                                    <label class="form-check-label" for="debit">
                                        Debit
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" name="debit_kredit" id="kredit" value="kredit">
                                    <label class="form-check-label" for="kredit" checked>
                                        Kredit
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Saldo Awal (Rp)</label>
                                <input type="text" class="form-control" id="nominal" name="saldo_awal" placeholder="Saldo Awal" readonly />
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Nominal (Rp)</label>
                                <input type="text" class="form-control" name="saldo_akhir" placeholder="Nominal">
                            </div>
                            <input type="text" class="form-control" hidden name="tanggal_post" value="<?= date('Y-m-d H:i:s') ?>" placeholder="Nama Kategori">


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" name="ok" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <!-- =-============================================================ -->





        <?php $sql_edit = mysqli_query($con, "SELECT * FROM tb_transaksi
                        LEFT JOIN tb_rekening AS rek ON tb_transaksi.id_rek = rek.id_rek
                        LEFT JOIN tb_user AS USER ON tb_transaksi.user_id = user.id_user
                        LEFT JOIN tb_kategori AS kateg ON tb_transaksi.id_kategori = kateg.kode_kategori");
        while ($data2 = mysqli_fetch_array($sql_edit)) {


        ?>
            <!-- Modal EDIT -->
            <div class="modal fade" id="mdledittransaksi<?= $data2['id_transaksi'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-primary">
                            <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-edit"></i> Edit Data Transaksi</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="edit_transaksi.php?id_transaksi=<?= $data2['id_transaksi'] ?>">

                                <div class="form-group">
                                    <label for="exampleInputPassword1">No.</label>
                                    <input type="text" class="form-control" name="no" value="<?= $data2['id_transaksi'] ?>" placeholder="NO" readonly>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Keterangan</label>
                                    <input type="text" class="form-control" name="keterangan" value="<?= $data2['keterangan'] ?>" placeholder="Keterangan">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1"> Kategori</label>
                                    <select name="kategori" class="form-control" id="id_kategori" value="<?= $data2['nama'] ?>">
                                        <?php $sql_kategori = mysqli_query($con, "SELECT * FROM tb_kategori");
                                        while ($data_kategori = mysqli_fetch_array($sql_kategori)) { ?>
                                            <option value="<?= $data_kategori['kode_kategori']; ?>"><?php echo $data_kategori['nama']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" name="ok2" class="btn btn-primary">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>




        <?php } ?>
        <script type="text/javascript">
            $('#id_rek').on('click', function() {
                const saldo = $('#id_rek option:selected').data('saldo');

                $('#nominal').val(saldo);
            });
        </script>