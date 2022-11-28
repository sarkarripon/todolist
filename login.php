<?php include 'header.php' ?>
<?php
if (isset($_SESSION['loggedInUser'])) {
    header('Location:index.php');
    exit;
}
?>
<!-- Begin page content -->
<section class="vh-100 w-auto p-3" style="background-color: #eee;">
    <main class="flex-shrink-0">


        <div class="container">

            <?php if (isset($_SESSION['success_msg'])) : ?>
                <p class="alert alert-success"><?php echo $_SESSION['success_msg'] ?> </p>
            <?php endif; ?>

            <main class="form-signin w-100 m-auto">
                <form action="login_php.php" method="POST">
                    <img class="mb-4" src="authlab.png" alt="" width="55" height="50">
                    <h1 class="h3 mb-3 fw-normal">Please sign in</h1>
                    <div class="form-floating">
                        <input type="email" name="loginemail" class="form-control" id="loginemail" placeholder="name@example.com">
                        <label for="loginemail">Email address</label>
                        <?php if (isset($_SESSION['loginemailErr'])) : ?>
                            <p class="alert alert-danger"><?php echo $_SESSION['loginemailErr'] ?> </p>
                        <?php endif; ?>
                    </div>
                    <div class="form-floating">
                        <input type="password" name="loginpassword" class="form-control" id="loginpassword" placeholder="Password">
                        <label for="loginpassword">Password</label>
                        <?php if (isset($_SESSION['loginpasswordErr'])) : ?>
                            <p class="alert alert-danger"><?php echo $_SESSION['loginpasswordErr'] ?> </p>
                        <?php endif; ?>
                        <?php if (isset($_SESSION['loginFailed_msg'])) : ?>
                            <p class="alert alert-danger"><?php echo $_SESSION['loginFailed_msg'];
                                                            unset($_SESSION['loginFailed_msg']); ?> </p>
                        <?php endif; ?>
                    </div>
                    <div class="checkbox mb-3">
                        <label> <input type="checkbox" value="remember-me"> Remember me </label>
                    </div>
                    <button class="w-100 btn btn-lg btn-primary" type="submit">Log in</button>
                    <p class="mt-5 mb-3 text-muted">Don't have an account? <a href="signup.php">Sign up</a></p>
                </form>
            </main>
        </div>
    </main>
</section>
<?php include 'footer.php' ?>