<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>


<div class="page-heading">
    <h3>Edit User</h3>
</div>
<div class="page-content">
    <section class="section">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <span>Edit Data User</span>
            </div>
            <div class="card-body">
                <?php
                $errors = session()->getFlashdata('errors');
                if (!empty($errors)) { ?>
                    <div class="alert alert-danger" role="alert">
                        <ul>
                            <?php foreach ($errors as $key => $value) { ?>
                                <li><?= esc($value); ?></li>
                            <?php } ?>
                        </ul>
                    </div>
                <?php  } ?>
                <form action="<?= base_url('user/proses_edit') ?>" method="post">
                    <input type="hidden" name="id_user" value="<?= $data['id_user'] ?>">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="basicInput">Nama</label>
                                    <input type="text" name="nama" class="form-control" id="basicInput" placeholder="Masukan Nama" value="<?= $data['nama'] ?>">
                                </div>

                                <div class="form-group">
                                    <label for="helpInputTop">Username</label>
                                    <input type="text" name="username" class="form-control" id="helpInputTop" placeholder="Masukan Username" value="<?= $data['nama'] ?>">
                                </div>

                                <div class="form-group">
                                    <label for="helperText">Password</label>
                                    <input type="password" name="password" id="helperText" class="form-control" placeholder="Masukan Password">
                                </div>
                                <div class="form-group">
                                    <label for="helperText">Level</label>
                                    <fieldset class="form-group">
                                        <select name="level" class="form-select" id="basicSelect">
                                            <option>-- Pilih --</option>
                                            <option value="admin" <?= $data['level'] == 'admin' ? 'selected' : '' ?>>Admin</option>
                                            <option value="staff" <?= $data['level'] == 'staff' ? 'selected' : '' ?>>Staff</option>
                                            <option value="user" <?= $data['level'] == 'user' ? 'selected' : '' ?>>User</option>
                                        </select>
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="<?= base_url('user') ?>" class="btn btn-secondary me-2">Kembali</a>
                        <button type="submit" class="btn btn-success ml-1" data-bs-dismiss="modal">
                            <i class="bx bx-check d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Edit</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>

    </section>
</div>

<?php $this->endSection(); ?>