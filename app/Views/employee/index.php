<?= $this->extend('layouts/layout') ?>
<?= $this->section('title') ?>Employee List<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="card">
    <div class="card-header">
        <h4>Employee List
            <a href="<?= base_url('addEmployee') ?>" class="btn btn-primary float-end">Add new employee</a>
        </h4>
    </div>
    <div class="card-body">
        <input class="form-control mb-4" id="employeeSearch" type="text" placeholder="Search..">
        <div class="table-responsive border">
            <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Contact No.</th>
                        <th scope="col">Email</th>
                        <th scope="col">Role</th>
                        <th scope="col">Account Creation</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody id="employeeTable">
                    <?php foreach ($employees as $employee): ?>
                        <tr class="text-nowrap">
                            <td><?= $employee['first_name'] ?>     <?= $employee['last_name'] ?></td>
                            <td><?= $employee['contact_num'] ?></td>
                            <td><?= $employee['email'] ?></td>
                            <td><?= $employee['employee_role'] ?></td>
                            <td><?= $employee['created_at'] ?></td>
                            <td>
                                <div class="d-flex gap-2">
                                    <form action="employee/edit/<?= $employee['id'] ?>">
                                        <button type="submit" class="btn btn-success">Edit</button>
                                    </form>

                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#deleteModal-<?= $employee['id'] ?>">Delete</button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="deleteModal-<?= $employee['id'] ?>" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel-<?= $employee['id'] ?>">Delete Employee</h5>
                                                </div>
                                                <div class="modal-body">
                                                    <h6>Are you sure you want to delete this employee?</h6>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Cancel</button>
                                                    <form action="deleteEmployee/<?= $employee['id'] ?>">
                                                        <button type="submit" class="btn btn-danger">Confirm</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $("#employeeSearch").on("keyup", function () {
            var value = $(this).val().toLowerCase();
            $("#employeeTable tr").filter(function () {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>

<?= $this->endSection() ?>