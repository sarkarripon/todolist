<?php include 'header.php' ?>
<?php
if (isset($_SESSION['loggedInUser'])) {
    header('Location:index.php');
    exit;
}
?>
<!-- Begin page content -->
<section class="w-auto p-3" style="background-color: #eee;">
    <main class="flex-shrink-0">
        <div class="container">
            <div class="row">
                <div class="col-lg">
                    <form action="signup_php.php" method="POST">
                        <img class="mb-4" src="authlab.png" alt="" width="55" height="50">
                        <h1 class="h3 mb-3 fw-normal">Please sign up</h1>
                        <div class="form-floating">
                            <input type="text" value="<?php echo isset($_SESSION['fnameValue']) ? $_SESSION['fnameValue'] : ""; ?>" class="form-control" id="fname" name="fname" placeholder="John">
                            <label for="fname">First Name</label>
                            <?php if (isset($_SESSION['fnameErr'])) : ?>
                                <p class="alert alert-danger"><?php echo $_SESSION['fnameErr'] ?> </p>
                            <?php endif; ?>
                        </div>
                        <div class="form-floating">
                            <input type="text" value="<?php echo isset($_SESSION['lnameValue']) ? $_SESSION['lnameValue'] : ""; ?>" class="form-control" id="lname" name="lname" placeholder="Doe">
                            <label for="lname">Last Name</label>
                            <?php if (isset($_SESSION['lnameErr'])) : ?>
                                <p class="alert alert-danger"><?php echo $_SESSION['lnameErr'] ?> </p>
                            <?php endif; ?>
                        </div>
                        <div class="form-floating">
                            <input type="email" value="<?php echo isset($_SESSION['emailValue']) ? $_SESSION['emailValue'] : ""; ?>" class="form-control" id="email" name="email" placeholder="name@example.com">
                            <label for="email">Email address</label>
                            <?php if (isset($_SESSION['emailErr'])) : ?>
                                <p class="alert alert-danger"><?php echo $_SESSION['emailErr'] ?> </p>
                            <?php endif; ?>
                        </div>
                        <div class="form-floating">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                            <label for="password">Password</label>
                            <?php if (isset($_SESSION['passwordErr'])) : ?>
                                <p class="alert alert-danger"><?php echo $_SESSION['passwordErr'] ?> </p>
                            <?php endif; ?>
                        </div>
                        <div class="form-floating">
                            <input type="password" class="form-control" id="password" name="re_password" placeholder="Retype Password">
                            <label for="password">Retype Password</label>
                        </div>
                        <br>
                        <button class="w-100 btn btn-lg btn-primary" type="submit">Sign up</button>
                        <p class="mt-5 mb-3 text-muted">Have an account? <a href="login.php">Login</a></p>
                    </form>

                </div>
            </div>
        </div>
    </main>
</section>
<?php include 'footer.php' ?>