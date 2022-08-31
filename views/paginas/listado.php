<div class="contedor-anuncios">
        <?php 
        //while($propiedad = mysqli_fetch_assoc($consulta)): 
        foreach($propiedades as $propiedad):
        ?>
        <div class="anuncio" data-cy= "anuncio">
        
                <img src="/public/imagenes/<?php echo $propiedad->imagen ?>" loading="lazy" alt="anuncio"> 
            <div class="contenido-anuncio">
                <h3><?php echo $propiedad->titulo; ?></h3>
                <p class="descripcion">
                <?php echo $propiedad->descripcion; ?>
                </p>
                <p class="precio">$<?php echo number_format( $propiedad->precio ); ?></p>
                <!--Listado de iconos-->
                 <ul class="iconos-caracteristicas">
                        <li>
                            <p> <?php echo $propiedad->habitaciones; ?> </p>
                            <img src="/public/build/img/icono_dormitorio.svg" class="color-icono" loading ="lazy" aria-hidden="true" alt="icono dormitorio">
                        </li>
                        <li>
                            <p> <?php echo $propiedad->estacionamiento; ?></p>
                            <img src="/public/build/img/icono_estacionamiento.svg" class="color-icono" loading ="lazy" aria-hidden="true" alt="icono estacionamiento">
                           
                        </li>
                        <li>
                            <p> <?php echo $propiedad->wc; ?></p>
                            <img src="/public/build/img/icono_wc.svg" class="color-icono" loading ="lazy" aria-hidden="true" alt="icono baño">
                        </li>
                    </ul>
                <a data-cy="enlace-propiedades" href="/public/propiedad?id=<?php echo $propiedad->id; ?>" class="btn-verde">Ver propiedad</a>
            </div>
        </div> <!--Anuncio fin-->

      <?php endforeach; ?>
    </div>