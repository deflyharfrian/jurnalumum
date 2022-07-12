<div class="row mb-2">
    <div class="col-sm-6">
        <h1 class="m-0">Dashboard</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">Home</li>
        </ol>
    </div><!-- /.col -->
</div><!-- /.row -->
</div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
    <div class="container-fluid">

   
    <div class="alert bg-purple alert-dismissible fade show" role="alert">
    <h4 class="alert-heading">Selamat Datang!</h4>
    Hallo,<strong> <?= $profil['nama_lengkap'];?></strong> anda login sebagai <b><?= $profil['level'];?></b> .
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">

                        <h3>
                            <?php


                            // mengambil data barang
                            $a1 = mysqli_query($con, "SELECT * FROM tb_kategori");

                            // menghitung data barang
                            $jumlah_kategori = mysqli_num_rows($a1);

                            echo $jumlah_kategori;
                            ?>
                        </h3>

                        <p>Kategori</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-th"></i>
                    </div>
                    <a href="index.php?kategori" class="small-box-footer">Info Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <!---tambah menu transaksi--->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">

                        <h3>
                            <?php


                            // mengambil data barang
                            $a1 = mysqli_query($con, "SELECT * FROM tb_Transaksi");

                            // menghitung data barang
                            $jumlah_transaksi = mysqli_num_rows($a1);

                            echo $jumlah_transaksi;
                            ?>
                        </h3>

                        <p>Transaksi</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-dollar-sign"></i>
                    </div>
                    <a href="index.php?transaksi" class="small-box-footer">Info Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!---tambah menu REKENING--->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">

                        <h3>
                            <?php


                            // mengambil data barang
                            $a1 = mysqli_query($con, "SELECT * FROM tb_rekening");

                            // menghitung data barang
                            $jumlah_transaksi = mysqli_num_rows($a1);

                            echo $jumlah_transaksi;
                            ?>
                        </h3>

                        <p>Rekening</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-wallet"></i>
                    </div>
                    <a href="index.php?rekening" class="small-box-footer">Info Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>


            <!---tambah menu BUKU BESAR--->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">

                        <h3>
                            <?php


                            // mengambil data barang
                            $a1 = mysqli_query($con, "SELECT * FROM tb_Transaksi");

                            // menghitung data barang
                            $jumlah_transaksi = mysqli_num_rows($a1);

                            echo $jumlah_transaksi;
                            ?>
                        </h3>

                        <p>Buku Besar</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-book"></i>
                    </div>
                    <a href="index.php?bukubesar" class="small-box-footer">Info Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>



            <!---tambah menu MONEY CPONVENTION--->
            <div class="col-lg-12 col-12">
                <!-- small box -->
                <div class="small-box bg-primary">
                    <div class="inner">

                        <h3>
                            <?php


                            // mengambil data barang
                            $a1 = mysqli_query($con, "SELECT * FROM tb_Transaksi");

                            // menghitung data barang
                            $jumlah_transaksi = mysqli_num_rows($a1);

                            echo $jumlah_transaksi;
                            ?>
                        </h3>

                        <p>Buku Besar</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-book"></i>
                    </div>
                    <a href="index.php?transaksi" class="small-box-footer">Info Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>



        </div>