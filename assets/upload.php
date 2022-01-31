<?php
    require_once 'dbHandler.php';
    if (isset($_POST["submit"])) {
        //Upload a new document
        if ($_POST["submit"] == "upload"){
            $title=$_POST["title"];
            $desc=$_POST["description"];

            $file = $_FILES["fileToUpload"]["name"];            
            $targetDir = "uploads/";
            $targetFile = $targetDir . basename($file);
            $uploadOk = 1;
            $fileType = pathinfo($file,PATHINFO_EXTENSION);
            // Check if file already exists
            if (file_exists($targetFile)) {
                header("location: ../documents.php?error=exists");
                exit();
            }
            if (!in_array($fileType, ['zip', 'pdf', 'docx', 'jpg'])){
                header("location: ../documents.php?error=wrongtype");
                exit();
            }
            // Check file size
            if ($_FILES["fileToUpload"]["size"] > 500000000) {
                header("location: ../documents.php?error=toolarge");
                exit();
            }
            if ($uploadOk == 0) {
                header("location: ../documents.php?error=not");
                exit();
            // if everything ok, upload
            } 
            else {
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], '../' . $targetFile)) {
                    $query = "INSERT INTO `documents` (`docID`, `title`, `description`, `filePath`) VALUES (NULL, '$title', '$desc', '$targetFile');";
                    $queryrun = mysqli_query($conn,$query);
                    header("location: ../documents.php?error=new");
                } 
                else {
                    header("location: ../documents.php?error=notuploaded");
                    exit();
                }
            }   
        }
        //Manage a document
        else if ($_POST["submit"] == "manage"){
            $id = $_POST["id"];
            $title=$_POST["title"];
            $desc=$_POST["description"];
            $file = $_FILES["fileToUpload"]["name"];
            if(!empty($title)){
                $query = "UPDATE `documents` SET `title` = '$title' WHERE `documents`.`docID` = '$id';";
                $queryrun = mysqli_query($conn,$query);
              }
            if(!empty($desc)){
                $query = "UPDATE `documents` SET `description` = '$desc' WHERE `documents`.`docID` = '$id';";
                $queryrun = mysqli_query($conn,$query);
            }
            if(!empty($file)){
                $targetDir = "uploads/";
                $targetFile = $targetDir . basename($file);
                $uploadOk = 1;
                $fileType = pathinfo($file,PATHINFO_EXTENSION);
                // Check if file already exists
                if (file_exists($targetFile)) {
                    header("location: ../documents.php?error=exists");
                    exit();
                }
                if (!in_array($fileType, ['zip', 'pdf', 'docx', 'jpg'])){
                    header("location: ../documents.php?error=wrongtype");
                    exit();
                }
                // Check file size
                if ($_FILES["fileToUpload"]["size"] > 500000000) {
                    header("location: ../documents.php?error=toolarge");
                    exit();
                }
                if ($uploadOk == 0) {
                    header("location: ../documents.php?error=not");
                    exit();
                // if everything ok, upload
                }
                else {
                    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], '../' . $targetFile)) {
                        $query = "UPDATE `documents` SET `filePath` = '$targetFile' WHERE `documents`.`docID` = '$id';";
                        $queryrun = mysqli_query($conn,$query);
                        header("location: ../documents.php?error=filechanged");
						exit();
                    } 
                    else {
                        header("location: ../documents.php?error=notuploaded");
                        exit();
                    }
                }
            }
			else{
				header("location: ../documents.php?error=changedText");
                exit();
       		}
    	}
	}
    //Delete a document
    else if (isset($_POST["delete"])){
        $id = $_POST["delete"];
        $query = "DELETE FROM documents WHERE docID = '$id';";
        $queryrun = mysqli_query($conn,$query);
        header("location: ../documents.php?deleteddoc");
      }
      else {
        header("location: ../documents.php");
        exit();
      }
