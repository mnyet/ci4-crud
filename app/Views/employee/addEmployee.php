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
                        <input type="text" name="firstName" class="form-control" placeholder="Juan">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label>Last Name</label>
                        <input type="text" name="lastName" class="form-control" placeholder="Dela Cruz">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label>Phone Number</label>
                        <input type="text" name="contactNum" class="form-control" placeholder="09xxxxxxxxx">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label>Email</label>
                        <input type="text" name="email" class="form-control" placeholder="juandelacruz@domain.com">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group mb-3">
                        <label>Role</label>
                        <input type="text" name="employeeRole" class="form-control" placeholder="Accountant">
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