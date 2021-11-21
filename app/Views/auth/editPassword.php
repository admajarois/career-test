<?= $this->extend('auth/base'); ?>

<?= $this->section('content'); ?>
<div class="card-login">
    <?php if (!empty(session()->getFlashdata('error'))) : ?>
        <div class="alert alert-danger" id="liveAlertPlaceholder" role="alert">
            <?= session()->getFlashdata('error'); ?>
        </div>
    <?php elseif (!empty(session()->getFlashdata('success'))) : ?>
        <div class="alert alert-success" id="liveAlertPlaceholder" role="alert">
            <?= session()->getFlashdata('success'); ?>
        </div>
    <?php endif; ?>
    <div class="card-login-title">
        <h1>RESET PASSWORD</h1>
        <div class="underline"></div>
    </div>
    <form action="/register/resetPassword/<?= $user['id']; ?>" method="post" class="form-login">
        <?= csrf_field(); ?>
        <div class="img-profile">
            <img src="/images/<?= $user['profile_image']; ?>" id="imagePreview" alt="">
        </div>
        <label for="password">&nbsp;New Password</label>
        <input type="password" id="password" class="form-control" name="password">
        <div class="form-divider"></div>
        <label for="confirm_password">&nbsp;Confirm New Password</label>
        <input type="password" id="confirm_password" class="form-control" name="confirm_password">
        <div class="form-divider"></div>
        <input type="submit" value="RESET" name="submit" id="submit-btn" />
    </form>
</div>
<?= $this->endSection(); ?>