<?php
// Directorio de imágenes
$directorio = 'C:\xampp\htdocs\newintranet\assets\images\ambiental\Siembra 2023';

// Lee los archivos en el directorio
$archivos = scandir($directorio);

// Filtra para obtener solo imágenes
$imagenes = array_filter($archivos, function ($archivo) {
    return in_array(strtolower(pathinfo($archivo, PATHINFO_EXTENSION)), ['jpg', 'png', 'gif', 'jpeg']);
});
?>
<li data-type="siembra_2023">
    <!-- <p class="pl-50 pr-20" style="color: black;">El 22 de abril de 2021 participamos en la siembra de 700 frailejones en el Páramo de Sumapaz en colaboración con el batallón de Alta Montaña.</p> -->
</li>
<?php foreach ($imagenes as $imagen) : ?>
    <li data-type="siembra_2023">
        <div class="card card-shadow">
            <figure class="card-img-top overlay-hover overlay">
                <img class="overlay-figure overlay-scale" src="../../assets/images/ambiental/Siembra 2023/<?php echo htmlspecialchars($imagen);?>" alt="...">
                <figcaption class="overlay-panel overlay-background overlay-fade overlay-icon">
                    <a class="icon wb-search" href="../../assets/images/ambiental/Siembra 2023/<?php echo htmlspecialchars($imagen);?>"></a>
                </figcaption>
            </figure>
            <div class="card-block">
                <h4 class="card-title"></h4>
            </div>
        </div>
    </li>
<?php endforeach; ?>
