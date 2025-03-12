<?= $this->extend('layouts/layout') ?>
<?= $this->section('title') ?>Employee List<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="card">
    <div class="card-header">
        <h4>Edit employee
            <a href="<?= base_url('employee') ?>" class="btn btn-danger float-end">Back</a>
        </h4>
    </div>
    <div class="card-body">
        <form action="<?= base_url(relativePath: "updateEmployee/" . $employee['id']) ?>" method="POST"
            autocomplete="off">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label>First Name</label>
                        <input type="text" name="firstName" value="<?= $employee['first_name'] ?>" class="form-control"
                            placeholder="Juan">
                        <span
                            class="text-danger"><?= session('validation') ? display_error(session('validation'), 'firstName') : '' ?></span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label>Last Name</label>
                        <input type="text" name="lastName" value="<?= $employee['last_name'] ?>" class="form-control"
                            placeholder="Dela Cruz">
                        <span
                            class="text-danger"><?= session('validation') ? display_error(session('validation'), 'lastName') : '' ?></span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label>Phone Number</label>
                        <input type="text" name="contactNum" value="<?= $employee['contact_num'] ?>"
                            class="form-control" placeholder="09xxxxxxxxx">
                        <span
                            class="text-danger"><?= session('validation') ? display_error(session('validation'), 'contactNum') : '' ?></span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label>Email</label>
                        <input type="text" name="email" value="<?= $employee['email'] ?>" class="form-control"
                            placeholder="juandelacruz@domain.com">
                        <span
                            class="text-danger"><?= session('validation') ? display_error(session('validation'), 'email') : '' ?></span>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group mb-3">
                        <label>Role</label>
                        <input type="text" name="employeeRole" value="<?= $employee['employee_role'] ?>"
                            class="form-control" placeholder="Accountant">
                        <span
                            class="text-danger"><?= session('validation') ? display_error(session('validation'), 'employeeRole') : '' ?></span>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Update employee</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection() ?>