<!-- Page content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-12 order-xl-1">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Tambah Pegawai </h3>
                            <p><?php echo validation_errors(); ?></p>
                        </div>
                        <div class="col-4 text-right">
                            <a href="#!" class="btn btn-sm btn-primary">Input</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form method="post" action="<?= base_url('Input_Pegawai/post_data'); ?>">
                        <h6 class="heading-small text-muted mb-4">User information</h6>
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-username">Nama Karyawan</label>
                                        <input type="text" autocomplete="off" id="input-username" onkeyup="this.value = this.value.toUpperCase()" class="form-control" value="<?php echo set_value('nama_karyawan'); ?>" name="nama_karyawan" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-email">NIK</label>
                                        <input type="text" autocomplete="off" id="input-email" class="form-control" value="<?php echo set_value('nik'); ?>" name="nik" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-first-name">Jenis Kelamin</label><br>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" id="inlineCheckbox1" name="jenis_kelamin" required value="Laki Laki">
                                            <label class="form-check-label" for="inlineCheckbox1">Laki - Laki</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" id="inlineCheckbox2" name="jenis_kelamin" required value="Perempuan">
                                            <label class="form-check-label" for="inlineCheckbox2">Perempuan</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-last-name">NO ID</label>
                                        <input type="text" autocomplete="off" id="input-last-name" value="<?php echo set_value('no_id'); ?>" class="form-control" placeholder="NO ID Pegawai" name="no_id" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="my-4" />
                        <!-- Address -->
                        <h6 class="heading-small text-muted mb-4">Contact information</h6>
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-address">Address</label>
                                        <input id="input-address" class="form-control" placeholder="Alamat ktp" value="<?php echo set_value('alamat_lengkap'); ?>" name="alamat_lengkap" type="text" autocomplete="off" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-city">No Phone</label>
                                        <input type="text" autocomplete="off" id="input-city" class="form-control" value="<?php echo set_value('phone'); ?>" name="phone" required>
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-country">Domisili</label>
                                        <input type="text" autocomplete="off" id="input-country" class="form-control" value="<?php echo set_value('domisili'); ?>" name="domisili" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="my-4" />
                        <!-- Description -->
                        <h6 class="heading-small text-muted mb-4">Position</h6>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-city">Jabatan</label>
                                    <select class="form-control" id="exampleFormControlSelect1" name="jabatan" required>
                                        <option value="">--</option>
                                        <?php
                                        $jabatan = $this->db->get_where('m_jabatan', ['status !=' => 99])->result_array();
                                        foreach ($jabatan as $jbtn) :
                                        ?>
                                            <option value="<?= $jbtn['id_jabatan']; ?>"><?= $jbtn['nama_jabatan']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-country">Divisi</label>
                                    <select class="form-control" id="exampleFormControlSelect1" name="divisi" required>
                                        <option value="">--</option>
                                        <?php
                                        $divisi = $this->db->get_where('m_divisi', ['status !=' => 99])->result_array();
                                        foreach ($divisi as $dvs) :
                                        ?>
                                            <option value="<?= $dvs['id_divisi']; ?>"><?= $dvs['nama_divisi']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <button class="btn btn-primary" name="submit" type="submit">Simpan</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>