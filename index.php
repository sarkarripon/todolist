<?php include  'header.php' ?>

<?php
if (!isset($_SESSION['loggedInUser'])) {
    header('Location:login.php');
    exit;
}
$_SESSION['open_modal'] = "1";
?>
<!-- Begin page content -->
<section class=" w-auto p-3" style="background-color: #eee;">
    <div class="w-auto p-3">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-lg-9 col-xl-10">
                <div class="card rounded-3">
                    <div class="card-body p-4">

                        <?php if (isset($_SESSION['record_msg'])) : ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Success!</strong> <?php echo $_SESSION['record_msg'] ?>
                                <?php unset($_SESSION['record_msg']); ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php endif; ?>

                        <?php if (isset($_SESSION['recordUpdate_msg'])) : ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Success!</strong> <?php echo $_SESSION['recordUpdate_msg']; ?>
                                <?php unset($_SESSION['recordUpdate_msg']); ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php endif; ?>


                        <?php
                        require 'connection.php';
                        $id = $_SESSION['loggedInUser']['id'];
                        $role = $_SESSION['loggedInUser']['role'];

                        if ($role == 'admin') {
                            $sql = "SELECT * FROM todo_tasks ORDER BY status ASC";
                        } else {
                            $sql = "SELECT * FROM todo_tasks WHERE created_by = $id ORDER BY status ASC";
                        }

                        $result = $conn->query($sql);
                        $rows = $result->fetch_all(MYSQLI_ASSOC);

                        ?>

                        <h4 class="text-center my-3 pb-3">Task list</h4>
                        <form>
                            <div class="text-end p-3 col-12 ">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newtask">Create task</button>
                            </div>
                        </form>

                        <table class="table mb-4">
                            <thead>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Todo item</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Change Status</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $rowcount = 1; ?>
                                <?php foreach ($rows as $row) : ?>
                                    <tr>
                                        <th><?php echo $rowcount++; ?></th>
                                        <td><?php echo $row['title']; ?></td>
                                        <td>

                                            <p>
                                                <?php if ($row['status'] == 'active') : ?>
                                                    <span class="badge bg-danger"><?php echo $row['status'] ?></span>
                                                <?php elseif ($row['status'] == 'inactive') : ?>
                                                    <span class="badge bg-primary"><?php echo $row['status'] ?></span>
                                                <?php elseif ($row['status'] == 'finished') : ?>
                                                    <span class="badge bg-success"><?php echo $row['status'] ?></span>
                                                <?php endif; ?>

                                            </p>
                                        </td>


                                        <td>
                                            <form action="status_update.php" method="POST">
                                                <select name="task_status" id="">
                                                    <option value="" selected disabled>Select status</option>
                                                    <option value="active">Active</option>
                                                    <option value="inactive">Inactive</option>
                                                    <option value="finished">Finished</option>
                                                </select>
                                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                                <button type="submit" class="btn btn-warning">✔</button>
                                            </form>

                                        </td>
                                        <td>
                                            <form action="taskEdit.php" method="POST">
                                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                                <button class="btn btn-warning btn-sm">Edit</button>
                                            </form>

                                            <form action="deleteTask_php.php" method="POST">
                                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                                <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete?')">Delete</button>
                                            </form>

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

<!-- Modal -->
<?php if (isset($_SESSION['open_modal_edit']) || isset($_SESSION['open_modal'])) : ?>
    <div class="modal fade" id="newtask" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newtask">New Task ...</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <!-- Modal content start -->
                    <form class="row g-3 needs-validation" action="task_php.php" method="POST">

                        <div class="form-floating">
                            <input type="text" class="form-control" name="tasktitle" id="tasktitle" placeholder="Assignment on monday">
                            <label for="fname">Task title</label>
                        </div>
                        <div class="form-floating">
                            <textarea class="form-control " name="taskDesc" placeholder="Task description goes here"></textarea>
                            <label for="floatingTextarea">Description</label>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Save</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </form>
                    <!-- Modal content end -->

                </div>

            </div>
        </div>
    </div>
    </div>
<?php endif; ?>
<?php include  'footer.php' ?>