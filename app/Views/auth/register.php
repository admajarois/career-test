<?= $this->extend('auth/base'); ?>

<?= $this->section('content'); ?>
<div class="card-login">
    <div class="card-login-title">
        <h1>REGISTER</h1>
        <div class="divider"></div>
    </div>
    <form action="" method="post" class="form-login">
        <div class="img-profile">
            <img src="/images/profile.jpg" alt="">
        </div>
        <label for="email">&nbsp;Email</label>
        <input type="email" id="email" name="email" class="form-control" required>
        <div class="form-divider"></div>
        <label for="name">&nbsp;Name</label>
        <input type="text" id="name" name="name" class="form-control" required>
        <div class="form-divider"></div>
        <label for="password">&nbsp;Password</label>
        <input type="password" id="password" class="form-control" name="password" required>
        <div class="form-divider"></div>
        <label for="confirm_password">&nbsp;Confirm Password</label>
        <input type="password" id="confirm_password" class="form-control" name="confirm_password" required>
        <div class="form-divider"></div>
        <input type="file" class="form-control-file" name="profile_picture" id="profile_picture">
        <input type="submit" value="LOGIN" name="submit" id="submit-btn" />
        <a href="/auth/loginPage" class="signup">Already have an account?</a>
    </form>
</div>
<?= $this->endSection(); ?>