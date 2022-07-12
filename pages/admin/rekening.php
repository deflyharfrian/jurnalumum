<?php
error_reporting(0);


?>

<div class="row mb-2">
    <div class="col-sm-6">
        <h1 class="m-0">Rekening</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Rekening</li>
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
                <h3 class="card-title">Tabel Data Rekening</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <button type="button" class="btn bg-purple mb-3" data-toggle="modal" data-target="#mdltambah_rekening">
                    <i class="fa fa-plus"></i> Tambah Rekening
                </button>

                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>No Rekening</th>
                            <th>Nama Rekening / Bank</th>
                            <th>Nominal (Rp)</th>
                            <th>tanggal ditambahkan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        $sql = mysqli_query($con, "SELECT * FROM tb_rekening");
                        while ($data = mysqli_fetch_array($sql)) {
                        ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $data['no_rek'] ?></td>
                                <td><?= $data['nama_rek'] ?></td>
                                <td><?= "Rp ".number_format($data['nominal'], 2, ',', '.');  ?></td>
                                <td><?= $data['tgl_post'] ?></td>
                                <td>
                                    <a onclick="return confirm('yakin ingin menghapus data ini?');" href="hapus_rekening.php?id_rek=<?= $data['id_rek'] ?>" class="btn btn-danger"><i class="fa fa-trash"></i> </a>
                                    <a data-toggle="modal" data-target="#mdledit_rekening<?= $data['id_rek'] ?>" href="#mdledit_rekening<?= $data['id_rek'] ?>" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                    <button class="btn btn-success"><i class="fa fa-print"></i></button>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>

                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

        <!-- Modal TAMBAH -->
        <div class="modal fade" id="mdltambah_rekening" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-plus"></i> Tambah Rekening</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="tambah_rekening.php">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nomor Rekening</label>
                                <input type="text" class="form-control" name="no_rek" placeholder="Nomor Rekening">

                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Nama Rekening</label>
                                <input type="text" class="form-control" name="nama_rek" placeholder="Nama Rekening">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Nominal Awal / Saldo Awal</label>
                                <input type="text" class="form-control" name="saldo" placeholder="Nominal Awal / Saldo">
                                <input type="text" class="form-control" hidden readonly name="tanggal_post" value="<?= date('Y-m-d H:i:s') ?>" placeholder="Nama Kategori">
                            </div>

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





        <?php $sql = mysqli_query($con, "SELECT * FROM tb_rekening ");
        while ($data2 = mysqli_fetch_array($sql)) {


        ?>
            <!-- Modal EDIT -->
            <div class="modal fade" id="mdledit_rekening<?= $data2['id_rek'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-primary">
                            <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-edit"></i> Edit Data Rekening</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="edit_rekening.php?id_rek=<?= $data2['id_rek'] ?>">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nomor Rekening</label>
                                    <input type="text" class="form-control" value="<?= $data2['no_rek'] ?>" name="no_rekening" placeholder="Nomor Rekening">

                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Nama Rekening / Bank</label>
                                    <input type="text" class="form-control" value="<?= $data2['nama_rek'] ?>" name="nama" placeholder="Nama Rekening">
                                </div>
                                <div class="form-group" >
                                    <label for="exampleInputPassword1">Nominal (Rp) </label>

                                    <input type="text" class="form-control" readonly name="saldo" value="<?= $data2['nominal'] ?>" placeholder="saldo">
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