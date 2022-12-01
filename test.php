<?php include 'header.php'?>
<!--
enctype = helps to extract file metadata
name="fileToUpload" = it is a array name which will hold image metadata
-->
<form action="upload.php" method="post" enctype="multipart/form-data">
    Name: <input type="text" name="name"><br>
    E-mail: <input type="text" name="email"><br>
    Choose an image <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>

<?php  require 'connection.php';

$sql = "SELECT * FROM fileupload ORDER BY id DESC";
$result = $conn->query($sql);
$rows = $result->fetch_all(MYSQLI_ASSOC);
//echo "<pre>"; print_r($rows); exit();

?>
    <div class="container-fluid">
        <div class="px-lg-5">
                <?php foreach ($rows as $row): ?>
                <div class="col-3 float-start">
                        <img src="<?php echo $row['files']; ?>" class="img-fluid img-thumbnail rounded mx-auto d-block" style="height: 290px;width:290px"  alt="image">
                    <p>name : <?php echo $row['name']; ?> </p>
                    <p>Email : <?php echo $row['email']; ?> </p>
                    </div>
                <?php endforeach;?>
                </div>
    </div>
<?php include 'footer.php'?>