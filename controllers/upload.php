<?php
require '../config/config.php';

if (isset($_POST['send'])) {
    $id_user = $_POST['id_user'];
    $title = $_POST['title'];
    $description = $_POST['description'];
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
                    success_upload();
                } else {
                    break_upload();
                }
            } else {
                break_upload();
            }
        } else {
            format_not_allowed();
        }
    } else {
        file_not_uploaded();
    }
}

$conn->close();

?>