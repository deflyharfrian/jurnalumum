<?php
error_reporting(0);

?>

<div class="row mb-2">
    <div class="col-sm-6">
        <h1 class="m-0">Daftar Akun</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Daftar Akun</li>
        </ol>
    </div><!-- /.col -->
</div><!-- /.row -->
</div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
    <div class="container-fluid">

        <div class="card" >
            <div class="card-header bg-purple">
                <h3 class="card-title">Tabel Data Akun</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body" >
                <button type="button" class="btn bg-purple mb-3" data-toggle="modal" data-target="#mdltambahkategori">
                    <i class="fa fa-plus"></i> Tambah Data
                </button>

                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Akun</th>
                            <th>Nama Akun</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        $sql = mysqli_query($con, "SELECT * FROM tb_kategori");
                        while ($data = mysqli_fetch_array($sql)) {
                        ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><span class="badge badge-primary"><?= $data['kode_kategori'] ?></span>
                                </td>
                                <td><?= $data['nama'] ?></td>
                                <td>
                                    <a onclick="return confirm('yakin ingin menghapus data ini?');" href="hapus_kategori.php?kode_kategori=<?= $data['kode_kategori'] ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                    <a data-toggle="modal" data-target="#mdleditkategori<?= $data['kode_kategori'] ?>" href="#mdleditkategori<?= $data['kode_kategori'] ?>" class="btn btn-warning"><i class="fa fa-edit"></i></a>
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
        <div class="modal fade" id="mdltambahkategori" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-plus"></i> Tambah Data Akun</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action='tambah_kategori.php'>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Kode Akun</label>
                                <input type="text" class="form-control" name="kode_kategori" placeholder="Kode Kategori">

                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Nama Akun</label>
                                <input type="text" class="form-control" name="nama" placeholder="Nama Kategori">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Tanggal Post</label>

                                <input type="text" class="form-control" readonly name="tanggal_post" value="<?= date('Y-m-d H:i') ?>" placeholder="Nama Kategori">
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





        <?php $sql = mysqli_query($con, "SELECT * FROM tb_kategori ");
        while ($data2 = mysqli_fetch_array($sql)) {


        ?>
            <!-- Modal EDIT -->
            <div class="modal fade" id="mdleditkategori<?= $data2['kode_kategori'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-primary">
                            <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-edit"></i> Edit Data Akun</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="editkategori.php?kode_kategori=<?= $data2['kode_kategori'] ?>">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Kode Akun</label>
                                    <input type="text" readonly class="form-control" value="<?= $data2['kode_kategori'] ?>" name="kode_kategori" placeholder="Kode Kategori">

                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Nama Akun</label>
                                    <input type="text" class="form-control" value="<?= $data2['nama'] ?>" name="nama" placeholder="Nama Kategori">
                                </div>
                                <div class="form-group" style="display: none;">
                                    <label for="exampleInputPassword1">Tanggal Post</label>

                                    <input type="text" class="form-control" name="tanggal_post" value="<?= date('Y-m-d H:i') ?>" placeholder="Nama Kategori">
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