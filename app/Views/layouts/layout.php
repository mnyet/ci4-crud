<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $this->renderSection('title') ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/alertify.min.css" />

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/alertify.min.js"></script>
</head>

<body>
    <?= $this->include('layouts/components/navbar') ?>
    <div class="app p-4">
        <?= $this->renderSection('content') ?>
    </div>

    <script>
        $(document).ready(function () {
            <?php if (session()->getFlashdata('success')): ?>
                var delay = alertify.get('notifier', 'delay');
                alertify.set('notifier', 'position', 'top-right');
                alertify.set('notifier', 'delay', 2);
                alertify.success('<?= session()->getFlashdata('success') ?>');
                alertify.set('notifier', 'delay', delay);
            <?php endif; ?>
        })
    </script>
</body>

</html>