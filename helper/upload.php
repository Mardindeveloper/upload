<?php
require_once '../config/db.php';
require_once 'function.php';

if (isset($_POST['send'])) {
    $id_user = $_POST['id_user'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    if (isset($_FILES['file'])) {
        $allowed_extensions = array('jpg', 'jpeg', 'png', 'gif','jfif');
        $file_extension = strtolower(pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION));

        if (in_array($file_extension, $allowed_extensions)) {
            $uploadDir = '../upload/';
            $originalFileName = $_FILES['file']['name'];
            $fileExtension = pathinfo($originalFileName, PATHINFO_EXTENSION); //جدا کردن پسوند فایل از نام
            $guid = uniqid(); // شناسه یکتا جهانی
            $newFileName = $guid . '.' . $fileExtension;
            $tmp = $_FILES['file']['tmp_name'];

            $sql = "INSERT INTO images (`id_user`, `title`, `name_img`, `description`) VALUES ('$id_user', '$title', '$newFileName', '$description')";
            $stmt = $db->prepare($sql);
            $result = $stmt->execute();

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