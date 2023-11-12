<?php

function formUploader($idUser, $userName, $db)
{
    ?>
    <title>Upload Image</title>
    <link rel="stylesheet" href="assets/css/style.css">
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

    <body>
        <div class="header">
            <div class="right">
                <a href='helper/logout.php' class="logout">Logout</a>
            </div>
            <div class="left">
                <p>Welcome
                    <?= $userName ?>
                </p>
            </div>
        </div>
        <section class="main">
            <div class="upload">
                <p>Upload Image</p>
                <form action="controllers/upload.php" method="post" enctype="multipart/form-data" name="form">
                    <input type="hidden" name="id_user" value="<?= $idUser ?>">
                    <label for="name">Title Image</label>
                    <input type="text" name="title" require>
                    <label for="description">Description</label>
                    <textarea name="description" id="description" maxlength="300"
                        title="be less than 300 characters" require></textarea>
                    <div class="submit">
                        <label class="custom-file-upload">
                            <input type="file" class="file" name="file" id="formFile">
                            Upload Image
                        </label>
                        <button type="submit" name="send">Upload</button>
                    </div>

                </form>
            </div>
        </section>

        <section class="table">
            <table>
                <tr>
                    <th>Rows</th>
                    <th>User Name</th>
                    <th>Title Image</th>
                    <th>Description</th>
                    <th>Image</th>
                    <?php
                    $sql = "SELECT * FROM `images` WHERE `id_user` = $idUser ORDER BY `id` DESC LIMIT 15";
                    $stmt = $db->prepare($sql);
                    $stmt->execute();
                    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    if ($stmt->rowCount() > 0) {
                        $i = 1;

                        foreach ($result as $row) {
                            $id_user = $row['id_user'];
                            $sql = "SELECT `first_name`, `last_name` FROM `users` WHERE `id` = $id_user";
                            $stmt = $db->prepare($sql);
                            $stmt->execute();
                            $result = $stmt->fetch(PDO::FETCH_ASSOC);
                            ?>
                        <tr>
                            <td>
                                <?= $i ?>
                            </td>
                            <td>
                                <?= $result['first_name'] . ' ' . $result['last_name']; ?>
                            </td>
                            <td>
                                <?= $row['title'] ?>
                            </td>
                            <td>
                                <?= $row['description'] ?>
                            </td>
                            <td>
                                <?php
                                    $pathImage = "upload/" . $row['name_img'];
                                    if(file_exists($pathImage)) {
                                        ?>
                                        <img src="<?= $pathImage ?>" alt="<?= $row['title'] ?>">
                                        <?php
                                    } else {
                                        echo "Photo not found!!";
                                    }
                                ?>
                            </td>
                        </tr>
                        <?php
                        $i++;
                        }

                    } else {
                        ?>
                    <tr>
                        <td colspan="6">
                            <p>No record found</p>
                        </td>
                    </tr>
                    <?php
                    }
                    ?>
                </tr>
            </table>

        </section>
    </body>

    </html>
    <?php
}