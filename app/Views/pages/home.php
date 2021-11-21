<?= $this->extend('index'); ?>

<?= $this->section('content'); ?>
<div class="card shadow h-100 w-50 mx-auto my-5 position-relative">
    <div class="row g-0">
        <div class="col-md-4">
            <img src="images/<?= session()->get('profile_image'); ?>" alt="your picture" width="480" class="img-fluid rounded-start">
        </div>
        <div class="col-md-6">
            <div class="card-body">
                <h5>Name: <?= session()->get('name'); ?></h5>
                <h5>Email: <?= session()->get('email'); ?></h5>
                <h5>Password: <?= session()->get('password') ? null : " ", "*******"; ?></h5>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>