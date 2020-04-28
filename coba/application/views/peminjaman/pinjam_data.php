<section class="content-header">
    <h1>
        Peminjaman
        <small> Alat</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Peminjaman</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">

    <div class="box box-responsive">
        <div class="box-header">
            <h3 class="box-title">Data</h3>
            <div class="pull-right">
                <a href="<?= site_url('pinjam/add') ?>" class="btn btn-primary btn-flat">
                    <i class="fa fa-user-plus"></i> Pinjam
                </a>
            </div>
        </div>
        <div class="box-body table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Peminjaman</th>
                        <th>Tanggal Pinjam</th>
                        <th>Tanggal Kembali</th>
                        <th>Koordinator</th>
                        <th>Nama Peminjam</th>
                        <th>No. HP Peminjam</th>
                        <th>Tujuan Meminjam</th>
                        <th>Nama Alat</th>
                        <th>Jumlah</th>
                        <th>Kondisi</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($row->result() as $key => $data) { ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $data->kode_pinjam ?></td>
                            <td><?= $data->tgl_pinjam ?></td>
                            <td><?= $data->tgl_kembali ?></td>
                            <td><?= $data->koordinator ?></td>
                            <td><?= $data->peminjam ?></td>
                            <td><?= $data->no_hp ?></td>
                            <td><?= $data->tujuan ?></td>
                            <td><?= $data->nama_alat ?></td>
                            <td><?= $data->jumlah ?></td>
                            <td><?= $data->kondisi ?></td>
                            <td class="text-center">
                                <a href="#" class="btn btn-primary btn-xs">
                                    <i class="fa fa-print"></i> Cetak
                                </a>
                                <a href="<?= site_url('pinjam/edit/' . $data->pinjam_id) ?>" class="btn btn-primary btn-xs">
                                    <i class="fa fa-pencil"></i> Update
                                </a>
                                <a href="<?= site_url('pinjam/del/' . $data->pinjam_id) ?>" onclick="return confirm('Apakah anda yakin?')" class="btn btn-danger btn-xs">
                                    <i class="fa fa-trash"></i> Delete
                                </a>
                            </td>
                        </tr>
                    <?php
                    } ?>
                </tbody>
            </table>

        </div>


    </div>

</section>