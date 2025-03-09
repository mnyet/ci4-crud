<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Bootstrap code is already included in layout.php -->
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary p-4" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="<?= base_url('employee') ?>">Employee Management System</a>
            <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse collapse" id="navbarNav" style="">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?= base_url('employee') ?>">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-danger" href="#">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</body>
</html>

