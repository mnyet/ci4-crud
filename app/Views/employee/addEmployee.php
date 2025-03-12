<?= $this->extend('layouts/layout') ?>
<?= $this->section('title') ?>Employee List<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="card">
    <div class="card-header">
        <h4>Add new employee
            <a href="<?= base_url('employee') ?>" class="btn btn-danger float-end">Back</a>
        </h4>
    </div>
    <div class="card-body">
        <form action="<?= base_url('createEmployee') ?>" method="POST" autocomplete="off">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label>First Name</label>
                        <input type="text" name="firstName" value="<?= set_value(field: 'firstName'); ?>" class="form-control" placeholder="Juan">
                        <span
                            class="text-danger"><?= isset($validation) ? display_error($validation, 'firstName') : '' ?></span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label>Last Name</label>
                        <input type="text" name="lastName" value="<?= set_value(field: 'lastName'); ?>" class="form-control" placeholder="Dela Cruz">
                        <span
                            class="text-danger"><?= isset($validation) ? display_error($validation, 'lastName') : '' ?></span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label>Phone Number</label>
                        <input type="text" name="contactNum" value="<?= set_value(field: 'contactNum'); ?>" class="form-control" placeholder="09xxxxxxxxx">
                        <span
                            class="text-danger"><?= isset($validation) ? display_error($validation, 'contactNum') : '' ?></span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label>Email</label>
                        <input type="text" name="email" value="<?= set_value(field: 'email'); ?>" class="form-control" placeholder="juandelacruz@domain.com">
                        <span
                            class="text-danger"><?= isset($validation) ? display_error($validation, 'email') : '' ?></span>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group mb-3">
                        <label>Role</label>
                        <input type="text" name="employeeRole" value="<?= set_value(field: 'employeeRole'); ?>" class="form-control" placeholder="Accountant">
                        <span
                            class="text-danger"><?= isset($validation) ? display_error($validation, 'employeeRole') : '' ?></span>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Create employee</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection() ?>