<?php

  $tutor=$_POST['tutor'];
 
 

setlocale(LC_ALL,"es_ES");
$fecha = date('Y-m-d');
$fecha =  date('Y-m-d', strtotime($fecha .' -1 day'));


function obtenerFechaEnLetra($fecha){
    $dia= conocerDiaSemanaFecha($fecha);
    $num = date("j", strtotime($fecha));
    $anno = date("Y", strtotime($fecha));
    $mes = array('enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio', 'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre');
    $mes = $mes[(date('m', strtotime($fecha))*1)-1];
    return $dia.', '.$num.' de '.$mes.' del '.$anno;
}
 
function conocerDiaSemanaFecha($fecha) {
    $dias = array('Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado');
    $dia = $dias[date('w', strtotime($fecha))];
    return $dia;
}

$fecha= obtenerFechaEnLetra($fecha);


$subject = 'Sobre grabación de videoconferencia de ayer';
$from = 'acciontutorialfct@ugb.edu.sv';




$date = date ("h");

if ($date < 12) 
$bienve= "Buenos dias "; 

if ($date > 12) 
$bienve= "Buenas Tardes "; 




$cualsemana=date("W");
switch ($cualsemana) {
    case 39:
        $cualsemana="Unidad 2";
        break;
    case 40:
        $cualsemana="Unidad 3";
        break;
    case 41:
        $cualsemana="Unidad 4";
        break;
}




switch ($tutor) {
	case 'luis':
	    
	   if(date("l")=="Wednesday"){
	    $cualsemana=$cualsemana." Sesión 1 ";
	   }

       if(date("l")=="Friday"){ 
	    $cualsemana=$cualsemana." Sesión 2 ";
       }	    

	  
	  $img = file_get_contents('logoluis.jpg');
      $imgdata = base64_encode($img);
      $mailBody = "<img height='200' width='700' src='data:image/x-icon;base64,$imgdata'/>";
//      $contacts = array("carlalopez@ugb.edu.sv","napoleonregalado@ugb.edu.sv", "eportillo@ugb.edu.sv", "jennyflores@ugb.edu.sv", "maria_velasquez@ugb.edu.sv", "oneydayasmin@ugb.edu.sv", "aguevara@ugb.edu.sv", "acciontutorialfct@ugb.edu.sv", "acciontutorialfdri@ugb.edu.sv"); 
      
      $contacts = array("acciontutorialfct@ugb.edu.sv", "amayantonio@ugb.edu.sv"); 
      
            
      $saludo=$bienve."Estimados Tutores, reciban un cordial saludo de Acción Tutorial FCT";
      break;

	case 'glenda':
    	  $cualsesion=""; 
	      $img = file_get_contents('logoglenda.jpg');
          $imgdata = base64_encode($img);
          $mailBody = "<img height='200' width='700' src='data:image/x-icon;base64,$imgdata'/>";
          $contacts = array("amayantonio@outlook.es","amayantonio@ugb.edu.sv", "lamayavillalta@gmail.com"); 
          $saludo=$bienve."Estimados Tutores, reciban un cordial saludo de Acción Tutorial FDRI";          
		break;

	case 'celia':
		  $cualsesion=""; 
	      $img = file_get_contents('logocelia.jpg');
          $imgdata = base64_encode($img);
          $mailBody = "<img height='200' width='700' src='data:image/x-icon;base64,$imgdata'/>";
          $contacts = array("amayantonio@outlook.es","amayantonio@ugb.edu.sv", "lamayavillalta@gmail.com"); 
      $saludo=$bienve."Estimados Tutores, reciban un cordial saludo de Acción Tutorial ";          
          break;

	case 'jimmy':
	  $cualsesion=""; 
      $img = file_get_contents('logojimmy.jpg');
      $imgdata = base64_encode($img);
      $mailBody = "<img height='200' width='700' src='data:image/x-icon;base64,$imgdata'/>";
      $contacts = array("amayantonio@outlook.es","amayantonio@ugb.edu.sv", "lamayavillalta@gmail.com");
      $saludo=$bienve."Estimados Tutores, reciban un cordial saludo de Acción Tutorial ";
      break;
	
}








// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";



 
// Create email headers
$headers .= 'From: '.$from."\r\n".
    'Reply-To: '.$from."\r\n" .
    'X-Mailer: PHP/' . phpversion();
 
 

 
 
// Compose a simple HTML email message
$message = '<html><body>';
$message .='<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>';
$message .= '<h4 style="color:#4500ff;">'.$saludo.'</h4>';
$message .= '<p><br>Les comento que he iniciado la revisi&oacute;n de cada grabaci&oacute;n de videoconferencia del d&iacute;a de ayer '.$fecha.' en el horario de las 7:00pm, colocada en el espacio determinado <b> "Clases en vivo"</b> correspondiente a la '.$cualsemana.'<br><br> <p> Nota: Le pido de manera atenta por favor dejar de manera p&uacute;blica el enlace para poder ver la grabaci&oacute;n. OJO si el alumno no puede entrar a la grabaci&oacute;n porque le pide un correo, que lo solicite a <b>correoinstitucional@ugb.edu.sv</b> </p>Gracias para quienes ayer mismo la colocaron. <br><br> Confirmar de recibido por favor. <br><br>Cordialmente</p>'.'<br>'.'<br>'.$mailBody;


$message .= '</body></html>';
 



 

// $to="acciontutorialfct@ugb.edu.sv";
  
  
  
  
  

 foreach($contacts as $key=>$value){
   if(mail($value, $subject, $message, $headers)) {
        $salida= 'Correos enviados satisfactoriamente.';
    } else  {
        $salida= 'hubo un problema al enviar los correos, por favor intente de nuevo!.';
    }
  }





// bueno abajo
 // if(mail($to, $subject, $message, $headers))
//     {
//          $salida= 'Correos enviados satisfactoriamente.';
//      } else
//      {
//          $salida= 'hubo un problema al enviar los correos, por favor intente de nuevo!.';
//    }
















// buenoooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooo

// $todos = ['amayantonio@ugb.edu.sv', 'amayantonio@hotmail.com', 'lamayavillalta@gmail.com'];
// foreach ($todos as $to){ // or $result as $row

//      if(mail($to, $subject, $message, $headers)){
//       $salida= 'Correos enviados satisfactoriamente.';
      
//   } else{
//       $salida= 'hubo un problema al enviar los correos, por favor intente de nuevo!.';
//   }
//  }
echo "Tutor: ".$tutor."->".$salida;








 


?>