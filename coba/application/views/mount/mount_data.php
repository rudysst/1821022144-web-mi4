<section class="content-header">
    <h1>
        Mountaineering
        <small>Alat</small>
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
            <h3 class="box-title">Data</h3>
            <div class="pull-right">
                <a href="<?= site_url('mount/add') ?>" class="btn btn-primary btn-flat">
                    <i class="fa fa-user-plus"></i> Create
                </a>
            </div>
        </div>
        <div class="box-body table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Alat</th>
                        <th>Nama</th>
                        <th>Merk</th>
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
                            <td><?= $data->kode_alat ?></td>
                            <td><?= $data->nama ?></td>
                            <td><?= $data->merk ?></td>
                            <td><?= $data->jumlah ?></td>
                            <td><?= $data->kondisi ?></td>
                            <td class="text-center" width="160px">
                                <a href="<?= site_url('mount/edit/' . $data->mount_id) ?>" class="btn btn-primary btn-xs">
                                    <i class="fa fa-pencil"></i> Update
                                </a>
                                <a href="<?= site_url('mount/del/' . $data->mount_id) ?>" onclick="return confirm('Apakah anda yakin?')" class="btn btn-danger btn-xs">
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