<?= $this->extend('layouts/layout') ?>
<?= $this->section('title') ?>Login | Employee Management System<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header text-center">
                    <h4>
                        Login to Employee Management System
                    </h4>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('auth/loginUser') ?>" method="POST" autocomplete="off">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label>Email</label>
                                    <input type="text" name="loginEmail" value="<?= set_value(field: 'loginEmail'); ?>"
                                        class="form-control" placeholder="example@domain.com">
                                    <span
                                        class="text-danger"><?= isset($validation) ? display_error($validation, 'loginEmail') : '' ?></span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label>Password</label>
                                    <input type="password" name="loginPassword"
                                        value="<?= set_value('loginPassword'); ?>" class="form-control"
                                        placeholder="Password">
                                    <span
                                        class="text-danger"><?= isset($validation) ? display_error($validation, 'loginPassword') : '' ?></span>
                                </div>
                            </div>
                            <div class="col-md-12 d-flex align-items-center justify-content-between">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Login</button>
                                </div>
                                <div class="form-group">
                                    <span>
                                        Don't have an account? <a href="<?= base_url('/auth/signup') ?>"
                                            class="text-primary">Sign up</a>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>