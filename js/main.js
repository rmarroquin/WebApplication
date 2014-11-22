$(function(){
	
	// Configurando la Data TAble para el index en lenguaje español
	$('#Tabladatos').dataTable({
		'scrollX':true, //agrega la barra de desplazamiento horizontal para dispositivos pequeños
		'language':	{
		    "sProcessing":     "Procesando...",
		    "sLengthMenu":     "Mostrar _MENU_ registros",
		    "sZeroRecords":    "No se encontraron resultados",
		    "sEmptyTable":     "Ningún dato disponible en esta tabla",
		    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
		    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
		    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
		    "sInfoPostFix":    "",
		    "sSearch":         "Buscar:",
		    "sUrl":            "",
		    "sInfoThousands":  ",",
		    "sLoadingRecords": "Cargando...",
		    "oPaginate": {
		        "sFirst":    "Primero",
		        "sLast":     "Último",
		        "sNext":     "Siguiente",
		        "sPrevious": "Anterior"
		    },
		    "oAria": {
		        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
		        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
		    }
		}
	});	
	// Limpiar las cajas de texto del formulario modal
	$('#myModal').on('hidden.bs.modal', function () {
		var validator=$('#frmaddnew').validate();
		validator.resetForm();
		$('#frmaddnew input[type="text"]').val('');
		// $('#frmaddnew').removeClass('required');
  
	});

	// Validar los datos del formulario
	$('#frmaddnew').validate({
		submitHandler: function(){
			var str = $('#frmaddnew').serialize();
			//alert(str);
			// Mostrar efectos al guardar formulario
			 $.ajax({
				beforeSend: function(){
					$('#frmaddnew .ajaxLoader').show();

				},
				cache: false,
				type:"POST",
				dataType: "json",
				url:"includes/phpajax.php",
				data:str + "&accion=addUser&id="+Math.random(),
				success: function(response){
					$('#frmaddnew .ajaxLoader').hide();
					alert(response.mensaje);
					
				},
				error: function(){
					alert("ERROR GENERAL DEL SISTEMA, INTENTE MAS TARDE");
				},				
			});	
				return false;		
			},
			// errorPlacement: function(error, element) {
		 //        error.appendTo(element.prev("span").append());	
			// }
	});
	
});