<?php include  'header.php'; ?>
<?php
require 'connection.php';

$sql = "SELECT * FROM todo_users";
$result = $conn->query($sql);
$rows = $result->fetch_all(MYSQLI_ASSOC);
?>

<section class=" w-auto p-3" style="background-color: #eee;">
    <div class="w-auto p-3">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-lg-9 col-xl-10">
                <div class="card rounded-3">
                    <div class="card-body p-4">

                        <?php if (isset($_SESSION['proDel_msg'])) : ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Success!</strong> <?php echo $_SESSION['proDel_msg'] ?>
                                <?php unset($_SESSION['proDel_msg']); ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php endif; ?>

                        <?php if (isset($_SESSION['profileUpdate_msg'])) : ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Success!</strong> <?php echo $_SESSION['profileUpdate_msg'] ?>
                                <?php unset($_SESSION['profileUpdate_msg']); ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php endif; ?>
                        <h1 class="text-center">All users</h1>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $rowcount = 1; ?>
                                <?php foreach ($rows as $row) : ?>
                                    <tr>
                                        <td> <?php echo $rowcount++; ?></td>
                                        <td> <?php echo $row['first_name'] . " " . $row['last_name'] ?> </td>
                                        <td> <?php echo ucfirst($row['role']); ?></td>
                                        <td>
                                            <?php if (isset($row['role']) && $row['role'] == 'member') : ?>
                                            <a type="button" class="btn btn-warning btn-sm"  href="editProfile.php?id=<?php echo $row['id']. "&source=admin"?>">Edit</a>
                                            <?php endif; ?>

                                            <?php if (isset($row['role']) && $row['role'] == 'member') : ?>
                                                <form action="delProByadmin_php.php" method="POST">
                                                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                                    <input type="hidden" name="fname" value="<?php echo $row['first_name']; ?>">
                                                    <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete?')">Delete</button>
                                                </form>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include  'footer.php'; ?>