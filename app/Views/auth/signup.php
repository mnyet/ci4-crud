<?= $this->extend('layouts/layout') ?>
<?= $this->section('title') ?>Signup | Employee Management System<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header text-center">
                    <h4>
                        Create a new account
                    </h4>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('auth/createUser') ?>" method="POST" autocomplete="off">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label>Name</label>
                                    <input type="text" name="signupName" class="form-control" value="<?= set_value('signupName'); ?>"
                                        placeholder="Juan Dela Cruz">
                                    <span
                                        class="text-danger"><?= isset($validation) ? display_error($validation, 'signupName') : '' ?></span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label>Email</label>
                                    <input type="text" name="signupEmail" class="form-control" value="<?= set_value('signupEmail'); ?>"
                                        placeholder="example@domain.com">
                                    <span
                                        class="text-danger"><?= isset($validation) ? display_error($validation, 'signupEmail') : '' ?></span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label>Password</label>
                                    <input type="password" name="signupPassword" class="form-control" value="<?= set_value('signupPassword'); ?>"
                                        placeholder="Password">
                                    <span
                                        class="text-danger"><?= isset($validation) ? display_error($validation, 'signupPassword') : '' ?></span>
                                </div>
                            </div>
                            <div class="col-md-12 d-flex align-items-center justify-content-between">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Create</button>
                                </div>
                                <div class="form-group">
                                    <span>
                                        Already have an account? <a href="<?= base_url('/auth/login') ?>" class="text-primary">Sign in</a>
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