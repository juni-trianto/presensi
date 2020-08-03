<div class="col-md-4">
    <div class="card">
        <div class="card-header">
            <h2>Data Master Divisi</h2>
        </div>
        <div class="card-body">
            <form action="<?= base_url('Master_divisi/post'); ?>" method="post">
                <div class="form-group">
                    <label class="form-control-label" for="input-username">Nama Divisi</label>
                    <input type="text" name="nama_divisi" id="input-username" class="form-control">
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" type="submit" name="submit">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>



<div class="col-md-8">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header border-0">
                        <h3 class="mb-0">Data</h3>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col" class="sort" data-sort="no">NO</th>
                                    <th scope="col" class="sort" data-sort="Nama">Nama Divisi</th>
                                    <th scope="col" class="sort" data-sort="Action">Action</th>

                                </tr>
                            </thead>
                            <tbody class="list">
                                <?php $no = 1;
                                foreach ($divisi as $row) : ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $row['nama_divisi']; ?></td>
                                        <td>
                                            <a href="<?= base_url('Master_divisi/delete/') . $row['id_divisi']; ?>" onclick="return confirm('Data Akan Di hapus')" class="btn btn-danger btn-sm">Delete</a>
                                            <a href="#edit<?= $row['id_divisi']; ?>" data-toggle="modal" class="btn btn-primary btn-sm">Edit</a>
                                        </td>
                                    </tr>

                                    <?php

                                    $database = $this->db->get_where('m_divisi', ['id_divisi ' => $row['id_divisi']])->result_array();
                                    foreach ($database as $record) :
                                    ?>

                                        <div class="modal fade" id="edit<?= $row['id_divisi']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel"><?= $record['nama_divisi']; ?></h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="<?= base_url('Master_divisi/update'); ?>" method="post">
                                                        <input type="hidden" name="id" value="<?= $record['id_divisi'] ?>">
                                                            <div class="form-group">
                                                                <label class="form-control-label" for="input-username">Nama Jabatan </label>
                                                                <input type="text" name="nama_divisi" value="<?= $record['nama_divisi']; ?>" id="input-username" class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <button class="btn btn-primary" type="submit" name="submit">update</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    <?php endforeach; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>