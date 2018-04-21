<?
// Configuración
$folder = "uploads/"; // Carpeta a la que queremos subir los archivos
$maxlimit = 50000000; // Máximo límite de tamaño (en bits)
$allowed_ext = "rar,jpg"; // Extensiones permitidas (usad una coma para separarlas)
$overwrite = "no"; // Permitir sobreescritura? (yes/no)
// creado por maracaiboenlinea.com
$match = ""; 
$filesize = $_FILES['userfile']['size']; // toma el tamaño del archivo
$filename = strtolower($_FILES['userfile']['name']); // toma el nombre del archivo y lo pasa a minúsculas


if(!$filename || $filename==""){ // mira si no se ha seleccionado ningún archivo
   $error = "- Ningún archivo selecccionado para subir.<br>";
}elseif(file_exists($folder.$filename) && $overwrite=="no"){ // comprueba si el archivo existe ya
   $error = "- El archivo <b>$filename</b> ya existe<br>";
}

// comprobar tamaño de archivo
if($filesize < 1){ // el archivo está vacío
   $error .= "- Archivo vacío.<br>";
}elseif($filesize > $maxlimit){ // el archivo supera el máximo
   $error .= "- Este archivo supera el máximo tamaño permitido.<br>";
}

$file_ext = preg_split("/\./",$filename); // aquí no tengo claro lo que hace xD
$allowed_ext = preg_split("/\,/",$allowed_ext); // ídem, algo con las extensiones
foreach($allowed_ext as $ext){
   if($ext==$file_ext[1]) $match = "1"; // Permite el archivo
}

// Extensión no permitida
if(!$match){
   $error .= "- Este tipo de archivo no está permitido: $filename<br>";
}

if($error){
   print "Se ha producido el siguiente error al subir el archivo:<br> $error"; // Muestra los errores
}else{
   if(move_uploaded_file($_FILES['userfile']['tmp_name'], $folder.$filename)){ // Finalmente sube el archivo
      print "<b>$filename</b> se ha subido correctamente!"; //el mensaje que saldra cuando el archivo este subido
   }else{
      print "Error! Puede que el tamaño supere el máximo permitido por el servidor. Inténtelo de nuevo."; // Otro error
   }
}

?>
<form>
     <INPUT TYPE="button" VALUE="Atrás" onClick="history.back()">
</form>