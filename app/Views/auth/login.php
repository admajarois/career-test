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
        <h1>LOGIN</h1>
        <div class="underline"></div>
    </div>
    <form action="<?= base_url('/process'); ?>" method="post" class="form-login">
        <?= csrf_field(); ?>
        <label for="email">&nbsp;Email</label>
        <input type="email" id="email" name="email" class="form-control">
        <div class="form-divider"></div>
        <label for="password">&nbsp;Password</label>
        <input type="password" id="password" class="form-control" name="password">
        <div class="form-divider"></div>
        <a href="/forgotpassword" class="forgot-password">Forgot password?</a>
        <input type="submit" value="LOGIN" name="submit" id="submit-btn" />
        <a href="/register" class="signup">Don't have account yet?</a>
    </form>
</div>
<?= $this->endSection(); ?>