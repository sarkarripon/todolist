<?php include  'header.php' ?>
<?php
if (!isset($_SESSION['loggedInUser'])) {
    header('Location:login.php');
    exit;
}

require 'connection.php';
//$id = $_SESSION['loggedInUser']['id'];
$id = $_GET['id'];
$sql = "SELECT * FROM todo_users where id= $id";
$result = $conn->query($sql);
$rows = $result->fetch_all(MYSQLI_ASSOC);


?>
<section class=" w-auto p-3" style="background-color: #eee;">
    <div class="container-sm">

        <?php if (isset($_SESSION['profileUpdate_msg'])) : ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> <?php echo $_SESSION['profileUpdate_msg'] ?>
                <?php unset($_SESSION['profileUpdate_msg']); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <?php foreach ($rows as $row) : ?>
            <div class="row">
                <div class="col-lg-4">
                    <div class="card mb-4">
                        <div class="card-body text-center">
                            <img src="image.jpeg" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">

                            <h5 class="my-3"><?php echo $row['first_name'] . " " . $row['last_name']; ?></h5>
                            <p class="text-muted mb-1"><?php echo ucfirst($_SESSION['loggedInUser']['role']); ?> since:</p>
                            <p class="text-muted mb-4"><?php echo date('j F, Y. g:i a', strtotime($row['member_since'])); ?></p>
                            <div class="d-flex justify-content-center mb-2">
                                <a type="button" class="btn btn-warning" href="editProfile.php?id=<?php echo $row['id']. "&source=member";?>">Edit</a>
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
                                    <p class="text-muted mb-0"><?php echo $row['first_name'] . " " . $row['last_name']; ?></p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Email</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0"><?php echo $row['email']; ?></p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Date of birth</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0"><?php echo $row['dob']; ?></p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Mobile</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0"><?php echo $row['mobile']; ?></p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Address</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0"><?php echo $row['address']; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php
                    require 'connection.php';
                    $id = $_GET['id'];
                    $sql = "SELECT * FROM todo_tasks WHERE created_by = $id ORDER BY created_at ASC";
                    $result = $conn->query($sql);
                    $latestTask = $result->fetch_all(MYSQLI_ASSOC);
                    ?>

                    <div class="form-group">
                        <label for="bio">Latest task:</label>
                        <?php foreach ($latestTask as $row) : ?>
                            <p class='alert alert-success'><?php echo "<b>".$row['title'] . " (Status - " . $row['status'] . ") <br> </b>". $row['description']?></p>
                        <?php endforeach; ?>
                    </div>

                </div>
            </div>
        <?php endforeach; ?>
    </div>
    </div>
</section>
</div>
</div>
</div>
<?php include  'footer.php' ?>