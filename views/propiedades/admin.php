<?php //ya se tiene el arreglo que se manda ?>
<main class="contenedor seccion"> 
    <h1>Administrador de Bienes Raíces</h1>
    <?php 
    if($resultado){ ?>
    <?php if(intval($resultado) === 1):?>
     <p class="alerta exito"> Creado correctamente</p>

     <?php elseif(intval($resultado) === 2 ): ?>
     <p class="alerta exito"> Actualizado correctamente</p>

     <?php elseif(intval($resultado) === 3 ): ?>
     <p class="alerta exito"> Eliminado correctamente</p>

    <?php endif;?>
    <?php }?>

  <div class="paginacion">
      <button type="Submit" class="btn-paginacion actual" data-paso="1">Propiedades</button>
      <button type="Submit" class="btn-paginacion" data-paso="2">Vendedores</button>
  </div>
   <div id="paso-1" class="section"> 
   <h2>Propiedades</h2>
    <a href="/public/propiedades/crear" class="btn-amarillo">Nueva propiedad</a>
    <table class="propiedades"> <!--listar las propiedades-->
     <thead>
         <tr>
             <th>ID</th>
             <th>Titulo</th>
             <th>Imagen</th>
             <th>Precio</th>
             <th>Acciones</th>
         </tr>
     </thead>
     <!--Mostrar lo traido de ka bd-->
     <tbody>
         <!--Traer la info de la db como un arreglo-->
        <?php 
        //while($arreglo = mysqli_fetch_assoc($consulta) ): nos trae un arreglo
        //para poder iterar el array de objetos de propiedades    
        foreach($propiedades as $arreglo):
            //con felcha porque son objetos
            ?>
        <tr>
             <td> <?php echo $arreglo->id; ?> </td>
             <td><?php echo $arreglo->titulo; ?></td>
             <td> <img src="/public/imagenes/<?php echo $arreglo->imagen; ?>" alt="Casa" class="imagen-tabla">   </td>
             <td>$ <?php echo $arreglo->precio; ?></td>
             <td>
                 <form method="POST" class="w-100" action="/public/propiedades/eliminar"> <!--Para enviar el id de lo que se eliminara-->

                 <input type="hidden" name="id" value="<?php echo $arreglo->id; ?>">
                 <input type="hidden" name="tipo" value="propiedad">
                 <button type="submit" class="btn-rojo-block">Eliminar</button>
                 </form>
                 
                 <a href="/public/propiedades/actualizar?id=<?php echo $arreglo->id;?>" class="btn-amarillo-block">Actualizar</a>
             </td>
         </tr>

        <?php endforeach;?>
     </tbody>
    </table>
   </div>

    <div id="paso-2" class="section">
    <h2>Vendedores</h2>
    <a href="/public/vendedores/crear" class="btn-amarillo">Nuev(a) vendedor</a>
    <table class="propiedades">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Teléfono</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        <?php   
        foreach($vendedores as $vendedor):
            //con felcha porque son objetos
            ?>
        <tr>
             <td> <?php echo $vendedor->id; ?> </td>
             <td><?php echo $vendedor->nombre . " " . $vendedor->apellido; ?></td> 
             <td> <?php echo $vendedor->telefono;?></td>
             <td>
                 <form method="POST" class="w-100" action="/public/vendedores/eliminar"> <!--Para enviar el id de lo que se eliminara-->

                 <input type="hidden" name="id" value="<?php echo $vendedor->id; ?>">
                 <!--El tipo es para validar que si exita ese crud-->
                 <input type="hidden" name="tipo" value="vendedor">
                 <button type="submit" class="btn-rojo-block">Eliminar</button>
                 </form>
                 
                 <a href="/public/vendedores/actualizar?id=<?php echo $vendedor->id;?>" class="btn-amarillo-block">Actualizar</a>
             </td>
         </tr>

        <?php endforeach;?>
        </tbody>
    </table>
    </div>
</main>