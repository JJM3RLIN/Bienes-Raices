<fieldset>
            <legend>Información general</legend>
            <label for="titulo">Titulo:</label>
            <!--al poner propiedad[namedelInput] se guardan en el arreglo todos los names
            y nos hace mas facil a lo enviado por el formulario-->
            <input type="text" name="propiedad[titulo]" placeholder="Titulo de la propiedad" id="titulo" value="<?php echo  sanitizar($propiedad->titulo); ?>">

            <label for="precio">Precio:</label>
            <input type="number" name="propiedad[precio]" placeholder="Precio de la propiedad" id="precio" min="1" value="<?php echo  sanitizar($propiedad->precio); ?>">

            <label for="imagen">Imagen:</label>
            <input type="file" id="imagen" accept="image/jpeg, image/png" name="propiedad[imagen]">
            <?php if($propiedad->imagen){?>
                <img src="/public/imagenes/<?php echo $propiedad->imagen ?>" class="imagen-small">
             <?php } ?>
            <label for="descripcion">Descripción:</label>
            <textarea id="descripcion" name="propiedad[descripcion]"><?php echo sanitizar($propiedad->descripcion); ?></textarea>
        </fieldset>

        <fieldset>
            <legend>Información de la Propiedad</legend>
            <label for="habitaciones">Habitaciones:</label>
            <input type="number" name="propiedad[habitaciones]" placeholder="Ej:3" id="habitaciones" min="1" max='9' value="<?php echo sanitizar($propiedad->habitaciones); ?>">

            <label for="wc">Baños:</label>
            <input type="number" name="propiedad[wc]" placeholder="Ej:2" id="wc" min="1" max='9' value="<?php echo  sanitizar($propiedad->wc); ?>">

            <label for="estacionamiento">Estacionamientos:</label>
            <input type="number" name="propiedad[estacionamiento]" placeholder="Ej:3" id="estacionamiento" min="1" max='9'value="<?php echo sanitizar($propiedad->estacionamiento); ?>">
        </fieldset>

        <fieldset>
            <legend for= "vendedor">Vendedor</legend>
            <select name="propiedad[idVendedor]" id="vendedor">
                <option selected disabled value = "">--Selecciona una opción--</option>
               <!-- sin poo
               <?php
               //traernos lps resultados de la consulta como arreglo 
               //el while se va a ejecutar mientras haya datos en la consulta
               //while($row = mysqli_fetch_assoc($resultado)):
                ?>
              <option <?php //echo $idVendedor === $row['id'] ? 'selected' : ''; ?> value="<?php //echo $row['id'] ;?>" ><?php //echo $row['nombre']." ". $row['apellido'];?></option>
               <?php //endwhile;?> -->
             <?php foreach($vendedores as $vendedor):  ?>
               <option 
               <?php echo $propiedad->idVendedor === $vendedor->id ? "selected" : "";  ?>
               value="<?php echo sanitizar($vendedor->id)?> "> 
               <?php echo sanitizar($vendedor->nombre) . " " . sanitizar($vendedor->apellido); ?> 
              </option>
             <?php endforeach; ?>
            </select>
        </fieldset>