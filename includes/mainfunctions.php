<?php 
// Definir las constantes para la conexion con la db
define('server', 'localhost');
define('user', 'root');
define('pass', 'registro');
define('mainDataBase', 'northwind');

// Variable que indica el status de la conexión
$errorDbConexion=false;

// Funcion para extraer el listado de datos
function consultaDatos($linkDB){
	$salida='';

	$consulta= $linkDB -> query("SELECT EmployeeID, LastName, FirstName, Title, TitleOfCourtesy, 
								BirthDate, HireDate, Address, City, Region, PostalCode, Country, 
								HomePhone, Extension, Photo, Notes, ReportsTo, PhotoPath 
								FROM employees ORDER BY EmployeeID ASC");
	// $consulta= $linkDB -> query("SELECT txt_ID, txt_1, txt_2, txt_3 FROM test_table ORDER BY ");
// Verificar el resultado de la consulta <> 0
	if ($consulta -> num_rows != 0){
		//si contine registros
		while ($listadoOK = $consulta -> fetch_assoc()) {
			$salida .= '  
			<tr>
        		<td>'.$listadoOK['EmployeeID'].'</td>
        		<td>'.$listadoOK['LastName'].'</td>
        		<td>'.$listadoOK['FirstName'].'</td>
        		<td>'.$listadoOK['Title'].'</td>
        		<td class="txtcenter"><button type="button" class="btn btn-success"><i class="fa fa-pencil-square-o"></i> Editar</button>
        		<button type="button" class="btn btn-danger"><i class="fa fa-trash"></i> Eliminar</button></td>
        	</tr>
        	';
			// $salida .= '  
			// <tr>
   //      		<td>'.$listadoOK['txt_ID'].'</td>
   //      		<td>'.$listadoOK['txt_1'].'</td>
   //      		<td>'.$listadoOK['txt_2'].'</td>
   //      		<td>'.$listadoOK['txt_3'].'</td>
   //      		<td class="txtcenter" style="width:auto;"><span><button type="button" class="btn btn-success">Editar</button>
   //      		<button type="button" class="btn btn-danger">Eliminar</button></span></td>
   //      	</tr>
   //      	';
		}
	}
	else{
		$salida ='';

	}
	return $salida;

}

// Verificar conexión con base de datos
if(defined('server') && defined('user') && defined('pass') && defined('mainDataBase')){
	// Conexion con la base de datos
	$mysqli = new mysqli(server, user, pass, mainDataBase);

	// verificamos si hay error al conectar 
	if(mysqli_connect_error()){
		$errorDbConexion = true;

	}
	// Evitar problemas con acentos en datos 
	$mysqli -> query("SET NAMES 'utf-8");

}
?>