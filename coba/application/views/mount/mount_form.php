<section class="content-header">
    <h1>
        Mountaineering
        <small> Alat</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Mountaineering</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">

    <div class="box">
        <div class="box-header">
            <h3 class="box-title"><?= ucfirst($page) ?> mount</h3>
            <div class="pull-right">
                <a href="<?= site_url('mount') ?>" class="btn btn-warning btn-flat">
                    <i class="fa fa-undo"></i> Back
                </a>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <form action="<?= site_url('mount/proccess') ?>" method="post">
                        <div class="form-group">
                            <label> Kode Alat *</label>
                            <input type="hidden" name="id" value="<?= $row->mount_id ?>">
                            <input type="text" name="kode" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label> Nama *</label>
                            <input type="text" name="nama" value="<?= $row->nama ?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label> Merk *</label>
                            <input type="text" name="merk" value="<?= $row->merk ?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label> Jumlah *</label>
                            <input type="number" name="jumlah" value="<?= $row->jumlah ?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label> Kondisi *</label>
                            <textarea name="kond" class="form-control"><?= $row->kondisi ?></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="<?= $page ?>" class="btn btn-success btn-flat">
                                <i class="fa fa-paper-plane"></i> Save
                            </button>
                            <button type="reset" class="btn btn-flat">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>