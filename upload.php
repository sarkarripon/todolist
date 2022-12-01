        <?php
        require 'connection.php';
        $name = $_POST['name'];
        $email = $_POST['email'];
        $uploadOk = 1;

        // folder to save file
        $target_dir = "uploads/";
        //file path with file name (Ex, uploads/image.jpg)
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        // Extracting file link
        $link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        // replacing php file name with empty
        $serverPath = str_replace("upload.php", "",$link);
        // finally making usable link by inserting file name at the end
        $original_link = $serverPath.$target_file;
        $extention = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        if ($_FILES['fileToUpload']["size"]>50000){
            echo "File is too large";
            exit();
        }
        if ($extention !='png'){
            echo "Only png format is supported";
            exit();
        }

        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";

        }


        $sql = "INSERT INTO fileupload (files,name,email,ext) VALUES ('$original_link','$name','$email','$extention')";

        if ($conn->query($sql) === TRUE) {
            header('location:test.php');
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }


        ?>