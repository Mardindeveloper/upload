<?php
session_start();
$idUser = $_SESSION['id_user'];
$userName = $_SESSION['username'];
if (!isset($idUser)) {
    header("Location: login.php");
}
require 'config/db.php';
require 'view/Upload.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Image</title>
    <link rel="stylesheet" href="assets/style.css">
    <?php
    if (isset($_GET['my_variable'])) {
        $my_variable = $_GET['my_variable'];
        ?>
        <script>
            setTimeout(function () {
                history.replaceState({}, document.title, window.location.href.split('?')[0]);
            }, 0);
            alert('<?= $my_variable ?>');
        </script>
        <?php
    }
    ?>
</head>

<?php
headerUploaeder($userName);
formUploader($idUser,$db);
?>

</html>