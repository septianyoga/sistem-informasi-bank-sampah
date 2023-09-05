<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>


<div class="page-heading">
    <h3>User</h3>
</div>
<div class="page-content">
    <section class="section">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <span>Data User</span>
                <button type="button" class="btn btn-outline-primary block" data-bs-toggle="modal" data-bs-target="#default">
                    <i class="bi bi-plus-circle"></i> Tambah User
                </button>
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
                <table class="table" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Level</th>
                            <th class="text-center">Opsi</th>
                        </tr>
                    </thead>
                    <?php
                    $no = 1;
                    foreach ($data as $row) { ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $row['nama'] ?></td>
                            <td><?= $row['username'] ?></td>
                            <td><?= $row['level'] ?></td>
                            <td class="text-center">
                                <a href="<?= base_url('user/' . $row['id_user']) ?>" class="btn btn-sm btn-info"><i class="bi bi-pencil-square"></i> Edit</a>
                                <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#hapus-<?= $row['id_user'] ?>"><i class="bi bi-trash"></i>Hapus</button>
                            </td>
                        </tr>
                    <?php } ?>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>

    </section>
</div>

<div class="modal fade text-left" id="default" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel1">Tambah User</h5>
                <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <form action="<?= base_url('user') ?>" method="post">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="basicInput">Nama</label>
                                <input type="text" name="nama" class="form-control" id="basicInput" placeholder="Masukan Nama">
                            </div>

                            <div class="form-group">
                                <label for="helpInputTop">Username</label>
                                <input type="text" name="username" class="form-control" id="helpInputTop" placeholder="Masukan Username">
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
                                        <option value="admin">Admin</option>
                                        <option value="staff">Staff</option>
                                        <option value="user">User</option>
                                    </select>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Close</span>
                    </button>
                    <button type="submit" class="btn btn-primary ml-1" data-bs-dismiss="modal">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Tambah</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- modal hapus -->
<?php foreach ($data as $vall) { ?>
    <div class="modal fade text-left" id="hapus-<?= $vall['id_user'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel1">Hapus User</h5>
                    <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Yakin ingin menghapus user <?= $vall['nama'] ?>?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Close</span>
                    </button>
                    <a href="<?= base_url('user/' . $vall['id_user'] . '/hapus') ?>" class="btn btn-danger">Hapus</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<?php $this->endSection(); ?>