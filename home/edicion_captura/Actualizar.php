<?php
$mysqli = new mysqli('localhost', 'desarrollo_delta', '*Delta2021*', 'intranet'); //servidor, usuario de base de datos, contraseña del usuario, nombre de base de datos
$mysqli->set_charset('utf8');
if (isset($_POST['btn_save_updates'])) {
    $id_imagen = $_POST['id_imagen'];
    $titulo_imagen = $_POST['user_name'];
    $tipo_imagen = $_POST['user_job'];
    $id_imagen = $_POST['id_imagen'];
    $link_imagen = $_POST['link'];
    $imgFile = $_FILES['user_image']['name'];
    $tmp_dir = $_FILES['user_image']['tmp_name'];
    $imgSize = $_FILES['user_image']['size'];
    $sql = mysqli_query($mysqli, "SELECT * FROM `captura` WHERE  `imagen_ID` = '$id_imagen'");
    while ($edit_row = mysqli_fetch_array($sql, MYSQLI_ASSOC)) {
        if ($imgFile) {
            $upload_dir = 'imagenes/'; //upload directory
            $imgExt = strtolower(pathinfo($imgFile, PATHINFO_EXTENSION)); // get image extension
            $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
            $userpic = rand(5000, 5000000) . "." . $imgExt;
            if (in_array($imgExt, $valid_extensions)) {
                if ($imgSize < 5000000) {
                    unlink($upload_dir . $edit_row['imagen_Img']);
                    move_uploaded_file($tmp_dir, $upload_dir . $userpic);
                } else {
                    $errMSG = "Su archivo es demasiado grande mayor a 6MB";
                }
            } else {
                $errMSG = "Solo archivos JPG, JPEG, PNG & GIF .";
            }
        } else {
            $userpic = $edit_row['imagen_Img']; // old image from database
        }
        if (!isset($errMSG)) {
            $actualizar = "UPDATE `captura` SET `imagen_Marca` = '$titulo_imagen', `imagen_Tipo` = '$tipo_imagen', `imagen_Img` = '$userpic', `link` = '$link_imagen' WHERE `Imagen_ID` = '$id_imagen' ";
            $query = mysqli_query($mysqli, $actualizar);
            ?>
            <script>
                alert('Archivo editado correctamente ...');
                window.location.href = '../captura.php';
            </script>
            <?php
        }
    }
}
?>