<?= $this->extend('auth/base'); ?>

<?= $this->section('content'); ?>
<?php if (!empty(session()->getFlashdata('error'))) : ?>
    <div class="alert alert-danger" id="liveAlertPlaceholder" role="alert">
        <?= session()->getFlashdata('error'); ?>
    </div>
<?php endif; ?>
<div class="card-login">
    <div class="card-login-title">
        <h1>REGISTER</h1>
        <div class="underline"></div>
    </div>
    <form action="<?= base_url('/registration'); ?>" method="post" class="form-login" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <div class="img-profile">
            <img src="/images/profile.jpg" id="imagePreview" alt="">
        </div>
        <label for="email">&nbsp;Email</label>
        <input type="email" id="email" name="email" class="form-control">
        <div class="form-divider"></div>
        <label for="name">&nbsp;Name</label>
        <input type="text" id="name" name="name" class="form-control">
        <div class="form-divider"></div>
        <label for="password">&nbsp;Password</label>
        <input type="password" id="password" class="form-control" name="password">
        <div class="form-divider"></div>
        <label for="confirm_password">&nbsp;Confirm Password</label>
        <input type="password" id="confirm_password" class="form-control" name="confirm_password">
        <div class="form-divider"></div>
        <input type="file" class="form-control-file" id="imageInput" onchange="previewFile()" name="profile_image" id="profile_image">
        <input type="submit" value="REGISTER" name="submit" id="submit-btn" />
        <a href="/login" class="signup">Already have an account?</a>
    </form>
</div>
<?= $this->endSection(); ?>