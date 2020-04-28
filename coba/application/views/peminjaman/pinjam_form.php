<section class="content-header">
    <h1>
        Form Peminjaman
        <small> Alat</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Form Peminjaman</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">

    <div class="box">
        <div class="box-header">
            <h3 class="box-title"></h3>
            <div class="pull-right">
                <a href="<?= site_url('pinjam') ?>" class="btn btn-warning btn-flat">
                    <i class="fa fa-undo"></i> Back
                </a>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <form action="<?= site_url('pinjam/process') ?>" method="post">
                        <div class="form-group">
                            <label>Kode Peminjaman</label>
                            <input type="hidden" name="id">
                            <input type="text" name="nomor" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label> Tanggal Pinjam</label>
                            <input type="date" name="tgl_pinjam" value="<?= $row->tgl_pinjam ?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Tanggal Kembali</label>
                            <input type="date" name="kembali" value="<?= $row->tgl_kembali ?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label> Koordinator</label>
                            <input type="text" name="koor" value="<?= $row->koordinator ?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Nama Peminjam</label>
                            <input type="text" name="nama_p" value="<?= $row->peminjam ?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>No. Hp Peminjam</label>
                            <input type="text" name="no_hp" value="<?= $row->no_hp ?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label> Tujuan Meminjam</label>
                            <input type="text" name="tujuan" value="<?= $row->tujuan ?>" class="form-control" required>
                        </div>
                        <!-- <div class="animated fadeIn" > -->
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="select" class="form-control-label">Nama Alat</label></div>
                            <div>
                                <!-- <select name="select" id="select" class="form-control">
                                    ($tb_pinjam as $row) { ?>
                                        <option value=" $row->pinjam_id ?>">o $row->Nama_alat ?></option>
                                     ?>
                                </select> -->
                                <select name="nama_alat" class="form-control">
                                    <option value="Druck">Druck</option>
                                    <option value="Zahl">Zahl</option>
                                    <option value="Temperatur">Temperatur</option>
                                    <option value="Drehzahl">Drehzahl</option>
                                    <option value="andere">andere</option>
                                </select>
                            </div>
                            <label>Jumlah</label>
                            <input type="number" name="jumlah" value="<?= $row->jumlah ?>" class="form-control" required>
                        </div>
                        <!-- <div class="form-group">
                            <label>Jumlah</label>
                            <input type="number" name="jumlah" value="<?= $row->jumlah ?>" class="form-control" required>
                        </div> -->
                        <div class="form-group">
                            <label>Kondisi</label>
                            <textarea type="text" name="kondisi" value="<?= $row->kondisi ?>" class="form-control" required></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-flat">
                                <i class="fa fa-paper-plane"></i> Simpan
                            </button>
                            <button type="reset" class="btn btn-flat">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>