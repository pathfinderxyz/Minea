<?php
  include 'coneccion/coneccion.php';

 $sql = pg_query ("SELECT * FROM tramites_2015");
 
 ?>

<div class="row">
	<div class="col-md-12">
		<h3>Lista de Trámites 2015</h3><br>
		<div id="lista_tramites" class="dataTables_wrapper form-inline">

			<table class="table table-bordered datatable dataTable" id="table_lista_tramites">
				<thead>
					<tr>
						<th>N° RD</th>
						<th>Nombre</th>
						<th>Telefono</th>
						<th>Municipio</th>
						<th>Tramite</th>
						<th>Unidad</th>
						<th>Fecha</th>
						<th>N° Expediente</th>
					</tr>	
				</thead>
				<tbody>
					<?php
							while ($info = pg_fetch_assoc($sql)) {
								echo '<tr>
										<td>'.$info['RD'].'</td>
										<td>'.$info['Solicitante'].'</td>
										<td>'.$info['Telefono'].'</td>
										<td>'.$info['Municipio'].'</td>
										<td>'.$info['Tramite'].'</td>
										<td>'.$info['unidad'].'</td>
										<td>'.$info['Fecha'].'</td>
										<td>'.$info['N_expediente'].'</td>	
								</tr>';
						}
					?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(function(){
		$("#table_lista_tramites").dataTable({
			oLanguage: {
				sSearch: "Buscar",
				sEmptyTable: "No hay Registros",
				oPaginate: {
					sFirst: "Primera",
					sLast: "Ultima",
					sNext: "Siguiente",
					sPrevious: "Anterior"
				},
				sLengthMenu: "Mostrar _MENU_ registros",
				sInfoEmpty:"Mostrando 0 entradas",
				sInfo:"Mostrando _START_ de _END_ de _TOTAL_ entradas"
			}
		});
		$(".dataTables_wrapper select").select2({
			minimumResultsForSearch: -1
		});
	});
</script>