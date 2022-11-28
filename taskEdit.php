<?php include  'header.php'; ?>

<?php
require 'connection.php';

$id = $_POST['id'];
$sql = "select * from `todo_tasks` where id=$id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
//var_dump($row); exit();

$title = $row['title'];
$description = $row['description'];

?>

<section class=" w-auto p-3" style="background-color: #eee;">
    <div class="w-auto p-3">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-lg-9 col-xl-10">
                <div class="card rounded-3">
                    <div class="card-body p-4">

                        <form class="row g-3 needs-validation" action="taskEdit_php.php" method="POST">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="tasktitle" value="<?php echo $title ?>" id="tasktitle" placeholder="Assignment on monday">
                                <label for="fname">Task title</label>
                            </div>
                            <div class="form-floating">
                                <textarea class="form-control " name="taskDesc" placeholder="Task description goes here"><?php echo $description ?></textarea>
                                <label for="floatingTextarea">Description</label>
                            </div>
                            <div class="modal-footer">
                                <input type="hidden" name="id" value="<?php echo $id; ?>">
                                <button type="submit" class="btn btn-primary">Update</button>
                                <a type="button" class="btn btn-secondary" href="index.php">Close</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include  'footer.php' ?>