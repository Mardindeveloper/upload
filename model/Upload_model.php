<?php
function InsertUploadData($db, $id_user, $title, $newFileName, $description)
{
    $sql = "INSERT INTO images (`id_user`, `title`, `name_img`, `description`) VALUES ('$id_user', '$title', '$newFileName', '$description')";
    $stmt = $db->prepare($sql);
    return $stmt->execute();
}