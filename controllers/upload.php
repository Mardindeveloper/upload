<?php
require '../config/config.php';
if (isset($_POST['send'])) {
    $message;
    $id_user = $_POST['id_user'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    if (empty($id_user)) {
        $message = "An error occurred, contact the developer";
        break_upload($message);
    }
    if (empty($description) or empty($title)) {
        $message = "Fill in the fields";
        break_upload($message);
    }
    if (isset($_FILES['file'])) {
        $allowed_extensions = array('jpg', 'jpeg', 'png', 'gif', 'jfif');
        $file_extension = strtolower(pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION));

        if (in_array($file_extension, $allowed_extensions)) {
            $uploadDir = '../upload/';
            $originalFileName = $_FILES['file']['name'];
            //جدا کردن پسوند فایل از نام
            $fileExtension = pathinfo($originalFileName, PATHINFO_EXTENSION);
            // شناسه یکتا جهانی
            $guid = uniqid();
            $newFileName = $guid . '.' . $fileExtension;
            $tmp = $_FILES['file']['tmp_name'];

            $result = InsertUploadData($db, $id_user, $title, $newFileName, $description);

            if ($result) {
                if (move_uploaded_file($tmp, $uploadDir . $newFileName)) {
                    $message = "File upload was successful";
                    success_upload($message);
                } else {
                    $message = "There was an error uploading the photo";
                    break_upload($message);
                }
            } else {
                $message = "There was an error in registering information";
                break_upload($message);
            }
        } else {
            $message = "File format not allowed!";
            format_not_allowed($message);
        }
    } else {
        $message = "File not uploaded";
        file_not_uploaded($message);
    }
}

$conn->close();

?>