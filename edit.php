<?php include 'header.php'; ?>
<!-- Begin page content -->
<section class=" w-auto p-3" style="background-color: #eee;">
    <div class="container w-auto p-3">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-lg-9 col-xl-10">
                <div class="card rounded-3">
                    <div class="card-body p-4">

                        <h4 class="text-center my-3 pb-3">Update profile</h4>
                        <div class="row mb-4">
                            <div class="col">
                                <div class="form-outline">
                                    <input type="text" id="fname" placeholder="John" class="form-control" />
                                    <label class="form-label" for="fname">First name</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-outline">
                                    <input type="text" id="lname" placeholder="Doe" class="form-control" />
                                    <label class="form-label" for="lname">Last name</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-outline mb-4">
                            <input type="email" id="email" placeholder="hello@mail.com" class="form-control" />
                            <label class="form-label" for="email">Email</label>
                        </div>
                        <div class="form-outline mb-4">
                            <input type="date" id="dob" class="form-control" />
                            <label class="form-label" for="dob">Date of birth</label>
                        </div>
                        <div class="form-outline mb-4">
                            <input type="number" id="mobile" placeholder="01912 345678" class="form-control" />
                            <label class="form-label" for="mobile">Mobile</label>
                        </div>
                        <div class="form-outline mb-4">
                            <input type="text" id="address" placeholder="75/2 Townhouse lane, TX 57321, US." class="form-control" />
                            <label class="form-label" for="address">Address</label>
                        </div>

                        <input type="hidden" name="id" value="">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="index.php">Cancel</a>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'footer.php'; ?>