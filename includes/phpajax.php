<?php 

sleep(3);
// Mensajes de salida respuesta del servidor
$salidaJson= array("respuesta"=>"error",
					"mensaje"=>"Primera prueba con Ajax",
					"contenido"=>"");
echo json_encode($salidaJson);
?>