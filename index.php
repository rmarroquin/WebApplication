<?php 
// Omitir errores en servidor
// ini_set("display_error", false);
// Incluimos el archivo mainfunctions
include('includes/mainfunctions.php');

if($errorDbConexion == false){
	// Manda a llamar la funcion para la lista de usuarios
	$consultaInfo = consultaDatos($mysqli);
}
else{
	// Registra error en la base de datos 
	$consultaInfo = '';

}

?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>WebApplication</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Agregar y modificar elementos con PHP, MySQL, Bootstrap, Jquery, JqueryUI, JqueryValidation">
  <meta name="author" content="Ricardo Marroquin">

  <!-- Le styles -->
  <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" >
  <link type="text/css" rel="stylesheet" href="css/bootstrap-theme.min.css">
  <link type="text/css" rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css">
  <link type="text/css" rel="stylesheet" href="css/jquery.dataTables.min.css">
  <link type="text/css" rel="stylesheet" href="css/master.css">
  

  <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
  <!--[if lt IE 9]>
    <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->


</head>
<body>

    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Project name</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div id="contenido" class="container">
    	<!-- Button trigger modal -->
    	<div id="btnaddnew" class="addUser">
			<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Agregar Nuevo
			</button>
		</div>

		<!-- Modal -->
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
		        <h4 class="modal-title" id="myModalLabel">Agregar Usuario</h4>
		      </div>
		      <div class="modal-body">
		      	<!-- Formulario para JQuery Validation -->
		        <form class="form-horizontal" id="frmaddnew" name="frmaddnew" method="POST" action="" role="form">
		        	<fieldset id="ocultos">
		        		<input type="hidden" id="accion" name="accion" class="{required:true}"/>
		        		<input type="hidden" id="id_user" name="id_user" class="{required:true}" value="0"/>
	    			</fieldset>
					<fieldset>
					    	<label for="cname">Ingrese Apellidos:</label>
					    </p>	
					    	<input id="LastName" name="LastName" maxlength="20"type="text" required>
					    
					    <p>
					    	<label for="firstname">Ingrese Nombres:</label>
					    </p>	
					    	<input id="FirstName" name="FirstName" maxlength="10" type="text" required>
					    
					    <p>
					    	<label for="puesto">Ingrese el Puesto:</label>
					    </p>	
					    	<input id="Title" name="Title" maxlength="30" type="text" required>
						<p></p>						
				  	</fieldset>
				  	<div id="modal-footer" class="modal-footer">
				  		<button type="submit" id="btnagregar" class="btn btn-primary"><i class="fa fa-floppy-o"></i> Guardar</button>
		        		<button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times-circle"></i> Cancelar</button>
		        		<fieldset id="ajaxLoader" class="hide">
				  			<img src="images/default-loader.gif" alt="">
				  			<span>Espere un momento...</span>				  	
				  		</fieldset>
				  		
		      		</div>
				</form>
		      </div>
	  
		    </div>
		  </div>
		</div>
      <div class="starter-template">
        <table id="Tabladatos" class="table table-condensed table-striped" cellspacing="0" width="100%">
        	<thead>
        		<tr>
        			<th>Código</th>
        			<th>Apellidos</th>
        			<th>Nombres</th>
        			<th>Puesto</th>
        			<th class="txtcenter">Acciones</th>
        		</tr>
        	</thead>
