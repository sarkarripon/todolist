<?php include 'header.php'; ?>
<?php

    require 'connection.php';
    $id = $_GET['id'];
    $sql = "select * from todo_users where id=$id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    $firstname = $row['first_name'];
    $lasttname = $row['last_name'];
    $email = $row['email'];
    $dob = $row['dob'];
    $mobile = $row['mobile'];
    $address = $row['address'];
    $propic = $row['propic'];
    $id = $row['id'];

    ?>
<section class=" w-auto p-3" style="background-color: #eee;">
    <div class="container w-auto p-3">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-lg-9 col-xl-10">
                <div class="card rounded-3">
                    <div class="card-body p-4">
                        <form action="editProfile_php.php" method="POST" enctype="multipart/form-data">
                        <h4 class="text-center my-3 pb-3">Update profile</h4>
                        <div class="row mb-4">
                            <div class="col">
                                <div class="form-outline">
                                    <input type="text" id="fname" value="<?php echo $firstname?>" placeholder="John" class="form-control" name="fname" required/>
                                    <label class="form-label" for="fname">First name</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-outline">
                                    <input type="text" id="lname" value="<?php echo $lasttname?>" name="lname" placeholder="Doe" class="form-control" required />
                                    <label class="form-label" for="lname">Last name</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-outline mb-4">
                            <input type="email" id="email" placeholder="hello@mail.com" value="<?php echo $email?>" name="email" class="form-control" disabled/>
                            <label class="form-label" for="email">Email</label>
                        </div>
                        <div class="form-outline mb-4">
                            <input type="date" id="dob" value="<?php echo $dob?>" name="dob" class="form-control" required />
                            <label class="form-label" for="dob">Date of birth</label>
                        </div>
                        <div class="form-outline mb-4">
                            <input type="tel" id="mobile" placeholder="01912 345678" value="<?php echo $mobile?>" name="mobile" class="form-control" required />
                            <label class="form-label" for="mobile">Mobile</label>
                        </div>
                        <div class="form-outline mb-4">
                            <input type="text" id="address" value="<?php echo $address?>" name="address" placeholder="75/2 Townhouse lane, TX 57321, US." class="form-control" required />
                            <label class="form-label" for="address">Address</label>
                        </div>
                            <div class="form-outline mb-4">
                                <input type="file" id="propic" name="propic" class="form-control" />
                                <label class="form-label" for="address">Profile picture</label>
                                <img style="height: 30px; width: 30px;" src="<?php echo $propic?>" alt="No image found">
                            </div>
                            <?php if (isset($_SESSION['propicErr'])) : ?>
                                <p class="alert alert-danger"><?php echo $_SESSION['propicErr'] ?> </p>
                            <?php endif; ?>

                            <div class="modal-footer">
                                <input type="hidden" name="id" value="<?php echo $id;?>">
                                <input type="hidden" name="source" value= <?php echo $_GET['source'];?>>
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

<?php include 'footer.php'; unset($_SESSION['propicErr']); ?>