<?php 
//El proyecto de sirve desde public
if( !isset($_SESSION) ){
    session_start();
}

$autenticado = $_SESSION['login'] ?? false;
if( !isset($inicio) ){
    $inicio = false;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/build/css/app.css">
</head>
<body>
  <header class="header <?php echo $inicio ? 'inicio': '' ?>"> <!--Usando operador ternario para que se incluya inicio cuando sea true 
   isset para verificar que existe la variable y nos ayuda a que no se muestre info   -->
      <div class="contenedor contenido-header">
        <div class="barra">
            <div class="logo-menu">
                <a href="/"> <!--Forma de referirnos a la pagina principal-->
                    <img src="/build/img/logo.svg" alt="logo-BienesRaices">
                   </a>
        
                   <div class="menu-hamburguesa">
                    <img src="/build/img/barras.svg" alt="mobile-menu">
                </div>
               </div>
    
               <div class="derecha">
                   <div class="dark-mode-boton">
                       <img src="/build/img//dark-mode.svg" alt="dark mode">
                   </div>
                <nav class="navegacion" data-cy="nav-index">
                    <a href="/nosotros">Nosotros</a>
                    <a href="/propiedades">Anuncios</a>
                    <a href="/blog">Blog</a>
                    <a href="/contacto">Contacto</a>
                    <?php if( $autenticado): ?>
                    <a href=c/logout">Cerrar sesión</a>
                    <?php else: ?>
                    <a href="/login">Iniciar sesión</a>
                    <?php endif; ?>
                </nav>
               </div>
        </div>
        <?php if($inicio): ?> <!-- Si se cumple se ejecutara lo que rodea -->
                <h1 data-cy = "heading-sitio">Venta de Casas y Departamentos <span>Exclusivos de lujo</span></h1>
            <?php endif;?>
      </div>
  </header>

<?php 
//Se le pasa la informacion pasada de los archivos
echo $contenido; ?>

  <footer class="footer seccion">
    <div class="contenedor contenedor-footer">
        <nav class="navegacion" data-cy="nav-footer">
            <a href="/nosotros">Nosotros</a>
            <a href="/propiedades">Anuncios</a>
            <a href="/blog">Blog</a>
            <a href="/contacto">Contacto</a>
        </nav>
    </div>
    <?php
     //hacer que el año se incremente cada que este cambie y que sea automatico
     $fecha = date('d-m-y'); //mayuscula imprime la fecha completa, funcion para imprimir fechas
     //dependiendo de lo que le pasemo nos mostrara el formate, solo se puede mostrar el año, o el mes o el dia o todo junto
    ?>
    <p>Todos los derechos reservados <?php echo date('Y')?> &copy;</p>
</footer>
<script src="/build/js/bundle.min.js"></script>
</body>
</html>