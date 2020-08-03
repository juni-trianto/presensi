 <!-- Page content -->
 <div class="container-fluid mt--2">
     <div class="row">
         <div class="col-xl-4 order-xl-2">
             <div class="card card-profile">
                 <img src="<?= base_url('assets/backend/') ?>/assets/img/theme/img-1-1000x600.jpg" alt="Image placeholder" class="card-img-top">
                 <div class="row justify-content-center">
                     <div class="col-lg-3 order-lg-2">
                         <div class="card-profile-image">
                             <a href="#">
                                 <img src="<?= base_url('assets/backend/') ?>assets/img/brand/favicon.png" class="rounded-circle">
                             </a>
                         </div>
                     </div>
                 </div>
                 <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                     <div class="d-flex justify-content-between">
                         <a href="#" class="btn btn-sm btn-info  mr-4 ">Status</a>
                         <a href="#" class="btn btn-sm btn-default float-right">
                             <?php if ($database['status_karyawan'] != 99) : ?>
                                 Active
                             <?php else : ?>
                                 Non Active
                             <?php endif; ?>
                         </a>
                     </div>
                 </div>
                 <div class="card-body pt-0">
                     <div class="text-center">
                         <h5 class="h3">
                             <?= $database['nama_karyawan']; ?><span class="font-weight-light"></span>
                         </h5>
                         <div class="h5 font-weight-300">
                             <i class="ni location_pin mr-2"></i> <?= $database['domisili']; ?>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
         <div class="col-xl-8 order-xl-1">
             <div class="card">
                 <div class="card-header">
                     <div class="row align-items-center">
                         <div class="col-8">
                             <h3 class="mb-0">PROFILE <?= $database['nama_karyawan']; ?> </h3>
                         </div>
                         <div class="col-4 text-right">
                         </div>
                     </div>
                 </div>
                 <div class="card-body">
                     <h6 class="heading-small text-muted mb-4">User information</h6>
                     <div class="pl-lg-4">
                         <div class="row">
                             <div class="col-lg-6">
                                 <div class="form-group">
                                     <label class="form-control-label" for="input-username">Nama Karyawan</label>
                                     <input type="text" id="input-username" class="form-control" value="<?= $database['nama_karyawan'] ?>" readonly>
                                 </div>
                             </div>
                             <div class="col-lg-6">
                                 <div class="form-group">
                                     <label class="form-control-label" for="input-email">NIK</label>
                                     <input type="text" id="input-email" class="form-control" value="<?= $database['nik'] ?>" readonly>
                                 </div>
                             </div>
                         </div>
                         <div class="row">
                             <div class="col-lg-6">
                                 <div class="form-group">
                                     <label class="form-control-label" for="input-first-name">Gender</label>
                                     <input type="text" id="input-email" class="form-control" value="<?= $database['jenis_kelamin'] ?>" readonly>
                                 </div>
                             </div>
                             <div class="col-lg-6">
                                 <div class="form-group">
                                     <label class="form-control-label" for="input-last-name">NO ID</label>
                                     <input type="text" id="input-email" class="form-control" value="<?= $database['nomer_id_karyawan'] ?>" readonly>

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
                                     <input type="text" id="input-email" class="form-control" value="<?= $database['alamat_lengkap'] ?>" readonly>

                                 </div>
                             </div>
                         </div>
                         <div class="row">
                             <div class="col-lg-4">
                                 <div class="form-group">
                                     <label class="form-control-label" for="input-city">Phone</label>
                                     <input type="text" id="input-email" class="form-control" value="<?= $database['no_hp'] ?>" readonly>
                                 </div>
                             </div>
                             <div class="col-lg-8">
                                 <div class="form-group">
                                     <label class="form-control-label" for="input-country">Domisli</label>
                                     <input type="text" id="input-email" class="form-control" value="<?= $database['domisili'] ?>" readonly>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <hr class="my-4" />
                     <!-- Description -->
                     <h6 class="heading-small text-muted mb-4">Position</h6>
                     <div class="pl-lg-4">
                         <div class="form-group">
                             <div class="row">
                                 <div class="col-lg-6">
                                     <div class="form-group">
                                         <label class="form-control-label" for="input-city">Jabatan</label>
                                         <input type="text" id="input-email" class="form-control" value="<?= $database['nama_jabatan'] ?>" readonly>
                                     </div>
                                 </div>
                                 <div class="col-lg-6">
                                     <div class="form-group">
                                         <label class="form-control-label" for="input-country">Divisi</label>
                                         <input type="text" id="input-email" class="form-control" value="<?= $database['nama_divisi'] ?>" readonly>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>

                     <h6 class="heading-small text-muted mb-4">Tindakan</h6>
                     <div class="pl-lg-4">
                         <div class="form-group">
                             <div class="row">
                                 <div class="col-lg-4">
                                     <div class="form-group">
                                         <?php if ($database['status_karyawan'] != 99) : ?>
                                             <a href="<?= base_url('data_pegawai/nonaktifkan/') . $database['id_karyawan']; ?>" onclick="return confirm('NonAktifkan Pegawai!')" class="btn btn-warning"> Non Aktifkan Pegawai</a>
                                         <?php else : ?>
                                             <a href="<?= base_url('data_pegawai/aktifkan/') . $database['id_karyawan']; ?>" onclick="return confirm('Aktifkan Pegawai!')" class="btn btn-default">Aktifkan Pegawai</a>
                                         <?php endif; ?>
                                     </div>
                                 </div>
                                 <div class="col-lg-4">
                                     <div class="form-group">
                                         <a href="<?= base_url('data_pegawai/delete/') . $database['id_karyawan']; ?>" class="btn btn-danger" onclick="return confirm('yakin data akan di hapus!')"> Delete Data Pegawai</a>
                                     </div>
                                 </div>
                                 <div class="col-lg-4">
                                     <div class="form-group">
                                         <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg"> Edit Data Pegawai</button>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>

                 </div>
             </div>
         </div>
     </div>





     <!-- modal -->

     <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
         <div class="modal-dialog modal-lg">
             <div class="modal-content">
                 <div class="card-body">
                     <form method="post" action="<?= base_url('Input_Pegawai/update_data_pegawai'); ?>">
                         <h6 class="heading-small text-muted mb-4">User information</h6>
                         <input type="hidden" name="id" value="<?= $database['id_karyawan']; ?>">
                         <div class="pl-lg-4">
                             <div class="row">
                                 <div class="col-lg-6">
                                     <div class="form-group">
                                         <label class="form-control-label" for="input-username">Nama Karyawan</label>
                                         <input type="text" autocomplete="off" id="input-username" onkeyup="this.value = this.value.toUpperCase()" class="form-control" value="<?= $database['nama_karyawan']; ?>" name="nama_karyawan" required>
                                     </div>
                                 </div>
                                 <div class="col-lg-6">
                                     <div class="form-group">
                                         <label class="form-control-label" for="input-email">NIK</label>
                                         <input type="text" autocomplete="off" id="input-email" class="form-control" value="<?= $database['nik']; ?>" name="nik" required>
                                     </div>
                                 </div>
                             </div>
                             <div class="row">
                                 <div class="col-lg-6">
                                     <div class="form-group">
                                         <label class="form-control-label" for="input-first-name">Jenis Kelamin</label><br>
                                         <div class="form-check form-check-inline">
                                             <input class="form-check-input" type="radio" id="inlineCheckbox1" name="jenis_kelamin" <?php if ($database['jenis_kelamin'] == 'Laki Laki') : ?> checked <?php endif; ?> required value="Laki Laki">
                                             <label class="form-check-label" for="inlineCheckbox1">Laki - Laki</label>
                                         </div>
                                         <div class="form-check form-check-inline">
                                             <input class="form-check-input" type="radio" id="inlineCheckbox2" name="jenis_kelamin" <?php if ($database['jenis_kelamin'] == 'Perempuan') : ?> checked <?php endif; ?> required value="Perempuan">
                                             <label class="form-check-label" for="inlineCheckbox2">Perempuan</label>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="col-lg-6">
                                     <div class="form-group">
                                         <label class="form-control-label" for="input-last-name">NO ID</label>
                                         <input type="text" autocomplete="off" id="input-last-name" value="<?= $database['nomer_id_karyawan']; ?>" class="form-control" placeholder="NO ID Pegawai" name="no_id" required>
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
                                         <input id="input-address" class="form-control" placeholder="Alamat ktp" value="<?= $database['alamat_lengkap']; ?>" name="alamat_lengkap" type="text" autocomplete="off" required>
                                     </div>
                                 </div>
                             </div>
                             <div class="row">
                                 <div class="col-lg-4">
                                     <div class="form-group">
                                         <label class="form-control-label" for="input-city">No Phone</label>
                                         <input type="text" autocomplete="off" id="input-city" class="form-control" value="<?= $database['no_hp']; ?>" name="phone" required>
                                     </div>
                                 </div>
                                 <div class="col-lg-8">
                                     <div class="form-group">
                                         <label class="form-control-label" for="input-country">Domisili</label>
                                         <input type="text" autocomplete="off" id="input-country" class="form-control" value="<?= $database['domisili']; ?>" name="domisili" required>
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
                                             <option value="<?= $jbtn['id_jabatan']; ?>" <?php if ($jbtn['id_jabatan'] == $database['jabatan_id']) : ?> selected <?php endif; ?>><?= $jbtn['nama_jabatan']; ?></option>
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
                                             <option value="<?= $dvs['id_divisi']; ?>" <?php if ($dvs['id_divisi'] == $database['divisi_id']) : ?> selected <?php endif; ?>><?= $dvs['nama_divisi']; ?></option>
                                         <?php endforeach; ?>
                                     </select>
                                 </div>
                             </div>
                             <div class="col-lg-6">
                                 <div class="form-group">
                                     <button class="btn btn-primary" name="submit" type="submit">Update</button>
                                 </div>
                             </div>
                         </div>
                     </form>
                 </div>
             </div>
         </div>
     </div>