<!--         		<tr> <td>1</td> <td>Marroquin Gramajo</td> <td>Ricardo Fernando</td> <td>Ingeniero</td> <td class="txtcenter"><button type="button" class="btn btn-success">Editar</button></td> </tr> <tr> <td>2</td> <td>Castañon Marroquin</td> <td>Victoria Aimeé</td> <td>Ingenieniera</td> <td class="txtcenter"><button type="button" class="btn btn-success">Editar</button></td> </tr> <tr> <td>3</td> <td>Garrett Winters</td> <td>Winters</td> <td>Acountan</td> <td class="txtcenter"><button type="button" class="btn btn-success">Editar</button></td> </tr> <tr> <td>4</td> <td>Ashton Cox</td> <td>Junior Technical Author</td> <td>San Francisco</td> <td class="txtcenter"><button type="button" class="btn btn-success">Editar</button></td> </tr> <tr> <td>5</td> <td>Cedric Kelly</td> <td>Senior Javascript Developer</td> <td>Edinburgh</td> <td class="txtcenter"><button type="button" class="btn btn-success">Editar</button></td> </tr> <tr> <td>6</td> <td>Airi Satou</td> <td>Accountant</td> <td>Tokyo</td> <td class="txtcenter"><button type="button" class="btn btn-success">Editar</button></td> </tr> <tr> <td>7</td> <td>Brielle Williamson</td> <td>Integration Specialist</td> <td>New York</td> <td class="txtcenter"><button type="button" class="btn btn-success">Editar</button></td> </tr> <tr> <td>8</td> <td>Herrod Chandler</td> <td>Sales Assistant</td> <td>San Francisco</td> <td class="txtcenter"><button type="button" class="btn btn-success">Editar</button></td> </tr> <tr> <td>9</td><td>Fiona Green</td> <td>Chief Operating Officer (COO)</td> <td>San Francisco</td> <td class="txtcenter"><button type="button" class="btn btn-success">Editar</button></td> </tr> <tr> <td>10</td><td>Shou Itou</td> <td>Regional Marketing</td> <td>Tokyo</td> <td class="txtcenter"><button type="button" class="btn btn-success">Editar</button></td> </tr> <tr> <td>11</td><td>Michelle House</td> <td>Integration Specialist</td> <td>Sidney</td> <td class="txtcenter"><button type="button" class="btn btn-success">Editar</button></td> </tr> <tr> <td>12</td><td>Suki Burks</td> <td>Developer</td> <td>London</td> <td class="txtcenter"><button type="button" class="btn btn-success">Editar</button></td> </tr> <tr> <td>13</td><td>Prescott Bartlett</td> <td>Technical Author</td> <td>London</td> <td class="txtcenter"><button type="button" class="btn btn-success">Editar</button></td> </tr> <tr> <td>14</td><td>Gavin Cortez</td> <td>Team Leader</td> <td>San Francisco</td> <td class="txtcenter"><button type="button" class="btn btn-success">Editar</button></td> </tr> <tr> <td>15</td><td>Martena Mccray</td> <td>Post-Sales support</td> <td>Edinburgh</td> <td class="txtcenter"><button type="button" class="btn btn-success">Editar</button></td> </tr> <tr> <td>16</td><td>Unity Butler</td> <td>Marketing Designer</td> <td>San Francisco</td> <td class="txtcenter"><button type="button" class="btn btn-success">Editar</button></td> </tr> <tr> <td>17</td><td>Howard Hatfield</td> <td>Office Manager</td> <td>San Francisco</td> <td class="txtcenter"><button type="button" class="btn btn-success">Editar</button></td> </tr> <tr> <td>18</td><td>Hope Fuentes</td> <td>Secretary</td> <td>San Francisco</td> <td class="txtcenter"><button type="button" class="btn btn-success">Editar</button></td> </tr> <tr> <td>19</td><td>Vivian Harrell</td> <td>Financial Controller</td> <td>San Francisco</td> <td class="txtcenter"><button type="button" class="btn btn-success">Editar</button></td> </tr> --> <tbody>
        		<?php echo $consultaInfo ?>
        		
        	</tbody>
        </table>
      </div>
    <footer>
    	Copyright &copy; 2014 <a href="http://www.elementalwebgt.com">ElementalWebgt</a>- Elaborado por: Ing. Ricardo Marroquín.
    </footer>
    </div><!-- /.container -->


  <!-- Le javascript
  ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script type="text/javascript" src="js/jquery.js"></script>
  <script type="text/javascript" src="js/bootstrap/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/modernizr.js"></script>
  <script type="text/javascript" src="js/jquery-validation/dist/jquery.validate.min.js"></script>
  <script type="text/javascript" src="js/jquery-validation/dist/localization/messages_es.js"></script>
  <script type="text/javascript" src="js/jquery-datatables/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="js/main.js"></script>

  
</body>
</html>