<?php


// Check if image file is a actual image or fake image
if (isset($_POST["submit"])) {

    for ($i = 0; $i < count($_FILES['filesToUpload']['name']); $i++) {
        //Get the temp file path
        $tmpFilePath = $_FILES['filesToUpload']['tmp_name'][$i];
        //Make sure we have a filepath
        if ($tmpFilePath != "") {
            //Setup our new file path
            $newFilePath = "../uploads/" . $_FILES['filesToUpload']['name'][$i];

            // Allow certain file formats
            $imageFileType = pathinfo($newFilePath, PATHINFO_EXTENSION);
            if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif"
            ) {
                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                die;
            } else {
                echo "File is an image - " . $imageFileType . ".";
                // Check if file already exists
                if (file_exists($newFilePath)) {
                    echo "Sorry, file already exists.";
                    die;
                } else { // Check file size
                    if ($_FILES['fileToUpload']['size'][0] > 500000) {
                        echo "Sorry, your file is too large.";
                        die;
                    } else {
                        //Upload the file into the temp dir
                        if (move_uploaded_file($tmpFilePath, $newFilePath)) {
                            echo "The file " . $newFilePath . " has been uploaded.";
                        } else {
                            echo "Sorry, there was an error uploading your file.";
                        }

                    }

                }
            }

        }
    }
}

/*     /
             // if everything is ok, try to upload file
                 var_dump($newFilePath);
                 if (move_uploaded_file($tmpFilePath, $newFilePath)) {

             }
         }
     }
 }
}

}
}*/