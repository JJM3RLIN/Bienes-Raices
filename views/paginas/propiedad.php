<main class="contenedor seccion contenido-centrado">
    <h1 data-cy="titulo-propiedad"><?php echo $propiedad->titulo; ?></h1>
 
        <img src="imagenes/<?php echo $propiedad->imagen; ?>" loading ="lazy" alt="Propiedad destacada">

    <div class="resumen-propiedad">
        <p class="precio">$<?php echo number_format($propiedad->precio); ?></p>
        <ul class="iconos-caracteristicas">
            <li>
                <p> <?php echo $propiedad->habitaciones; ?> </p>
                <img src="build/img/icono_dormitorio.svg" class="color-icono" loading ="lazy" aria-hidden="true" alt="icono dormitorio">
            </li>
            <li>
                <p> <?php echo $propiedad->estacionamiento; ?> </p>
                <img src="build/img/icono_estacionamiento.svg" class="color-icono" loading ="lazy" aria-hidden="true" alt="icono estacionamiento">
               
            </li>
            <li>
                <p> <?php echo $propiedad->estacionamiento; ?> </p>
                <img src="build/img/icono_wc.svg" class="color-icono" loading ="lazy" aria-hidden="true" alt="icono baño">
            </li>
        </ul>
        <p>
        <?php echo $propiedad->descripcion; ?>
        </p>
    </div>
</main>