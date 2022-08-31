<?php
namespace Controllers;

use MVC\Router;
use Model\Propiedad;
use PHPMailer\PHPMailer\PHPMailer;
class PaginasController{
    public static function index(Router $router){
        //  Agunaspropiedades que se muestran al inicio de la pagina
        $propiedades=Propiedad::algunos(3);

//La variable de inicio para que nos ponga el header con la imagen, que en el layout.php verifica si existe
$inicio = true;
        //toma la ubicación del archivo
        $router->render('paginas/index',[
            'propiedades'=> $propiedades,
            'inicio'=> $inicio

        ]);
    }
    public static function nosotros(Router $router){
        $router->render('paginas/nosotros');
    }
    public static function propiedades(Router $router){
//Aqui se ven todas las propiedades
        $propiedades = Propiedad::all();
        $router->render('paginas/propiedades',[
            'propiedades'=>$propiedades
        ]);
    }
    public static function propiedad(Router $router){
        $id = validar_redireccionar('');
        $propiedad = Propiedad::find($id);
        $router->render('paginas/propiedad',[
            'propiedad'=>$propiedad
        ]);
    }
    public static function blog(Router $router){
        $router->render('paginas/blog');
    }
    public static function entrada(Router $router){
        $router->render('paginas/entrada');
    }
    public static function contacto(Router $router){

        $mensajeCorreo = '';

        if($_SERVER['REQUEST_METHOD'] === 'POST'){

            $respuesta = $_POST['contacto'];
          
            //Crear una instancia de phpmailer
            $mail = new PhPMailer;
   
            #Traido desde mailtrap
            //Configurar SMTP-> protocolo para el envio de emails
            $mail->isSMTP(); //Utilizar smtp para el envio de correos
            $mail->Host = 'smtp.mailtrap.io';
            $mail->SMTPAuth = true; #estar autenticado, nmos vamos a autenticar
            $mail->Username = 'c3deae1e937d9c';
            $mail->Password = 'a8fd8556632699';
            $mail->SMTPSecure = 'tls'; // que se transporte con seguridad y no se pueda interceptar
            $mail->Port = 2525;

            #Configurar contenido del email
            $mail->setFrom('admin@bienesRaices.com'); #quien envia el email
            $mail->addAddress('admin@bienesRaices.com', 'BienesRaices.com'); #A que email le llega el correo
            $mail->Subject = 'Tienes un nuevo mensaje'; #asunto
            
            #Habilitar HTML
            $mail->isHTML(true);
            $mail->CharSet = 'UTF-8'; #Para que nos acepte simbolos y acentos
            #Definir el contenido
            $contendio = '<html>';
            $contendio .=  '<p>Tienes un nuevo mensaje</p>';
            $contendio .=  '<p>Nombre: ' . $respuesta['nombre'] . '</p>';
            //Enviar de forma condicional algunos campos de rmail o telefono
            if($respuesta['contacto'] === 'telefono'){
                $contendio .=  '<p>Teléfono: ' . $respuesta['telefono'] . '</p>';
                $contendio .=  '<p>Quiere ser contactado: El día ' . $respuesta['fecha'] . '</p>';
                $contendio .=  '<p>A las: ' . $respuesta['hora'] . '</p>';
            }else{
                #Es el correo
                $contendio .=  '<p>Email: ' . $respuesta['correo'] . '</p>';
            }
            $contendio .=  '<p>Mensaje: ' . $respuesta['mensaje'] . '</p>';
            $contendio .=  '<p>Vende o Compra: ' . $respuesta['tipo'] . '</p>';
            $contendio .=  '<p>Precio o presupuesto: $' . $respuesta['precio'] . '</p>';
            $contendio .=  '</html>';
            $mail->Body = $contendio;
            # $mail->AltBody = $contendio; texto sin html cuendo el correo no soporta html
            #Enviar el email
            if($mail->send()){
                $mensajeCorreo = 'Mensaje enviado correctamente';
            }
            else{
                $mensajeCorreo = 'No se pudo enviar el mensaje';
            }
        }
        $router->render('paginas/contacto', [
            'mensaje' => $mensajeCorreo
        ]);
    }
    
}