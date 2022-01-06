<?php
    require_once 'dbhandler.php';
    if (isset($_POST["submit"])) {
        //Upload a new assignment
        if ($_POST["submit"] == "upload"){
            $targets=$_POST["targets"];
            $deli=$_POST["deliverables"];
            $deadline=$_POST["deadline"];

            $file = $_FILES["fileToUpload"]["name"];            
            $targetDir = "uploads/";
            $targetFile = $targetDir . basename($file);
            $uploadOk = 1;
            $fileType = pathinfo($file,PATHINFO_EXTENSION);

            //Check if file already exists
            if (file_exists($targetFile)) {
                header("location: ../homework.php?error=exists");
                exit();
            }
            //Check file type
            if (!in_array($fileType, ['zip', 'pdf', 'docx', 'jpg'])){
                header("location: ../homework.php?error=wrongtype");
                exit();
            }
            //Check file size
            if ($_FILES["fileToUpload"]["size"] > 500000000) {
                header("location: ../homework.php?error=toolarge");
                exit();
            }
            //If error, terminate
            if ($uploadOk == 0) {
                header("location: ../homework.php?error=not");
                exit();
            //If everything ok, upload
            } 
            else {
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], '../' . $targetFile)) {
                    $query = "INSERT INTO `assignments` (`ergID`, `targets`, `filePath`, `deliverables`, `deadline`) VALUES (NULL, '$targets', '$targetFile', '$deli', '$deadline');";
                    $queryrun = mysqli_query($conn,$query);
                    header("location: ../homework.php?error=new");
                } 
                else {
                    header("location: ../homework.php?error=notuploaded");
                    exit();
                }
            }   
        }
        //Manage an assignment
        else if ($_POST["submit"] == "manage"){
            $id = $_POST["id"];
            $targets=$_POST["targets"];
            $deli=$_POST["deliverables"];
            $deadline=$_POST["deadline"];
            $file = $_FILES["fileToUpload"]["name"];
            if(!empty($targets)){
                $query = "UPDATE `assignments` SET `targets` = '$targets' WHERE `assignments`.`ergID` = '$id';";
                $queryrun = mysqli_query($conn,$query);
            }
            if(!empty($deli)){
                $query = "UPDATE `assignments` SET `deliverables` = '$deli' WHERE `assignments`.`ergID` = '$id';";
                $queryrun = mysqli_query($conn,$query);
            }
            if(!empty($deadline)){
                $query = "UPDATE `assignments` SET `deadline` = '$deadline' WHERE `assignments`.`ergID` = '$id';";
                $queryrun = mysqli_query($conn,$query);
            }
            if(!empty($file)){
                $targetDir = "uploads/";
                $targetFile = $targetDir . basename($file);
                $uploadOk = 1;
                $fileType = pathinfo($file,PATHINFO_EXTENSION);
                // Check if file already exists
                if (file_exists($targetFile)) {
                    header("location: ../homework.php?error=exists");
                    exit();
                }
                if (!in_array($fileType, ['zip', 'pdf', 'docx', 'jpg'])){
                    header("location: ../homework.php?error=wrongtype");
                    exit();
                }
                // Check file size
                if ($_FILES["fileToUpload"]["size"] > 500000000) {
                    header("location: ../homework.php?error=toolarge");
                    exit();
                }
                if ($uploadOk == 0) {
                    header("location: ../homework.php?error=not");
                    exit();
                // if everything ok, upload
                } 
                else {
                    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], '../' . $targetFile)) {
                        $query = "UPDATE `assignments` SET `filePath` = '$targetFile' WHERE `documents`.`docID` = '$id';";
                        $queryrun = mysqli_query($conn,$query);
                        header("location: ../homework.php?error=filechanged");
                    } 
                    else {
                        header("location: ../homework.php?error=notuploaded");
                        exit();
                    }
                }
            }
            header("location: ../homework.php");
            exit();
        }
    }
    //Delete an assignment
    else if (isset($_POST["delete"])){
        $id = $_POST["delete"];
        $query = "DELETE FROM assignments WHERE ergID = '$id';";
        $queryrun = mysqli_query($conn,$query);
        header("location: ../homework.php?deleteddoc");
      }
      else {
        header("location: ../homework.php");
        exit();
      }
    