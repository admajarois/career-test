<?= $this->extend('auth/base'); ?>

<?= $this->section('content'); ?>
<div class="card-login">
    <div class="card-login-title">
        <h1>LOGIN</h1>
        <div class="underline"></div>
    </div>
    <form action="" method="post" class="form-login">
        <label for="email">&nbsp;Email</label>
        <input type="email" id="email" name="email" class="form-control" required>
        <div class="form-divider"></div>
        <label for="password">&nbsp;Password</label>
        <input type="password" id="password" class="form-control" name="password" required>
        <div class="form-divider"></div>
        <a href="#" class="forgot-password">Forgot password?</a>
        <input type="submit" value="LOGIN" name="submit" id="submit-btn" />
        <a href="/register" class="signup">Don't have account yet?</a>
    </form>
</div>
<?= $this->endSection(); ?>