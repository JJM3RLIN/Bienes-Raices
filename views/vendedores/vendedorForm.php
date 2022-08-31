  <fieldset>
    <legend>Información</legend>
  <label for='nombre'>Nombre:</label> 
    <input type="text" id="nombre" name="nombre" value="<?php echo sanitizar($vendedor->nombre) ?>" >
    <label for='apellido'>Apellido:</label> 
    <input type="text" id="apellido" name="apellido"  value="<?php echo sanitizar( $vendedor->apellido)?>">
  </fieldset>
    <fieldset>
    <legend>Contacto:</legend>
    <label for='telefono'>Teléfono:</label> 
    <input type="tel" id="telefono" name="telefono"  value="<?php echo sanitizar($vendedor->telefono) ?>">
    </fieldset>