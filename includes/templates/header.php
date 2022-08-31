<?php 
if( !isset($_SESSION) ){
    session_start();
}

$autenticado = $_SESSION['login'] ?? false;

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
                <nav class="navegacion">
                    <a href="nosotros.php">Nosotros</a>
                    <a href="anuncios.php">Anuncios</a>
                    <a href="blog.php">Blog</a>
                    <a href="contacto.php">Contacto</a>
                    <?php if( $autenticado): ?>
                    <a href="cerrar-sesion.php">Cerrar sesión</a>
                    <?php else: ?>
                    <a href="login.php">Iniciar sesión</a>
                    <?php endif; ?>
                </nav>
               </div>
        </div>
        <?php if($inicio): ?> <!-- Si se cumple se ejecutara lo que rodea -->
                <h1>Venta de Casas y Departamentos <span>Exclusivos de lujo</span></h1>
            <?php endif;?>
      </div>
  </header>