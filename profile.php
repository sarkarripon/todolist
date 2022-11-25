<?php include  'header.php'?>
<?php
if(!isset($_SESSION['loggedInUser'])){
    header('Location:login.php');
    exit;
}
?>
<section class="vh-100 w-auto p-3" style="background-color: #eee;">
<div class="container-sm">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card mb-4">
                        <div class="card-body text-center">
                            <img src="image.jpeg" alt="avatar"
                                 class="rounded-circle img-fluid" style="width: 150px;">
                            <h5 class="my-3">Name</h5>
                            <p class="text-muted mb-1">Joined:</p>
                            <p class="text-muted mb-4">Time</p>
                            <div class="d-flex justify-content-center mb-2">
                                <a type="button" class="btn btn-warning" href="edit.php">Edit</a>
                                <a type="button" class="btn btn-danger ms-1" onclick="return confirm('Are you sure to delete?')" href="">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Full Name</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">paragraph</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Email</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">paragraph</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Date of birth</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">Paragraph</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Mobile</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">Paragraph</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Address</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">Addr</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="bio">To-do list:</label>
                            <p class="alert alert-success">About </p>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
</div>
</div>
</div>
<?php include  'footer.php'?>
