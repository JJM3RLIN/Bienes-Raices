<?php 
//se pude hacer un template para los anuncios 

//Importar concexión a la base de datos

/*
$db = conectarDB();

$query = "SELECT * FROM propiedades LIMIT ${limite}";
$consulta = mysqli_query($db, $query);
*/

use App\Propiedad;


if($_SERVER["SCRIPT_NAME"] === "/anuncios.php"){
$propiedades = Propiedad::all();
}else{
    $propiedades = Propiedad::algunos(3);
}

   ?>  

<div class="contedor-anuncios">
        <?php 
        //while($propiedad = mysqli_fetch_assoc($consulta)): 
        foreach($propiedades as $propiedad):
        ?>
        <div class="anuncio">
        
                <img src="imagenes/<?php echo $propiedad->imagen
                //$propiedad['imagen']; ?>" loading="lazy" alt="anuncio"> 
            <div class="contenido-anuncio">
                <h3><?php echo $propiedad->titulo;
                //echo $propiedad['titulo']; ?></h3>
                <p class="descripcion">
                <?php echo $propiedad->descripcion;
                //echo $propiedad['descripcion']; ?>
                </p>
                <p class="precio">$<?php echo number_format( $propiedad->precio );
                //echo number_format ($propiedad['precio']); ?></p>
                <!--Listado de iconos-->
                 <ul class="iconos-caracteristicas">
                        <li>
                            <p> <?php echo $propiedad->habitaciones;
                            //echo $propiedad['habitaciones']; ?> </p>
                            <img src="build/img/icono_dormitorio.svg" class="color-icono" loading ="lazy" aria-hidden="true" alt="icono dormitorio">
                        </li>
                        <li>
                            <p> <?php echo $propiedad->estacionamiento;
                            //echo $propiedad['estacionamiento']; ?></p>
                            <img src="build/img/icono_estacionamiento.svg" class="color-icono" loading ="lazy" aria-hidden="true" alt="icono estacionamiento">
                           
                        </li>
                        <li>
                            <p> <?php echo $propiedad->wc;
                            //echo $propiedad['wc']; ?></p>
                            <img src="build/img/icono_wc.svg" class="color-icono" loading ="lazy" aria-hidden="true" alt="icono baño">
                        </li>
                    </ul>
                <a href="anuncio.php?id=<?php echo $propiedad->id; ?>" class="btn-verde">Ver propiedad</a>
            </div>
        </div> <!--Anuncio 1 fin-->

      <?php endforeach; ?>
    </div>