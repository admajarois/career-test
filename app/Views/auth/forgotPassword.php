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
        <h1>FORGOT PASSWORD</h1>
        <div class="underline"></div>
    </div>
    <form action="<?= base_url('/sendmail'); ?>" method="post" class="form-login">
        <?= csrf_field(); ?>
        <label for="email">&nbsp;Email</label>
        <input type="email" id="email" name="email" class="form-control">
        <div class="form-divider"></div>
        <input type="submit" value="SEND MAIL" name="submit" id="submit-btn" />
    </form>
</div>
<?= $this->endSection(); ?>